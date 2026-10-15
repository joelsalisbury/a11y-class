<?php

$understanding = 'https://www.w3.org/WAI/WCAG22/Understanding/';
$resource = static fn (string $label, string $slug, string $meta): array => [
    'label' => $label, 'href' => $understanding.$slug.'.html', 'meta' => $meta,
];
$motionResources = [
    $resource('Timing Adjustable', 'timing-adjustable', 'W3C · 2.2.1 · A'),
    $resource('Pause, Stop, Hide', 'pause-stop-hide', 'W3C · 2.2.2 · A'),
    $resource('Three Flashes or Below Threshold', 'three-flashes-or-below-threshold', 'W3C · 2.3.1 · A'),
    $resource('Animation from Interactions', 'animation-from-interactions', 'W3C · 2.3.3 · AAA'),
    ['label' => 'prefers-reduced-motion', 'href' => 'https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/At-rules/@media/prefers-reduced-motion', 'meta' => 'MDN · CSS implementation'],
];
$cognitiveResources = [
    $resource('On Focus', 'on-focus', 'W3C · 3.2.1 · A'),
    $resource('On Input', 'on-input', 'W3C · 3.2.2 · A'),
    $resource('Consistent Identification', 'consistent-identification', 'W3C · 3.2.4 · AA'),
    $resource('Redundant Entry', 'redundant-entry', 'W3C · 3.3.7 · A · Added in WCAG 2.2'),
    ['label' => 'Use Clear and Understandable Content', 'href' => 'https://www.w3.org/WAI/WCAG2/supplemental/objectives/o3-clear-content/', 'meta' => 'W3C · Supplemental cognitive guidance'],
    ['label' => 'Ensure Processes Do Not Rely on Memory', 'href' => 'https://www.w3.org/WAI/WCAG2/supplemental/objectives/o6-memory/', 'meta' => 'W3C · Supplemental cognitive guidance'],
];
$cognitiveCriteriaResources = [
    $resource('Info and Relationships', 'info-and-relationships', 'WCAG 2.2 · 1.3.1 · A'),
    $resource('Headings and Labels', 'headings-and-labels', 'WCAG 2.2 · 2.4.6 · AA'),
    $resource('Consistent Navigation', 'consistent-navigation', 'WCAG 2.2 · 3.2.3 · AA'),
    $resource('Labels or Instructions', 'labels-or-instructions', 'WCAG 2.2 · 3.3.2 · A'),
    $resource('Error Suggestion', 'error-suggestion', 'WCAG 2.2 · 3.3.3 · AA'),
];

