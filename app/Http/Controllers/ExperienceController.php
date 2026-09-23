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

    public function campusEventRegistration()
    {
        return view('experiences.campus-event-registration');
    }

    public function campusStudySpaceFinder()
    {
        return view('experiences.campus-study-space-finder');
    }
}
