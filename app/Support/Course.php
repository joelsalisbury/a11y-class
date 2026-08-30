<?php

namespace App\Support;

/**
 * Loads course content from the plain-PHP-array source files in
 * resources/course/. This is intentionally not a database or CMS — content
 * is source-controlled and edited directly by the instructor.
 */
class Course
{
    protected static ?array $config = null;

    public static function config(): array
    {
        return static::$config ??= require resource_path('course/course.php');
    }

    /**
     * Manually designated current module/session, e.g. ['module' => 1, 'session' => 1].
     *
     * @return array{module: int, session: int}
     */
    public static function current(): array
    {
        return static::config()['current'];
    }

    /**
     * Lightweight module summaries for the Modules index, keyed by module number.
     */
    public static function modules(): array
    {
        $modules = [];

        foreach (static::config()['modules'] as $number => $module) {
            $modules[$number] = array_merge(['number' => $number], $module);
        }

        return $modules;
    }

    /**
     * Full module content. Falls back to the summary from course.php for
     * modules that don't yet have a resources/course/modules/{NN}.php file.
     */
    public static function module(int $number): array
    {
        $defaults = [
            'number' => $number,
            'central_question' => null,
            'sessions' => [],
            'challenge' => null,
            'resources' => [],
        ];

        $path = resource_path(sprintf('course/modules/%02d.php', $number));

        if (file_exists($path)) {
            return array_merge($defaults, require $path);
        }

        $summary = static::config()['modules'][$number] ?? null;

        abort_if($summary === null, 404);

        return array_merge($defaults, $summary);
    }
}
