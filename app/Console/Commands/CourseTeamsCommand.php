<?php

namespace App\Console\Commands;

use App\Models\TeamAssignment;
use App\Support\Team;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

#[Signature('course:teams')]
#[Description('Show anonymous Day 1 team-assignment counts.')]
class CourseTeamsCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $counts = DB::table('team_assignments')
            ->select('team', DB::raw('count(*) as aggregate'))
            ->groupBy('team')
            ->pluck('aggregate', 'team');

        $rows = collect(Team::all())->map(fn (Team $team) => [
            $team->label(),
            $counts[$team->value] ?? 0,
        ]);

        $this->table(['Team', 'Assignments'], $rows);

        $this->newLine();
        $this->line('Total assignments: '.TeamAssignment::query()->count());

        return self::SUCCESS;
    }
}
