<?php

return [
    'label' => 'MODULE 03',
    'title' => 'What Does This Media Say?',
    'central_question' => 'How should information conveyed through images, audio, video, and other media be made available in other forms?',
    'overview' => 'Images, charts, audio, and video often carry information that is not available anywhere else. This module asks what that information actually is and how to preserve it when someone cannot see or hear the original media.',
    'status' => 'current',
    'media_lab' => [
        [
            'title' => 'Photo of a city street with a bus stop',
            'type' => 'Image',
            'kind' => 'image',
            'src' => 'https://images.unsplash.com/photo-1467269204594-9661b134dd2b?auto=format&fit=crop&w=1200&q=80',
            'alt' => 'A city street scene with a bus stop, traffic, and a row of storefronts.',
            'context' => 'This photograph may be used in a neighborhood article or route guide. The key question is whether the image is simply atmospheric or whether it carries information that matters to the story.',
            'source' => 'Unsplash, used for class discussion. Source and licensing details should be verified on the original host before reuse in production.',
        ],
        [
            'title' => 'Decorative storefront illustration',
            'type' => 'Image',
            'kind' => 'image',
            'src' => 'https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=1200&q=80',
            'alt' => 'A warm, colorful storefront illustration with a striped awning and large windows.',
            'context' => 'This kind of image may exist purely for visual atmosphere. A description would likely add noise rather than meaningful information.',
            'source' => 'Unsplash, used for class discussion. Source and licensing details should be verified on the original host before reuse in production.',
        ],
        [
            'title' => 'Map with a highlighted route',
            'type' => 'Image',
            'kind' => 'image',
            'src' => 'https://www.w3.org/People/mimasa/test/imgformat/img/w3c_home.jpg',
            'alt' => 'A simple map image with a highlighted route and destination labels.',
            'context' => 'This image contains direction information. A student who cannot see it would miss the route itself or the relationship between locations unless the information is preserved elsewhere.',
            'source' => 'W3C public image sample. Accessed from https://www.w3.org/People/mimasa/test/imgformat/img/w3c_home.jpg',
        ],
        [
            'title' => 'Weekly attendance chart',
            'type' => 'Chart',
            'kind' => 'chart',
            'svg' => '<svg viewBox="0 0 540 260" role="img" aria-label="Bar chart showing weekly attendance rising from 120 to 260 over six weeks" xmlns="http://www.w3.org/2000/svg" class="mt-4 w-full rounded-lg border border-subtle bg-surface-3"><rect width="540" height="260" fill="#f6f7fa"/><line x1="60" y1="210" x2="500" y2="210" stroke="#475569" stroke-width="2"/><line x1="60" y1="30" x2="60" y2="210" stroke="#475569" stroke-width="2"/><g fill="#4f8cc9"><rect x="90" y="150" width="44" height="60"/><rect x="160" y="128" width="44" height="82"/><rect x="230" y="104" width="44" height="106"/><rect x="300" y="82" width="44" height="128"/><rect x="370" y="54" width="44" height="156"/><rect x="440" y="38" width="44" height="172"/></g><g fill="#475569" font-size="12" font-family="sans-serif"><text x="94" y="230">W1</text><text x="164" y="230">W2</text><text x="234" y="230">W3</text><text x="304" y="230">W4</text><text x="374" y="230">W5</text><text x="444" y="230">W6</text></g><text x="90" y="24" fill="#1f2937" font-size="18" font-family="sans-serif" font-weight="600">Attendance rises steadily</text></svg>',
            'context' => 'This chart has a real takeaway: attendance rises steadily across the six weeks. A person who receives only “bar chart” would lose the actual conclusion and the meaningful pattern.',
            'source' => 'Locally authored demonstration chart for class discussion.',
        ],
        [
            'title' => 'Audio clip: weather update',
            'type' => 'Audio',
            'kind' => 'audio',
            'src' => 'https://www.w3.org/People/mimasa/test/audio/MediaStream.mp3',
            'mime' => 'audio/mpeg',
            'context' => 'This audio clip communicates spoken information that is not visually present. A transcript or accessible text version is necessary if someone cannot hear it.',
            'source' => 'W3C public audio sample. Accessed from https://www.w3.org/People/mimasa/test/audio/MediaStream.mp3',
        ],
        [
            'title' => 'Video: city walk with changing light',
            'type' => 'Video',
            'kind' => 'video',
            'src' => 'https://media.w3.org/2010/05/sintel/trailer.webm',
            'mime' => 'video/webm',
            'context' => 'This short video contains both spoken or ambient audio and visual information that changes over time. Students must determine which information is carried by each channel and what equivalent treatment is necessary.',
            'source' => 'W3C sample video: Sintel trailer hosted at media.w3.org.',
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
                    'title' => 'Challenge 03',
                    'paragraphs' => [
                        'Challenge 03 asks your team to make those decisions for a small set of media and support them with evidence.',
                    ],
                    'challenge_reference' => [
                        'title' => 'What Does This Media Say?',
                        'link_label' => 'Open Challenge 03 →',
                    ],
                ],
            ],
        ],
        6 => [
            'label' => 'SESSION 06',
            'title' => 'Is the Alternative Equivalent?',
            'status' => 'upcoming',
            'summary' => 'Test whether an alternative preserves the important information, revise the approach, and finish Challenge 03.',
            'question' => 'How do we know an alternative preserves the information that actually matters?',
            'overview' => 'This session is a studio review. Teams will compare their proposed alternatives with the original media, look for gaps in meaning, and revise the work based on what the media actually communicates.',
            'sections' => [
                [
                    'title' => 'Review the Alternative',
                    'paragraphs' => [
                        'Ask another student to read or review one proposed alternative without showing them the original media first.',
                    ],
                    'ordered' => [
                        'What do they understand from the alternative?',
                        'What information seems important to them?',
                        'What questions remain?',
                    ],
                ],
                [
                    'title' => 'Compare With the Original',
                    'paragraphs' => [
                        'Then compare the alternative with the original media. The goal is to see whether the proposed treatment preserves the information or function that matters without changing the meaning of the media itself.',
                    ],
                    'emphasis' => [
                        'The strongest alternatives are the ones that preserve the important meaning, not simply the most generic wording or the most obvious label.',
                    ],
                ],
                [
                    'title' => 'Revise',
                    'paragraphs' => [
                        'Use the rest of the session for team revision. Tighten the reasoning, improve the evidence, and make sure the accessible treatment is appropriate for the actual media item and its context.',
                    ],
                    'paragraphs_after' => [
                        'Most of this session should remain student work time. The class should spend more energy evaluating and revising than listening to a lecture.',
                    ],
                ],
                [
                    'title' => 'Finish Challenge 03',
                    'paragraphs' => [
                        'Use the remainder of class to finish the challenge. The Challenge page remains the canonical source for instructions, resources, evaluation, and due information.',
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
        'summary' => 'Investigate the information carried by media in context, determine what someone would lose without it, and create an appropriate accessible alternative.',
        'question' => 'What information actually matters, and what accessible treatment preserves that meaning when the original media cannot be perceived?',
        'problem' => 'Media can communicate information, function, relationships, and meaning. Your team will examine a small set of media items, decide what someone could lose if they cannot perceive them as presented, and create appropriate accessible alternatives.',
        'teams' => [
            [
                'team' => 'Cyan Triangle',
                'shape' => 'triangle',
                'tone' => 'cyan',
                'lens' => 'Images and Purpose',
                'description' => 'Examine several image items and determine what each contributes in context, whether an alternative is needed, and what should be preserved or intentionally omitted.',
                'questions' => [
                    'What purpose does each image serve in context?',
                    'What information or function would someone lose without it?',
                    'What kind of alternative is appropriate?',
                    'What should be intentionally left out?',
                    'What evidence supports the decision?',
                ],
            ],
            [
                'team' => 'Amber Circle',
                'shape' => 'circle',
                'tone' => 'amber',
                'lens' => 'Complex Visual Information',
                'description' => 'Examine the chart, diagram, or map in the Media Lab and decide what someone would lose without the visual takeaway, the data, or the relationship it shows.',
                'questions' => [
                    'What is the visual communicating?',
                    'What could a person miss without it?',
                    'What belongs in a short alternative?',
                    'What requires a longer description, visible text, or structured data?',
                    'What evidence supports the treatment?',
                ],
            ],
            [
                'team' => 'Violet Square',
                'shape' => 'square',
                'tone' => 'violet',
                'lens' => 'Audio and Video',
                'description' => 'Examine the actual audio/video example in the Media Lab and determine what is communicated through the audio track, the visual track, or both.',
                'questions' => [
                    'What information is communicated through audio?',
                    'What information is communicated visually?',
                    'What alternative is necessary in each case?',
                    'Would captions, a transcript, or a description of visual information be enough?',
                    'What would be lost if only one channel were available?',
                ],
            ],
        ],
        'deliverable' => [
            'summary' => 'Create a concise team brief for each assigned media item. The challenge should be difficult because the decisions are real, not because the template is long.',
            'items' => [
                ['title' => 'What It Communicates', 'description' => 'What information or function does the media provide in context?'],
                ['title' => 'What Could Be Lost', 'description' => 'What would someone miss if they could not perceive it as presented?'],
                ['title' => 'Your Accessible Treatment', 'description' => 'Create or specify the appropriate alternative.'],
                ['title' => 'Why', 'description' => 'Briefly explain why that treatment is appropriate.'],
                ['title' => 'Evidence', 'description' => 'Support the decision with authoritative guidance.'],
                ['title' => 'AI Use Note', 'description' => 'Identify any generative AI tools used and briefly explain how they contributed.'],
            ],
        ],
        'format_note' => 'Submit one concise team package through HuskyCT/Blackboard. Keep the work focused on real decisions about meaning, purpose, and evidence rather than on producing a large set of generic forms.',
        'evaluation_criteria' => [
            ['title' => 'Investigation', 'points' => 3, 'description' => 'Did the team correctly identify the information or function being communicated in context?'],
            ['title' => 'Evidence', 'points' => 3, 'description' => 'Are decisions supported by authoritative guidance and direct examination of the media?'],
            ['title' => 'Judgment and Solution', 'points' => 2, 'description' => 'Did the team choose an appropriate accessible treatment rather than a generic fix?'],
            ['title' => 'Communication', 'points' => 2, 'description' => 'Is the brief concise, understandable, and useful to the rest of the class?'],
        ],
        'evaluation_total' => 10,
        'class_work' => [],
        'ai_note' => [
            'title' => 'AI output is not evidence.',
            'body' => 'AI may help your team get oriented, interpret guidance, or test possible alternatives. Important claims still need verification through authoritative sources or direct examination of the media in context.',
        ],
        'due' => 'Due: EOD after Session 06',
        'resource_collections' => [
            [
                'title' => 'Shared starting point',
                'description' => 'Use these sources first to understand image purpose, alternatives, and the broader question of media access.',
                'resources' => [
                    ['source' => 'W3C', 'label' => 'W3C Images Tutorial', 'href' => 'https://www.w3.org/WAI/tutorials/images/', 'description' => 'The primary practical starting point for understanding purpose, alternatives, and complex images.'],
                    ['source' => 'W3C', 'label' => 'Informative Images', 'href' => 'https://www.w3.org/WAI/tutorials/images/informative/', 'description' => 'Guidance on communicating the key information when an image is informative in context.'],
                    ['source' => 'W3C', 'label' => 'Decorative Images', 'href' => 'https://www.w3.org/WAI/tutorials/images/decorative/', 'description' => 'Guidance on omitting unnecessary description when an image is decorative.'],
                ],
            ],
            [
                'title' => 'Complex images',
                'description' => 'Use these resources when a chart, diagram, map, or infographic needs more than a short label.',
                'resources' => [
                    ['source' => 'W3C', 'label' => 'Complex Images', 'href' => 'https://www.w3.org/WAI/tutorials/images/complex/', 'description' => 'The main starting point for charts, diagrams, infographics, and visual data that cannot be reduced to a single brief sentence.'],
                    ['source' => 'W3C', 'label' => 'Understanding WCAG 2.2: 1.1.1 Non-text Content', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/non-text-content.html', 'description' => 'The authoritative W3C explanation of the core requirement for equivalent alternatives to non-text content.'],
                ],
            ],
            [
                'title' => 'Audio and video',
                'description' => 'Use these resources to think about spoken content, non-speech audio, and visual information in synchronized media.',
                'resources' => [
                    ['source' => 'W3C', 'label' => 'Making Audio and Video Media Accessible', 'href' => 'https://www.w3.org/WAI/media/av/', 'description' => 'The shared starting point for captions, transcripts, and description of visual information in synchronized media.'],
                    ['source' => 'W3C', 'label' => 'Captions', 'href' => 'https://www.w3.org/WAI/media/av/captions/', 'description' => 'Guidance on captions for dialogue, important sound effects, and other relevant audio information.'],
                    ['source' => 'W3C', 'label' => 'Transcripts', 'href' => 'https://www.w3.org/WAI/media/av/transcripts/', 'description' => 'Guidance on making audio information available as text in a format users can review.'],
                    ['source' => 'W3C', 'label' => 'Description of Visual Information', 'href' => 'https://www.w3.org/WAI/media/av/description/', 'description' => 'Guidance on describing important visual information when the video itself carries meaning not stated aloud.'],
                ],
            ],
        ],
    ],
];
