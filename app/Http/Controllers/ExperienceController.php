<?php

namespace App\Http\Controllers;

class ExperienceController extends Controller
{
    public function module04Lab()
    {
        return view('experiences.interaction-lab');
    }

    public function module04CourseFinder()
    {
        return view('experiences.module04-course-finder');
    }

    public function module04TaskPrioritizer()
    {
        return view('experiences.module04-task-prioritizer');
    }

    public function module04EventBrowser()
    {
        return view('experiences.module04-event-browser');
    }

    public function module04PrecisionGauntlet()
    {
        return view('experiences.module04-precision-gauntlet');
    }

    public function campusEventRegistration()
    {
        return view('experiences.campus-event-registration');
    }

    public function makerMap()
    {
        return view('experiences.makermap');
    }

    public function module05StructureDemo()
    {
        return view('experiences.module05-structure-demo');
    }

    public function module05ControlsDemo()
    {
        return view('experiences.module05-controls-demo');
    }

    public function module05ScheduleDemo()
    {
        return view('experiences.module05-schedule-demo');
    }

    public function module05FormDemo()
    {
        return view('experiences.module05-form-demo');
    }

    public function campusStudySpaceFinder()
    {
        return view('experiences.campus-study-space-finder');
    }
}
