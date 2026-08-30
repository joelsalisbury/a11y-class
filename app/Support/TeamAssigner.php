<?php

namespace App\Support;

use App\Models\TeamAssignment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * Assigns anonymous visitors to whichever team(s) currently have the fewest
 * assignments, capped at the configured per-team capacity. Safe under
 * concurrent requests via a row-locking transaction.
 */
class TeamAssigner
{
    /**
     * Create a new balanced assignment, or return null once every team has
     * reached capacity.
     */
    public function assign(): ?TeamAssignment
    {
        return DB::transaction(function () {
            $capacity = (int) config('course-join.team_capacity');

            $counts = DB::table('team_assignments')
                ->lockForUpdate()
                ->select('team', DB::raw('count(*) as aggregate'))
                ->groupBy('team')
                ->pluck('aggregate', 'team');

            $eligible = collect(Team::all())->filter(
                fn (Team $team) => ($counts[$team->value] ?? 0) < $capacity
            );

            if ($eligible->isEmpty()) {
                return null;
            }

            $lowest = $eligible->min(fn (Team $team) => $counts[$team->value] ?? 0);

            $team = $eligible
                ->filter(fn (Team $team) => ($counts[$team->value] ?? 0) === $lowest)
                ->random();

            return TeamAssignment::create([
                'token' => (string) Str::uuid(),
                'team' => $team,
            ]);
        });
    }
}
