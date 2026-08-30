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
                        'title' => 'Experience Under Review - Coming Next',
                        'body' => 'A separate sample experience will be linked here in a later pass.',
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
                    'title' => 'Compare the Lenses',
                    'paragraphs' => [
                        'These ideas overlap heavily, but they are not interchangeable.',
                        'During class we will use each team\'s research to determine what each perspective can tell us, and what it cannot.',
                    ],
                    'bullets' => [
                        'Human access',
                        'Technical conformance',
                        'Institutional requirements',
                        'Legal compliance',
                    ],
                ],
                [
                    'title' => 'The WCAG Map',
                    'paragraphs' => [
                        'You do not need to memorize every WCAG success criterion today.',
                        'The goal is to understand how WCAG is organized, how to find a relevant requirement, and how a technical standard becomes evidence during an accessibility evaluation.',
                    ],
                    'bullets' => [
                        'P - Perceivable',
                        'O - Operable',
                        'U - Understandable',
                        'R - Robust',
                    ],
                    'placeholder' => [
                        'title' => 'Instructor examples and resources - Coming Next',
                        'body' => 'This space is intentionally reserved for in-class examples and resource links supplied later.',
                    ],
                ],
                [
                    'title' => 'Can We Answer the Question Better Now?',
                    'paragraphs' => [
                        'Return to the same digital experience from Session 01.',
                        'As a team, reconsider your original answer: Is this accessible?',
                    ],
                    'bullets' => [
                        'Has your answer changed?',
                        'Is your evidence stronger?',
                        'What can you now support with an authoritative source?',
                        'What still requires direct testing?',
                        'What claims are you still unable to make?',
                    ],
                ],
                [
                    'title' => 'Finish Challenge 01',
                    'paragraphs' => [
                        'Teams use the remaining studio time to complete their Challenge 01 brief.',
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
                ['label' => 'Field Guide index', 'route' => 'field-guide', 'meta' => 'Course reference'],
                ['label' => 'WCAG 2.2', 'href' => 'https://www.w3.org/TR/WCAG22/', 'meta' => 'W3C'],
            ],
        ],
    ],

    'challenge' => [
        'label' => 'CHALLENGE 01',
        'title' => 'Accessible According to Whom?',
        'status' => 'current',
        'question' => 'What gives us the authority to call a digital experience accessible?',
        'scenario' => 'A client asks: "Is our digital experience accessible?" That question cannot be answered responsibly without understanding what accessible means and whose standards or requirements are being applied. Each team will investigate one source of authority and contribute one part of the class\'s eventual answer.',
        'shared_requirements' => [
            'Explain your assigned lens in plain English.',
            'Identify the most important concepts or requirements someone evaluating a digital product should understand.',
            'Locate authoritative primary sources supporting important claims.',
            'Explain how your lens would influence an evaluation of the sample digital experience.',
            'Identify at least one question your investigation cannot answer by itself.',
            'Briefly identify any generative AI tools used and describe what role they played.',
        ],
        'shared_requirements_note' => 'AI summaries, search snippets, blogs, and secondary explanations may help you get oriented. They do not replace authoritative sources.',
        'teams' => [
            [
                'team' => 'Cyan Triangle',
                'shape' => 'triangle',
                'tone' => 'cyan',
                'lens' => 'Legal Lens',
                'description' => 'Investigate the legal framework for digital accessibility in U.S. higher education.',
                'questions' => [
                    'Which U.S. disability/accessibility laws are relevant to digital experiences?',
                    'Which obligations are especially relevant to a public university?',
                    'What does the ADA require?',
                    'What role does Section 504 play?',
                    'Where and how do technical standards such as WCAG enter the legal framework?',
                    'What can the law tell us about whether the sample experience is accessible?',
                    'What can the law alone not tell us?',
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
                    'What are the principles of Perceivable, Operable, Understandable, and Robust?',
                    'What are success criteria?',
                    'What do Level A, AA, and AAA mean?',
                    'What is the relationship between WCAG 2.1 and WCAG 2.2?',
                    'How would WCAG help us evaluate the sample experience?',
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
                    'How does UConn describe or define accessible digital experiences?',
                    'Who and what does the policy apply to?',
                    'How does UConn\'s policy connect to federal law and WCAG?',
                    'What would UConn\'s requirements mean for the sample experience?',
                    'What can institutional policy alone not tell us?',
                ],
            ],
        ],
        'deliverable' => [
            'summary' => 'Create a concise team brief designed for other students to actually use later when studying this material.',
            'items' => [
                'a plain-English explanation of your assigned lens;',
                '3-5 key findings;',
                'links to authoritative sources;',
                'a short section applying your findings to the sample interface;',
                'a section titled What We Still Don\'t Know;',
                'a brief AI Use Note.',
            ],
            'note' => 'The deliverable should be concise enough to review together in class. Do not require a slide deck. The team may choose an appropriate format unless the instructor specifies otherwise.',
        ],
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

    'resources' => [
        ['label' => 'What is Web Accessibility?', 'href' => 'https://www.w3.org/WAI/fundamentals/accessibility-intro/', 'meta' => 'W3C'],
        ['label' => 'WCAG and Supporting Documents', 'href' => 'https://www.w3.org/WAI/standards-guidelines/wcag/', 'meta' => 'W3C'],
        ['label' => 'Field Guide index', 'route' => 'field-guide', 'meta' => 'Course reference'],
    ],
];
