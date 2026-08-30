<?php

/**
 * Module 01 — canonical content source.
 *
 * A module may span any number of class meetings. Status values are set
 * manually (`complete` | `current` | `upcoming`) and are never derived from
 * calendar dates.
 */
return [
    'title' => 'Accessible According to Whom?',
    'central_question' => 'What does it actually mean to call a digital experience accessible?',
    'summary' => 'Define accessibility through legal, standards, and institutional lenses.',
    'status' => 'current',

    'sessions' => [
        1 => [
            'title' => 'Accessible According to Whom?',
            'status' => 'current',
            'question' => 'What does it actually mean to call a digital experience accessible?',
            'overview' => 'Course kickoff and framing the accessibility question.',
            'run_of_show' => [
                'Opening critique of three contrasting interfaces.',
                'Mini lecture: accessibility, disability, and inclusive design.',
                'Pair activity: identify assumptions hidden in "accessible" claims.',
                'Team framing and challenge setup.',
            ],
            'activities' => [
                'Accessibility definition matrix',
                'Terminology checkpoint',
                'Annotated interface walkthrough',
            ],
            'team_task' => 'Draft a one-page claim that defines accessibility through your assigned team lens, and list two tensions that lens creates in real production work.',
            'resources' => [
                ['label' => 'Field Guide: Accessibility + Disability', 'route' => 'field-guide', 'meta' => 'Course reference'],
                ['label' => 'POUR Principles', 'href' => 'https://www.w3.org/WAI/fundamentals/accessibility-principles/', 'meta' => 'W3C'],
            ],
            'callouts' => [
                ['title' => 'Optional Note', 'body' => 'Instructors can drop short implementation reminders, pre-class prep notes, or links to in-class demos here.'],
            ],
        ],

        2 => [
            'title' => 'Legal, Standards, and Institutional Synthesis',
            'status' => 'upcoming',
            'question' => 'Who decides whether an interface is truly accessible?',
            'overview' => 'Legal, standards, and institutional synthesis, plus Challenge 01 production work.',
            'run_of_show' => [
                'Debrief from Session 1 team lens statements.',
                'Conformance walkthrough using WCAG examples.',
                'Small-group scenario debate.',
                'Challenge 01 production planning.',
            ],
            'activities' => [
                'Conformance language translation exercise',
                'Risk memo sketch',
                'Cross-team critique protocol',
            ],
            'team_task' => 'Identify three claims your team can defend with evidence and one claim that remains ambiguous. Prepare those points for Challenge 01 synthesis.',
            'resources' => [
                ['label' => 'Field Guide: WCAG + Policy', 'route' => 'field-guide', 'meta' => 'Course reference'],
                ['label' => 'WCAG 2.2', 'href' => 'https://www.w3.org/TR/WCAG22/', 'meta' => 'W3C'],
            ],
            'callouts' => [
                ['title' => 'Optional Note', 'body' => 'Keep this area for workshop logistics, alternate activity plans, or temporary links to classroom documents.'],
            ],
        ],
    ],

    'challenge' => [
        'title' => 'Accessible According to Whom?',
        'status' => 'current',
        'scenario' => 'A campus unit wants to launch a high-profile interactive media site in two weeks. Leadership says the experience is "accessible enough" because automated checks passed. Your team must evaluate that claim through an assigned lens and recommend next actions.',
        'deliverable' => 'A concise three-part brief with one page per lens and a final synthesis page for class discussion.',
        'teams' => [
            ['team' => 'Cyan Triangle', 'shape' => 'triangle', 'tone' => 'cyan', 'lens' => 'Legal Lens', 'description' => 'Investigate applicable accessibility law and legal obligations.'],
            ['team' => 'Amber Circle', 'shape' => 'circle', 'tone' => 'amber', 'lens' => 'Standards Lens', 'description' => 'Investigate WCAG, conformance, POUR, and technical standards.'],
            ['team' => 'Violet Square', 'shape' => 'square', 'tone' => 'violet', 'lens' => 'Institutional Lens', 'description' => 'Investigate UConn digital accessibility policy and institutional requirements.'],
        ],
        'evaluation_criteria' => [
            'Accuracy of definitions and references',
            'Evidence-backed claims and citations',
            'Clarity about uncertainty and tradeoffs',
            'Professional readability and structure',
        ],
        'resources' => [
            ['label' => 'Americans with Disabilities Act guidance', 'href' => 'https://www.ada.gov/', 'meta' => 'U.S. Department of Justice'],
            ['label' => 'WCAG family overview', 'href' => 'https://www.w3.org/WAI/standards-guidelines/wcag/', 'meta' => 'W3C'],
            ['label' => 'Field Guide: Law, policy, and standards', 'route' => 'field-guide', 'meta' => 'Course reference'],
        ],

        // Populated manually after the challenge cycle completes. No upload/submission functionality.
        'class_work' => [
            ['team' => 'Cyan Triangle', 'shape' => 'triangle', 'tone' => 'cyan'],
            ['team' => 'Amber Circle', 'shape' => 'circle', 'tone' => 'amber'],
            ['team' => 'Violet Square', 'shape' => 'square', 'tone' => 'violet'],
        ],
    ],

    'resources' => [
        ['label' => 'What is Web Accessibility?', 'href' => 'https://www.w3.org/WAI/fundamentals/accessibility-intro/', 'meta' => 'W3C'],
        ['label' => 'WCAG and Supporting Documents', 'href' => 'https://www.w3.org/WAI/standards-guidelines/wcag/', 'meta' => 'W3C'],
        ['label' => 'Field Guide index', 'route' => 'field-guide', 'meta' => 'Course reference'],
    ],
];
