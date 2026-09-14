<?php

return [
    'label' => 'MODULE 03',
    'title' => 'What Does This Media Say?',
    'central_question' => 'How should information conveyed through images, audio, video, and other media be made available in other forms?',
    'overview' => 'Images, charts, audio, and video often carry information that is not available anywhere else. This module asks what that information actually is and how to preserve it when someone cannot see or hear the original media.',
    'status' => 'current',

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
                    'title' => 'One More Thing About Color',
                    'paragraphs' => [
                        'Before we leave visual presentation behind, look at this trail sign from a bike event. Two routes split here. One is marked with green arrows and one with blue arrows.',
                    ],
                    'image' => '/images/media-purpose-bike.jpg',
                    'image_alt' => 'Trail junction sign with green and blue arrows marking two routes at a bike event.',
                    'image_caption' => 'The route markers rely on color to distinguish the paths.',
                    'bullets' => [
                        'How is the sign communicating which route is which?',
                        'What information depends on color?',
                        'What could preserve the useful color coding while adding another cue?',
                    ],
                ],
                [
                    'title' => 'Media Has a Job',
                    'paragraphs' => [
                        'Last module focused on visual cues around an interface. Now the media itself becomes the problem. A photograph, chart, diagram, recording, or video may carry information that is not available anywhere else.',
                    ],
                    'emphasis' => [
                        'What information or purpose would someone lose if they could not perceive the media as presented?',
                    ],
                    'paragraphs_after' => [
                        'The answer is not always “write alt text.” The right alternative depends on what the media is doing in context.',
                    ],
                ],
                [
                    'title' => 'In-Class Examples',
                    'paragraphs' => [
                        'We will look at several media examples together and ask the same question each time:',
                    ],
                    'emphasis' => [
                        'What is this media doing here, and what would someone need if they could not perceive it as presented?',
                    ],
                    'actions' => [
                        ['label' => 'Open the media examples →', 'route' => 'demos.media-purpose', 'new_tab' => true],
                    ],
                ],
                [
                    'title' => 'First Look',
                    'paragraphs' => [
                        'Now look at a complete digital experience where media carries part of the message. Use it normally first.',
                    ],
                    'emphasis' => [
                        'What information would you lose if you could not see or hear the media on this page?',
                    ],
                    'placeholder' => [
                        'title' => 'Shared Experience',
                        'body' => 'University Research Feature / Digital Story',
                        'cta' => ['label' => 'Open the First Look experience ->', 'route' => 'experiences.university-research-story', 'new_tab' => true],
                    ],
                    'paragraphs_after' => [
                        'Do not start by inspecting alt attributes or looking for missing captions. Begin by noticing what the media is trying to communicate and what the page depends on it to do.',
                    ],
                ],
                [
                    'title' => 'Challenge 03',
                    'paragraphs' => [
                        'Challenge 03 asks each team to take one part of that problem further.',
                    ],
                    'challenge_reference' => [
                        'title' => 'What Does This Media Say?',
                        'link_label' => 'Open Challenge 03 →',
                    ],
                ],
            ],
            'resources' => [
                ['label' => 'W3C Images Tutorial', 'href' => 'https://www.w3.org/WAI/tutorials/images/', 'meta' => 'W3C'],
                ['label' => 'Informative Images', 'href' => 'https://www.w3.org/WAI/tutorials/images/informative/', 'meta' => 'W3C'],
                ['label' => 'Decorative Images', 'href' => 'https://www.w3.org/WAI/tutorials/images/decorative/', 'meta' => 'W3C'],
                ['label' => 'Complex Images', 'href' => 'https://www.w3.org/WAI/tutorials/images/complex/', 'meta' => 'W3C'],
                ['label' => 'Making Audio and Video Media Accessible', 'href' => 'https://www.w3.org/WAI/media/av/', 'meta' => 'W3C'],
                ['label' => 'Captions and Subtitles', 'href' => 'https://www.w3.org/WAI/media/av/captions/', 'meta' => 'W3C'],
                ['label' => 'Transcripts', 'href' => 'https://www.w3.org/WAI/media/av/transcripts/', 'meta' => 'W3C'],
                ['label' => 'Description of Visual Information', 'href' => 'https://www.w3.org/WAI/media/av/description/', 'meta' => 'W3C'],
            ],
        ],
        6 => [
            'label' => 'SESSION 06',
            'title' => 'Is the Alternative Equivalent?',
            'status' => 'upcoming',
            'summary' => 'Test whether an alternative preserves the important information, revise the approach, and finish Challenge 03.',
            'question' => 'How do we know an alternative preserves the information that actually matters?',
            'overview' => 'This session is a workshop. Teams will test whether their proposed alternatives actually communicate the important information and revise them based on evidence, peer feedback, and authoritative guidance.',
            'sections' => [
                [
                    'title' => 'One More Look',
                    'paragraphs' => [
                        'A quick recap can strengthen the judgment in this module. The same image may need a different alternative when its purpose changes.',
                    ],
                    'emphasis' => [
                        'A profile image, a news image, and a decorative image may all be the same pixels, but they do not all need the same alternative.',
                    ],
                ],
                [
                    'title' => 'Test the Alternative',
                    'paragraphs' => [
                        'Share one proposed alternative with someone outside your team without initially showing the original media, if that is practical in the moment.',
                    ],
                    'ordered' => [
                        'What do you understand from this alternative?',
                        'What information seems important?',
                        'What questions remain?',
                    ],
                    'paragraphs_after' => [
                        'Then compare the alternative with the original media. The goal is not to pass or fail a wording. The goal is to see whether the alternative communicates the important information without distorting purpose or meaning.',
                    ],
                ],
                [
                    'title' => 'Revise',
                    'paragraphs' => [
                        'Use the rest of the session as work time. Revise your Accessible Media Package based on what your peer reviewer understood, what the original media actually communicates, and what the authoritative guidance suggests.',
                    ],
                    'emphasis' => [
                        'Evidence, interpretation, and judgment should all be visible in the final package.',
                    ],
                ],
                [
                    'title' => 'Finish Challenge 03',
                    'paragraphs' => [
                        'Use the remainder of class to finish the challenge. The Challenge page remains canonical for team instructions, deliverable requirements, resources, evaluation, AI expectations, and due information.',
                    ],
                    'challenge_reference' => [
                        'title' => 'What Does This Media Say?',
                        'link_label' => 'Open Challenge 03 →',
                    ],
                ],
            ],
        ],
    ],

    'challenge' => [
        'label' => 'CHALLENGE 03',
        'title' => 'What Does This Media Say?',
        'status' => 'current',
        'summary' => 'Investigate the information carried by media in context, decide what matters when the original cannot be perceived, and design an appropriate alternative.',
        'question' => 'What information actually matters, and what alternative preserves that meaning when the original media cannot be perceived?',
        'problem' => 'Media can communicate information, function, context, emotion, relationships, and meaning. Your team must determine what information actually matters and design an appropriate way for users to access it when the original media cannot be perceived.',
        'experience_under_review' => [
            'name' => 'University Research Feature / Digital Story',
            'link' => ['label' => 'Open the experience ->', 'route' => 'experiences.university-research-story', 'new_tab' => true],
        ],
        'teams' => [
            [
                'team' => 'Cyan Triangle',
                'shape' => 'triangle',
                'tone' => 'cyan',
                'lens' => 'Images & Purpose',
                'description' => 'Investigate what an image communicates when someone cannot see it and decide whether it should be informative, decorative, or supported by nearby text.',
                'questions' => [
                    'What purpose does the image serve in context?',
                    'Is the image informative, decorative, functional, or a mixture of those roles?',
                    'What information is actually needed in an alternative?',
                    'What should be intentionally omitted?',
                    'What evidence supports the decision?',
                ],
            ],
            [
                'team' => 'Amber Circle',
                'shape' => 'circle',
                'tone' => 'amber',
                'lens' => 'Complex Visual Information',
                'description' => 'Investigate how to preserve the main message of charts, diagrams, or infographics when a short alternative is not enough.',
                'questions' => [
                    'What is the chart or visual actually communicating?',
                    'What can a short identification say?',
                    'What requires a longer description, surrounding text, or data access?',
                    'What evidence supports the chosen treatment?',
                    'What does a generic alt string miss?',
                ],
            ],
            [
                'team' => 'Violet Square',
                'shape' => 'square',
                'tone' => 'violet',
                'lens' => 'Audio & Video',
                'description' => 'Investigate what information is carried by the audio channel, the visual channel, or both, and decide what accessible alternative is most appropriate.',
                'questions' => [
                    'What is spoken or heard that matters?',
                    'What visual action is important and not described aloud?',
                    'Would captions, a transcript, or a description of visual information be enough?',
                    'What is lost if the audio is unavailable?',
                    'What is lost if the visual content is unavailable?',
                ],
            ],
        ],
        'deliverable' => [
            'summary' => 'Create one clear Accessible Media Package through HuskyCT/Blackboard. Your team should address a small set of relevant media items from the shared experience.',
            'items' => [
                ['title' => 'Purpose', 'description' => 'What information, function, or meaning does this media contribute in context?'],
                ['title' => 'Barrier', 'description' => 'What might a user lose if they cannot perceive it as presented?'],
                ['title' => 'Decision', 'description' => 'What kind of alternative or treatment is appropriate, if any?'],
                ['title' => 'Accessible Version', 'description' => 'Create the proposed alternative in a form that makes sense for the media item.'],
                ['title' => 'Evidence', 'description' => 'Support the decision with authoritative guidance and relevant sources.'],
                ['title' => 'Judgment', 'description' => 'Explain one meaningful choice about what the team included, omitted, emphasized, or represented differently.'],
                ['title' => 'AI Use Note', 'description' => 'Identify any generative AI tools used and briefly explain how they contributed.'],
            ],
        ],
        'format_note' => 'Submit one clear package through HuskyCT/Blackboard. A PDF can be used as a wrapper for findings, alternative text, screenshots, descriptions, or links to prototypes, but a PDF is not the universal challenge format.',
        'evaluation_criteria' => [
            ['title' => 'Investigation', 'points' => 3, 'description' => 'Did the team correctly identify the important accessibility problem and investigate the media\'s purpose in context?'],
            ['title' => 'Evidence', 'points' => 3, 'description' => 'Are decisions supported by authoritative guidance, observations, or appropriate testing?'],
            ['title' => 'Judgment and Solution', 'points' => 2, 'description' => 'Did the team choose and create an appropriate alternative rather than applying a generic fix?'],
            ['title' => 'Communication', 'points' => 2, 'description' => 'Is the Accessible Media Package concise, understandable, and useful to the rest of the class?'],
        ],
        'evaluation_total' => 10,
        'class_work' => [],
        'ai_note' => [
            'title' => 'AI output is not evidence.',
            'body' => 'AI may help your team orient to the problem, interpret guidance, or explore possible alternatives. Important claims still need verification through authoritative sources or direct examination of the media in context.',
        ],
        'due' => 'Due: EOD after Session 06',
        'resource_collections' => [
            [
                'title' => 'Shared starting point',
                'description' => 'Use these sources first to understand image purpose, alternatives, and the broader question of media access.',
                'resources' => [
                    ['source' => 'W3C', 'label' => 'W3C Images Tutorial', 'href' => 'https://www.w3.org/WAI/tutorials/images/', 'description' => 'The primary practical starting point for understanding purpose, alternatives, and complex images.'],
                    ['source' => 'W3C', 'label' => 'Understanding WCAG 2.2: 1.1.1 Non-text Content', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/non-text-content.html', 'description' => 'The authoritative W3C explanation of the core requirement for equivalent alternatives to non-text content.'],
                ],
            ],
            [
                'title' => 'Images & purpose',
                'description' => 'Use these resources selectively to clarify informative, decorative, functional, text, and complex image treatment.',
                'resources' => [
                    ['source' => 'W3C', 'label' => 'Informative Images', 'href' => 'https://www.w3.org/WAI/tutorials/images/informative/', 'description' => 'Guidance on communicating the key information when an image is informative in context.'],
                    ['source' => 'W3C', 'label' => 'Decorative Images', 'href' => 'https://www.w3.org/WAI/tutorials/images/decorative/', 'description' => 'Guidance on omitting unnecessary description when the image is purely decorative.'],
                    ['source' => 'W3C', 'label' => 'Complex Images', 'href' => 'https://www.w3.org/WAI/tutorials/images/complex/', 'description' => 'The main starting point for charts, diagrams, infographics, and visual data that cannot be reduced to a single brief sentence.'],
                ],
            ],
            [
                'title' => 'Audio & video',
                'description' => 'Use these resources to think about spoken content, non-speech audio, and visual information in synchronized media.',
                'resources' => [
                    ['source' => 'W3C', 'label' => 'Making Audio and Video Media Accessible', 'href' => 'https://www.w3.org/WAI/media/av/', 'description' => 'The shared starting point for captions, transcripts, and description of visual information in synchronized media.'],
                    ['source' => 'W3C', 'label' => 'Captions and Subtitles', 'href' => 'https://www.w3.org/WAI/media/av/captions/', 'description' => 'Guidance on captions for dialogue, important sound effects, and other relevant audio information.'],
                    ['source' => 'W3C', 'label' => 'Transcripts', 'href' => 'https://www.w3.org/WAI/media/av/transcripts/', 'description' => 'Guidance on making audio information available as text in a format users can review.'],
                    ['source' => 'W3C', 'label' => 'Description of Visual Information', 'href' => 'https://www.w3.org/WAI/media/av/description/', 'description' => 'Guidance on describing important visual information when the video itself carries meaning not stated aloud.'],
                ],
            ],
        ],
    ],
];
