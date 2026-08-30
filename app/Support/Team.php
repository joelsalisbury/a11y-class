<?php

namespace App\Support;

/**
 * Centralized, machine-stable team identifiers for the Day 1 team assignment
 * feature. Color is never the sole identifier — every team also carries a
 * display name and a shape/symbol.
 */
enum Team: string
{
    case CyanTriangle = 'cyan-triangle';
    case AmberCircle = 'amber-circle';
    case VioletSquare = 'violet-square';

    /**
     * @return array<int, self>
     */
    public static function all(): array
    {
        return self::cases();
    }

    public function label(): string
    {
        return match ($this) {
            self::CyanTriangle => 'Cyan Triangle',
            self::AmberCircle => 'Amber Circle',
            self::VioletSquare => 'Violet Square',
        };
    }

    /**
     * Color role token, matched to the `team-tone-*` CSS classes.
     */
    public function tone(): string
    {
        return match ($this) {
            self::CyanTriangle => 'cyan',
            self::AmberCircle => 'amber',
            self::VioletSquare => 'violet',
        };
    }

    public function shape(): string
    {
        return match ($this) {
            self::CyanTriangle => 'triangle',
            self::AmberCircle => 'circle',
            self::VioletSquare => 'square',
        };
    }

    /**
     * Unicode glyph used alongside the shape name so identity never relies
     * on color or an image alone.
     */
    public function symbol(): string
    {
        return match ($this) {
            self::CyanTriangle => '△',
            self::AmberCircle => '○',
            self::VioletSquare => '□',
        };
    }

    public function tagline(): string
    {
        return match ($this) {
            self::CyanTriangle => 'Find the other triangles.',
            self::AmberCircle => 'Find the other circles.',
            self::VioletSquare => 'Find the other squares.',
        };
    }
}
