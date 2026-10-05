<?php

return [
    'label' => 'MODULE 05',
    'title' => 'What Is the Interface Actually Made Of?',
    'central_question' => 'When two interfaces look the same, what makes them different to the browser and assistive technology?',
    'overview' => 'This module begins with a foundational question: a page can look polished but still communicate very different things to the browser, the accessibility tree, and the user. Students compare visual presentation, semantic structure, native controls, and browser accessibility information before they test with a screen reader in the next session.',
    'status' => 'current',
    'sessions' => [
        10 => [
            'label' => 'SESSION 10',
            'title' => 'What Is the Interface Actually Made Of?',
            'status' => 'current',
            'summary' => 'Introduce semantic structure, native controls, and form communication, then reserve the final part of class for students to begin the individual Challenge 05 review.',
            'question' => 'When two interfaces look the same, what makes them different to the browser and assistive technology?',
            'overview' => 'This session introduces the idea that a webpage has both a visual presentation and an underlying semantic structure communicated by HTML and browser accessibility information. Students inspect structure, controls, and forms briefly, then begin the individual Challenge 05 review with a concrete first pass before they return to the same experience with a screen reader in the next class.',
            'sections' => [
                [
                    'title' => 'Look at the page, then look underneath',
                    'paragraphs' => [
                        'A page can look polished while still hiding meaning from the browser. CSS can make a block look like a heading, a button can be styled to look like a link, and a form control can appear clear while still lacking the semantics that assistive technology needs.',
                        'Use the Structure demo to compare what appears to be a heading with what the markup actually says. Ask: What appears to be a heading? What does the markup say is a heading? What order does the document actually contain?',
                    ],
                    'emphasis' => [
                        'CSS controls appearance. HTML communicates structure.',
                    ],
                    'bullets_intro' => 'Keep the comparison concrete:',
                    'bullets' => [
                        'visually obvious headings versus actual HTML headings',
                        'page regions and landmarks versus visual grouping',
                        'source order versus the apparent visual order',
                    ],
                    'actions' => [
                        ['label' => 'Structure demo', 'route' => 'experiences.module05.structure-demo', 'new_tab' => true],
                    ],
                ],
                [
                    'title' => 'Controls matter too',
                    'paragraphs' => [
                        'The same principle applies to interaction. A link, a button, a checkbox, and a text field are not just decorative shapes. They carry information about purpose, behavior, and state that the browser and assistive technology can expose.',
                        'Use the Controls demo to show link versus button, native control versus clickable generic element, accessible name, and state. The goal is practical: students should see that name, role, and state are information the browser can share, not a separate ARIA-only topic that needs a long lecture.',
                    ],
                    'emphasis' => [
                        'Native controls already know how to behave.',
                    ],
                    'bullets_intro' => 'Focus on a few practical observations:',
                    'bullets' => [
                        'Is this a link or a button?',
                        'Does the control have an accessible name?',
                        'What state does the user need to know?',
                    ],
                    'actions' => [
                        ['label' => 'Controls demo', 'route' => 'experiences.module05.controls-demo', 'new_tab' => true],
                    ],
                ],
                [
                    'title' => 'Forms require labels, instructions, and recovery',
                    'paragraphs' => [
                        'Forms are the clearest place to see how structure, meaning, and error recovery work together. Students need labels, helpful instructions, correct grouping, clear required information, and an error message that helps the user recover without losing valid work.',
                        'Use the Workshop Registration form demo to demonstrate the core idea: a form should communicate what is required, how to answer, and what the interface expects before the user is forced to guess. Do one intentional mistake and watch the recovery path.',
                    ],
                    'emphasis' => [
                        'The goal is not a full error-handling lecture. It is a short, concrete look at how good form communication reduces user cost and protects work already done.',
                    ],
                    'bullets_intro' => 'Make the discussion explicit:',
                    'bullets' => [
                        'labels and instructions must be present and persistent',
                        'grouping helps communicate relationships',
                        'required information should be clear',
                        'errors should identify the problem and preserve valid work',
                    ],
                    'actions' => [
                        ['label' => 'Workshop Registration form demo', 'route' => 'experiences.module05.form-demo', 'new_tab' => true],
                    ],
                ],
                [
                    'title' => 'Challenge 05: Accessibility Review',
                    'paragraphs' => [
                        'Now students have enough methods to begin the review, but not enough to finish it. The challenge is cumulative and individual: they will start the review in Session 10, continue after Session 11 once they have practiced using a screen reader, and then return to the same experience with a new testing lens.',
                        'This is not a single tool check and not a team assignment. Students should begin by understanding the task, testing the experience in multiple ways, and documenting what they observe before they rely on automated or AI-assisted output.',
                    ],
                    'actions' => [
                        ['label' => 'Open Challenge 05 →', 'route' => 'modules.challenge', 'params' => ['module' => 5]],
                    ],
                ],
                [
                    'title' => 'Start Your Review',
                    'paragraphs' => [
                        'Use the design futures experience as a real review target and keep the first pass methodical rather than exhaustive.',
                    ],
                    'ordered_intro' => 'Follow this first-pass procedure:',
                    'ordered' => [
                        'Complete the experience normally. Open Design Futures 2026, learn about the event, choose a workshop, and move through the registration flow. Do not run WAVE yet. Your first job is to understand the task.',
                        'Start your Review Record. Record normal use, browser/device, and one meaningful observation. Use the Challenge 05 Review Record format.',
                        'Make a visual/media pass. Look at contrast, color, meaningful images, video/media, and enlargement or reflow where relevant. Use tools only when they help answer a specific question.',
                        'Put the pointer away. Try the important task again using the keyboard. Pay attention to what you can reach, what you can activate, where focus is, and whether any interaction assumes a pointer.',
                        'Make a mistake. Use the registration form again. Intentionally enter or omit something incorrectly. Observe what the form expected, how the error is communicated, what is preserved, and how you recover.',
                        'Record candidate findings. Before class ends, record at least two or three candidate observations. These do not need to become final findings. For each, write only what happened and what you need to investigate further. Do not require complete WCAG citations during this first pass.',
                    ],
                    'challenge_reference' => [
                        'intro' => 'Starting in Session 10?',
                        'title' => 'Challenge 05: Accessibility Review',
                        'description' => 'Complete Steps 1–5 of the testing process first. Screen-reader testing follows Session 11.',
                        'link_label' => 'Open the challenge',
                    ],
                    'note' => 'The purpose is to begin the investigation, not to finish it.',
                ],
                [
                    'title' => 'Not yet',
                    'paragraphs' => [
                        'Do not worry about completing the screen-reader portion today. We will learn and practice screen-reader navigation in Session 11. You will then return to Design Futures and add that testing to your review.',
                        'Do not begin by dumping an automated-tool report into your assignment. Students should understand the task before automated testing begins.',
                    ],
                    'emphasis' => [
                        'You are not expected to perform screen-reader testing yet.',
                    ],
                ],
                [
                    'title' => 'Next: Test What You Cannot See',
                    'paragraphs' => [
                        'Next class you will choose a screen reader, learn enough of its navigation model to use it deliberately, practice on our demo pages, and then return to Design Futures for the screen-reader portion of your review.',
                    ],
                    'actions' => [
                        ['label' => 'UConn Accessibility Tools', 'href' => 'https://accessibility.its.uconn.edu/accessibility-tools/', 'new_tab' => true],
                        ['label' => 'Accessibility Bookmarklets', 'href' => 'https://accessibility-bookmarklets.org/', 'new_tab' => true],
                        ['label' => 'Open Field Guide →', 'route' => 'field-guide'],
                    ],
                ],
            ],
            'resources' => [
                ['label' => 'UConn Accessibility Tools', 'href' => 'https://accessibility.its.uconn.edu/accessibility-tools/', 'meta' => 'UConn'],
                ['label' => 'Accessibility Bookmarklets', 'href' => 'https://accessibility-bookmarklets.org/', 'meta' => 'Accessibility Community'],
                ['label' => 'WebAIM NVDA Guide', 'href' => 'https://webaim.org/articles/nvda/', 'meta' => 'WebAIM'],
                ['label' => 'WebAIM VoiceOver Guide', 'href' => 'https://webaim.org/articles/voiceover/', 'meta' => 'WebAIM'],
                ['label' => 'Understanding Name, Role, Value', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/name-role-value.html', 'meta' => 'W3C / WCAG 2.2'],
                ['label' => 'Understanding Labels or Instructions', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/labels-or-instructions.html', 'meta' => 'W3C / WCAG 2.2'],
            ],
        ],
        11 => [
            'label' => 'SESSION 11',
            'title' => 'Can You Use It Without the Visual Interface?',
            'status' => 'upcoming',
            'summary' => 'Choose a screen reader, revisit the Structure, Controls, and Form demo pages, and add a screen-reader pass to the beginning of the Challenge 05 review.',
            'question' => 'What does the interface communicate when you navigate it primarily through a screen reader?',
            'overview' => 'This session reuses the same three demo pages from Session 10 and tests them again with a different method. Students choose a screen reader, learn only the basic commands they need, and then complete three guided passes before returning to Design Futures and recording the new observations they gather.',
            'sections' => [
                [
                    'title' => 'Today, listen to the interface',
                    'paragraphs' => [
                        'Last class, we looked at what the browser knows about a page. Today, use a screen reader to hear what that information becomes in practice.',
                        'Next: Listen to It',
                    ],
                    'emphasis' => [
                        'Pick the screen reader that matches your computer. Keep its instructions open while you work.',
                    ],
                    'actions' => [
                        ['label' => 'Review Session 10 →', 'route' => 'modules.session', 'params' => ['module' => 5, 'session' => 10]],
                    ],
                ],
                [
                    'title' => 'Pick your screen reader',
                    'paragraphs' => [
                        'Use the primary option that matches your computer and keep the user guide open while you work.',
                    ],
                    'bullets_intro' => 'Primary options:',
                    'bullets' => [
                        'Windows: NVDA — install it, turn it on, and keep the NVDA guide open.',
                        'macOS: VoiceOver — turn it on in Accessibility settings and keep the VoiceOver guide open.',
                        'Linux: Orca — enable it in the system settings and keep the Orca guide open.',
                        'Optional Windows reference: JAWS is available, but NVDA is the main classroom path.',
                    ],
                    'actions' => [
                        ['label' => 'NVDA Guide', 'href' => 'https://webaim.org/articles/nvda/', 'new_tab' => true],
                        ['label' => 'VoiceOver Guide', 'href' => 'https://webaim.org/articles/voiceover/', 'new_tab' => true],
                        ['label' => 'Field Guide', 'route' => 'field-guide'],
                    ],
                ],
                [
                    'title' => 'Learn five things',
                    'paragraphs' => [
                        'Use the actual documentation for your chosen screen reader and learn only the pieces you need for a web page.',
                    ],
                    'ordered_intro' => 'Find out how to:',
                    'ordered' => [
                        'move forward and backward through content',
                        'move by heading',
                        'find links or buttons',
                        'find form controls',
                        'activate a control',
                    ],
                    'emphasis' => [
                        'You do not need to memorize the commands. Keep the instructions open.',
                        'You are learning enough to test a webpage, not trying to become an expert screen-reader user in one class.',
                    ],
                ],
                [
                    'title' => 'Pass 1: Find your way around',
                    'paragraphs' => [
                        'Open the Structure demo and use the screen reader to navigate it.',
                    ],
                    'ordered_intro' => 'Task:',
                    'ordered' => [
                        'Open the Structure page.',
                        'Use the screen reader to find the page title.',
                        'Move through the headings.',
                        'Find the navigation.',
                        'Find the main content.',
                        'Find one specific link without reading the entire page line by line.',
                    ],
                    'bullets_intro' => 'Ask:',
                    'bullets' => [
                        'Can you understand the page structure from its headings?',
                        'Can you find major regions quickly?',
                        'Does the order you hear match the order you expected visually?',
                        'What disappears when visual styling is no longer doing the organizing?',
                    ],
                    'actions' => [
                        ['label' => 'Structure demo', 'route' => 'experiences.module05.structure-demo', 'new_tab' => true],
                    ],
                    'callout' => [
                        'title' => 'A screen-reader user does not have to listen to every word from the top.',
                        'body' => 'Structure provides shortcuts through the page.',
                    ],
                ],
                [
                    'title' => 'Pass 2: What is this thing?',
                    'paragraphs' => [
                        'Open the Controls demo and navigate it without pointing with the mouse.',
                    ],
                    'ordered_intro' => 'Task:',
                    'ordered' => [
                        'Open the Controls page.',
                        'Navigate through the interactive controls without pointing with the mouse.',
                        'For each control, listen for the name, type or role, and state when relevant.',
                        'Find the link, the native button, the custom control, the icon-only control, and the expand or collapse control.',
                    ],
                    'bullets_intro' => 'Ask:',
                    'bullets' => [
                        'What does the screen reader call each control?',
                        'Does the name tell you what it does?',
                        'Does the announced control type match how it behaves?',
                        'If something changes state, can you tell?',
                    ],
                    'emphasis' => [
                        'Name, role, and state are part of the interface.',
                    ],
                    'actions' => [
                        ['label' => 'Controls demo', 'route' => 'experiences.module05.controls-demo', 'new_tab' => true],
                    ],
                ],
                [
                    'title' => 'Pass 3: Complete the form',
                    'paragraphs' => [
                        'Use the same Workshop Registration form from Session 10. The goal is to test it through a different interface, not to re-teach the whole form lesson.',
                    ],
                    'ordered_intro' => 'Task:',
                    'ordered' => [
                        'Find Full name.',
                        'Find Email.',
                        'Find Phone.',
                        'Navigate the Workshop choice group.',
                        'Enter several values.',
                        'Make one mistake intentionally.',
                        'Submit.',
                        'Correct the problem.',
                        'Submit successfully.',
                    ],
                    'bullets_intro' => 'Listen for:',
                    'bullets' => [
                        'field labels',
                        'required state',
                        'instructions',
                        'group context',
                        'error messages',
                        'whether the relevant control is understandable after an error',
                    ],
                    'actions' => [
                        ['label' => 'Workshop Registration form demo', 'route' => 'experiences.module05.form-demo', 'new_tab' => true],
                    ],
                ],
                [
                    'title' => 'Try one task without relying on the screen',
                    'paragraphs' => [
                        'For two minutes, stop relying on the visual interface. Look away, dim the display, or simply commit to using only screen-reader navigation.',
                        'This is a testing constraint, not an attempt to simulate blindness.',
                    ],
                    'emphasis' => [
                        'Find the Workshop Registration form and select a workshop.',
                    ],
                ],
                [
                    'title' => 'What did the screen reader reveal?',
                    'bullets_intro' => 'Use these prompts:',
                    'bullets' => [
                        'What was easy to find?',
                        'What depended on good HTML structure?',
                        'What sounded different from what you saw?',
                        'What information was missing or misleading?',
                        'Did anything you thought was fine in Session 10 look different after testing it this way?',
                    ],
                ],
                [
                    'title' => 'Return to your review',
                    'paragraphs' => [
                        'Reopen Design Futures 2026 and add the screen-reader pass to your Challenge 05 review.',
                    ],
                    'ordered_intro' => 'Before class ends:',
                    'ordered' => [
                        'Open your Challenge 05 Review Record.',
                        'Add your screen-reader setup: screen reader, operating system, browser, and what you tested.',
                        'Navigate the Design Futures experience by headings and controls.',
                        'Test the registration form.',
                        'Record at least two new observations from the screen-reader pass.',
                        'Revisit one observation from Session 10 and decide whether your conclusion changed.',
                    ],
                    'note' => 'Students are gathering and refining evidence. Do not require final findings yet.',
                    'actions' => [
                        ['label' => 'Open Challenge 05 →', 'route' => 'modules.challenge', 'params' => ['module' => 5]],
                        ['label' => 'Screen Reader Guides →', 'route' => 'field-guide'],
                    ],
                ],
            ],
            'resources' => [
                ['label' => 'NVDA Guide', 'href' => 'https://webaim.org/articles/nvda/', 'meta' => 'WebAIM'],
                ['label' => 'VoiceOver Guide', 'href' => 'https://webaim.org/articles/voiceover/', 'meta' => 'WebAIM'],
                ['label' => 'UConn Accessibility Tools', 'href' => 'https://accessibility.its.uconn.edu/accessibility-tools/', 'meta' => 'UConn'],
                ['label' => 'Accessibility Bookmarklets', 'href' => 'https://accessibility-bookmarklets.org/', 'meta' => 'Accessibility Community'],
                ['label' => 'Field Guide', 'route' => 'field-guide'],
                ['label' => 'Challenge 05', 'route' => 'modules.challenge', 'params' => ['module' => 5]],
            ],
        ],
    ],
    'challenge' => [
        'label' => 'CHALLENGE 05',
        'title' => 'Challenge 05: Accessibility Review',
        'status' => 'current',
        'summary' => 'Conduct an accessibility review of the Design Futures 2026 experience using the methods practiced across Modules 01–05. This is a substantial cumulative individual checkpoint in which students test deliberately, identify meaningful findings, support them with evidence, and decide what matters most.',
        'question' => 'What can you establish about the accessibility of an interactive experience, and what evidence supports your conclusions?',
        'problem_title' => 'Design Futures 2026',
        'problem' => 'Learn about the event, choose a workshop, complete the registration, and move through the review and confirmation process. Test the experience more than once and in more than one way, then document the strongest eight findings supported by evidence.',
        'assignment_title' => 'Individual Challenge · 20 points',
        'team_assignment' => 'Challenge 05 is not a team challenge, not a midterm, and not a single-checker exercise. It is a substantial cumulative individual checkpoint covering Modules 01–05. Students begin the review during Session 10 and continue it after Session 11, once they have practiced using a screen reader. The goal is not to find every possible problem. The goal is to test deliberately, identify meaningful findings, support them with evidence, and decide what matters most.',
        'experience_under_review' => [
            'title' => 'Experience Under Review',
            'name' => 'Design Futures 2026',
            'link' => ['label' => 'Open the experience ->', 'route' => 'experiences.module05.design-futures-registration', 'new_tab' => true],
        ],
        'investigation' => [
            'First pass: use it normally and understand the task, the content, and the choices the user makes.',
            'Visual review: evaluate contrast, use of color, visual hierarchy, and any relevant enlargement or reflow behavior.',
            'Media review: evaluate the meaningful image, diagram, and video information using the Module 03 question about what is lost without the relevant perception path.',
            'Keyboard review: complete the important interactions without a mouse or trackpad and evaluate reachability, activation, focus, and ordering.',
            'Forms and recovery: complete the registration again, intentionally make at least one mistake, and observe labels, instructions, grouping, required information, error messages, correction, preserved work, and review before submission.',
            'Screen-reader review: after the Session 11 screen-reader work, return to the experience and inspect page structure, controls, form fields, names, instructions, and status changes.',
            'Tool-assisted inspection: use at least one appropriate supporting tool such as WAVE, a browser accessibility inspector, or an accessibility bookmarklet.',
            'Verify your claims: reproduce the issue, decide whether it is an accessibility issue, find authoritative evidence, and propose a meaningful remediation.',
        ],
        'investigation_note' => 'Automated output is not proof that an experience is accessible, and AI output is not evidence. Students remain responsible for reproducing findings, checking authority, and making their own judgment.',
        'deliverable' => [
            'summary' => 'Submit one individual PDF through HuskyCT. Target length: 5–7 pages. Screenshots may make the submission somewhat longer. The report includes a review record, eight findings, and an overall judgment section.',
            'items' => [
                ['title' => 'Section 1: Review Record', 'description' => 'Provide a concise table with Method, Tool / setup, What I tested, and One useful observation for normal use, visual review, media review, keyboard review, forms/recovery, screen-reader review, and tool-assisted inspection.'],
                ['title' => 'Section 2: Eight Findings', 'description' => 'Submit the eight strongest findings, each with observation, impact, evidence, recommendation, and verification. The findings must demonstrate breadth across Modules 01–05.'],
                ['title' => 'Section 3: Overall Judgment', 'description' => 'Write a brief overall assessment, rank the top three priorities, and explain one thing that is not confidently an accessibility failure.'],
            ],
        ],
        'format_note' => 'This challenge is completed individually and submitted through HuskyCT/Blackboard. AI output is not evidence. For each finding, support the claim with direct testing and authoritative evidence rather than a single checker result or a guessed issue.',
        'future_note' => [
            'title' => 'Starting in Session 10?',
            'body' => 'Complete Steps 1–5 of the testing process first. Screen-reader testing follows Session 11.',
        ],
        'evaluation_criteria' => [
            ['title' => 'Review process', 'points' => 4, 'description' => 'The student used multiple required testing methods and showed deliberate review rather than a single-checker pass.'],
            ['title' => 'Findings', 'points' => 8, 'description' => 'The student submitted eight substantially accurate, meaningful, and reproducible findings and avoided invented, duplicate, or unsupported problems.'],
            ['title' => 'Evidence, recommendations, and verification', 'points' => 4, 'description' => 'Evidence actually supports the claim, the recommendation addresses the issue, and the verification method would retest the corrected version meaningfully.'],
            ['title' => 'Judgment and prioritization', 'points' => 3, 'description' => 'The student provided a clear overall assessment, ranked the top three priorities, and distinguished accessibility failures from issues they merely dislike.'],
            ['title' => 'Communication and AI Use Note', 'points' => 1, 'description' => 'The brief is clear, concise, and includes a brief AI Use Note that keeps the rule that AI output is not evidence.'],
        ],
        'evaluation_total' => 20,
        'class_work_section_title' => 'Challenge 05 Class Work',
        'class_work_section_description' => 'Use the review process below as the class-ready guide for Challenge 05.',
        'class_work_empty_message' => 'The Challenge 05 brief will appear here after the challenge cycle.',
        'class_work' => [],
        'due' => 'Due: Submitted individually through HuskyCT/Blackboard.',
        'resource_collections' => [
            [
                'title' => 'Module 01–05 foundations',
                'description' => 'Return to the core ideas that help determine the relevant standard, understand whether information is perceivable and operable, and evaluate how a user recovers from a problem or hidden state change.',
                'resources' => [
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Labels or Instructions', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/labels-or-instructions.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Error Identification', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/error-identification.html'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Status Messages', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/status-messages.html'],
                    ['source' => 'UConn / Institutional Accessibility Policies', 'label' => 'Accessibility policy and institutional guidance', 'href' => '#'],
                ],
            ],
            [
                'title' => 'Review methods and evidence',
                'description' => 'Use the tools and methods that let students investigate support, test with multiple approaches, and verify that a remediation actually resolves the barrier.',
                'resources' => [
                    ['source' => 'W3C WAI', 'label' => 'W3C WAI Easy Checks', 'href' => 'https://www.w3.org/WAI/test-evaluate/easy-checks/'],
                    ['source' => 'WebAIM', 'label' => 'WebAIM Quick Reference', 'href' => 'https://webaim.org/standards/wcag/checklist'],
                    ['source' => 'W3C / WCAG 2.2', 'label' => 'Understanding Name, Role, Value', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/name-role-value.html'],
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
