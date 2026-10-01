<?php

return [
    'label' => 'MODULE 05',
    'title' => 'What Happens When Something Goes Wrong?',
    'central_question' => 'Can users understand, complete, and recover from an interaction when something goes wrong?',
    'overview' => 'Many of the most obvious accessibility barriers appear when someone is trying to complete a real task. A form can look straightforward until the user cannot tell what a field is asking for, cannot tell how to recover after a mistake, or cannot be certain whether an action succeeded.',
    'status' => 'upcoming',
    'sessions' => [
        10 => [
            'label' => 'SESSION 10',
            'title' => 'What Does This Form Want From Me?',
            'status' => 'upcoming',
            'summary' => 'Investigate forms before submission: labels, instructions, grouping, expected formats, and what assistive technology receives.',
            'question' => 'Can a user understand what the form wants and complete it without guessing?',
            'overview' => 'Begin with a deliberately problematic form or a set of form fragments. Ask what it appears to want, what assumptions it makes about the user, and what information is actually exposed programmatically before the user even submits anything.',
            'sections' => [
                [
                    'title' => 'The form before submission',
                    'paragraphs' => [
                        'A form can appear perfectly understandable until someone cannot determine what a field is asking for, does not know which format is expected, or cannot tell whether a control is required or optional.',
                        'The most common problems are not always dramatic. They are often ordinary: a missing visible label, a placeholder doing the job of a label, insufficient instruction, hidden assumptions about format, confusing grouping, or controls that look fine visually but expose nothing meaningful to assistive technology.',
                    ],
                    'ordered_intro' => 'Start by asking:',
                    'ordered' => [
                        'What does the form appear to want?',
                        'What assumptions is it making about the user?',
                        'What happens if the visual presentation is removed?',
                        'What information is actually exposed programmatically?',
                    ],
                ],
                [
                    'title' => 'What is the form asking for?',
                    'paragraphs' => [
                        'Good form design begins with clarity. People need to know what is being requested, what format is expected, whether a field is required, and what to do next without guessing.',
                        'Visible labels matter because they communicate the label in normal reading order. Programmatic labels matter because assistive technologies read the accessible name and the relationship between control and label. The two should reinforce each other.',
                        'Placeholders are not a substitute for labels. Instruction text, format hints, and grouping help users understand the task before they submit anything.',
                    ],
                    'bullets_intro' => 'Pay attention to:',
                    'bullets' => [
                        'visible labels and accessible names',
                        'labels versus placeholders',
                        'instructions that explain required information and expected formatting',
                        'required fields and clear indication of necessity',
                        'grouping of related controls such as address fields, contact methods, and choice sets',
                        'field purpose and autocomplete/input purpose where relevant',
                        'semantic form controls and their relationship to visual presentation',
                    ],
                ],
                [
                    'title' => 'Form Investigation Lab',
                    'paragraphs' => [
                        'Students should inspect and test a deliberately flawed form using a combination of visual inspection, keyboard navigation, browser developer tools, accessibility inspection tools, accessible-name inspection, and, where useful, a screen reader.',
                        'The goal is not to run a checker and copy the result. The goal is to spend time deciding what the user is being asked to do, what the control actually exposes, and what would make the form more understandable.',
                    ],
                    'ordered_intro' => 'In the lab, look for answers to these questions:',
                    'ordered' => [
                        'What does the form appear to want?',
                        'What assumptions is it making about the user?',
                        'What happens if the visual presentation is removed?',
                        'What information is actually exposed programmatically?',
                        'Which problems are usability problems?',
                        'Which problems have support in WCAG or another authoritative source?',
                        'How would you improve it?',
                        'How do you know the improvement is better?',
                    ],
                    'actions' => [
                        ['label' => 'Open Module 05 resources →', 'route' => 'modules.resources', 'params' => ['module' => 5]],
                    ],
                ],
                [
                    'title' => 'Before the form is even submitted',
                    'paragraphs' => [
                        'The usability problem begins long before the user sees an error. If the user cannot determine what the field wants, the interface has already failed the task.',
                        'A technically valid control is not automatically a usable one. Accessibility requires more than a valid HTML element. The interface should make expectations explicit, assistive technology should receive an accurate label and relationship, and the structure should be interpretable without guessing.',
                    ],
                    'emphasis' => [
                        'The question is not whether the form is technically built. The question is whether the user can understand it and complete it.',
                    ],
                ],
            ],
            'resources' => [
                ['label' => 'Understanding Labels and Instructions', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/labels-or-instructions.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'Understanding Name, Role, Value', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/name-role-value.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'Understanding Input Purpose', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/input-purposes.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'HTML: Form Controls', 'href' => 'https://html.spec.whatwg.org/multipage/forms.html', 'meta' => 'WHATWG'],
                ['label' => 'W3C WAI Easy Checks', 'href' => 'https://www.w3.org/WAI/test-evaluate/easy-checks/', 'meta' => 'W3C WAI'],
            ],
        ],
        11 => [
            'label' => 'SESSION 11',
            'title' => 'What Happens When You Get It Wrong?',
            'status' => 'upcoming',
            'summary' => 'Shift from form completion to validation, errors, feedback, and recovery when a user makes a mistake or the system fails.',
            'question' => 'What happens when the user provides an unexpected value, misses a step, or triggers a problem in the interface?',
            'overview' => 'This session moves from understanding and completing a form to recognizing and recovering from failure. The interface should not assume that everything goes right. It should identify the problem, explain it clearly, and help the user recover without losing work or confidence.',
            'sections' => [
                [
                    'title' => 'Error & Recovery Lab',
                    'paragraphs' => [
                        'Use an intentionally frustrating form or multi-step interaction. It should include several failure modes: a color-only error, a generic “There were errors” message, an error that appears visually adjacent to a field but is not programmatically associated with it, focus remaining somewhere unhelpful after submission, entered information being erased, an unexplained format requirement, or a success message that appears visually but is not communicated appropriately.',
                        'Do not immediately tell students what every problem is. Let the interface itself be the thing students investigate.',
                    ],
                    'ordered_intro' => 'As you inspect, track the pattern:',
                    'ordered' => [
                        'Barrier → affected interaction/user',
                        'evidence → proposed remediation',
                        'method of verification',
                    ],
                    'paragraphs_after' => [
                        'Barrier → affected interaction/user → evidence → proposed remediation → method of verification',
                    ],
                ],
                [
                    'title' => 'What is the user being asked to recover from?',
                    'paragraphs' => [
                        'Accessible forms do not assume that everything goes right. They anticipate errors, explain them in plain language, point users to the right place, preserve their work when possible, and give an obvious path back to completion.',
                        'This includes error identification, useful error messages, associating errors with the correct field, error suggestions, preserving entered information, preventing avoidable errors, confirmation for consequential actions, status and success messages, and focus management after errors when appropriate.',
                    ],
                    'bullets_intro' => 'Look for whether the interface does the following:',
                    'bullets' => [
                        'identifies the error clearly and at the correct place',
                        'associates the error message with the relevant field programmatically',
                        'explains what to do next or how to fix the problem',
                        'keeps entered information available when something goes wrong',
                        'prevents avoidable mistakes with better format guidance or defaults',
                        'provides confirmation for irreversible or consequential actions',
                        'communicates status and success clearly to assistive technology as well as visually',
                    ],
                ],
                [
                    'title' => 'Visual feedback versus programmatic feedback',
                    'paragraphs' => [
                        'A red border or an icon can help a sighted user notice a problem, but that is not enough. People using screen readers, magnification, or alternative input methods need the same information in a way that is exposed to the interface and announced appropriately.',
                        'The same applies to success messages. Seeing a green check is not the same as having the state communicated to the user in a meaningful, programmatic way.',
                    ],
                    'emphasis' => [
                        'An accessible interaction does not assume that everything goes right.',
                    ],
                ],
                [
                    'title' => 'Recovery and evidence',
                    'paragraphs' => [
                        'After the lab, students should contrast a technically visible error with a usable recovery path. The best interfaces do not just say “something is wrong.” They explain what is wrong, locate it, keep the task moving, and help the user decide what to do next.',
                        'This connects directly back to the module question: what does an interface owe the user when the user does something unexpected?',
                    ],
                    'actions' => [
                        ['label' => 'Open Challenge 05 →', 'route' => 'modules.challenge', 'params' => ['module' => 5]],
                    ],
                ],
            ],
            'resources' => [
                ['label' => 'Understanding Error Identification', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/error-identification.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'Understanding Error Suggestion', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/error-suggestion.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'Understanding Error Prevention', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/error-prevention-legal-financial-data.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'Understanding Status Messages', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/status-messages.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'ARIA Authoring Practices: Alert and Message Patterns', 'href' => 'https://www.w3.org/WAI/ARIA/apg/patterns/alert/', 'meta' => 'W3C WAI'],
            ],
        ],
    ],
    'challenge' => [
        'label' => 'CHALLENGE 05',
        'title' => 'When the Interface Fails the User',
        'status' => 'upcoming',
        'summary' => 'Analyze a realistic task-oriented interface with a combination of form, validation, feedback, and recovery problems, then produce a focused remediation brief.',
        'question' => 'What does an interface owe the user when the user does something unexpected?',
        'problem_title' => 'The Interface',
        'problem' => 'Each team receives a realistic interface containing a combination of form, validation, recovery, and status problems. The goal is not to count every defect. The goal is to identify meaningful barriers, evaluate what matters most, and document a justified remediation plan. Teams must distinguish among a WCAG-supported accessibility failure, a broader accessibility/usability concern, and a design preference. That distinction matters because the evidence and the remedy are different in each case.',
        'team_assignment' => 'Each team receives one form-heavy task scenario and evaluates how well the interface communicates expectations, recognises errors, and supports recovery without destroying user confidence or work.',
        'investigation' => [
            'Complete the assigned task as written.',
            'Look for instruction, errors, field relationships, feedback, and recovery problems.',
            'Document each significant barrier using the evidence pattern: Barrier → affected interaction/user → evidence → proposed remediation → method of verification.',
            'Prioritize findings based on severity, impact, and the quality of the remediation path.',
            'Distinguish among a WCAG-supported accessibility failure, a broader accessibility/usability concern, and a design preference.',
        ],
        'investigation_note' => 'Barrier → affected interaction/user → evidence → proposed remediation → method of verification',
        'teams' => [
            ['team' => 'Cyan Triangle', 'shape' => 'triangle', 'tone' => 'cyan', 'description' => 'Student profile setup with required account information, contact details, and a validation step before the account is marked active.'],
            ['team' => 'Amber Circle', 'shape' => 'circle', 'tone' => 'amber', 'description' => 'Course enrollment workflow with a multi-step form, format expectations, and a confirmation step for a recommended class.'],
            ['team' => 'Violet Square', 'shape' => 'square', 'tone' => 'violet', 'description' => 'Volunteer sign-up form with schedule choices, required fields, and several user-recovery moments after invalid submission.'],
        ],
        'deliverable' => [
            'summary' => 'Submit one concise remediation brief, roughly 1–2 pages, that prioritizes meaningful barriers and explains how each issue should be addressed.',
            'items' => [
                ['title' => 'What happens', 'description' => 'Describe the interaction failure and the specific user experience problem it creates.'],
                ['title' => 'Why it matters', 'description' => 'Explain who is affected, what task is blocked, and why the barrier is consequential.'],
                ['title' => 'Supporting evidence', 'description' => 'Reference direct testing, device or assistive technology observations, and authoritative W3C or WCAG guidance where relevant.'],
                ['title' => 'Proposed remediation', 'description' => 'Explain the change that would reduce the barrier and improve recovery without creating a new one.'],
                ['title' => 'Verification plan', 'description' => 'Describe how the team would verify that the remediation works in a realistic use case.'],
            ],
        ],
        'format_note' => 'Submit one concise team package through HuskyCT/Blackboard. No formal redesign artifact is required, but the brief should show evidence, prioritized judgment, and a clear distinction among WCAG-supported accessibility failure, broader accessibility/usability concern, and design preference.',
        'evaluation_criteria' => [
            ['title' => 'Investigation', 'points' => 3, 'description' => 'Did the team identify meaningful barriers across form completion, validation, feedback, and recovery?'],
            ['title' => 'Evidence and judgment', 'points' => 3, 'description' => 'Did the team demonstrate careful observation, distinguish among failure types, and support claims with direct evidence and relevant W3C/WAI guidance?'],
            ['title' => 'Remediation', 'points' => 2, 'description' => 'Did the team propose practical, recovery-oriented fixes that address the root problem rather than merely restating the issue?'],
            ['title' => 'Communication', 'points' => 2, 'description' => 'Is the brief concise, prioritized, and clear enough for a reader to evaluate the barriers and recommendations quickly?'],
        ],
        'evaluation_total' => 10,
        'class_work_section_title' => 'Challenge 05 Class Work',
        'class_work_section_description' => 'Team submissions for When the Interface Fails the User will be archived here after the challenge cycle.',
        'class_work_empty_message' => 'The three Challenge 05 team briefs will appear here after the challenge cycle.',
        'class_work' => [
            ['team' => 'Cyan Triangle', 'shape' => 'triangle', 'tone' => 'cyan', 'title' => null, 'description' => null, 'artifact' => null],
            ['team' => 'Amber Circle', 'shape' => 'circle', 'tone' => 'amber', 'title' => null, 'description' => null, 'artifact' => null],
            ['team' => 'Violet Square', 'shape' => 'square', 'tone' => 'violet', 'title' => null, 'description' => null, 'artifact' => null],
        ],
        'due' => 'Due: TBD after review of this module content',
        'resource_collections' => [
            [
                'title' => 'Form and instruction foundations',
                'description' => 'Start with what the user is expected to do before the system tries to validate anything.',
                'resources' => [
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Labels or Instructions', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/labels-or-instructions.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Name, Role, Value', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/name-role-value.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Input Purpose', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/input-purposes.html'],
                    ['source' => 'W3C WAI', 'label' => 'Forms Tutorial', 'href' => 'https://www.w3.org/WAI/tutorials/forms/'],
                ],
            ],
            [
                'title' => 'Validation, errors, and recovery',
                'description' => 'Use the guidance that focuses on error communication, error prevention, recovery, and status messaging.',
                'resources' => [
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Error Identification', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/error-identification.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Error Suggestion', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/error-suggestion.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Error Prevention', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/error-prevention-legal-financial-data.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Status Messages', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/status-messages.html'],
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
