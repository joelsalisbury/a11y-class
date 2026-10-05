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

    public function module05DesignFuturesRegistration()
    {
        return view('experiences.design-futures-registration');
    }

    public function module05ScreenReaderLab()
    {
        return view('experiences.module05-screen-reader-lab');
    }

    public function module05FormClarityLab()
    {
        return view('experiences.module05-form-clarity-lab');
    }

    public function module05ErrorRecoveryLab()
    {
        return view('experiences.module05-error-recovery-lab');
    }

    public function campusStudySpaceFinder()
    {
        return view('experiences.campus-study-space-finder');
    }
}
