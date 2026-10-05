<?php

return [
    'label' => 'MODULE 05',
    'title' => 'What Does the Interface Actually Say?',
    'central_question' => 'Can a user understand, operate, and recover from an interface when they are not relying on its visual presentation?',
    'overview' => 'This module focuses on forms, labels, feedback, and recovery when the interface is not doing its explaining visually. Students look at what the interface says, what it communicates programmatically, and what remains usable when a screen reader or keyboard is the main path through the task.',
    'status' => 'current',
    'sessions' => [
        10 => [
            'label' => 'SESSION 10',
            'title' => 'What Is the Form Asking For?',
            'status' => 'current',
            'summary' => 'Investigate whether the form tells the user what it wants, how to provide it, and how to recover when something goes wrong.',
            'question' => 'Does the form give users enough information to understand what it wants, complete it, and recover when something goes wrong?',
            'overview' => 'This session focuses on whether a form can be understood before submission. The goal is not to perfect the visual interface; it is to decide whether the user has enough structure, labels, and guidance to complete the task without guessing.',
            'sections' => [
                [
                    'title' => 'Start with the question the form is asking',
                    'paragraphs' => [
                        'A form should tell the user what it wants before the first submission attempt. If the label is vague, the required information is implied instead of explained, or the format is only revealed after a failure, the interface has already made the task harder than it needs to be.',
                        'The question is not whether the form looks polished. The question is whether a user can understand the task, the expected input, and the next step without relying on visual clues alone.',
                    ],
                    'bullets_intro' => 'Check whether the form makes these things obvious:',
                    'bullets' => [
                        'what information is being requested',
                        'what format is expected',
                        'which fields are required',
                        'whether the data is grouped and labeled clearly',
                        'how the user will know when something is missing or incorrect',
                    ],
                    'actions' => [
                        ['label' => 'UConn Accessibility Tools', 'href' => 'https://accessibility.its.uconn.edu/accessibility-tools/', 'new_tab' => true],
                        ['label' => 'WebAIM NVDA Guide', 'href' => 'https://webaim.org/articles/nvda/', 'new_tab' => true],
                        ['label' => 'WebAIM VoiceOver Guide', 'href' => 'https://webaim.org/articles/voiceover/', 'new_tab' => true],
                    ],
                ],
                [
                    'title' => 'What does the form need from the user before the first submit?',
                    'ordered_intro' => 'Quick review questions:',
                    'ordered' => [
                        'Does the label clearly describe the field?',
                        'Is the instruction text helpful, visible, and not hidden in a placeholder?',
                        'Does the form say which inputs are required before the user starts guessing?',
                        'Can a user tell what a valid value looks like without trial and error?',
                    ],
                    'emphasis' => [
                        'The best form is not the one that looks finished. It is the one that makes the task understandable before the user gets stuck.',
                    ],
                ],
                [
                    'title' => 'Use the field guide as the starting point',
                    'paragraphs' => [
                        'Use the course Field Guide and the UConn accessibility tools page as the institutional starting point for testing and review. These are the right resources for checking how the interface communicates labels, state, and recovery in a way that supports real user tasks.',
                    ],
                    'actions' => [
                        ['label' => 'Open Field Guide →', 'route' => 'field-guide'],
                        ['label' => 'Open Module 05 resources →', 'route' => 'modules.resources', 'params' => ['module' => 5]],
                    ],
                ],
            ],
            'resources' => [
                ['label' => 'UConn Accessibility Tools', 'href' => 'https://accessibility.its.uconn.edu/accessibility-tools/', 'meta' => 'UConn'],
                ['label' => 'WebAIM NVDA Guide', 'href' => 'https://webaim.org/articles/nvda/', 'meta' => 'WebAIM'],
                ['label' => 'WebAIM VoiceOver Guide', 'href' => 'https://webaim.org/articles/voiceover/', 'meta' => 'WebAIM'],
                ['label' => 'Understanding Labels or Instructions', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/labels-or-instructions.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'Understanding Name, Role, Value', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/name-role-value.html', 'meta' => 'W3C / WCAG 2.2'],
            ],
        ],
        11 => [
            'label' => 'SESSION 11',
            'title' => 'Can You Use It Without the Visual Interface?',
            'status' => 'upcoming',
            'summary' => 'Test how the interface communicates state, changes, and recovery when a user navigates primarily by keyboard and screen reader.',
            'question' => 'What does the interface communicate when you navigate it primarily through a screen reader?',
            'overview' => 'This session shifts from completing the form to understanding how the interface tells the user what happened. Students test structure, state, feedback, and recovery in a way that reflects real assistive technology use.',
            'sections' => [
                [
                    'title' => 'Start with the interface that is still there',
                    'paragraphs' => [
                        'A screen reader does not just announce the visible page. It announces the structure, naming, state, and relationships the browser exposes. That makes it a useful way to test whether the interface communicates what is happening without relying on color, position, or sight alone.',
                        'Use keyboard navigation and a screen reader together. Listen for the names of controls, the question being asked, the current state, and whether a change is announced in context.',
                    ],
                    'bullets_intro' => 'Work through these checks:',
                    'bullets' => [
                        'find the main page structure and headings',
                        'move through links and form controls without a mouse',
                        'notice how labels and instructions are announced',
                        'trigger a state change and record what is announced',
                        'test the recovery path after an error or failed action',
                    ],
                    'actions' => [
                        ['label' => 'UConn Accessibility Tools', 'href' => 'https://accessibility.its.uconn.edu/accessibility-tools/', 'new_tab' => true],
                        ['label' => 'Accessibility Bookmarklets', 'href' => 'https://accessibility-bookmarklets.org/', 'new_tab' => true],
                        ['label' => 'WebAIM NVDA Guide', 'href' => 'https://webaim.org/articles/nvda/', 'new_tab' => true],
                        ['label' => 'WebAIM VoiceOver Guide', 'href' => 'https://webaim.org/articles/voiceover/', 'new_tab' => true],
                    ],
                ],
                [
                    'title' => 'When something changes, does the user know?',
                    'paragraphs' => [
                        'A user should not have to guess whether a control changed, whether a submission succeeded, or whether the interface is asking them to correct something. Status, alerts, and focus changes need to help the user understand what happened and what to do next.',
                        'The same issue can be visible to a sighted user and invisible to someone using assistive technology. That is why testing the interface without visual reliance matters: the communication problem is not separate from the task itself.',
                    ],
                    'ordered_intro' => 'Ask the basic recovery questions:',
                    'ordered' => [
                        'What changed?',
                        'Was the user told what happened?',
                        'Was the right field or state identified?',
                        'Did the interface preserve valid work or force the user to start over?',
                    ],
                    'emphasis' => [
                        'A good recovery path explains the problem, points to the fix, and keeps the user moving forward without unnecessary loss.',
                    ],
                ],
                [
                    'title' => 'Recovery is part of usability',
                    'paragraphs' => [
                        'An interface is not truly usable if it only shows the error after the fact. A user needs to know where to look, what to fix, and what the system will do next. Recovery is part of the interface’s side of the conversation with the user.',
                    ],
                    'actions' => [
                        ['label' => 'Open Challenge 05 →', 'route' => 'modules.challenge', 'params' => ['module' => 5]],
                        ['label' => 'Open Module 05 resources →', 'route' => 'modules.resources', 'params' => ['module' => 5]],
                    ],
                ],
            ],
            'resources' => [
                ['label' => 'UConn Accessibility Tools', 'href' => 'https://accessibility.its.uconn.edu/accessibility-tools/', 'meta' => 'UConn'],
                ['label' => 'Accessibility Bookmarklets', 'href' => 'https://accessibility-bookmarklets.org/', 'meta' => 'WebAIM / Community'],
                ['label' => 'WebAIM NVDA Guide', 'href' => 'https://webaim.org/articles/nvda/', 'meta' => 'WebAIM'],
                ['label' => 'WebAIM VoiceOver Guide', 'href' => 'https://webaim.org/articles/voiceover/', 'meta' => 'WebAIM'],
                ['label' => 'Understanding Error Identification', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/error-identification.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'Understanding Status Messages', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/status-messages.html', 'meta' => 'W3C / WCAG 2.2'],
            ],
        ],
    ],
    'challenge' => [
        'label' => 'CHALLENGE 05',
        'title' => 'Challenge 05: When the Interface Fails the User',
        'status' => 'current',
        'summary' => 'Complete the Design Futures 2026 registration experience, test it across multiple methods, and identify the eight findings that matter most. This is the most substantial individual assignment so far and it is cumulative across Modules 01–05.',
        'question' => 'What does an interface owe the user when something goes wrong?',
        'problem_title' => 'Design Futures 2026 Registration',
        'problem' => 'Register for Design Futures 2026 and choose a workshop. This is an individual challenge across Modules 01–05: complete the task, test it in several ways, document evidence, prioritize the most meaningful findings, and explain what the interface owes the user when something goes wrong.',
        'assignment_title' => 'Individual Challenge',
        'team_assignment' => 'This challenge is completed individually and submitted through HuskyCT/Blackboard. It is not called a midterm, but it functions as a cumulative checkpoint after Modules 01–05. Students should spend meaningful time completing the experience, testing it in multiple ways, documenting findings, verifying claims, prioritizing the most significant barriers, proposing remediation, and describing how those remediations would be verified.',
        'experience_under_review' => [
            'title' => 'Experience Under Review',
            'name' => 'Design Futures 2026 Registration',
            'link' => ['label' => 'Open the experience ->', 'route' => 'experiences.module05.design-futures-registration', 'new_tab' => true],
        ],
        'investigation' => [
            'Complete the registration once using the interface normally.',
            'Use the Module 05 Screen Reader Quick Start, the NVDA guide, and the VoiceOver guide to test semantic structure, names, labels, state changes, and announcements.',
            'Repeat or inspect the experience using keyboard-only interaction.',
            'Review relevant visual details for contrast, zoom, and color-dependent meaning.',
            'Use Accessibility Bookmarklets or browser accessibility inspection tools to inspect what the interface exposes and compare that with the screen-reader output.',
            'Evaluate the event media and identify what information is lost without the relevant perception path.',
            'Intentionally trigger form errors, observe recovery, and assess whether valid work is preserved.',
            'Document the eight findings you believe are most meaningful and justify the prioritization.',
        ],
        'investigation_note' => 'This challenge is cumulative across Modules 01–05, but it is not a bug hunt. The task is to exercise judgment: identify barriers that matter, distinguish them from design preferences or weaker concerns, and explain how the interface should support the user when something goes wrong.',
        'deliverable' => [
            'summary' => 'Submit one individual PDF. Target length: 4–6 pages. The report should include a concise test record, eight prioritized findings, and a judgment section about the most important issues and one concern that is not necessarily a failure.',
            'items' => [
                ['title' => 'Part 1: Test Record', 'description' => 'Document the methods used, what was tested, and one useful observation from normal use, keyboard-only testing, visual/zoom review, media review, and form/error/recovery testing.'],
                ['title' => 'Part 2: Eight Findings', 'description' => 'Select the eight findings you believe are most important. For each finding, explain what happened, why it matters, what evidence supports it, what should change, and how you would verify the fix.'],
                ['title' => 'Part 3: Judgment', 'description' => 'Rank your top three priorities and explain one design choice or concern that is not necessarily an accessibility failure.'],
            ],
        ],
        'format_note' => 'This challenge is completed individually and submitted through HuskyCT/Blackboard. AI output is not evidence. Use the methods practiced across Modules 01–05 and ground each conclusion in direct testing and authoritative support.',
        'evaluation_criteria' => [
            ['title' => 'Investigation and Test Record', 'points' => 4, 'description' => 'Multiple methods were used thoughtfully and the observations demonstrate genuine testing across the registration flow.'],
            ['title' => 'Findings', 'points' => 8, 'description' => 'The student selected eight meaningful findings, and each is substantially accurate, meaningfully connected to accessibility, and supported by direct evidence.'],
            ['title' => 'Evidence and Remediation', 'points' => 4, 'description' => 'Evidence is authoritative and well matched to the findings, and the proposed remediation is practical and appropriately specific.'],
            ['title' => 'Judgment and Prioritization', 'points' => 3, 'description' => 'The student ranks the top three issues clearly and distinguishes accessibility failure from broader usability concerns or design preference.'],
            ['title' => 'Communication and AI Use Note', 'points' => 1, 'description' => 'The brief is clear, concise, and includes a brief AI Use Note that retains the statement that AI output is not evidence.'],
        ],
        'evaluation_total' => 20,
        'class_work_section_title' => 'Challenge 05 Class Work',
        'class_work_section_description' => 'The individual brief for Challenge 05 will appear here as review material after the challenge cycle.',
        'class_work_empty_message' => 'The Challenge 05 brief will appear here after the challenge cycle.',
        'class_work' => [],
        'due' => 'Due: Submitted individually through HuskyCT/Blackboard.',
        'resource_collections' => [
            [
                'title' => 'Module 01–05 foundations',
                'description' => 'Return to the core ideas that help determine whose accessibility standard applies, what visual information matters, how media shapes meaning, how forms communicate their purpose, and what the interface owes the user when a task fails.',
                'resources' => [
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Labels or Instructions', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/labels-or-instructions.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Error Identification', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/error-identification.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Status Messages', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/status-messages.html'],
                    ['source' => 'UConn / Institutional Accessibility Policies', 'label' => 'Accessibility policy and institutional guidance', 'href' => '#'],
                ],
            ],
            [
                'title' => 'Evidence and verification',
                'description' => 'Use the methods that let students investigate support, test with multiple approaches, and verify that a remediation actually resolves the barrier.',
                'resources' => [
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Error Suggestion', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/error-suggestion.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Error Prevention', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/error-prevention-legal-financial-data.html'],
                    ['source' => 'W3C WAI', 'label' => 'W3C WAI Easy Checks', 'href' => 'https://www.w3.org/WAI/test-evaluate/easy-checks/'],
                    ['source' => 'W3C WAI', 'label' => 'ARIA Authoring Practices: Alert and Message Patterns', 'href' => 'https://www.w3.org/WAI/ARIA/apg/patterns/alert/'],
                ],
            ],
        ],
    ],
    'resources' => [
        ['label' => 'Understanding Labels or Instructions', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/labels-or-instructions.html', 'meta' => 'W3C / WCAG 2.2'],
        ['label' => 'Understanding Error Identification', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/error-identification.html', 'meta' => 'W3C / WCAG 2.2'],
        ['label' => 'Understanding Status Messages', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/status-messages.html', 'meta' => 'W3C / WCAG 2.2'],
        ['label' => 'Forms Tutorial', 'href' => 'https://www.w3.org/WAI/tutorials/forms/', 'meta' => 'W3C WAI'],
    ],
];
