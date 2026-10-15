<?php

/**
 * Central course configuration.
 *
 * Edit `current` here to manually advance the Today page and module/session
 * status badges. Nothing in this course content is calculated from calendar
 * dates — instructors move the class forward by editing this file.
 */
return [
    'course' => [
        'code' => 'DMD 3998',
        'title' => 'DMD 3998 — Accessibility & Inclusion in Interactive Media',
        'short_title' => 'Accessibility & Inclusion in Interactive Media',
        'meeting_days' => 'Tuesdays & Thursdays',
        'meeting_time' => '9:30 AM–10:45 AM',
        'location' => 'Art Building 228',
        'email' => 'joel@uconn.edu',
        'office_hours' => 'By appointment, via Teams',
        'website' => 'https://i3.uconn.edu',
        'website_label' => 'Institutional Insights & Innovation (i3)',
    ],

    'instructor' => [
        'name' => 'Joel Salisbury',
        'role' => 'Director, Institutional Insights & Innovation (i3)',
        'role_long' => 'Director of Institutional Insights & Innovation (i3) at UConn',
        'email' => 'joel@uconn.edu',
        'website' => 'https://i3.uconn.edu',
        'website_label' => 'Institutional Insights & Innovation (i3)',
        'bio' => [
            'I’m Joel Salisbury. I’m the Director of Institutional Insights & Innovation (i3) at UConn, where I lead a multidisciplinary team working across digital product design and development, institutional data, research, and emerging technology.',
            'I also teach in Digital Media & Design, and much of my professional work involves designing, building, and making decisions about digital systems that real people need to use. That makes accessibility relevant to me as a design and technology practice (as well as a legal requirement due to the nature of the work).',
            'In this course, we’ll approach accessibility in much the same way: by investigating real problems, using evidence, testing assumptions, and making decisions we can defend.',
        ],
    ],

    'current' => [
        'module' => 6,
        'session' => 13,
    ],

    'modules' => [
        1 => [
            'title' => 'Accessible According to Whom?',
            'status' => 'complete',
            'central_question' => 'What does it actually mean to call a digital experience accessible?',
        ],
        2 => [
            'title' => 'Can You See What Matters?',
            'status' => 'complete',
            'central_question' => 'Can users perceive and understand the information an interface is trying to communicate?',
        ],
        3 => [
            'title' => 'What Does This Media Say?',
            'status' => 'complete',
            'central_question' => 'How should information conveyed through images, audio, video, and other media be made available in other forms?',
        ],
        4 => [
            'title' => 'Can You Use It Your Way?',
            'status' => 'complete',
            'central_question' => 'Can users successfully operate an interface using different methods of input and interaction?',
        ],
        5 => [
            'title' => 'What Is the Interface Actually Made Of?',
            'status' => 'complete',
            'central_question' => 'When two interfaces look the same, what makes them different to the browser and assistive technology?',
        ],
        6 => [
            'title' => 'Why Is This So Hard to Use?',
            'schedule_summary' => 'Session 12 covered motion, flashing, timing, and reduced motion. Thursday, October 15: Session 13 concludes Module 06 with cognitive accessibility, WCAG, and Challenge 06 open studio with informal team check-ins. Quiz 3 is an at-home assessment on Thursday, October 29. The remaining semester shifts toward practical accessibility evaluation studios and final-project work; the final project is expected to launch around November 3.',
            'status' => 'current',
            'central_question' => 'What can make an experience difficult, distracting, disorienting, or unsafe even when its basic controls work?',
        ],
        7 => [
            'title' => "The AI Says It's Accessible. Is It?",
            'status' => 'upcoming',
            'central_question' => 'What can AI and automated tools actually determine about accessibility, and what still requires human judgment or testing?',
        ],
        8 => [
            'title' => 'Build the Accessible Version',
            'status' => 'upcoming',
            'central_question' => 'What changes when accessibility is treated as a design and development requirement from the beginning?',
        ],
        9 => [
            'title' => 'What Would You Fix First?',
            'status' => 'upcoming',
            'central_question' => 'How should accessibility problems be prioritized when everything cannot be fixed at once?',
        ],
    ],
];
