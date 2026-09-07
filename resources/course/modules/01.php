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
    'overview' => 'Accessibility sounds simple until someone asks you to explain what you mean — and provide evidence for the claim. This module introduces the different ways accessibility is defined, evaluated, and required.',
    'status' => 'complete',

    'sessions' => [
        1 => [
            'label' => 'SESSION 01',
            'title' => 'Is This Accessible?',
            'status' => 'complete',
            'summary' => 'Meet the class, learn how the course works, and make your first judgment about the accessibility of a digital experience.',
            'question' => 'What would give us enough evidence to call a digital experience accessible or inaccessible?',
            'overview' => 'Welcome to Accessibility & Inclusion in Interactive Media. Today you will meet your team, get oriented to how the course works, and investigate a question that sounds much easier than it is: Is this digital experience accessible? The harder question is: How do you know?',
            'sections' => [
                [
                    'title' => 'Welcome',
                    'paragraphs' => [
                        'Welcome to Accessibility & Inclusion in Interactive Media.',
                        'I\'m Joel Salisbury. I work at UConn on digital products, design, development, and institutional technology, and I also teach in DMD. A lot of my professional work involves making decisions about how real digital systems should work for real people — which is one reason I care about accessibility as more than a checklist.',
                        'This course is about how we design, build, evaluate, and improve digital experiences so more people can actually use them.',
                        'We\'ll work with design, code, standards, law and policy, assistive technology, testing tools, and AI. But the course is not primarily about memorizing rules.',
                        'A question we\'ll return to all semester is:',
                    ],
                    'emphasis' => [
                        'How do you know?',
                    ],
                    'paragraphs_after' => [
                        'When we call something accessible (or inaccessible), what evidence supports that claim?',
                    ],
                ],
                [
                    'title' => 'Find Your Team',
                    'paragraphs' => [
                        'Your team assignment is available in HuskyCT/Blackboard.',
                        'Find the other members of your team and sit together:',
                    ],
                    'teams' => [
                        ['team' => 'Cyan Triangle', 'shape' => 'triangle', 'tone' => 'cyan'],
                        ['team' => 'Amber Circle', 'shape' => 'circle', 'tone' => 'amber'],
                        ['team' => 'Violet Square', 'shape' => 'square', 'tone' => 'violet'],
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
                        'Generative AI is permitted unless an assignment says otherwise, but:',
                    ],
                    'closing_emphasis' => [
                        'AI output is not evidence.',
                    ],
                    'note' => 'You are responsible for determining whether important claims are actually supported.',
                ],
                [
                    'title' => 'First Investigation',
                    'paragraphs' => [
                        'Your team has been asked to evaluate a digital experience.',
                    ],
                    'emphasis' => [
                        'Is this accessible?',
                    ],
                    'paragraphs_between_emphasis' => [
                        'For now, think about that in plain language:',
                    ],
                    'secondary_emphasis' => [
                        'Could all prospective users successfully navigate and use this digital experience?',
                    ],
                    'placeholder' => [
                        'title' => 'Experience Under Review',
                        'body' => 'Design Futures 2026 Registration',
                        'cta' => ['label' => 'Open the experience ->', 'route' => 'experiences.campus-event-registration', 'new_tab' => true],
                    ],
                    'paragraphs_after' => [
                        'Spend about 10 minutes using the experience as though you were actually trying to register for the event.',
                        'Explore it however seems natural.',
                        'When your team has an answer to the question “Is this accessible?”, raise your hand.',
                    ],
                    'task_title' => 'Be Ready to Explain',
                    'ordered_intro' => 'Your team should be able to answer:',
                    'ordered' => [
                        'Is it accessible?',
                        'What makes you say that?',
                        'How did you arrive at that judgment?',
                        'How confident are you?',
                    ],
                    'note' => 'Do not worry yet about producing a formal accessibility audit.',
                ],
                [
                    'title' => 'Challenge 01',
                    'paragraphs' => [
                        'You\'ve made an initial judgment about the Design Futures experience.',
                        'Now ask a harder question:',
                    ],
                    'emphasis' => [
                        'What gives you the authority to call something accessible or inaccessible?',
                    ],
                    'paragraphs_after' => [
                        'Was your answer based on your own experience? A technical standard? University policy? Federal law? An automated tool? AI?',
                        'Challenge 01 asks each team to investigate one of those sources of authority more carefully.',
                    ],
                    'challenge_reference' => [
                        'title' => 'Accessible According to Whom?',
                        'link_label' => 'Open Challenge 01 →',
                    ],
                    'closing_bullets_intro' => 'Before you leave, make sure your team has:',
                    'closing_bullets' => [
                        'identified your assigned lens;',
                        'opened Challenge 01;',
                        'set up a shared place for notes;',
                        'made a plan for Session 02.',
                    ],
                ],
            ],
            'resources' => [
                ['label' => 'Accessibility Toolkit', 'route' => 'field-guide.entry', 'params' => ['entry' => 'toolkit'], 'meta' => 'Course reference'],
                ['label' => 'Field Guide index', 'route' => 'field-guide', 'meta' => 'Course reference'],
                ['label' => 'POUR Principles', 'href' => 'https://www.w3.org/WAI/fundamentals/accessibility-principles/', 'meta' => 'W3C'],
            ],
        ],

        2 => [
            'label' => 'SESSION 02',
            'title' => 'Build the Definition',
            'status' => 'complete',
            'summary' => 'Learn how to navigate WCAG, deepen your team\'s investigation, compare different sources of authority, and return to the same experience with better evidence.',
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
                        'Try at least one different method, such as keyboard testing, zoom or reflow, browser inspection, WAVE (an automated accessibility testing tool), semantic markup inspection, or AI critique.',
                        'If it fits naturally in the content, the instructor may demonstrate WAVE during this session as one possible method for gathering evidence.',
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
        'summary' => 'Investigate one source of authority behind the word accessible and help the class build a more defensible answer to the question.',
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
                    'Which federal disability laws matter for digital accessibility at a public university?',
                    'How do Section 504 and ADA Title II differ in scope and purpose?',
                    'Where does WCAG enter the current legal framework?',
                    'What is Section 508, and does it apply to a public university in the same way?',
                    'What can these legal requirements allow you to conclude about Design Futures?',
                    'What can law alone not tell you about whether an experience is actually accessible?',
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
            'summary' => 'Create one concise team brief as a PDF (approximately 1–2 pages) with working links to authoritative sources.',
            'format' => 'PDF submitted through HuskyCT/Blackboard',
            'items' => [
                'Plain-English explanation: Explain your assigned lens for someone encountering it for the first time.',
                '3–5 key findings: Identify the most important things the class should understand.',
                'Authoritative sources: Link directly to the primary sources supporting important claims.',
                'Apply It: Explain how your findings affect the evaluation of the Design Futures registration experience.',
                'What We Still Don\'t Know: Identify something your lens cannot establish by itself.',
                'AI Use Note: Identify any generative AI tools used and briefly explain how they contributed.',
            ],
        ],
        'format_note' => 'Do not submit a slide presentation. Submit your brief as a concise PDF (approximately 1–2 pages) through HuskyCT/Blackboard. The PDF should contain working links to authoritative sources.',
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
        'future_note' => [
            'title' => 'A note about the documents we create.',
            'body' => 'We will return later to the accessibility of the documents and artifacts we create ourselves. For now, focus on the research and evidence in your brief.',
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
                        'label' => 'Accessibility of Web Content and Mobile Apps Provided by State and Local Government Entities',
                        'href' => 'https://www.ada.gov/resources/2024-03-08-web-rule/',
                        'description' => 'DOJ guidance explaining the Title II requirements for web and mobile accessibility for state and local government entities, including the WCAG 2.1 Level AA technical standard.',
                    ],
                    [
                        'source' => 'U.S. Department of Education, Office for Civil Rights',
                        'label' => 'Disability Discrimination: Technology Accessibility',
                        'href' => 'https://www.ed.gov/laws-and-policy/civil-rights-laws/disability-discrimination/disability-discrimination-key-issues/disability-discrimination-technology-accessibility',
                        'description' => 'Department of Education guidance explaining how Section 504 and ADA Title II apply to equal access to educational programs, services, and opportunities delivered online or in other digital formats.',
                    ],
                    [
                        'source' => 'U.S. Department of Justice and U.S. Department of Education',
                        'label' => 'Dear Colleague Letter on Postsecondary Online Accessibility',
                        'href' => 'https://www.ed.gov/sites/ed/files/about/offices/list/ocr/docs/postsec-online-access-051923.pdf',
                        'description' => 'Joint federal guidance addressing barriers to online programs, services, and activities provided by colleges, universities, and other postsecondary institutions under the ADA and Section 504.',
                    ],
                    [
                        'source' => 'Section508.gov / U.S. General Services Administration',
                        'label' => 'Do Section 508 Accessibility Standards Apply to My Website?',
                        'href' => 'https://www.section508.gov/blog/do-section-508-accessibility-standards-apply-to-mywebsite/',
                        'description' => 'Federal guidance explaining that Section 508 directly applies to federal agencies and distinguishing it from accessibility obligations that apply to non-federal organizations.',
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
                    'description' => 'DOJ guidance explaining the Title II requirements for web and mobile accessibility for state and local government entities, including the WCAG 2.1 Level AA technical standard.',
                ],
                [
                    'source' => 'U.S. Department of Education, Office for Civil Rights',
                    'label' => 'Disability Discrimination: Technology Accessibility',
                    'href' => 'https://www.ed.gov/laws-and-policy/civil-rights-laws/disability-discrimination/disability-discrimination-key-issues/disability-discrimination-technology-accessibility',
                    'meta' => 'Section 504 and ADA Title II',
                    'description' => 'Department of Education guidance explaining how Section 504 and ADA Title II apply to equal access to educational programs, services, and opportunities delivered online or in other digital formats.',
                ],
                [
                    'source' => 'U.S. Department of Justice and U.S. Department of Education',
                    'label' => 'Dear Colleague Letter on Postsecondary Online Accessibility',
                    'href' => 'https://www.ed.gov/sites/ed/files/about/offices/list/ocr/docs/postsec-online-access-051923.pdf',
                    'meta' => 'Postsecondary guidance',
                    'description' => 'Joint federal guidance addressing barriers to online programs, services, and activities provided by colleges, universities, and other postsecondary institutions under the ADA and Section 504.',
                ],
                [
                    'source' => 'Section508.gov / U.S. General Services Administration',
                    'label' => 'Do Section 508 Accessibility Standards Apply to My Website?',
                    'href' => 'https://www.section508.gov/blog/do-section-508-accessibility-standards-apply-to-mywebsite/',
                    'meta' => 'Section 508 scope',
                    'description' => 'Federal guidance explaining that Section 508 directly applies to federal agencies and distinguishing it from accessibility obligations that apply to non-federal organizations.',
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
                    'label' => 'UConnAccessibility Policy Procedures',
                    'href' => 'https://accessibility.its.uconn.edu/policy-procedures/',
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