$module = [
    'label' => 'MODULE 06',
    'title' => 'Why Is This So Hard to Use?',
    'central_question' => 'What can make an experience difficult, distracting, disorienting, or unsafe even when its basic controls work?',
    'overview' => 'An interface can be keyboard accessible, correctly labeled, and technically functional while still demanding too much from the user. Motion can distract or cause physical discomfort. Flashing can create a safety risk. Time limits can prevent someone from completing a task. Dense or unpredictable interfaces can demand unnecessary memory and interpretation. This module looks at accessibility where safety, cognition, predictability, and usability overlap.',
    'status' => 'current',
    'sessions' => [
        12 => [
            'label' => 'SESSION 12',
            'title' => 'When Does Motion Become a Barrier?',
            'status' => 'complete',
            'question' => 'When do motion, flashing, updating content, or time limits become accessibility problems rather than mere annoyances?',
            'summary' => 'Test moving content and time pressure, discuss flashing safely, and compare motion with a reduced-motion alternative.',
            'overview' => 'Movement gets attention. Sometimes that is useful. Sometimes it competes with the task, creates time pressure, makes an interface difficult to follow, or causes physical discomfort.',
            'sections' => [
                [
                    'title' => 'What Gets Your Attention?',
                    'emphasis' => ['When is motion merely annoying, and when does it become an accessibility problem?'],
                    'paragraphs_after' => ['Think of an interface that moves while you are trying to read or act. What happened to the task? Start with the behavior before choosing a criterion.'],
                ],
                [
                    'title' => 'Can You Stop It?',
                    'paragraphs' => ['Read the equipment-desk announcements in both versions. In Version B, pause the updates while you are still reading. What changes?'],
                    'actions' => [['label' => 'Open Can You Stop It? →', 'href' => route('experiences.module06.motion').'#moving-content', 'new_tab' => true]],
                    'paragraphs_after' => ['WCAG 2.2.2 Pause, Stop, Hide (Level A) covers moving, blinking, or scrolling information that starts automatically, lasts more than five seconds, and appears alongside other content, unless essential. Give users a way to pause, stop, or hide it. Auto-updating information shown alongside other content also needs control unless essential; it has no five-second exemption.'],
                    'emphasis' => ['If you are still reading when the content moves, who controls the experience?'],
                ],
                [
                    'title' => 'Why Is There a Clock?',
                    'paragraphs' => ['Reserve the Camera Kit for Thursday at 2:00 PM. Both versions give you a 30-second hold. In Version B, use Add 2 minutes and watch the time change. In Version A, let the hold expire and try again.', 'WCAG 2.2.1 Timing Adjustable (Level A) calls for a way to turn off, adjust, or extend a content-imposed time limit, with defined exceptions such as essential timing or a real-time event. An extension path must warn users, give at least 20 seconds to act, and allow at least ten extensions. A short reset button is not a substitute.'],
                    'actions' => [['label' => 'Open Why Is There a Clock? →', 'href' => route('experiences.module06.motion').'#time-limit', 'new_tab' => true]],
                    'emphasis' => ['Does reserving this camera actually require someone to finish within 30 seconds?'],
                ],
                [
                    'title' => 'How Fast Is Too Fast?',
                    'paragraphs' => ['Compare two static patterns across the same one-second interval: three flashes and four flashes. The markers describe flashes without playing them.', 'WCAG 2.3.1 Three Flashes or Below Threshold is Level A. Content must not flash more than three times in any one-second period unless it is below the general flash and red flash thresholds. Frequency, brightness, color, and affected area matter. Use a validated analysis tool for uncertain media; do not test safety by watching it.'],
                    'actions' => [['label' => 'Open How Fast Is Too Fast? →', 'href' => route('experiences.module06.motion').'#flashing', 'new_tab' => true]],
                    'emphasis' => ['Why is this different from simply finding an animation annoying?'],
                    'paragraphs_after' => ['A pause button does not make dangerous flashing safe. Exposure can occur before someone reaches the control.'],
                ],
                [
                    'title' => 'What If the Motion Is the Problem?',
                    'paragraphs' => ['Open the Field Production Kit details in both versions. Compare the slide and zoom with details that appear in place. A system reduced-motion preference also disables movement in the standard version.', 'Large or unnecessary motion may cause dizziness, nausea, or disorientation for some users. People can request reduced motion through operating-system or browser settings. CSS can respond with @media (prefers-reduced-motion: reduce).'],
                    'actions' => [['label' => 'Open the kit-detail comparison →', 'href' => route('experiences.module06.motion').'#reduced-motion', 'new_tab' => true]],
                    'emphasis' => ['WCAG 2.3.3 Animation from Interactions is AAA, not AA.'],
                    'paragraphs_after' => ['It calls for disabling interaction-triggered motion animation unless essential. Respecting reduced motion is a strong accessibility practice; prefers-reduced-motion is not itself a universal WCAG 2.1 AA requirement.'],
                ],
                [
                    'title' => 'What Kind of Claim Can You Make?',
                    'paragraphs' => ['Levels A and AA both contribute to AA conformance. The timing, pause, and flashing criteria above were already present in WCAG 2.1. The interaction-animation criterion is AAA. W3C supplemental guidance can support a broader accessibility concern without establishing an AA failure.'],
                    'emphasis' => ['How do you know?'],
                ],
                [
                    'title' => 'Class Work: Failure, Concern, or Preference?',
                    'paragraphs' => ['For each scenario, choose Specific accessibility requirement, Broader accessibility concern / good practice, or Not enough evidence to call it an accessibility failure. Name the source, level, and observed behavior that support your claim. This is a brief discussion, not a graded challenge.'],
                    'ordered' => [
                        'A news ticker starts automatically, keeps scrolling beyond five seconds beside an article, and has no pause control.',
                        'Checkout expires after 30 seconds with no adjustment or extension. The limit is unnecessary for the task.',
                        'Selecting a card triggers a large zoom. There is no way to disable the nonessential animation.',
                        'A static decorative gradient appears behind a heading. No contrast or other barrier has been established.',
                        'A promotional graphic is described as flashing four times per second across most of the screen with large brightness changes. It is not displayed. What evidence or analysis would support a safety finding?',
                    ],
                    'emphasis' => ['How do you know? What remains uncertain?'],
                ],
            ],
            'resources' => $motionResources,
        ],
        13 => [
            'label' => 'SESSION 13',
            'title' => 'Module 06 — Cognitive Accessibility & Challenge Studio',
            'status' => 'current',
            'question' => 'How can we reduce unnecessary cognitive effort while distinguishing usability from WCAG conformance?',
            'summary' => 'Explore cognitive load and WCAG 2.2, then finish Challenge 06 during open studio.',
            'overview' => 'Thursday, October 15, 2026. Conclude Module 06 with a focused look at cognitive load and inclusive interface design, then use open studio time to finish the existing Challenge 06 work. Cognitive accessibility is important, but neither a checklist nor conformance level guarantees that an interface is easy to understand or use.',
            'sections' => [
                [
                    'title' => 'Cognitive load is part of the experience',
                    'paragraphs' => [
                        'Thursday, October 15, 2026.',
                        'Cognitive load is the mental effort a person uses to understand information, make decisions, remember details, and complete a task. In interactive media, every unclear instruction, unexpected change, or detail a user must keep in mind adds work beyond the task itself.',
                        'People with ADHD, learning disabilities, memory impairments, and other cognitive differences can face particular barriers when interfaces demand sustained attention, working memory, or interpretation. Clearer, more predictable experiences often help everyone, especially when people are tired, interrupted, unfamiliar with a system, or using it under stress.',
                    ],
                    'question' => 'Can an interface work technically and still ask too much of the person using it?',
                ],
                [
                    'title' => 'Three kinds of mental effort',
                    'paragraphs' => ['One useful learning model separates cognitive load into three kinds. It helps us ask what work a task requires and what work the interface adds; it is a design lens, not a WCAG classification.'],
                    'bullets' => [
                        'Intrinsic load: effort inherent in the task. Comparing three camera kits means considering their actual differences.',
                        'Extraneous load: avoidable effort caused by presentation or interaction. Unclear pickup instructions, inconsistent control labels, or choices scattered across the page make the same task harder.',
                        'Germane load: effort that helps a person build a useful understanding. A clear comparison of kit features can help someone make a confident choice.',
                    ],
                    'question' => 'Which effort belongs to the task, and which does the interface unnecessarily add?',
                ],
                [
                    'title' => 'How Much Can You Keep in Your Head?',
                    'paragraphs' => ['Working memory holds information in mind while we make a decision or complete a task. Try the same equipment reservation twice and notice how the interface changes the mental work.'],
                    'actions' => [['label' => 'Try the cognitive-load reservation demo →', 'route' => 'experiences.module06.cognition', 'new_tab' => true]],
                    'bullets' => [
                        'What information did you have to remember?',
                        'When did you feel uncertain about your progress or earlier choices?',
                        'Which changes made the second attempt easier?',
                    ],
                    'note' => 'Cognitive accessibility is a broader design goal. WCAG sets specific, testable requirements; meeting applicable criteria does not guarantee low cognitive load.',
                ],
                [
                    'title' => 'A clearer request flow',
                    'paragraphs' => ['Compare the same equipment-pickup information presented as one dense paragraph and as a short sequence with descriptive headings. The task has not changed; the second version makes the steps and conditions easier to locate and remember.'],
                    'example_view' => 'course.modules.module06-clear-content',
                    'question' => 'What mental work does the clearer version remove, and what information must it still preserve?',
                    'note' => 'Clear organization can reduce extraneous load. The example illustrates good design; it is not, on its own, a conformance test.',
                ],
                [
                    'title' => 'WCAG supports structure and orientation',
                    'paragraphs' => ['These WCAG 2.2 criteria address specific aspects of how people find and understand information across a page or site:'],
                    'bullets' => [
                        '1.3.1 Info and Relationships (A): relationships conveyed visually, such as headings, lists, and form groups, must also be programmatically determinable or available in text. This helps preserve meaning when presentation changes.',
                        '2.4.6 Headings and Labels (AA): headings and labels that are present must describe their topic or purpose. They help users orient themselves; the criterion does not require headings or labels to exist.',
                        '3.2.3 Consistent Navigation (AA): repeated navigation mechanisms appear in the same relative order across pages in a set. Predictable placement can reduce relearning.',
                    ],
                    'actions' => [
                        ['label' => '1.3.1 Info and Relationships', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/info-and-relationships.html', 'new_tab' => true],
                        ['label' => '2.4.6 Headings and Labels', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/headings-and-labels.html', 'new_tab' => true],
                        ['label' => '3.2.3 Consistent Navigation', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/consistent-navigation.html', 'new_tab' => true],
                    ],
                ],
                [
                    'title' => 'WCAG supports clear input and recovery',
                    'paragraphs' => ['These criteria reduce specific kinds of ambiguity, correction effort, and short-term memory demand in processes:'],
                    'bullets' => [
                        '3.3.2 Labels or Instructions (A): when content requires user input, labels or instructions are provided so people know what is expected.',
                        '3.3.3 Error Suggestion (AA): when an input error is automatically detected and a correction is known, suggest it, unless doing so would jeopardize security or the content’s purpose.',
                        '3.3.7 Redundant Entry (A): information already entered in the same process is auto-populated or available to select, unless re-entry is essential, required for security, or the information is no longer valid.',
                    ],
                    'actions' => [
                        ['label' => '3.3.2 Labels or Instructions', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/labels-or-instructions.html', 'new_tab' => true],
                        ['label' => '3.3.3 Error Suggestion', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/error-suggestion.html', 'new_tab' => true],
                        ['label' => '3.3.7 Redundant Entry', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/redundant-entry.html', 'new_tab' => true],
                    ],
                    'note' => 'These are specific WCAG requirements with defined scope and exceptions, not a general guarantee that every interaction will be cognitively easy.',
                ],
                [
                    'title' => 'Conformance is not the whole experience',
                    'paragraphs' => [
                        'WCAG success criteria address important, testable requirements. They do not measure every source of cognitive load or guarantee that an experience is clear, efficient, or inclusive. A user may still face excessive choices, confusing language, distracting complexity, or a demanding task even when applicable criteria are met.',
                        'Use criteria to support precise claims, and use observation and user impact to identify broader usability concerns. Reduce unnecessary effort without removing the meaningful thinking the task itself requires.',
                    ],
                    'question' => 'Which friction in your Challenge 06 investigation is covered by a criterion, and which needs a broader usability explanation?',
                ],
                [
                    'title' => 'Challenge 06 open studio',
                    'paragraphs' => ['Continue in your existing three HuskyCT-managed teams and use the remaining class time to finish the existing Challenge 06 work. Work from the original instructions, deliverables, 10-point rubric, and HuskyCT submission workflow.'],
                    'bullets_intro' => 'Instructor check-ins are informal conversations as I visit each team:',
                    'bullets' => [
                        'What have you discovered so far?',
                        'What accessibility or usability problems are emerging?',
                        'Which findings can you connect to WCAG criteria?',
                        'Are there cognitive-load issues WCAG does not fully address?',
                        'What are you proposing to improve, and why?',
                    ],
                    'challenge_reference' => ['title' => 'Challenge 06: Reduce the Friction', 'description' => 'Return to the existing challenge brief; no new deliverables are added for this studio.', 'link_label' => 'Open Challenge 06 →'],
                    'actions' => [
                        ['label' => 'Open Challenge 06 →', 'route' => 'modules.challenge', 'params' => ['module' => 6]],
                        ['label' => 'Open GearShare →', 'route' => 'experiences.gearshare', 'new_tab' => true],
                    ],
                    'note' => 'These prompts guide instructor check-ins only. Teams do not present to the whole class and do not submit additional work beyond Challenge 06.',
                ],
                [
                    'title' => 'Quiz 3 — Thursday, October 29, 2026',
                    'paragraphs' => [
                        'At-home quiz.',
                        'Covers course concepts and applied accessibility evaluation.',
                        'Additional instructions will be provided before the quiz.',
                    ],
                    'note' => 'After Module 06, the course shifts toward accessibility evaluation and final-project studio work.',
                ],
            ],
            'resources' => [...$cognitiveResources, ...$cognitiveCriteriaResources],
        ],
    ],
    'challenge' => [
        'label' => 'CHALLENGE 06',
        'title' => 'Reduce the Friction',
        'metadata' => 'Team Challenge · 10 points',
        'overview_heading' => 'Challenge 06: Reduce the Friction',
        'status' => 'current',
        'summary' => 'Investigate 12 deliberate issues with evidence, redesign one meaningful part, and choose two priorities.',
        'question' => 'What kind of accessibility problem are you looking at, and what would you change?',
        'problem_title' => 'The Task',
        'problem' => 'You need a Camera Kit for a field shoot Thursday afternoon. Use GearShare to find an available kit, arrange pickup, and submit the request.',
        'problem_after' => 'GearShare contains 12 deliberate issues for you to investigate. Some map directly to accessibility requirements. Others require a more careful accessibility or inclusive-design judgment. Evaluate all 12.',
        'experience_under_review' => ['name' => 'GearShare: Borrow production equipment for your next project.', 'link' => ['label' => 'Open GearShare →', 'route' => 'experiences.gearshare', 'new_tab' => true]],
        'team_assignment' => 'Work with your existing HuskyCT-managed team. Complete the Camera Kit task once, then investigate and discuss all 12 issues. Use fictional information in this local simulation.',
        'investigation' => [
            'Observation: Describe what happens for each of the 12 issues.',
            'Classification: Choose one: Specific accessibility requirement; Broader accessibility / inclusive-design concern; Not enough evidence to call this an accessibility failure.',
            'Evidence: Match the observed behavior to authoritative guidance. Identify criterion level and version where relevant. Explain uncertainty rather than inventing a failure.',
            'Recommendation: State what should change.',
        ],
        'evidence_scope' => 'Apply the Module 01 evidence framework: distinguish law, technical standards, institutional requirements, and broader guidance. Use authoritative sources, and make only claims your evidence supports. Automated-tool output and AI output are not proof of accessibility or conformance. You do not need to label findings by module.',
        'investigation_note' => 'Use one concise table or section per item with Observation, Classification, Evidence, and Recommendation. No separate verification paragraph is required. How do you know?',
        'solution_title' => 'Redesign One Meaningful Part',
        'redesign' => 'Create an annotated wireframe, polished mockup, working HTML/CSS prototype, or another clear interactive design artifact. Address at least two identified concerns in one meaningful part of GearShare. Explain briefly what changed, why, and what evidence informed the change. Advanced coding is not required.',
        'priority' => 'Choose your Top Two priorities. For each, write 1–2 sentences explaining why. Consider safety, task blockage, time pressure, cognitive burden, number of users affected, and strength of evidence.',
        'deliverable' => [
            'summary' => 'Submit one team PDF through HuskyCT.',
            'items' => [
                ['title' => '12-item Evaluation', 'description' => 'Evaluate all 12 issues using Observation, Classification, Evidence, and Recommendation.'],
                ['title' => 'One Redesign Artifact', 'description' => 'Address at least two concerns and explain the changes and evidence.'],
                ['title' => 'Top Two Priorities', 'description' => 'Give 1–2 sentences explaining each priority.'],
                ['title' => 'Brief AI Use Note', 'description' => 'Name tools used and their contribution, or state that no generative AI was used.'],
            ],
        ],
        'format_note' => 'Keep the submission concise and complete. No prescribed page count or presentation. Teams remain responsible for claims, classifications, sources, recommendations, and design decisions.',
        'evaluation_criteria' => [
            ['title' => 'Classification and judgment', 'points' => 4, 'description' => 'Accurately distinguishes specific requirements, broader accessibility concerns, and unsupported preference.'],
            ['title' => 'Evidence', 'points' => 2, 'description' => 'Uses appropriate authoritative guidance and matches evidence to the claim.'],
            ['title' => 'Redesign', 'points' => 2, 'description' => 'Meaningfully reduces identified friction and is clearly communicated.'],
            ['title' => 'Prioritization', 'points' => 1, 'description' => 'Top Two reflects reasonable accessibility judgment.'],
            ['title' => 'Communication and AI Use Note', 'points' => 1, 'description' => 'Clear, concise, complete team submission.'],
        ],
        'evaluation_total' => 10,
        'class_work' => [],
        'class_work_section_description' => 'Team evaluations and redesigns will be archived here after the challenge cycle.',
        'class_work_empty_message' => 'Challenge 06 team work will appear here after the challenge cycle.',
    ],
    'resources' => [...$motionResources, ...$cognitiveResources],
    'resource_collections' => [
        ['title' => 'Motion, Timing, and Safety', 'resources' => $motionResources],
        ['title' => 'Cognition and Predictability', 'resources' => $cognitiveResources],
    ],
];

$session12 = $module['sessions'][12];
$module['sessions'][12]['presentation_slides'] = [
    ['title' => $session12['title'], 'paragraphs' => [$session12['overview']], 'question' => $session12['question']],
    ['title' => 'What Gets Your Attention?', 'paragraphs' => $session12['sections'][0]['paragraphs_after'], 'question' => $session12['sections'][0]['emphasis'][0]],
    ['title' => 'Can You Stop It?', 'paragraphs' => $session12['sections'][1]['paragraphs'], 'actions' => $session12['sections'][1]['actions'], 'question' => $session12['sections'][1]['emphasis'][0], 'evidence' => 'WCAG 2.2.2 Pause, Stop, Hide · Level A', 'note' => 'Give users control over automatic movement and updates alongside other content, unless essential. Moving information that lasts beyond five seconds needs pause, stop, or hide; auto-updates have no five-second exemption.'],
    ['title' => 'Why Is There a Clock?', 'paragraphs' => [$session12['sections'][2]['paragraphs'][0]], 'actions' => $session12['sections'][2]['actions'], 'question' => $session12['sections'][2]['emphasis'][0], 'evidence' => 'WCAG 2.2.1 Timing Adjustable · Level A', 'note' => 'Determine whether the limit is necessary. Where required, let users turn it off, adjust it, or extend it. Full exceptions and extension requirements are in View all.'],
    ['title' => 'How Fast Is Too Fast?', 'paragraphs' => [$session12['sections'][3]['paragraphs'][0]], 'actions' => $session12['sections'][3]['actions'], 'question' => $session12['sections'][3]['emphasis'][0], 'evidence' => 'WCAG 2.3.1 Three Flashes or Below Threshold · Level A', 'safety_note' => 'The course does not display unsafe flashing.', 'note' => 'Frequency, area, brightness, and red flashing affect safety. Avoid unnecessary flashing; do not guess that an effect is safe.'],
    ['title' => 'What If the Motion Is the Problem?', 'paragraphs' => [$session12['sections'][4]['paragraphs'][0]], 'actions' => $session12['sections'][4]['actions'], 'question' => 'What information disappears when the motion is removed?', 'evidence' => 'WCAG 2.3.3 Animation from Interactions · AAA', 'note' => 'AAA, not AA. CSS prefers-reduced-motion responds to a system preference. Respecting it is a strong accessibility practice, not itself a universal WCAG 2.1 AA requirement.'],
    ['title' => 'What Kind of Claim Can You Make?', 'categories' => ['Specific accessibility requirement', 'Broader accessibility concern / good practice', 'Not enough evidence to call it an accessibility failure'], 'question' => 'How do you know?'],
];
foreach ($session12['sections'][6]['ordered'] as $scenario) {
    $module['sessions'][12]['presentation_slides'][] = [
        'title' => 'Class Work',
        'paragraphs' => [$scenario],
        'note' => 'Classify it: Specific accessibility requirement; Broader accessibility concern / good practice; or Not enough evidence to call it an accessibility failure.',
        'question' => 'How do you know? What remains uncertain?',
    ];
}

$session13 = $module['sessions'][13];
$presentationSlideKeys = ['title', 'paragraphs', 'example_view', 'actions', 'bullets', 'question', 'evidence', 'note'];
$module['sessions'][13]['presentation_slides'] = array_map(
    static fn (array $section): array => array_intersect_key($section, array_flip($presentationSlideKeys)),
    $session13['sections'],
);

return $module;
