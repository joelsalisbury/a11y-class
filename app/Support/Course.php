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
    protected static ?array $fieldGuide = null;

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

    public static function changelog(): array
    {
        $entries = require resource_path('course/changelog.php');

        usort($entries, fn (array $a, array $b) => strtotime($b['date']) <=> strtotime($a['date']));

        return $entries;
    }

    public static function fieldGuide(): array
    {
        $guide = static::$fieldGuide ??= require resource_path('course/field-guide.php');
        $categories = [];

        foreach ($guide['categories'] ?? [] as $category) {
            $entries = [];

            foreach ($category['entries'] ?? [] as $entry) {
                $entries[] = static::resolveFieldGuideEntryResources($entry);
            }

            $categories[] = [
                'title' => $category['title'],
                'entries' => $entries,
            ];
        }

        return [
            'intro' => $guide['intro'] ?? null,
            'categories' => $categories,
        ];
    }

    public static function fieldGuideEntry(string $slug): array
    {
        $guide = static::fieldGuide();

        foreach ($guide['categories'] as $categoryIndex => $category) {
            foreach ($category['entries'] as $entryIndex => $entry) {
                if (($entry['slug'] ?? null) !== $slug) {
                    continue;
                }

                return [
                    'entry' => $entry,
                    'category' => $category,
                    'previous' => $category['entries'][$entryIndex - 1] ?? null,
                    'next' => $category['entries'][$entryIndex + 1] ?? null,
                    'categories' => $guide['categories'],
                    'category_index' => $categoryIndex,
                ];
            }
        }

        abort(404);
    }

    protected static function resolveFieldGuideEntryResources(array $entry): array
    {
        $resources = $entry['authoritative_resources'] ?? [];

        foreach ($entry['resource_refs'] ?? [] as $reference) {
            $module = static::module((int) $reference['module']);

            if (!empty($reference['collection'])) {
                foreach ($module['resource_collections'] ?? [] as $collection) {
                    if (($collection['title'] ?? null) !== $reference['collection']) {
                        continue;
                    }

                    foreach ($collection['resources'] ?? [] as $resource) {
                        $resources[] = $resource;
                    }
                }
            }

            if (!empty($reference['resource_label'])) {
                foreach ($module['resources'] ?? [] as $resource) {
                    if (($resource['label'] ?? null) === $reference['resource_label']) {
                        $resources[] = $resource;
                    }
                }
            }
        }

        $entry['authoritative_resources'] = static::uniqueResources($resources);

        return $entry;
    }

    protected static function uniqueResources(array $resources): array
    {
        $unique = [];
        $seen = [];

        foreach ($resources as $resource) {
            $key = ($resource['href'] ?? '').'|'.($resource['route'] ?? '').'|'.($resource['label'] ?? '');

            if (isset($seen[$key])) {
                continue;
            }

            $seen[$key] = true;
            $unique[] = $resource;
        }

        return $unique;
    }
}
