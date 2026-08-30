<?php

/**
 * Module 01 — canonical content source.
 *
 * A module may span any number of class meetings. Status values are set
 * manually (`complete` | `current` | `upcoming`) and are never derived from
 * calendar dates.
 */
return [
    'label' => 'MODULE 01',
    'title' => 'Accessible According to Whom?',
    'central_question' => 'What does it actually mean to call a digital experience accessible?',
    'summary' => 'Accessibility sounds simple until someone asks you to prove it.',
    'status' => 'current',

    'sessions' => [
        1 => [
            'label' => 'SESSION 01',
            'title' => 'Is This Accessible?',
            'status' => 'current',
            'question' => 'What would give us enough evidence to call a digital experience accessible or inaccessible?',
            'overview' => 'Welcome to Accessibility & Inclusion in Interactive Media. Today you will meet your team, get oriented to how the course works, and investigate a question that sounds much easier than it is: Is this digital experience accessible? The harder question is: How do you know?',
            'sections' => [
                [
                    'title' => 'Join Your Team',
                    'paragraphs' => [
                        'Scan the QR code on screen to join your team.',
                        'Your browser will remember your anonymous assignment. Once assigned, find the other students with the same shape and sit together.',
                    ],
                    'actions' => [
                        ['label' => 'Open instructor join QR screen ->', 'route' => 'join.qr'],
                    ],
                    'callout' => [
                        'title' => 'Why a color and a shape?',
                        'body' => 'That is a small design decision we will return to later.',
                    ],
                ],
                [
                    'title' => 'Meet the Room',
                    'paragraphs' => [
                        'Be ready to briefly introduce yourself:',
                    ],
                    'bullets' => [
                        'Your name',
                        'Your team',
                        'What part of digital media/design interests you most',
                        'What you think this course might be about',
                        'One thing that comes to mind when you hear the word accessibility',
                    ],
                    'emphasis' => [
                        'There are no wrong answers yet.',
                    ],
                ],
                [
                    'title' => 'How This Course Works',
                    'paragraphs' => [
                        'This course is built around problems rather than long lectures.',
                        'Across the semester you will complete:',
                    ],
                    'bullets' => [
                        '10 team challenges',
                        '3 individual quizzes',
                        '1 final project',
                    ],
                    'paragraphs_after' => [
                        'Most challenges follow a similar loop:',
                        'Encounter a problem -> investigate -> make something -> test it -> defend it -> critique it',
                        'Generative AI is part of the course and may be used unless a particular assignment says otherwise.',
                    ],
                    'emphasis' => [
                        'AI output is not evidence.',
                    ],
                    'callout' => [
                        'title' => 'Evidence reminder',
                        'body' => 'AI can help you research, explain, design, code, critique, and explore possible solutions. You are still responsible for determining whether its claims are trustworthy and figuring out how important conclusions can actually be verified.',
                    ],
                ],
                [
                    'title' => 'First Investigation',
                    'paragraphs' => [
                        'Your team has been asked to evaluate a digital experience.',
                    ],
                    'emphasis' => [
                        'Is this accessible?',
                    ],
                    'placeholder' => [
                        'title' => 'Experience Under Review',
                        'body' => 'Design Futures 2026 Registration',
                        'cta' => ['label' => 'Open the experience ->', 'route' => 'experiences.campus-event-registration', 'new_tab' => true],
                    ],
                    'bullets' => [
                        'use the interface normally',
                        'inspect it with browser tools',
                        'use only a keyboard',
                        'zoom the page',
                        'ask an AI system to evaluate it',
                        'search the web',
                        'use accessibility testing tools if you know any',
                        'try anything else that seems useful',
                    ],
                    'task_title' => 'Your task',
                    'ordered' => [
                        'Your initial answer: Is it accessible?',
                        'At least three reasons supporting your answer.',
                        'How you determined those things.',
                        'How confident you are in your conclusion.',
                    ],
                    'note' => 'Do not worry yet about producing a formal accessibility audit.',
                ],
                [
                    'title' => 'According to Whom?',
                    'emphasis' => [
                        'What gives you the authority to call something accessible or inaccessible?',
                    ],
                    'paragraphs' => [
                        'Is your answer based on:',
                    ],
                    'bullets' => [
                        'your own experience?',
                        'someone else\'s experience?',
                        'a design principle?',
                        'a technical standard?',
                        'university policy?',
                        'federal law?',
                        'an automated tool?',
                        'an AI model?',
                    ],
                    'paragraphs_after' => [
                        'Your team is about to investigate one of these sources of authority in greater depth.',
                    ],
                ],
                [
                    'title' => 'Challenge 01 Begins',
                    'paragraphs' => [],
                    'challenge_reference' => [
                        'title' => 'Accessible According to Whom?',
                        'description' => 'Each team will investigate a different source of authority behind the word accessible.',
                        'link_label' => 'Open Challenge 01 →',
                    ],
                ],
                [
                    'title' => 'Before You Leave',
                    'paragraphs' => [
                        'Before you leave, make sure your team has:',
                    ],
                    'bullets' => [
                        'opened the Challenge 01 brief;',
                        'identified your assigned lens;',
                        'started your research;',
                        'found at least two promising authoritative sources;',
                        'saved your notes somewhere the team can access.',
                    ],
                ],
            ],
            'resources' => [
                ['label' => 'Join QR screen (instructor display)', 'route' => 'join.qr', 'meta' => 'In-class tool'],
                ['label' => 'Field Guide index', 'route' => 'field-guide', 'meta' => 'Course reference'],
                ['label' => 'POUR Principles', 'href' => 'https://www.w3.org/WAI/fundamentals/accessibility-principles/', 'meta' => 'W3C'],
            ],
        ],

        2 => [
            'label' => 'SESSION 02',
            'title' => 'Build the Definition',
            'status' => 'upcoming',
            'question' => 'How do law, standards, institutional requirements, and human experience fit together?',
            'overview' => 'Today you\'ll deepen your team\'s investigation, learn how to navigate WCAG, borrow from the other teams\' perspectives, and then return to the digital experience from Session 01 with better evidence.',
            'sections' => [
                [
                    'title' => 'Learn the Map',
                    'paragraphs' => [
                        'Before returning to your team\'s research, spend a few minutes learning how WCAG and its supporting documentation are organized.',
                        'The goal is not to memorize WCAG. The goal is to learn how to navigate it.',
                    ],
                    'actions' => [
                        ['label' => 'Open WCAG Overview ->', 'href' => 'https://www.w3.org/WAI/standards-guidelines/wcag/', 'new_tab' => true],
                        ['label' => 'Open How to Meet WCAG 2: Quick Reference ->', 'href' => 'https://www.w3.org/WAI/WCAG22/quickref/', 'new_tab' => true],
                    ],
                    'task_title' => 'Find these things',
                    'ordered' => [
                        'Find the four POUR principles.',
                        'Find one WCAG success criterion.',
                        'Determine its conformance level.',
                        'Find the corresponding Understanding page.',
                        'Find at least one technique or supporting resource associated with it.',
                    ],
                ],
                [
                    'title' => 'Investigate Your Lens',
                    'paragraphs' => [
                        'Return to your assigned team and keep building your understanding of the lens you started in Session 01.',
                        'Keep tracing important claims back to authoritative sources and pay attention to what your evidence does and does not allow you to conclude.',
                    ],
                ],
                [
                    'title' => 'Borrow the Other Lenses',
                    'paragraphs' => [
                        'This is not a presentation exercise.',
                        'Teams should spend a short period talking informally with students from the other teams, inspecting their resources, or exploring the other resource sets.',
                        'Every team must be able to answer, at least provisionally:',
                    ],
                    'ordered' => [
                        'Law: What does law help us determine?',
                        'Standards: What does WCAG help us determine?',
                        'Institution: What does UConn policy help us determine?',
                        'Human experience: What might we still need to observe or test directly?',
                    ],
                    'emphasis' => [
                        'Are these three answers identical? Why or why not?',
                    ],
                    'note' => 'No formal notes or separate submission are required for this activity.',
                ],
                [
                    'title' => 'Return to Design Futures',
                    'paragraphs' => [
                        'Return to the same experience you evaluated in Session 01. Use at least one investigation method you did not use before, then compare what the new evidence allows you to say.',
                        'Try at least one different method, such as keyboard testing, zoom or reflow, browser inspection, automated accessibility testing, semantic markup inspection, AI critique, or mapping a suspected issue to WCAG.',
                    ],
                    'actions' => [
                        ['label' => 'Design Futures 2026 Registration ->', 'route' => 'experiences.campus-event-registration', 'new_tab' => true],
                    ],
                ],
                [
                    'title' => 'Finish Challenge 01',
                    'paragraphs' => [],
                    'challenge_reference' => [
                        'intro' => 'Use the remainder of class to complete your team brief.',
                        'description' => 'Return to the Challenge 01 page for your team\'s investigation questions, authoritative starting resources, deliverable requirements, evaluation criteria, AI expectations, and due information.',
                        'link_label' => 'Open Challenge 01 →',
                    ],
                ],
            ],
            'resources' => [
                ['label' => 'WCAG Overview', 'href' => 'https://www.w3.org/WAI/standards-guidelines/wcag/', 'meta' => 'W3C'],
                ['label' => 'How to Meet WCAG 2: Quick Reference', 'href' => 'https://www.w3.org/WAI/WCAG22/quickref/', 'meta' => 'W3C'],
            ],
        ],
    ],

    'challenge' => [
        'label' => 'CHALLENGE 01',
        'title' => 'Accessible According to Whom?',
        'status' => 'current',
        'question' => 'What gives us the authority to call a digital experience accessible?',
        'scenario' => 'A client asks: "Is our digital experience accessible?" That question cannot be answered responsibly without understanding what accessible means and whose standards or requirements are being applied. Each team will investigate one source of authority and contribute one part of the class\'s eventual answer.',
        'problem' => 'A client asks: "Is our digital experience accessible?" That question cannot be answered responsibly without understanding what accessible means and whose requirements or standards are being applied. Each team will investigate one source of authority and contribute one part of the class\'s eventual answer.',
        'experience_under_review' => [
            'title' => 'Experience Under Review',
            'name' => 'Design Futures 2026 Registration',
            'link' => ['label' => 'Open the experience ->', 'route' => 'experiences.campus-event-registration', 'new_tab' => true],
        ],
        'teams' => [
            [
                'team' => 'Cyan Triangle',
                'shape' => 'triangle',
                'tone' => 'cyan',
                'lens' => 'Legal Lens',
                'description' => 'Investigate the legal framework for digital accessibility in U.S. higher education.',
                'questions' => [
                    'Which U.S. disability/accessibility laws are relevant to digital experiences?',
                    'Which obligations are particularly relevant to a public university?',
                    'What does the ADA require?',
                    'What role does Section 504 play?',
                    'Where do technical standards such as WCAG enter the legal framework?',
                    'What can law tell us about the Design Futures experience?',
                    'What can law alone not tell us?',
                ],
            ],
            [
                'team' => 'Amber Circle',
                'shape' => 'circle',
                'tone' => 'amber',
                'lens' => 'Standards Lens',
                'description' => 'Investigate WCAG as a technical standard and how conformance works.',
                'questions' => [
                    'What is WCAG?',
                    'Who publishes and maintains it?',
                    'What are POUR, success criteria, and conformance levels?',
                    'What do Levels A, AA, and AAA mean?',
                    'What is the relationship between WCAG 2.1 and WCAG 2.2?',
                    'How can WCAG be used to evaluate Design Futures?',
                    'What can WCAG conformance alone not tell us?',
                ],
            ],
            [
                'team' => 'Violet Square',
                'shape' => 'square',
                'tone' => 'violet',
                'lens' => 'Institutional Lens',
                'description' => 'Investigate UConn policy requirements and institutional accountability.',
                'questions' => [
                    'What does UConn\'s Digital Accessibility Policy require?',
                    'How does UConn describe accessible digital experiences?',
                    'Who and what does the policy apply to?',
                    'How does UConn policy connect to federal law and WCAG?',
                    'What would UConn\'s requirements mean for Design Futures?',
                    'What can institutional policy alone not tell us?',
                ],
            ],
        ],
        'deliverable' => [
            'summary' => 'Create a concise team brief containing:',
            'items' => [
                'Plain-English explanation: Explain your assigned lens for someone encountering it for the first time.',
                '3-5 key findings: Identify the most important things the class should understand.',
                'Authoritative sources: Link directly to the primary sources supporting important claims.',
                'Apply It: Explain how your findings affect the evaluation of the Design Futures registration experience.',
                'What We Still Don\'t Know: Identify something your lens cannot establish by itself.',
                'AI Use Note: Identify any generative AI tools used and briefly explain how they contributed.',
            ],
        ],
        'format_note' => 'Do not require a slide presentation. The brief may use an appropriate concise format, but it must be easy for classmates to review later as study material.',
        'evaluation_criteria' => [
            [
                'title' => 'Investigation',
                'points' => 3,
                'description' => 'Did the team identify and investigate the important dimensions of its assigned question?',
            ],
            [
                'title' => 'Evidence',
                'points' => 3,
                'description' => 'Are important conclusions supported by appropriate authoritative sources, standards, observations, or testing?',
            ],
            [
                'title' => 'Judgment',
                'points' => 2,
                'description' => 'Did the team distinguish what its evidence does and does not allow it to conclude?',
            ],
            [
                'title' => 'Communication',
                'points' => 2,
                'description' => 'Is the resulting brief concise, understandable, and useful to the rest of the class?',
            ],
        ],
        'evaluation_total' => 10,
        'ai_note' => [
            'title' => 'AI output is not evidence.',
            'body' => 'AI may help your team research, interpret, organize, critique, or explore possible answers. Important claims must still be verified.',
        ],
        'due' => 'Due: EOD after Session 02',
        'starting_resources' => [
            [
                'title' => 'Everyone',
                'description' => 'These starting points help the whole class get oriented.',
                'resources' => [
                    [
                        'source' => 'W3C',
                        'label' => 'WCAG Overview',
                        'href' => 'https://www.w3.org/WAI/standards-guidelines/wcag/',
                        'description' => 'A readable introduction to WCAG, its structure, and its versions.',
                    ],
                    [
                        'source' => 'W3C',
                        'label' => 'How to Meet WCAG 2: Quick Reference',
                        'href' => 'https://www.w3.org/WAI/WCAG22/quickref/',
                        'description' => 'A practical way to browse and filter WCAG success criteria and supporting guidance.',
                    ],
                ],
            ],
            [
                'title' => 'Legal Lens',
                'description' => 'Starting points for the legal team.',
                'resources' => [
                    [
                        'source' => 'U.S. Department of Justice',
                        'label' => 'DOJ Title II Web and Mobile Accessibility Rule',
                        'href' => 'https://www.ada.gov/resources/2024-03-08-web-rule/',
                        'description' => 'DOJ guidance explaining how Title II applies to web and mobile accessibility for state and local government entities.',
                    ],
                    [
                        'source' => 'U.S. Department of Justice',
                        'label' => 'ADA Web Accessibility Guidance',
                        'href' => 'https://www.ada.gov/resources/web-guidance/',
                        'description' => 'Broader DOJ guidance on the ADA and web accessibility.',
                    ],
                ],
            ],
            [
                'title' => 'Standards Lens',
                'description' => 'Primary W3C sources for the standards team. Use the shared Quick Reference above if you need a fast way to browse criteria.',
                'resources' => [
                    [
                        'source' => 'W3C',
                        'label' => 'WCAG 2.2',
                        'href' => 'https://www.w3.org/TR/WCAG22/',
                        'description' => 'The formal WCAG 2.2 Recommendation.',
                    ],
                    [
                        'source' => 'W3C',
                        'label' => 'Understanding WCAG 2.2',
                        'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/',
                        'description' => 'Explanatory guidance for individual WCAG success criteria.',
                    ],
                    [
                        'source' => 'W3C',
                        'label' => 'Understanding Conformance',
                        'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/conformance',
                        'description' => 'Guidance on WCAG conformance and Levels A, AA, and AAA.',
                    ],
                ],
            ],
            [
                'title' => 'Institutional Lens',
                'description' => 'University procedures and policy sources.',
                'resources' => [
                    [
                        'source' => 'UConn',
                        'label' => 'UConn Digital Accessibility Policy',
                        'href' => 'https://policy.uconn.edu/2019/08/02/digital-accessibility-policy/',
                        'description' => 'The University\'s official Digital Accessibility Policy.',
                    ],
                    [
                        'source' => 'UConn',
                        'label' => 'UConn ICT Accessibility Policy Procedures',
                        'href' => 'https://accessibility.its.uconn.edu/ict-policy-procedures/',
                        'description' => 'University procedures describing how digital accessibility responsibilities are applied in practice.',
                    ],
                ],
            ],
            [
                'title' => 'Course Reference',
                'description' => 'Course reference material for accessibility concepts and terminology.',
                'resources' => [
                    [
                        'source' => 'Course',
                        'label' => 'Field Guide',
                        'route' => 'field-guide',
                        'description' => 'Course reference material for accessibility concepts and terminology.',
                    ],
                ],
            ],
        ],

        // Populated manually after the challenge cycle completes. No upload/submission functionality.
        // Each entry can support: team, shape, tone, title, description, artifact, instructor_note, date.
        'class_work' => [
            [
                'team' => 'Cyan Triangle',
                'shape' => 'triangle',
                'tone' => 'cyan',
                'title' => null,
                'description' => null,
                'artifact' => null,
                'instructor_note' => null,
                'date' => null,
            ],
            [
                'team' => 'Amber Circle',
                'shape' => 'circle',
                'tone' => 'amber',
                'title' => null,
                'description' => null,
                'artifact' => null,
                'instructor_note' => null,
                'date' => null,
            ],
            [
                'team' => 'Violet Square',
                'shape' => 'square',
                'tone' => 'violet',
                'title' => null,
                'description' => null,
                'artifact' => null,
                'instructor_note' => null,
                'date' => null,
            ],
        ],
    ],

    'resource_collections' => [
        [
            'title' => 'Start Here',
            'description' => 'Credible starting points for everyone. You do not need to read everything first.',
            'resources' => [
                [
                    'source' => 'W3C',
                    'label' => 'WCAG Overview',
                    'href' => 'https://www.w3.org/WAI/standards-guidelines/wcag/',
                    'meta' => 'Overview',
                    'description' => 'A readable introduction to WCAG, its versions, structure, and relationship to accessibility practice.',
                ],
                [
                    'source' => 'W3C',
                    'label' => 'How to Meet WCAG 2: Quick Reference',
                    'href' => 'https://www.w3.org/WAI/WCAG22/quickref/',
                    'meta' => 'Quick Reference',
                    'description' => 'An interactive reference for finding and filtering WCAG success criteria, techniques, and related guidance.',
                    'prominent' => true,
                ],
            ],
        ],
        [
            'title' => 'Legal Lens',
            'description' => 'Starting points, not a complete legal answer.',
            'resources' => [
                [
                    'source' => 'U.S. Department of Justice',
                    'label' => 'Accessibility of Web Content and Mobile Apps Provided by State and Local Government Entities',
                    'href' => 'https://www.ada.gov/resources/2024-03-08-web-rule/',
                    'meta' => 'Title II Rule',
                    'description' => 'DOJ guidance explaining the Title II rule governing web and mobile accessibility for state and local government entities.',
                ],
                [
                    'source' => 'ADA.gov',
                    'label' => 'Web Accessibility Guidance',
                    'href' => 'https://www.ada.gov/resources/web-guidance/',
                    'meta' => 'Guidance',
                    'description' => 'Broader DOJ guidance on how the ADA applies to web accessibility.',
                ],
                [
                    'source' => 'Federal Source (verify)',
                    'label' => 'Section 504',
                    'href' => '#',
                    'meta' => 'URL pending verification',
                    'description' => 'Reliable federal starting point for Section 504. Instructor should verify and replace this placeholder URL.',
                ],
            ],
        ],
        [
            'title' => 'Standards Lens',
            'description' => 'Use source documents directly and trace evidence.',
            'resources' => [
                [
                    'source' => 'W3C',
                    'label' => 'WCAG 2.2',
                    'href' => 'https://www.w3.org/TR/WCAG22/',
                    'meta' => 'Normative',
                    'description' => 'The normative WCAG 2.2 Recommendation.',
                ],
                [
                    'source' => 'W3C',
                    'label' => 'Understanding WCAG 2.2',
                    'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/',
                    'meta' => 'Supporting',
                    'description' => 'Explanatory guidance for understanding individual WCAG success criteria.',
                ],
                [
                    'source' => 'W3C',
                    'label' => 'Understanding Conformance',
                    'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/conformance',
                    'meta' => 'Conformance',
                    'description' => 'Explanation of WCAG conformance and Levels A, AA, and AAA.',
                ],
                [
                    'source' => 'W3C',
                    'label' => 'How to Meet WCAG 2: Quick Reference',
                    'href' => 'https://www.w3.org/WAI/WCAG22/quickref/',
                    'meta' => 'Quick Reference',
                    'description' => 'Use this to find criteria, techniques, and related resources quickly during investigation.',
                    'prominent' => true,
                ],
            ],
        ],
        [
            'title' => 'Institutional Lens',
            'description' => 'Authoritative UConn policy sources.',
            'resources' => [
                [
                    'source' => 'UConn',
                    'label' => 'Digital Accessibility Policy',
                    'href' => 'https://policy.uconn.edu/2019/08/02/digital-accessibility-policy/',
                    'meta' => 'Policy',
                    'description' => 'The University\'s policy governing digital accessibility.',
                    'authoritative' => true,
                ],
                [
                    'source' => 'UConn',
                    'label' => 'ICT Accessibility Policy Procedures',
                    'href' => 'https://accessibility.its.uconn.edu/ict-policy-procedures/',
                    'meta' => 'Procedures',
                    'description' => 'UConn procedures explaining how digital accessibility responsibilities are applied in practice.',
                    'authoritative' => true,
                ],
            ],
        ],
    ],

    'resources' => [
        ['label' => 'WCAG Overview', 'href' => 'https://www.w3.org/WAI/standards-guidelines/wcag/', 'meta' => 'W3C'],
        ['label' => 'How to Meet WCAG 2: Quick Reference', 'href' => 'https://www.w3.org/WAI/WCAG22/quickref/', 'meta' => 'W3C'],
        ['label' => 'Field Guide index', 'route' => 'field-guide', 'meta' => 'Course reference'],
    ],
];
