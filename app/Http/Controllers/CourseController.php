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

    public function fieldGuide()
    {
        return view('course.field-guide');
    }

    public function syllabus()
    {
        return view('course.syllabus');
    }
}
