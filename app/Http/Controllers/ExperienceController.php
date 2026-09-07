<?php

namespace App\Http\Controllers;

class ExperienceController extends Controller
{
    public function campusEventRegistration()
    {
        return view('experiences.campus-event-registration');
    }

    public function campusStudySpaceFinder()
    {
        return view('experiences.campus-study-space-finder');
    }
}
