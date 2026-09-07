<?php

/**
 * Module 02 - canonical content source.
 */
return [
    'label' => 'MODULE 02',
    'title' => 'Can You See What Matters?',
    'central_question' => 'Can users perceive and understand the information an interface is trying to communicate?',
    'overview' => 'Digital interfaces communicate through color, contrast, size, position, spacing, and visual hierarchy. This module asks what happens when users cannot perceive those signals in the way the designer expected.',
    'status' => 'current',

    'sessions' => [
        3 => [
            'label' => 'SESSION 03',
            'title' => 'What Are You Relying On?',
            'status' => 'current',
            'summary' => 'Notice the visual assumptions in a new interface, then compare your judgment with evidence from WAVE and WCAG.',
            'question' => 'What information disappears when users cannot perceive an interface the way its designer expects?',
            'overview' => 'Module 01 gave us better ways to support an accessibility claim. Now we will apply that framework to a specific problem: visual information that depends on being perceived in one expected way.',
            'sections' => [
                [
                    'title' => 'Look Back at Challenge 01',
                    'paragraphs' => [
                        'Before we move on, we\'ll compare the three Challenge 01 briefs and look at what each source of authority allowed us to say.',
                    ],
                    'emphasis' => ['How do you know?'],
                    'ordered' => [
                        'Where did law, WCAG, and UConn policy agree?',
                        'Where were they answering different questions?',
                        'Which conclusions were supported most convincingly?',
                        'What could none of the three sources establish by itself?',
                    ],
                    'actions' => [
                        ['label' => 'Open the Challenge 01 class-work archive ->', 'href' => '/modules/01#module-class-work'],
                    ],
                ],
                [
                    'title' => 'Can You See What Matters?',
                    'paragraphs' => [
                        'We now have better ways to support an accessibility claim. Let\'s apply them to one assumption digital interfaces make constantly: that users will perceive the visual information a designer expects them to perceive.',
                    ],
                    'emphasis' => ['Can users perceive and understand the information an interface is trying to communicate?'],
                ],
                [
                    'title' => 'First Look',
                    'paragraphs' => [
                        'Spend a few minutes using the experience as though you were trying to find an appropriate place to study.',
                        'Pay attention to what information the interface expects you to notice.',
                    ],
                    'emphasis' => ['What seems important, and how is the interface communicating it?'],
                    'placeholder' => [
                        'title' => 'Experience Under Review',
                        'body' => 'Campus Study Space Finder',
                        'cta' => ['label' => 'Open Campus Study Space Finder ->', 'route' => 'experiences.campus-study-space-finder', 'new_tab' => true],
                    ],
                    'note' => 'Do not start with WAVE, DevTools, WCAG, or a contrast checker. Begin with your own judgment about what the interface is asking you to notice.',
                ],
                [
                    'title' => 'Try a Tool',
                    'paragraphs' => [
                        'We\'ve already made accessibility judgments and begun using standards as evidence. Now let\'s see what an automated evaluation tool can actually tell us.',
                    ],
                    'subheading' => 'WAVE Browser Extension - WebAIM',
                    'actions' => [
                        ['label' => 'Open WAVE Browser Extensions - WebAIM ->', 'href' => 'https://wave.webaim.org/extension/', 'new_tab' => true],
                    ],
                    'ordered' => [
                        'Install or open the WAVE browser extension.',
                        'Run it on today\'s experience.',
                        'Look at what it flags and what information it exposes.',
                        'Compare those findings with what your team noticed before using WAVE.',
                    ],
                    'emphasis' => ['Did WAVE actually determine whether this experience is accessible?'],
                    'paragraphs_after' => ['Treat the results as evidence to investigate, not as a verdict.'],
                ],
                [
                    'title' => 'Challenge 02',
                    'paragraphs' => [
                        'You have now looked at the same interface with your own judgment, an automated tool, and the beginnings of a standards-based framework.',
                        'Challenge 02 asks your team to investigate one part of the visual problem more carefully - and improve it.',
                    ],
                    'challenge_reference' => [
                        'title' => 'Can You See What Matters?',
                        'link_label' => 'Open Challenge 02 ->',
                    ],
                    'closing_bullets' => [
                        'choose your team lens;',
                        'record an important barrier and the evidence behind it;',
                        'make a plan for a redesign you can test again in Session 04.',
                    ],
                ],
            ],
            'resources' => [
                ['label' => 'WAVE Browser Extensions', 'href' => 'https://wave.webaim.org/extension/', 'meta' => 'WebAIM'],
                ['label' => 'Accessibility Toolkit', 'route' => 'field-guide.entry', 'params' => ['entry' => 'toolkit'], 'meta' => 'Course reference'],
            ],
        ],
        4 => [
            'label' => 'SESSION 04',
            'title' => 'Can You Prove the Fix?',
            'status' => 'upcoming',
            'summary' => 'Test a visual claim, redesign the relevant part of the experience, and test the proposed improvement again.',
            'question' => 'How do we know a visual redesign actually improves access?',
            'overview' => 'Today is applied work. Teams will compare methods, revise a visual part of the shared experience, and gather evidence that the redesign is actually better.',
            'sections' => [
                [
                    'title' => 'Test the View',
                    'paragraphs' => ['Choose the methods that fit your team\'s lens. You do not need to use every method.'],
                    'bullets' => [
                        'Measure a specific foreground and background pair.',
                        'Try browser zoom or text enlargement.',
                        'Use a narrow effective viewport to check reflow.',
                        'Check whether color or another visual cue carries meaning.',
                        'Use WAVE where it adds useful evidence.',
                    ],
                ],
                [
                    'title' => 'Compare Methods',
                    'paragraphs' => ['Briefly exchange what your team is testing and how you know whether something fails or improves. This is informal cross-team learning, not a formal presentation.'],
                ],
                [
                    'title' => 'Redesign',
                    'paragraphs' => ['Use most of the class as studio time. Revise the relevant part of the shared experience or produce your own redesign artifact in Figma, an annotated mockup, HTML/CSS, or another suitable medium. Advanced coding is not required.'],
                ],
                [
                    'title' => 'Test Again',
                    'paragraphs' => ['Test at least one important claim about your proposed solution.'],
                    'emphasis' => ['How do you know the redesign is actually better?'],
                ],
                [
                    'title' => 'Finish Challenge 02',
                    'paragraphs' => ['Use the remainder of class to finish the Challenge 02 deliverable. The Challenge page remains canonical for submission instructions, rubric, resources, AI expectations, and due information.'],
                ],
            ],
        ],
    ],

    'challenge' => [
        'label' => 'CHALLENGE 02',
        'title' => 'Can You See What Matters?',
        'status' => 'current',
        'summary' => 'Investigate one visual-accessibility problem in the shared experience, redesign the relevant part, and test whether the change improves access.',
        'question' => 'What evidence shows that a visual redesign improves access?',
        'problem' => 'The Campus Study Space Finder communicates important information through visual presentation. Your team will investigate one part of that communication, determine what evidence supports its judgment, and improve the relevant part of the experience.',
        'experience_under_review' => [
            'name' => 'Campus Study Space Finder',
            'link' => ['label' => 'Open the experience ->', 'route' => 'experiences.campus-study-space-finder', 'new_tab' => true],
        ],
        'teams' => [
            [
                'team' => 'Cyan Triangle', 'shape' => 'triangle', 'tone' => 'cyan', 'lens' => 'Color & Contrast',
                'description' => 'Investigate when color choices or insufficient contrast prevent users from perceiving important information.',
                'questions' => [
                    'Which text or interface colors need a closer look?',
                    'Is any meaningful availability or status conveyed by color alone?',
                    'Which WCAG evidence applies to the specific visual claim?',
                    'What measurement or observation supports the finding?',
                    'What redesign communicates the same information more clearly?',
                ],
            ],
            [
                'team' => 'Amber Circle', 'shape' => 'circle', 'tone' => 'amber', 'lens' => 'Text, Scale & Reflow',
                'description' => 'Investigate what happens when users need content to become larger or fit a different viewport.',
                'questions' => [
                    'What changes when text is enlarged or the page is viewed at 200% zoom?',
                    'Does content reflow without clipping, overlap, or loss of functionality?',
                    'Which parts are responsive-design preferences, and which are accessibility requirements?',
                    'What evidence supports your conclusion?',
                    'What redesign preserves the task at a different scale?',
                ],
            ],
            [
                'team' => 'Violet Square', 'shape' => 'square', 'tone' => 'violet', 'lens' => 'Visual Cues & Meaning',
                'description' => 'Investigate what information depends on color, shape, position, size, or component boundaries.',
                'questions' => [
                    'What status, selection, or distinction depends on a visual characteristic?',
                    'Is another perceivable cue available, or would a user need to infer the meaning?',
                    'Where is non-text contrast relevant to the finding?',
                    'What test or observation supports your judgment?',
                    'How could the redesign preserve the cue while making its meaning clearer?',
                ],
            ],
        ],
        'deliverable' => [
            'summary' => 'Create one clear team package through HuskyCT/Blackboard. Use an appropriate medium for the redesign artifact.',
            'items' => [
                ['title' => 'Barriers', 'description' => 'Record the important barriers your team found.'],
                ['title' => 'Evidence', 'description' => 'Support the findings with authoritative sources, measurements, observations, or testing.'],
                ['title' => 'Redesign', 'description' => 'Create a redesigned version of the relevant part of the experience in Figma, an annotated mockup, HTML/CSS, an image/design artifact, or another suitable prototype.'],
                ['title' => 'Why It Is Better', 'description' => 'Explain what changed and why the redesign improves access.'],
                ['title' => 'Re-test', 'description' => 'Where practical, include evidence from testing at least one important claim about the redesign.'],
                ['title' => 'AI Use Note', 'description' => 'Identify any generative AI tools used and briefly explain how they contributed.'],
            ],
        ],
        'format_note' => 'Submit one clear package through HuskyCT/Blackboard. If the submission system requires one file, a PDF may contain the findings and screenshots or a link to the prototype, but a PDF is not the universal challenge format.',
        'evaluation_criteria' => [
            ['title' => 'Investigation', 'points' => 3, 'description' => 'Did the team investigate the important dimensions of its assigned problem?'],
            ['title' => 'Evidence', 'points' => 3, 'description' => 'Are important conclusions supported by authoritative sources, measurements, observations, or testing?'],
            ['title' => 'Judgment and Solution', 'points' => 2, 'description' => 'Did the team make a thoughtful redesign and distinguish what its evidence does and does not establish?'],
            ['title' => 'Communication', 'points' => 2, 'description' => 'Is the work concise, understandable, and useful to the class?'],
        ],
        'evaluation_total' => 10,
        'class_work' => [],
        'ai_note' => [
            'title' => 'AI output is not evidence.',
            'body' => 'AI may help your team research, interpret, organize, critique, or explore possible answers. Important claims must still be verified.',
        ],
        'due' => 'Due: EOD after Session 04',
        'resource_collections' => [
            [
                'title' => 'Authoritative starting points',
                'description' => 'Use these resources to investigate the claim that fits your team lens.',
                'resources' => [
                    ['source' => 'W3C', 'label' => 'WCAG 2.2 - Guideline 1.4: Distinguishable', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/distinguishable.html', 'description' => 'The guideline covering ways to make information easier to perceive and distinguish.'],
                    ['source' => 'W3C', 'label' => 'Understanding 1.4.1 Use of Color', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/use-of-color.html', 'description' => 'Guidance on communicating information without relying on color alone.'],
                    ['source' => 'W3C', 'label' => 'Understanding 1.4.3 Contrast (Minimum)', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/contrast-minimum.html', 'description' => 'Guidance on minimum contrast for text and images of text.'],
                    ['source' => 'W3C', 'label' => 'Understanding 1.4.4 Resize Text', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/resize-text.html', 'description' => 'Guidance on enlarging text without loss of content or functionality.'],
                    ['source' => 'W3C', 'label' => 'Understanding 1.4.10 Reflow', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/reflow.html', 'description' => 'Guidance on presenting content without two-dimensional scrolling at narrow widths.'],
                    ['source' => 'W3C', 'label' => 'Understanding 1.4.11 Non-text Contrast', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/non-text-contrast.html', 'description' => 'Guidance on contrast for meaningful controls and graphical objects.'],
                    ['source' => 'W3C', 'label' => 'How to Meet WCAG 2: Quick Reference', 'href' => 'https://www.w3.org/WAI/WCAG22/quickref/', 'description' => 'A familiar way to browse criteria and supporting guidance from Module 01.'],
                    ['source' => 'WebAIM', 'label' => 'WAVE Browser Extensions', 'href' => 'https://wave.webaim.org/extension/', 'description' => 'The official browser-extension resource for Chrome, Firefox, and Edge.'],
                    ['source' => 'WebAIM', 'label' => 'Contrast Checker', 'href' => 'https://webaim.org/resources/contrastchecker/', 'description' => 'A focused tool for measuring a specific foreground and background pair.'],
                ],
            ],
        ],
    ],
];
