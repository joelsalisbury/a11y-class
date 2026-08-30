<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Team Join Configuration
    |--------------------------------------------------------------------------
    |
    | Controls the anonymous Day 1 team-assignment join flow. The join code
    | is a classroom secret shared only via the projected QR code and must
    | never be committed to source control or echoed back in error output.
    |
    */

    'open' => env('COURSE_JOIN_OPEN', true),

    'code' => env('COURSE_JOIN_CODE'),

    'team_capacity' => env('COURSE_TEAM_CAPACITY', 4),

];
