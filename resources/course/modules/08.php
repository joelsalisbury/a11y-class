<?php

return [
    'number' => 8,
    'title' => 'Build the Accessible Version',
    'status' => 'current',
    'central_question' => 'What does good accessible markup look like when you build it from the beginning?',
    'introduction' => [
        'Much of the course so far has focused on finding, explaining, and verifying accessibility problems. This module turns toward implementation.',
        'There is no new lecture this week. Instead, you will work through hands-on accessibility exercises and use the resources below as references for writing stronger markup.',
    ],
    'sessions' => [
        16 => [
            'title' => 'Practice and Studio',
            'summary' => 'Tuesday, October 27, 2026. No new lecture today. Use class time to begin Challenge 08, review for Quiz 2, revisit course material, or ask questions.',
            'overview' => 'Tuesday, October 27, 2026. No new lecture today. Use class time to begin Challenge 08, review for Quiz 2, revisit course material, or ask questions. This is open work time for accessibility practice and catching up.',
            'sections' => [],
            'resources' => [
                ['label' => 'Begin Challenge 08: Build It Right', 'route' => 'modules.challenge', 'params' => ['module' => 8]],
                ['label' => 'Good Markup Resources', 'route' => 'modules.resources', 'params' => ['module' => 8]],
            ],
        ],
    ],
    'challenge' => [
        'title' => 'Build It Right',
        'metadata' => 'Individual Challenge · 10 points',
        'question' => 'What changes when you have to implement the accessible version yourself?',
        'summary' => 'Complete all a11yphant challenges and submit completion evidence through HuskyCT.',
        'introduction' => 'a11yphant is a free interactive site for practicing web accessibility implementation. No account is required by this course.',
        'href' => 'https://a11yphant.com/',
        'required_work' => 'Complete every challenge on a11yphant, including all levels in each challenge.',
        'challenges_href' => 'https://a11yphant.com/challenges',
        'deliverable' => [
            'Evidence that you completed all a11yphant challenges, collected in one short PDF.',
        ],
        'evidence_note' => 'Screenshots are acceptable evidence of completion.',
        'due' => 'Because Quiz 2 is this week, Challenge 08 is due next week: by end of day Tuesday, November 3, 2026. Submit through HuskyCT.',
        'evaluation_total' => 10,
        'evaluation_criteria' => [
            ['title' => 'Completion', 'points' => 10, 'description' => 'Complete all a11yphant challenges. All 10 points are awarded for completion.'],
        ],
        'class_work' => [],
    ],
    'resource_intro' => 'Start with native HTML when it already provides the semantics and behavior you need.',
    'resources' => [
        ['label' => 'Semantic HTML', 'href' => 'https://developer.mozilla.org/en-US/docs/Learn_web_development/Core/Accessibility/HTML', 'meta' => 'MDN explains how headings, landmarks, lists, buttons, links, and forms provide useful structure and native behavior.'],
        ['label' => 'Forms and labels', 'href' => 'https://www.w3.org/WAI/tutorials/forms/', 'meta' => 'W3C WAI covers <label>, fieldset and legend, accessible names, instructions, validation, and error feedback.'],
        ['label' => 'Buttons and links', 'href' => 'https://developer.mozilla.org/en-US/docs/Learn_web_development/Core/Accessibility/HTML#ui_controls', 'meta' => 'Links go somewhere; buttons do something: use native <a href> and <button> elements for their intended purposes.'],
        ['label' => 'Images and alternative text', 'href' => 'https://www.w3.org/WAI/tutorials/images/decision-tree/', 'meta' => 'Use the W3C WAI decision tree to choose appropriate alt text, including empty alt text for decorative images.'],
        ['label' => 'Keyboard and focus', 'href' => 'https://developer.mozilla.org/en-US/docs/Web/Accessibility/Guides/Understanding_WCAG/Keyboard', 'meta' => 'MDN explains keyboard operability, visible focus, logical focus order, and why native controls help.'],
        ['label' => 'ARIA: read this first', 'href' => 'https://www.w3.org/WAI/ARIA/apg/practices/read-me-first/', 'meta' => 'W3C explains the responsibilities that come with ARIA: No ARIA is better than bad ARIA.'],
    ],
    'quiz' => [
        'date' => 'Thursday, October 29, 2026',
        'description' => 'Quiz 2 is completed at home through HuskyCT. There is no in-person class meeting Thursday. HuskyCT is the authoritative location for Quiz 2.',
    ],
    'final_project_note' => 'Final Project released October 29.',
];
