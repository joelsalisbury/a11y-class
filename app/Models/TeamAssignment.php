<?php

namespace App\Models;

use App\Support\Team;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

/**
 * An anonymous Day 1 team assignment. Intentionally stores nothing that
 * identifies the student — only an opaque token and the assigned team.
 */
#[Fillable(['token', 'team'])]
class TeamAssignment extends Model
{
    protected function casts(): array
    {
        return [
            'team' => Team::class,
        ];
    }
}
