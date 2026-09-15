<?php

return [
    'label' => 'MODULE 03',
    'title' => 'What Does This Media Say?',
    'central_question' => 'How should information conveyed through images, audio, video, and other media be made available in other forms?',
    'overview' => 'Images, charts, audio, and video often carry information that is not available anywhere else. This module asks what that information actually is and how to preserve it when someone cannot see or hear the original media. Challenge 03 brings the first three modules together as a study guide for Quiz 1.',
    'status' => 'current',
    'media_lab' => [
        [
            'title' => 'Photo of a city street with a bus stop',
            'type' => 'Image',
            'kind' => 'image',
            'src' => '/images/module-3-bus.png',
            'alt' => 'A city street scene with a bus stop, traffic, and a row of storefronts.',
            'context' => 'This photograph may be used in a neighborhood article or route guide. The key question is whether the image is simply atmospheric or whether it carries information that matters to the story.',
            'source' => 'Unsplash, used for class discussion. Source and licensing details should be verified on the original host before reuse in production.',
        ],
        [
            'title' => 'Decorative storefront illustration',
            'type' => 'Image',
            'kind' => 'image',
            'src' => '/images/module-3-store.png',
            'alt' => 'A warm, colorful storefront illustration with a striped awning and large windows.',
            'context' => 'This kind of image may exist purely for visual atmosphere. A description would likely add noise rather than meaningful information.',
            'source' => 'Unsplash, used for class discussion. Source and licensing details should be verified on the original host before reuse in production.',
        ],
        [
            'title' => 'Map with a highlighted route',
            'type' => 'Image',
            'kind' => 'image',
            'src' => '/images/module-3-map.png',
            'alt' => 'A simple map image with a highlighted route and destination labels.',
            'context' => 'This image contains direction information. A student who cannot see it would miss the route itself or the relationship between locations unless the information is preserved elsewhere.',
            'source' => 'Locally hosted map image for class discussion.',
        ],
        [
            'title' => 'Weekly attendance chart',
            'type' => 'Image',
            'kind' => 'image',
            'src' => '/images/module-3-chart.png',
            'alt' => 'A bar chart showing weekly attendance rising from 120 to 260 over six weeks.',
            'context' => 'This image contains direction information. A student who cannot see it would miss the trend in attendance unless the information is preserved elsewhere.',
            'source' => 'Locally hosted attendance chart for class discussion.',
        ],
        [
            'title' => 'Audio clip: hazardous material incident',
            'type' => 'Audio',
            'kind' => 'audio',
            'src' => 'https://cdn.whelen.com/a8/ac/a8975d6348e0a027e75ca183fd11/hm1.mp3',
            'mime' => 'audio/mpeg',
            'context' => 'What would happen if someone could not hear this hazardous material incident? Consider which warnings, instructions, or other information would be unavailable without a transcript or accessible text alternative.',
            'source' => 'Whelen hazardous material incident audio clip. Accessed from https://cdn.whelen.com/a8/ac/a8975d6348e0a027e75ca183fd11/hm1.mp3',
        ],
        [
            'title' => 'W3C Perspective: Captions',
            'type' => 'Link',
            'kind' => 'link',
            'src' => 'https://www.w3.org/WAI/perspective-videos/captions',
            'context' => 'Explore how captions make spoken dialogue and important sounds available to people who are deaf or hard of hearing. The video also shows why accurate, synchronized captions support many other learners.',
            'source' => 'W3C Web Accessibility Initiative: Perspective Videos — Captions.',
        ],
    ],

    'sessions' => [
        5 => [
            'label' => 'SESSION 05',
            'title' => 'What Is the Information?',
            'status' => 'current',
            'summary' => 'Look more closely at how media communicates meaning and what is lost when someone cannot perceive it as presented.',
            'question' => 'What would someone lose if they could not see or hear the media as presented?',
            'overview' => 'Last module focused on visual cues in an interface. This module asks a different question: what happens when the image, chart, audio, or video itself carries the information?',
            'sections' => [
                [
                    'title' => 'Challenge 02 Review',
                    'paragraphs' => [
                        'Before we move on, let’s take a look at the three Challenge 02 submissions.',
                        'As you compare the work, pay attention to what each team found, what evidence they used, what they changed, and whether the redesign actually solved the problem.',
                    ],
                    'ordered' => [
                        'What did each team identify as the most important barrier?',
                        'What evidence supported the finding?',
                        'What changed in the redesign?',
                        'How do we know the redesign actually improved the experience?',
                        'Where did the three team perspectives overlap?',
                    ],
                    'actions' => [
                        ['label' => 'Open Module 02 Class Work →', 'href' => '/modules/02#module-class-work'],
                    ],
                ],
                [
                    'title' => 'One More Thing About Color',
                    'paragraphs' => [
                        'Before we leave visual presentation behind, look again at this trail sign from a bike event. Two routes split here. One route is marked with green arrows and one with blue arrows.',
                    ],
                    'image' => '/images/sign-challenge.png',
                    'image_alt' => 'Trail junction sign with green and blue arrows marking two routes at a bike event.',
                    'ordered' => [
                        'How is the sign distinguishing the two routes?',
                        'What information depends on color?',
                        'What could preserve the useful color coding while adding another cue?',
                    ],
                ],
                [
                    'title' => 'Module 03 Key Concepts',
                    'paragraphs' => [
                        'Before we start the next challenge, we will walk through a few ideas about how media carries information.',
                    ],
                    'actions' => [
                        ['label' => 'Open Module 03 Key Concepts →', 'route' => 'modules.key-concepts', 'params' => ['module' => 3], 'new_tab' => true],
                    ],
                ],
                [
                    'title' => 'Media Lab',
                    'paragraphs' => [
                        'Now look at a small collection of actual media. What information or function would someone lose if they could not perceive each item as presented?',
                    ],
                    'actions' => [
                        ['label' => 'Open Media Lab →', 'route' => 'modules.media-lab', 'params' => ['module' => 3], 'new_tab' => true],
                    ],
                    'paragraphs_after' => [
                        'Take a few minutes to inspect the examples and discuss the decisions they raise. Do not assume the answer is the same for every item.',
                    ],
                ],
                [
                    'title' => 'Build the Quiz 1 Study Guide',
                    'paragraphs' => [
                        'Quiz 1 will cover the first three modules. Challenge 03 asks each team to help build the class study guide by taking responsibility for three topics, one from each module.',
                    ],
                    'challenge_reference' => [
                        'title' => 'Build the Quiz 1 Study Guide',
                        'link_label' => 'Open Challenge 03 →',
                    ],
                ],
            ],
        ],
        6 => [
            'label' => 'SESSION 06',
            'title' => 'Build, Check, and Refine the Study Guide',
            'status' => 'upcoming',
            'summary' => 'Check assigned topics against authoritative sources, exchange one topic with another team, and finish Challenge 03.',
            'question' => 'How can we make a concise study guide accurate, useful, and defensible?',
            'overview' => 'This session is a workshop for building, checking, and refining the Quiz 1 study guide. Most of the session should remain team work time.',
            'sections' => [
                [
                    'title' => 'Check the Guide',
                    'paragraphs' => [
                        'Review each assigned topic against authoritative sources and prior Class Work.',
                    ],
                    'ordered' => [
                        'Are we stating this accurately?',
                        'What source actually supports the claim?',
                        'Have we confused a requirement with a recommendation?',
                        'Have we oversimplified anything?',
                        'Would someone who did not own this topic originally understand it?',
                    ],
                ],
                [
                    'title' => 'Cross-Check',
                    'paragraphs' => [
                        'Briefly exchange one topic with another team for informal peer review, not a formal presentation.',
                    ],
                    'ordered' => [
                        'Identify something clear.',
                        'Identify something questionable or incomplete.',
                        'Identify one claim that should be verified against the primary source.',
                    ],
                ],
                [
                    'title' => 'Finish Challenge 03',
                    'paragraphs' => [
                        'Use the remainder of class to revise and submit the study guide. Most of Session 06 should remain team work time.',
                    ],
                    'challenge_reference' => [
                        'title' => 'Build the Quiz 1 Study Guide',
                        'link_label' => 'Open Challenge 03 →',
                    ],
                ],
            ],
        ],
    ],

    'challenge' => [
        'label' => 'CHALLENGE 03',
        'title' => 'Build the Quiz 1 Study Guide',
        'status' => 'current',
        'summary' => 'Create one concise section of the class study guide for Quiz 1, covering one topic from each of Modules 01, 02, and 03.',
        'question' => 'What do we need to understand from Modules 01–03 to make and defend good accessibility decisions?',
        'problem' => 'Quiz 1 will draw from the work we have done across the first three modules. Your team will create one part of the class study guide. Each team has been assigned three topics, one from each module. Your job is to identify what classmates actually need to understand, explain it clearly, and support it with authoritative sources. The three team submissions will be archived together as part of the study material for Quiz 1.',
        'teams' => [
            [
                'team' => 'Cyan Triangle',
                'shape' => 'triangle',
                'tone' => 'cyan',
                'lens' => 'Standards, Text, and Audio/Video',
                'topics' => [
                    [
                        'module' => 'Module 01',
                        'title' => 'Standards and WCAG',
                        'description' => 'Explain what WCAG is, how it is organized, how conformance works, and what WCAG can and cannot establish.',
                    ],
                    [
                        'module' => 'Module 02',
                        'title' => 'Text, Scale, and Reflow',
                        'description' => 'Explain what happens when users enlarge text or zoom, what reflow requires, and how to distinguish accessibility requirements from design preferences.',
                    ],
                    [
                        'module' => 'Module 03',
                        'title' => 'Audio and Video',
                        'description' => 'Explain the different roles of captions, transcripts, and descriptions of meaningful visual information.',
                    ],
                ],
            ],
            [
                'team' => 'Amber Circle',
                'shape' => 'circle',
                'tone' => 'amber',
                'lens' => 'Institutional Requirements, Visual Cues, and Images',
                'topics' => [
                    [
                        'module' => 'Module 01',
                        'title' => 'Institutional Requirements',
                        'description' => 'Explain what UConn requires and how institutional policy connects to WCAG and federal requirements.',
                    ],
                    [
                        'module' => 'Module 02',
                        'title' => 'Visual Cues and Meaning',
                        'description' => 'Explain how color, shape, position, boundaries, and other visual cues can communicate meaning, and how that meaning should remain perceivable.',
                    ],
                    [
                        'module' => 'Module 03',
                        'title' => 'Images and Purpose',
                        'description' => 'Explain how image purpose and context determine whether an image needs alt text, a decorative treatment, or another alternative.',
                    ],
                ],
            ],
            [
                'team' => 'Violet Square',
                'shape' => 'square',
                'tone' => 'violet',
                'lens' => 'Law, Color/Contrast, and Complex Visuals',
                'topics' => [
                    [
                        'module' => 'Module 01',
                        'title' => 'Law and Accessibility',
                        'description' => 'Explain the roles of ADA Title II, Section 504, and Section 508, and how legal requirements relate to technical standards.',
                    ],
                    [
                        'module' => 'Module 02',
                        'title' => 'Color and Contrast',
                        'description' => 'Explain color dependence, text contrast, non-text contrast, and how those claims are tested.',
                    ],
                    [
                        'module' => 'Module 03',
                        'title' => 'Complex Visual Information',
                        'description' => 'Explain how charts, maps, diagrams, and infographics can require more than a short text alternative.',
                    ],
                ],
            ],
        ],
        'shared_expectations' => [
            'Identify the most important ideas in plain language.',
            'Include one useful example.',
            'Identify one common misunderstanding.',
            'Link to the authoritative sources you used.',
        ],
        'deliverable' => [
            'summary' => 'Create one concise Quiz 1 Study Guide section covering your three assigned topics, approximately 2–3 pages as a PDF.',
            'format' => 'PDF submitted through HuskyCT/Blackboard',
            'items' => [
                ['title' => 'What You Need to Know', 'description' => 'For each assigned topic, identify approximately 4–6 important ideas in plain language. Synthesize the material rather than copying definitions.'],
                ['title' => 'How to Think About It', 'description' => 'For each topic, provide a short decision process or set of questions for evaluating a real situation.'],
                ['title' => 'Example', 'description' => 'For each topic, include one concise example that requires some judgment.'],
                ['title' => 'Common Mistake', 'description' => 'For each topic, identify one plausible misunderstanding and correct it.'],
                ['title' => 'Authoritative Sources', 'description' => 'Provide direct links to the W3C, federal, UConn, or other primary sources supporting important claims.'],
                ['title' => 'Three Things We Would Remember', 'description' => 'End the document with three ideas from your entire assigned set that you most want a classmate to remember going into Quiz 1. Keep each to one or two sentences.'],
                ['title' => 'AI Use Note', 'description' => 'Identify any generative AI tools used and briefly explain how they contributed.'],
            ],
        ],
        'format_note' => 'Submit one concise PDF through HuskyCT/Blackboard.',
        'evaluation_criteria' => [
            ['title' => 'Investigation', 'points' => 3, 'description' => 'Did the team identify the important ideas and distinctions within its assigned Module 01–03 topics?'],
            ['title' => 'Evidence', 'points' => 3, 'description' => 'Are important claims supported by appropriate authoritative sources and prior course evidence?'],
            ['title' => 'Judgment', 'points' => 2, 'description' => 'Did the team distinguish concepts that are easy to oversimplify and provide useful ways to reason through real situations?'],
            ['title' => 'Communication', 'points' => 2, 'description' => 'Is the study guide concise, understandable, accurate, and genuinely useful for classmates preparing for Quiz 1?'],
        ],
        'evaluation_total' => 10,
        'class_work' => [],
        'ai_note' => [
            'title' => 'AI output is not evidence.',
            'body' => 'Identify any generative AI tools used and briefly explain how they contributed. AI may help your team get oriented or organize ideas, but important claims must still be verified against authoritative sources. AI output is not evidence.',
        ],
        'due' => 'Due: EOD after Session 06',
        'resource_collections' => [
            [
                'title' => 'Module 01',
                'description' => 'Return to the federal, UConn, WCAG, and W3C resources established in Module 01.',
                'resources' => [
                    ['source' => 'W3C', 'label' => 'WCAG 2.2', 'href' => 'https://www.w3.org/TR/WCAG22/'],
                    ['source' => 'W3C', 'label' => 'How to Meet WCAG 2: Quick Reference', 'href' => 'https://www.w3.org/WAI/WCAG22/quickref/'],
                    ['source' => 'W3C', 'label' => 'Understanding WCAG 2.2', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/'],
                    ['source' => 'W3C', 'label' => 'Understanding Conformance', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/conformance'],
                    ['source' => 'UConn', 'label' => 'UConn Digital Accessibility Policy', 'href' => 'https://policy.uconn.edu/2019/08/02/digital-accessibility-policy/'],
                    ['source' => 'U.S. Department of Justice', 'label' => 'Title II Web and Mobile App Rule', 'href' => 'https://www.ada.gov/resources/2024-03-08-web-rule/'],
                    ['source' => 'U.S. Department of Education', 'label' => 'Disability Discrimination: Technology Accessibility', 'href' => 'https://www.ed.gov/laws-and-policy/civil-rights-laws/disability-discrimination/disability-discrimination-key-issues/disability-discrimination-technology-accessibility'],
                    ['source' => 'Section508.gov', 'label' => 'Do Section 508 Accessibility Standards Apply to My Website?', 'href' => 'https://www.section508.gov/blog/do-section-508-accessibility-standards-apply-to-mywebsite/'],
                ],
            ],
            [
                'title' => 'Module 02',
                'description' => 'Use WCAG guidance and the testing resources from Module 02 where they add evidence.',
                'resources' => [
                    ['source' => 'W3C', 'label' => 'Understanding Use of Color', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/use-of-color.html'],
                    ['source' => 'W3C', 'label' => 'Understanding Contrast (Minimum)', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/contrast-minimum.html'],
                    ['source' => 'W3C', 'label' => 'Understanding Resize Text', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/resize-text.html'],
                    ['source' => 'W3C', 'label' => 'Understanding Reflow', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/reflow.html'],
                    ['source' => 'W3C', 'label' => 'Understanding Non-text Contrast', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/non-text-contrast.html'],
                    ['source' => 'WebAIM', 'label' => 'WAVE Browser Extensions', 'href' => 'https://wave.webaim.org/extension/'],
                    ['source' => 'WebAIM', 'label' => 'Contrast Checker', 'href' => 'https://webaim.org/resources/contrastchecker/'],
                ],
            ],
            [
                'title' => 'Module 03',
                'description' => 'Use the existing W3C image and audio/video resources from Module 03.',
                'resources' => [
                    ['source' => 'W3C', 'label' => 'W3C Images Tutorial', 'href' => 'https://www.w3.org/WAI/tutorials/images/'],
                    ['source' => 'W3C', 'label' => 'Informative Images', 'href' => 'https://www.w3.org/WAI/tutorials/images/informative/'],
                    ['source' => 'W3C', 'label' => 'Decorative Images', 'href' => 'https://www.w3.org/WAI/tutorials/images/decorative/'],
                    ['source' => 'W3C', 'label' => 'Complex Images', 'href' => 'https://www.w3.org/WAI/tutorials/images/complex/'],
                    ['source' => 'W3C', 'label' => 'Understanding Non-text Content', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/non-text-content.html'],
                    ['source' => 'W3C', 'label' => 'Making Audio and Video Media Accessible', 'href' => 'https://www.w3.org/WAI/media/av/', 'description' => 'The shared starting point for captions, transcripts, and description of visual information in synchronized media.'],
                    ['source' => 'W3C', 'label' => 'Captions', 'href' => 'https://www.w3.org/WAI/media/av/captions/', 'description' => 'Guidance on captions for dialogue, important sound effects, and other relevant audio information.'],
                    ['source' => 'W3C', 'label' => 'Description of Visual Information', 'href' => 'https://www.w3.org/WAI/media/av/description/', 'description' => 'Guidance on describing important visual information when the video itself carries meaning not stated aloud.'],
                ],
            ],
        ],
    ],
];
