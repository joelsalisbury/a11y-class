<?php

namespace App\Http\Controllers;

use App\Support\Course;

class CourseController extends Controller
{
    public function today()
    {
        $current = Course::current();
        $module = Course::module($current['module']);

        return view('course.today', [
            'module' => $module,
            'sessionNumber' => $current['session'],
            'session' => $module['sessions'][$current['session']] ?? null,
            'challenge' => $module['challenge'],
        ]);
    }

    public function modules()
    {
        return view('course.modules.index', [
            'modules' => Course::modules(),
        ]);
    }

    public function module(int $module)
    {
        return view('course.modules.show', [
            'module' => Course::module($module),
        ]);
    }

    public function session(int $module, int $session)
    {
        $moduleData = Course::module($module);

        abort_unless(isset($moduleData['sessions'][$session]), 404);

        return view('course.modules.session', [
            'module' => $moduleData,
            'sessionNumber' => $session,
            'session' => $moduleData['sessions'][$session],
        ]);
    }

    public function challenge(int $module)
    {
        $moduleData = Course::module($module);

        abort_unless($moduleData['challenge'], 404);

        return view('course.modules.challenge', [
            'module' => $moduleData,
            'challenge' => $moduleData['challenge'],
        ]);
    }

    public function resources(int $module)
    {
        $moduleData = Course::module($module);

        return view('course.modules.resources', [
            'module' => $moduleData,
        ]);
    }

    public function fieldGuide()
    {
        return view('course.field-guide', [
            'guide' => Course::fieldGuide(),
        ]);
    }

    public function fieldGuideEntry(string $entry)
    {
        $entryData = Course::fieldGuideEntry($entry);

        return view('course.field-guide-entry', [
            'guideCategories' => $entryData['categories'],
            'category' => $entryData['category'],
            'entry' => $entryData['entry'],
            'previousEntry' => $entryData['previous'],
            'nextEntry' => $entryData['next'],
        ]);
    }

    public function syllabus()
    {
        return view('course.syllabus');
    }
}
