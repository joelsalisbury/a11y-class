<?php

/**
 * Central course configuration.
 *
 * Edit `current` here to manually advance the Today page and module/session
 * status badges. Nothing in this course content is calculated from calendar
 * dates — instructors move the class forward by editing this file.
 */
return [
    'current' => [
        'module' => 1,
        'session' => 1,
    ],

    'modules' => [
        1 => [
            'title' => 'Accessible According to Whom?',
            'status' => 'current',
            'summary' => 'Accessibility sounds simple until someone asks you to prove it.',
        ],
        2 => [
            'title' => 'Can You See What Matters?',
            'status' => 'upcoming',
        ],
        3 => [
            'title' => 'What Does This Media Say?',
            'status' => 'upcoming',
        ],
        4 => [
            'title' => 'Can You Use It Your Way?',
            'status' => 'upcoming',
        ],
        5 => [
            'title' => 'What Happens When Something Goes Wrong?',
            'status' => 'upcoming',
        ],
        6 => [
            'title' => 'What Does the Interface Sound Like?',
            'status' => 'upcoming',
        ],
        7 => [
            'title' => 'Why Is This So Hard to Use?',
            'status' => 'upcoming',
        ],
        8 => [
            'title' => "The AI Says It's Accessible. Is It?",
            'status' => 'upcoming',
        ],
        9 => [
            'title' => 'Build the Accessible Version',
            'status' => 'upcoming',
        ],
        10 => [
            'title' => 'What Would You Fix First?',
            'status' => 'upcoming',
        ],
    ],
];
