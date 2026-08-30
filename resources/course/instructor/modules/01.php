<?php

return [
    'module' => 'MODULE 01',
    'title' => 'Accessible According to Whom?',
    'not_public' => true,

    'sessions' => [
        1 => [
            'label' => 'SESSION 01',
            'title' => 'Is This Accessible?',
            'run_of_show' => [
                '0-8 min: QR join and find teams',
                '8-23 min: student introductions',
                '23-33 min: course orientation',
                '33-36 min: reveal "Is this accessible?"',
                '36-51 min: free investigation',
                '51-58 min: debrief initial findings',
                '58-62 min: pivot to "According to whom?"',
                '62-68 min: reveal Challenge 01 team lenses',
                '68-75 min: begin authoritative-source research',
            ],
            'prompts' => [
                'How do you know?',
                'What makes that inaccessible?',
                'Could you test that?',
                'Can the AI actually observe what it is claiming?',
                'Is that bad design or inaccessible design? Are those necessarily the same thing?',
                'What standard are you using?',
                'Is that the actual authoritative source, or somebody describing it?',
            ],
            'intended_realization' => 'Students can probably identify potential accessibility problems, but they do not yet have a defensible framework for declaring an experience accessible.',
        ],
        2 => [
            'label' => 'SESSION 02',
            'title' => 'Build the Definition',
            'run_of_show' => [
                'Synthesize team research.',
                'Establish the distinction among human access, WCAG conformance, institutional requirements, and legal compliance.',
                'Introduce POUR and navigating WCAG.',
                'Return to the sample interface.',
                'Allow substantial studio time to finish Challenge 01.',
                'Remind students that the challenge is due EOD.',
            ],
        ],
    ],
];
