<?php

return [
    'label' => 'MODULE 04',
    'title' => 'Can You Use It Your Way?',
    'central_question' => 'Can users successfully operate an interface using different methods of input and interaction?',
    'overview' => 'Interfaces often assume a mouse, a steady hand, or a particular gesture. In this module, we will test what happens when those assumptions disappear.',
    'status' => 'current',
    'key_concepts' => [
        ['slug' => 'everything-interactive-needs-a-keyboard-path', 'title' => 'Everything Interactive Needs a Keyboard Path'],
        ['slug' => 'focus-has-to-be-visible', 'title' => 'Focus Has to Be Visible'],
        ['slug' => 'focus-order-should-follow-the-experience', 'title' => 'Focus Order Should Follow the Experience'],
        ['slug' => 'focusable-does-not-mean-usable', 'title' => 'Focusable Does Not Mean Usable'],
        ['slug' => 'you-have-to-be-able-to-get-back-out', 'title' => 'You Have to Be Able to Get Back Out'],
        ['slug' => 'do-not-require-one-particular-input-method', 'title' => 'Do Not Require One Particular Input Method'],
    ],

    'sessions' => [
        8 => [
            'label' => 'SESSION 08',
            'title' => 'Put the Mouse Away',
            'status' => 'current',
            'summary' => 'Test a meaningful task using only the keyboard, then identify what makes an interaction operable.',
            'question' => 'Can you complete the task without a mouse?',
            'overview' => 'Start with a real task on a website you already use. Put the mouse or trackpad away and test what happens when keyboard input is your only method.',
            'sections' => [
                [
                    'title' => 'Put the Mouse Away',
                    'paragraphs' => [
                        'Open a real website you already use. Choose a meaningful task, such as finding information, searching, filtering, completing part of a form, or changing a setting.',
                        'Physically stop using the mouse or trackpad. Attempt the task using only the keyboard.',
                        'Use the keys you need: Tab, Shift + Tab, Enter, Space, the arrow keys, and Escape. Do not overthink the method before you begin. Notice what happens.',
                    ],
                    'ordered_intro' => 'As you work, ask:',
                    'ordered' => [
                        'Can you reach everything you need?',
                        'Can you tell where focus is?',
                        'Does focus move in an order that makes sense?',
                        'Can you activate the controls?',
                        'Can you get back out?',
                    ],
                ],
                [
                    'title' => 'What Are We Testing?',
                    'paragraphs' => [
                        'Keyboard access: functionality available with a mouse should also be operable through a keyboard interface where applicable.',
                        'Focus visible: a sighted keyboard user needs to be able to see which element currently has focus.',
                        'Focus order: focus should move in an order that preserves meaning and operability.',
                        'No keyboard trap: if focus enters an interaction, the user must also be able to leave it using the keyboard.',
                    ],
                    'actions' => [
                        ['label' => 'Open Module 04 Key Concepts →', 'route' => 'modules.key-concepts', 'params' => ['module' => 4], 'new_tab' => true],
                    ],
                ],
                [
                    'title' => 'Reachable Is Not the Same as Usable',
                    'paragraphs' => [
                        'Being able to Tab to a control is only the beginning. You still need to know where you are, understand what happens next, activate the control, and continue the task.',
                    ],
                    'emphasis' => [
                        'What did you reach but still could not use?',
                    ],
                ],
                [
                    'title' => 'Launch Challenge 04',
                    'paragraphs' => [
                        'Use a real website for a short preliminary test, then open the Interaction Lab and begin the controlled Challenge 04 investigation with your assigned team experience.',
                    ],
                    'actions' => [
                        ['label' => 'Open Interaction Lab →', 'route' => 'experiences.module04.lab', 'new_tab' => true],
                    ],
                    'challenge_reference' => [
                        'title' => 'Use It Another Way',
                        'link_label' => 'Open Challenge 04 →',
                    ],
                ],
            ],
            'resources' => [
                ['label' => 'Key Concept: Keyboard Path', 'route' => 'modules.key-concepts.show', 'params' => ['module' => 4, 'slug' => 'everything-interactive-needs-a-keyboard-path'], 'meta' => 'Module 04 concept'],
                ['label' => 'Key Concept: Focus Visible', 'route' => 'modules.key-concepts.show', 'params' => ['module' => 4, 'slug' => 'focus-has-to-be-visible'], 'meta' => 'Module 04 concept'],
                ['label' => 'Key Concept: Focus Order', 'route' => 'modules.key-concepts.show', 'params' => ['module' => 4, 'slug' => 'focus-order-should-follow-the-experience'], 'meta' => 'Module 04 concept'],
                ['label' => 'Key Concept: Focusable Does Not Mean Usable', 'route' => 'modules.key-concepts.show', 'params' => ['module' => 4, 'slug' => 'focusable-does-not-mean-usable'], 'meta' => 'Module 04 concept'],
                ['label' => 'Key Concept: Get Back Out', 'route' => 'modules.key-concepts.show', 'params' => ['module' => 4, 'slug' => 'you-have-to-be-able-to-get-back-out'], 'meta' => 'Module 04 concept'],
                ['label' => 'Understanding Keyboard', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/keyboard.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'Understanding Focus Visible', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/focus-visible.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'Understanding Focus Order', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/focus-order.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'Understanding No Keyboard Trap', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/no-keyboard-trap.html', 'meta' => 'W3C / WCAG 2.2'],
            ],
        ],
        9 => [
            'label' => 'SESSION 09',
            'title' => 'How Much Precision Does It Require?',
            'status' => 'upcoming',
            'summary' => 'Look beyond keyboard access at targets, dragging, gestures, and the cost of requiring one particular input method.',
            'question' => 'What happens when an interaction assumes precise pointing, dragging, or one particular input method?',
            'overview' => 'Return to Challenge 04, then examine how much precision and which input method the task demands. Use those observations to finish the investigation and redesign.',
            'sections' => [
                [
                    'title' => 'Challenge 04 Check-In',
                    'paragraphs' => [
                        'Briefly compare what your team has learned about the chosen task. Name the method that creates the most difficulty and the evidence you still need.',
                    ],
                    'ordered' => [
                        'What task are you testing?',
                        'Which input method have you tested so far?',
                        'What is one operability finding you can defend?',
                    ],
                ],
                [
                    'title' => 'Small Targets',
                    'paragraphs' => [
                        'Very small or tightly packed controls can be difficult for users with limited precision. Target size is part of whether a pointer or touch interaction can be completed reliably.',
                        'WCAG 2.2 Target Size (Minimum) generally calls for a target of at least 24 by 24 CSS pixels, or sufficient spacing or another applicable exception. Use the criterion as a high-level reference, not as a target-size calculation exercise.',
                    ],
                ],
                [
                    'title' => 'Dragging',
                    'paragraphs' => [
                        'Look for drag and drop, draggable sliders, reorderable cards, and draggable carousels.',
                        'If an action requires dragging, provide another way to perform the same action with a simple pointer interaction unless dragging is essential.',
                    ],
                    'bullets' => [
                        'Move up and move down buttons.',
                        'Entering a slider value directly.',
                        'Previous and next controls.',
                        'Selecting an item and then selecting its destination.',
                    ],
                ],
                [
                    'title' => 'Gestures',
                    'paragraphs' => [
                        'Briefly consider interactions that depend on swiping, pinching, drawing a path, or using a multi-finger gesture.',
                    ],
                    'emphasis' => [
                        'Is there a simpler way to perform the same action?',
                    ],
                ],
                [
                    'title' => 'Input Choice',
                    'paragraphs' => [
                        'The goal is not to eliminate mice, touch, dragging, or gestures. The goal is to avoid making one interaction method the only way to succeed.',
                        'Return to Challenge 04. Reconsider your assigned experience through these additional lenses, then finish the team package.',
                    ],
                    'actions' => [
                        ['label' => 'Open Input Method Concept →', 'route' => 'modules.key-concepts.show', 'params' => ['module' => 4, 'slug' => 'do-not-require-one-particular-input-method'], 'new_tab' => true],
                    ],
                    'challenge_reference' => [
                        'title' => 'Use It Another Way',
                        'link_label' => 'Finish Challenge 04 →',
                    ],
                ],
            ],
            'resources' => [
                ['label' => 'Key Concept: Do Not Require One Particular Input Method', 'route' => 'modules.key-concepts.show', 'params' => ['module' => 4, 'slug' => 'do-not-require-one-particular-input-method'], 'meta' => 'Module 04 concept'],
                ['label' => 'Understanding Target Size (Minimum)', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/target-size-minimum.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'Understanding Dragging Movements', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/dragging-movements.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'Understanding Pointer Gestures', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/pointer-gestures.html', 'meta' => 'W3C / WCAG 2.2'],
            ],
        ],
    ],

    'challenge' => [
        'label' => 'CHALLENGE 04',
        'title' => 'Use It Another Way',
        'status' => 'current',
        'summary' => 'Investigate one real interactive task, identify three meaningful operability findings, and redesign one significant barrier.',
        'question' => 'Can someone complete the same task without relying on one particular way of interacting?',
        'problem_title' => 'The Task',
        'problem' => 'Each team receives one controlled interactive experience with a meaningful task. Use the assigned experience below. The demos do not require login, account creation, payment, registration submission, or entry of real personal information.',
        'assigned_experiences' => [
            [
                'team' => 'Cyan Triangle',
                'shape' => 'triangle',
                'tone' => 'cyan',
                'title' => 'Course Finder',
                'task' => 'Find a course that meets on Tuesday and add it to your shortlist.',
                'route' => 'experiences.module04.course-finder',
            ],
            [
                'team' => 'Amber Circle',
                'shape' => 'circle',
                'tone' => 'amber',
                'title' => 'Prioritize Your Tasks',
                'task' => 'Put the five tasks in priority order from highest to lowest.',
                'route' => 'experiences.module04.task-prioritizer',
            ],
            [
                'team' => 'Violet Square',
                'shape' => 'square',
                'tone' => 'violet',
                'title' => 'Find an Event',
                'task' => 'Find the Accessibility Workshop and determine where and when it is happening.',
                'route' => 'experiences.module04.event-browser',
            ],
        ],
        'team_assignment' => 'Each team receives one interactive experience. Complete the assigned task normally. Then try to complete it using different input methods.',
        'investigation' => [
            'Complete the task normally.',
            'Try to complete it using different input methods, including keyboard-only where applicable.',
            'For each meaningful barrier you identify, record what happened.',
            'Record how you found it and what input method or test exposed the problem.',
            'Explain why the interaction creates a barrier and what you would change.',
            'Support important claims with relevant W3C or WCAG guidance.',
            'Record approximately three meaningful findings. Do not manufacture one finding from every topic.',
        ],
        'investigation_note' => 'For each finding, organize your notes under What Happened, How You Found It, Why It Matters, What You Would Change, and Evidence. You do not need to find one issue in every category.',
        'teams' => [],
        'deliverable' => [
            'summary' => 'Submit one concise team package through HuskyCT/Blackboard, approximately 1 to 2 pages.',
            'items' => [
                ['title' => 'Assigned Task', 'description' => 'Name the assigned experience and task you tested.'],
                ['title' => 'Findings', 'description' => 'Report approximately three meaningful findings. For each one, include What Happened, How You Found It, Why It Matters, What You Would Change, and Evidence.'],
                ['title' => 'AI Use Note', 'description' => 'Identify any generative AI tools used and briefly explain how they contributed.'],
            ],
        ],
        'format_note' => 'Submit one concise team package through HuskyCT/Blackboard. No redesign artifact or formal retest is required, and no large report is required.',
        'evaluation_criteria' => [
            ['title' => 'Investigation', 'points' => 3, 'description' => 'Did the team complete and examine a meaningful task and identify three meaningful operability findings?'],
            ['title' => 'Evidence', 'points' => 3, 'description' => 'Are important claims supported by authoritative W3C or WCAG guidance and direct testing?'],
            ['title' => 'Judgment and Solution', 'points' => 2, 'description' => 'Did the team choose a significant barrier and propose a thoughtful way to complete the task another way?'],
            ['title' => 'Communication', 'points' => 2, 'description' => 'Is the package concise, clear, and easy to evaluate?'],
        ],
        'evaluation_total' => 10,
        'class_work_section_title' => 'Challenge 04 Class Work',
        'class_work_section_description' => 'Team submissions for Use It Another Way will be archived here after Session 09.',
        'class_work_empty_message' => 'The three Challenge 04 team packages will appear here after the challenge cycle.',
        'class_work' => [
            ['team' => 'Cyan Triangle', 'shape' => 'triangle', 'tone' => 'cyan', 'title' => null, 'description' => null, 'artifact' => null],
            ['team' => 'Amber Circle', 'shape' => 'circle', 'tone' => 'amber', 'title' => null, 'description' => null, 'artifact' => null],
            ['team' => 'Violet Square', 'shape' => 'square', 'tone' => 'violet', 'title' => null, 'description' => null, 'artifact' => null],
        ],
        'due' => 'Due: EOD after Session 09',
        'resource_collections' => [
            [
                'title' => 'Authoritative starting points',
                'description' => 'Use the guidance that fits the interaction you are testing.',
                'resources' => [
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Keyboard', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/keyboard.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding No Keyboard Trap', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/no-keyboard-trap.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Focus Order', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/focus-order.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Focus Visible', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/focus-visible.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Pointer Gestures', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/pointer-gestures.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Dragging Movements', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/dragging-movements.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Target Size (Minimum)', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/target-size-minimum.html'],
                    ['source' => 'W3C WAI', 'label' => 'Easy Checks', 'href' => 'https://www.w3.org/WAI/test-evaluate/easy-checks/'],
                ],
            ],
        ],
    ],
];
