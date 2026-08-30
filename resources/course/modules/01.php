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
                        ['label' => 'Open instructor join QR screen', 'route' => 'join.qr'],
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
                    'title' => 'Is This Accessible?',
                    'paragraphs' => [
                        'Your team has been asked to evaluate a digital experience.',
                        'Your client has one question: Is this accessible?',
                    ],
                    'placeholder' => [
                        'title' => 'Experience Under Review',
                        'body' => 'Design Futures 2026 Registration',
                        'cta' => ['label' => 'Open the experience ->', 'route' => 'experiences.campus-event-registration', 'new_tab' => true],
                    ],
                    'paragraphs_after' => [
                        'You may:',
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
                    'title' => 'Accessible According to Whom?',
                    'paragraphs' => [
                        'Each team will investigate a different source of authority behind the word accessible.',
                    ],
                    'team_panels' => [
                        [
                            'team' => 'Cyan Triangle',
                            'shape' => 'triangle',
                            'tone' => 'cyan',
                            'lens' => 'The Legal Lens',
                            'description' => 'Investigate what U.S. law says about digital accessibility, particularly for an institution like a public university.',
                        ],
                        [
                            'team' => 'Amber Circle',
                            'shape' => 'circle',
                            'tone' => 'amber',
                            'lens' => 'The Standards Lens',
                            'description' => 'Investigate what WCAG is, how it works, and what it means for a digital experience to conform to an accessibility standard.',
                        ],
                        [
                            'team' => 'Violet Square',
                            'shape' => 'square',
                            'tone' => 'violet',
                            'lens' => 'The Institutional Lens',
                            'description' => 'Investigate what UConn itself requires and how University accessibility requirements relate to broader standards and law.',
                        ],
                    ],
                    'emphasis' => [
                        'You may use AI to begin your investigation. You must find the authoritative source behind important claims.',
                    ],
                    'note' => '"ChatGPT says..." is not sufficient evidence.',
                ],
                [
                    'title' => 'Before You Leave',
                    'paragraphs' => [
                        'Your team should have:',
                    ],
                    'bullets' => [
                        'begun investigating its assigned lens;',
                        'identified at least two authoritative sources;',
                        'identified the major questions you still need to answer;',
                        'saved notes somewhere all team members can access.',
                    ],
                    'emphasis' => [
                        'Challenge 01 is due EOD after Session 02.',
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
            'overview' => 'Today the three investigations come back together. Each team has examined a different source of authority behind the word accessible. We will compare those perspectives, build a shared map of the accessibility landscape, and then return to the digital experience we evaluated during Session 01.',
            'sections' => [
                [
                    'title' => 'Learn the Map',
                    'paragraphs' => [
                        'Before returning to your team\'s research, spend a few minutes learning how the accessibility standards landscape is organized.',
                        'Every student should open the WCAG Overview and the WCAG Quick Reference.',
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
                    'emphasis' => [
                        'The goal is not to memorize WCAG. The goal is to learn how to navigate it.',
                    ],
                ],
                [
                    'title' => 'Investigate Your Lens',
                    'paragraphs' => [
                        'Students return to their assigned teams.',
                        'Your team is responsible for becoming the room\'s temporary specialist in this perspective.',
                        'You do not need to know everything.',
                        'You do need to be able to explain:',
                    ],
                    'bullets' => [
                        'what your source of authority contributes;',
                        'what it requires or helps us evaluate;',
                        'what evidence supports your claims;',
                        'what it cannot establish on its own.',
                    ],
                    'emphasis' => [
                        'Primary sources first.',
                    ],
                    'paragraphs_after' => [
                        'Students may use AI, search, secondary articles, or summaries to help understand difficult material, but important claims must trace back to authoritative sources.',
                    ],
                    'team_panels' => [
                        [
                            'team' => 'Cyan Triangle',
                            'shape' => 'triangle',
                            'tone' => 'cyan',
                            'lens' => 'Legal Lens',
                            'description' => 'Start with federal and DOJ primary sources, then connect claims to higher-ed obligations.',
                            'questions' => [
                                'Which U.S. disability/accessibility laws are relevant to digital experiences?',
                                'Which obligations are particularly relevant to a public university?',
                                'What does the ADA require?',
                                'What role does Section 504 play?',
                                'Where do technical standards such as WCAG enter the legal framework?',
                                'What can law tell us about the Design Futures experience?',
                                'What can law alone not tell us?',
                            ],
                            'resources' => [
                                ['label' => 'DOJ Title II web and mobile accessibility rule', 'href' => 'https://www.ada.gov/resources/2024-03-08-web-rule/'],
                                ['label' => 'ADA.gov web accessibility guidance', 'href' => 'https://www.ada.gov/resources/web-guidance/'],
                                ['label' => 'Section 504 (URL pending instructor verification)', 'href' => '#'],
                            ],
                        ],
                        [
                            'team' => 'Amber Circle',
                            'shape' => 'circle',
                            'tone' => 'amber',
                            'lens' => 'Standards Lens',
                            'description' => 'Use WCAG source documents directly and trace claims from criterion to understanding and techniques.',
                            'questions' => [
                                'What is WCAG?',
                                'Who publishes and maintains it?',
                                'What are POUR, success criteria, and conformance levels?',
                                'What do Levels A, AA, and AAA mean?',
                                'What is the relationship between WCAG 2.1 and WCAG 2.2?',
                                'How can WCAG be used to evaluate Design Futures?',
                                'What can WCAG conformance alone not tell us?',
                            ],
                            'resources' => [
                                ['label' => 'WCAG 2.2', 'href' => 'https://www.w3.org/TR/WCAG22/'],
                                ['label' => 'Understanding WCAG 2.2', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/'],
                                ['label' => 'How to Meet WCAG 2: Quick Reference', 'href' => 'https://www.w3.org/WAI/WCAG22/quickref/'],
                            ],
                        ],
                        [
                            'team' => 'Violet Square',
                            'shape' => 'square',
                            'tone' => 'violet',
                            'lens' => 'Institutional Lens',
                            'description' => 'Anchor claims in UConn policy language, procedures, and scope.',
                            'questions' => [
                                'What does UConn\'s Digital Accessibility Policy require?',
                                'How does UConn describe accessible digital experiences?',
                                'Who and what does the policy apply to?',
                                'How does UConn policy connect to federal law and WCAG?',
                                'What would UConn\'s requirements mean for Design Futures?',
                                'What can institutional policy alone not tell us?',
                            ],
                            'resources' => [
                                ['label' => 'UConn Digital Accessibility Policy', 'href' => 'https://policy.uconn.edu/2019/08/02/digital-accessibility-policy/'],
                                ['label' => 'UConn ICT Accessibility Policy Procedures', 'href' => 'https://accessibility.its.uconn.edu/ict-policy-procedures/'],
                            ],
                        ],
                    ],
                ],
                [
                    'title' => 'Borrow the Other Lenses',
                    'paragraphs' => [
                        'This is not a presentation exercise.',
                        'Teams should spend a short period talking informally with students from the other teams, using their resources, or exploring the other resource sets.',
                        'Every team must be able to answer, at least provisionally:',
                    ],
                    'ordered' => [
                        'Law: What does law contribute to our definition of accessibility?',
                        'Standards: What does WCAG contribute?',
                        'Institution: What does UConn policy contribute?',
                    ],
                    'emphasis' => [
                        'Are these three answers identical? Why or why not?',
                    ],
                    'note' => 'No formal notes or separate submission are required for this activity.',
                ],
                [
                    'title' => 'Can You Answer the Question Better Now?',
                    'paragraphs' => [
                        'Return to the same interface you evaluated in Session 01.',
                        'Reconsider: Is this accessible?',
                    ],
                    'actions' => [
                        ['label' => 'Design Futures 2026 Registration ->', 'route' => 'experiences.campus-event-registration', 'new_tab' => true],
                    ],
                    'ordered' => [
                        'Has your answer changed?',
                        'Is your evidence stronger?',
                        'What can you now support with an authoritative source?',
                        'What did your original investigation miss?',
                        'What still requires direct testing?',
                        'What claims are you still unable to make?',
                    ],
                    'paragraphs_after' => [
                        'Try at least one method you did not use during Session 01.',
                        'Examples may include keyboard-only use, browser inspection, an automated accessibility checker, zoom/reflow, examining semantic markup, asking an AI system to critique the interface, or comparing a finding against WCAG.',
                        'Do not try to use every method. Use at least one new method intentionally.',
                    ],
                ],
                [
                    'title' => 'Build the Brief',
                    'paragraphs' => [
                        'Use the remainder of the session to turn your investigation into a concise brief that the rest of the class can learn from later.',
                        'Your brief will become part of the Module 01 Class Work archive after submission.',
                    ],
                    'actions' => [
                        ['label' => 'Open Challenge 01 brief ->', 'route' => 'modules.challenge', 'params' => ['module' => 1]],
                    ],
                    'emphasis' => [
                        'Challenge 01 is due EOD today.',
                    ],
                ],
                [
                    'title' => 'What Happens Next',
                    'paragraphs' => [
                        'After Challenge 01 is submitted, all three team briefs will be added to this module\'s Class Work archive.',
                        'At the beginning of the next module, we will compare the completed work and use it as part of our critique and review.',
                        'Those submissions will remain available as course study material.',
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
        'resources' => [
            ['label' => 'Americans with Disabilities Act guidance', 'href' => 'https://www.ada.gov/', 'meta' => 'U.S. Department of Justice'],
            ['label' => 'WCAG family overview', 'href' => 'https://www.w3.org/WAI/standards-guidelines/wcag/', 'meta' => 'W3C'],
            ['label' => 'UConn Digital Accessibility', 'href' => 'https://accessibility.uconn.edu/', 'meta' => 'UConn'],
            ['label' => 'Field Guide index', 'route' => 'field-guide', 'meta' => 'Course reference'],
        ],

        // Populated manually after the challenge cycle completes. No upload/submission functionality.
        'class_work' => [
            ['team' => 'Cyan Triangle', 'shape' => 'triangle', 'tone' => 'cyan'],
            ['team' => 'Amber Circle', 'shape' => 'circle', 'tone' => 'amber'],
            ['team' => 'Violet Square', 'shape' => 'square', 'tone' => 'violet'],
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
