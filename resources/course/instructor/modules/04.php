<?php

return [
    'module' => 'MODULE 04',
    'title' => 'Can You Use It Your Way?',
    'not_public' => true,
    'experience_notes' => [
        [
            'team' => 'Cyan Triangle',
            'lens' => 'Course Finder',
            'barriers' => [
                'Visual card order differs from the DOM and keyboard focus order.',
                'The Tuesday filter looks interactive but is not keyboard reachable.',
                'Some controls suppress visible focus.',
                'The first shortlist control is focusable but does not respond to expected keyboard activation.',
            ],
            'concepts' => 'Keyboard access, focus visible, focus order, and reachable versus usable.',
        ],
        [
            'team' => 'Amber Circle',
            'lens' => 'Prioritize Your Tasks',
            'barriers' => [
                'Dragging is the only way to reorder the five cards.',
                'There is no Move Up, Move Down, or other non-drag alternative.',
                'The drag handles and nearby targets are small and closely packed.',
            ],
            'concepts' => 'Dragging movements, alternative ways to perform an action, target size, and pointer precision.',
        ],
        [
            'team' => 'Violet Square',
            'lens' => 'Find an Event',
            'barriers' => [
                'Location and time details are revealed only on hover.',
                'The carousel primarily expects swipe or pointer dragging.',
                'Previous, next, and pagination targets are small.',
                'The event details have no equivalent always-available interaction.',
            ],
            'concepts' => 'Hover dependence, pointer gestures, target size, and alternative input methods.',
        ],
    ],
    'sessions' => [
        8 => [
            'label' => 'SESSION 08',
            'run_of_show' => [
                '0-10 minutes: launch Module 04 and run the mouse-away activity on a real website.',
                '10-25 minutes: teams continue keyboard-only testing of a meaningful task.',
                '25-35 minutes: debrief the experience and introduce keyboard access, focus visible, focus order, and no keyboard trap.',
                '35-45 minutes: launch Challenge 04 and establish each team task.',
                '45-75 minutes: teams investigate their chosen interface and record initial findings.',
            ],
            'prompts' => [
                'Can you reach everything you need?',
                'Can you tell where focus is?',
                'Does focus move in an order that makes sense?',
                'Can you activate the controls?',
                'Can you get back out?',
            ],
        ],
        9 => [
            'label' => 'SESSION 09',
            'run_of_show' => [
                '0-10 minutes: check in on Challenge 04 tasks, evidence, and strongest operability finding.',
                '10-30 minutes: discuss target size, dragging, and gestures.',
                '30-40 minutes: teams reconsider their chosen interface through the additional input-method lenses.',
                '40-75 minutes: teams organize findings, practical changes, evidence, and finish Challenge 04.',
            ],
            'prompts' => [
                'What task are you testing?',
                'Which input method creates the most difficulty?',
                'Is a target too small or crowded to use reliably?',
                'Does the task require dragging or a particular gesture?',
                'What simpler interaction could provide the same result?',
            ],
        ],
    ],
];
