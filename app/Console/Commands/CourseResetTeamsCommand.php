<?php

namespace App\Console\Commands;

use App\Models\TeamAssignment;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('course:reset-teams')]
#[Description('Delete all anonymous Day 1 team assignments. Intended for pre-semester testing.')]
class CourseResetTeamsCommand extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $count = TeamAssignment::query()->count();

        if ($count === 0) {
            $this->info('No team assignments to reset.');

            return self::SUCCESS;
        }

        if (! $this->confirm("This will permanently delete {$count} team assignment(s). Continue?")) {
            $this->info('Cancelled.');

            return self::SUCCESS;
        }

        TeamAssignment::query()->delete();

        $this->info("Deleted {$count} team assignment(s).");

        return self::SUCCESS;
    }
}
