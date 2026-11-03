<?php

namespace App\Support;

class CoursePath
{
    public static function catalog(): array
    {
        return require resource_path('coursepath/catalog.php');
    }

    public static function course(string $slug): array
    {
        $catalog = self::catalog();
        abort_unless(isset($catalog[$slug]), 404);

        return ['slug' => $slug, ...$catalog[$slug]];
    }

    public static function paths(): array
    {
        return [
            Team::CyanTriangle->value => ['name' => Team::CyanTriangle->label(), 'title' => 'Creative Practice', 'symbol' => '△', 'subjects' => ['Design', 'Media', 'Art'], 'designation' => 'writing', 'breadth' => 'outside-creative', 'focus' => 'Design, Media, or Art', 'breadth_label' => 'One course outside Design, Media, and Art'],
            Team::AmberCircle->value => ['name' => Team::AmberCircle->label(), 'title' => 'Technology & Systems', 'symbol' => '○', 'subjects' => ['Computer Science', 'Data Science', 'Engineering'], 'designation' => 'quantitative', 'breadth' => 'humanities', 'focus' => 'Computer Science, Data Science, or Engineering', 'breadth_label' => 'One humanities or arts course'],
            Team::VioletSquare->value => ['name' => Team::VioletSquare->label(), 'title' => 'Society & Communication', 'symbol' => '□', 'subjects' => ['Communication', 'Sociology', 'Psychology'], 'designation' => 'writing', 'breadth' => 'technical', 'focus' => 'Communication, Sociology, or Psychology', 'breadth_label' => 'One quantitative or technical course'],
        ];
    }

    public static function eligibility(array $course): ?string
    {
        if ($course['restriction']) {
            return $course['restriction'].'; your sample record has no approval.';
        }
        $missing = array_diff($course['prerequisites'], ['CS 1100', 'MATH 1010']);

        return $missing ? 'Missing prerequisite: '.implode(', ', $missing).'.' : null;
    }

    public static function selected(array $plan): array
    {
        $rows = [];
        foreach ($plan as $slug => $sectionId) {
            $course = self::course($slug);
            $section = collect($course['sections'])->firstWhere('id', $sectionId);
            if ($section) {
                $rows[$slug] = [...$course, 'section' => $section];
            }
        }

        return $rows;
    }

    public static function overlap(array $a, array $b): bool
    {
        return count(array_intersect($a['days'], $b['days'])) > 0 && $a['start'] < $b['end'] && $b['start'] < $a['end'];
    }

    public static function check(string $team, array $plan): array
    {
        $path = self::paths()[$team];
        $rows = self::selected($plan);
        $credits = array_sum(array_column($rows, 'credits'));
        $focus = $designation = $breadth = 0;
        $problems = [];
        $conflicts = [];
        foreach ($rows as $slug => $course) {
            $focus += (int) in_array($course['department'], $path['subjects'], true);
            $designation += (int) $course[$path['designation']];
            $breadth += (int) match ($path['breadth']) {
                'outside-creative' => ! in_array($course['department'], ['Design', 'Media', 'Art'], true),
                'humanities' => in_array($course['department'], ['Art', 'Media', 'Design', 'Writing', 'History', 'Philosophy'], true),
                'technical' => $course['quantitative'] || in_array($course['department'], ['Computer Science', 'Data Science', 'Engineering'], true),
            };
            if ($reason = self::eligibility($course)) {
                $problems[] = $course['code'].': '.$reason;
            }
            if ($course['section']['seats'] === 0) {
                $problems[] = $course['code'].' section '.$course['section']['label'].' is full.';
            }
            foreach ($rows as $otherSlug => $other) {
                if (strcmp($slug, $otherSlug) < 0 && self::overlap($course['section'], $other['section'])) {
                    $conflicts[] = [$slug, $otherSlug];
                    $problems[] = $course['code'].' overlaps '.$other['code'].'. Choose another section or remove a course.';
                }
            }
        }
        if (count($rows) !== count($plan)) {
            $problems[] = 'A section no longer matches its course. Choose a listed section.';
        }
        $checks = [
            ['label' => 'Exactly five courses', 'value' => count($rows).' / 5', 'done' => count($rows) === 5],
            ['label' => 'At least 15 credits', 'value' => $credits.' / 15', 'done' => $credits >= 15],
            ['label' => 'Two courses in '.$path['focus'], 'value' => $focus.' / 2', 'done' => $focus >= 2],
            ['label' => $path['designation'] === 'writing' ? 'One writing-intensive course' : 'One quantitative reasoning course', 'value' => $designation.' / 1', 'done' => $designation >= 1],
            ['label' => $path['breadth_label'], 'value' => $breadth.' / 1', 'done' => $breadth >= 1],
            ['label' => 'No overlapping meeting times', 'value' => count($conflicts).' conflicts', 'done' => ! $conflicts],
            ['label' => 'Eligibility and seats checked', 'value' => $problems ? 'Review needed' : 'Clear', 'done' => ! $problems],
        ];
        $messages = array_column(array_filter($checks, fn (array $check) => ! $check['done']), 'label');

        return ['rows' => $rows, 'credits' => $credits, 'checks' => $checks, 'conflicts' => $conflicts, 'problems' => $problems, 'valid' => ! $messages, 'messages' => array_values(array_unique([...$messages, ...$problems]))];
    }

    public static function time(int $minutes): string
    {
        $hour = intdiv($minutes, 60);

        return ($hour % 12 ?: 12).':'.str_pad((string) ($minutes % 60), 2, '0', STR_PAD_LEFT).($hour >= 12 ? ' PM' : ' AM');
    }

    public static function meeting(array $section): string
    {
        $names = ['M' => 'Mon', 'T' => 'Tue', 'W' => 'Wed', 'R' => 'Thu', 'F' => 'Fri'];

        return implode(', ', array_map(fn (string $day) => $names[$day], $section['days'])).' · '.self::time($section['start']).'–'.self::time($section['end']);
    }
}
