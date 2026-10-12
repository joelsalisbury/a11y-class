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

$module = [
    'label' => 'MODULE 06',
    'title' => 'Why Is This So Hard to Use?',
    'central_question' => 'What can make an experience difficult, distracting, disorienting, or unsafe even when its basic controls work?',
    'overview' => 'An interface can be keyboard accessible, correctly labeled, and technically functional while still demanding too much from the user. Motion can distract or cause physical discomfort. Flashing can create a safety risk. Time limits can prevent someone from completing a task. Dense or unpredictable interfaces can demand unnecessary memory and interpretation. This module looks at accessibility where safety, cognition, predictability, and usability overlap.',
    'status' => 'upcoming',
    'sessions' => [
        12 => [
            'label' => 'SESSION 12',
            'title' => 'When Does Motion Become a Barrier?',
            'status' => 'upcoming',
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
            'title' => 'Why Is This So Hard to Follow?',
            'status' => 'upcoming',
            'question' => 'When does an interface make the user remember, interpret, or manage more than necessary?',
            'summary' => 'Compare content, memory demands, predictability, and consistency, then begin the team classification and redesign challenge.',
            'overview' => 'Some barriers are easy to measure. Others appear when a technically functional interface asks the user to remember too much, interpret unclear language, predict unexpected behavior, or recover from unnecessary complexity.',
            'sections' => [
                [
                    'title' => 'What Does the Interface Ask of You?',
                    'emphasis' => ['If the interface technically works, what evidence tells us it still creates an accessibility problem?'],
                    'paragraphs_after' => ['Cognitive load includes keeping track of choices, interpreting instructions, and remembering the next step. Notice what work belongs to the task and what work the interface adds.'],
                ],
                [
                    'title' => 'Can You Find the Action?',
                    'paragraphs' => ['Compare the two versions of the pickup instructions. They contain the same information. Which makes the action, deadline, and location easier to find?'],
                    'example_view' => 'course.modules.module06-clear-content',
                    'paragraphs_after' => ['W3C cognitive-accessibility guidance recommends familiar language, manageable chunks, and clear instructions. A clearer rewrite can reduce barriers for people with cognitive and learning disabilities. Not every writing recommendation maps directly to a WCAG AA failure.'],
                ],
                [
                    'title' => 'Why Am I Entering This Again?',
                    'paragraphs' => ['In the memory comparison, enter a fictional contact address, then complete pickup details. Compare entering it again with reusing the earlier value.', 'WCAG 2.2 added 3.3.7 Redundant Entry (Level A). Information required again in the same process should be auto-populated or available to select, unless an exception applies, such as essential re-entry, security, or information that is no longer valid. This was not a WCAG 2.1 requirement.'],
                    'actions' => [['label' => 'Open cognitive-accessibility examples →', 'route' => 'experiences.module06.cognition', 'new_tab' => true]],
                    'emphasis' => ['Do not make users remember information the interface already knows.'],
                ],
                [
                    'title' => 'Did I Ask It to Do That?',
                    'paragraphs' => ['In the predictability comparison, change a pickup location. One version moves focus to the request section immediately; the other waits for an explicit button.', 'WCAG 3.2.1 On Focus and 3.2.2 On Input are Level A. Focus alone must not change context. Changing a setting must not automatically change context unless the user was advised beforehand. Updating related content is not always a change of context; moving focus elsewhere is.'],
                    'emphasis' => ['Can you explore an option without committing to something else?'],
                ],
                [
                    'title' => 'Is This the Same Action?',
                    'paragraphs' => ['Imagine the same save function labeled Save on a project page, Store on its settings page, and Keep on its review page. The user has to decide whether these mean the same thing.', 'WCAG 3.2.4 Consistent Identification (Level AA) concerns components with the same functionality within a set of web pages. Consistency also helps within a single page, but a same-page label comparison alone does not establish the full criterion. Different labels can be appropriate when purpose or context differs.'],
                    'emphasis' => ['Is the user learning one interface, or relearning the same thing repeatedly?'],
                ],
                [
                    'title' => 'Same Task, More Work',
                    'paragraphs' => ['Choose a production-equipment kit and a pickup window in the contained teaching experience. Complete the task once before analyzing it.'],
                    'actions' => [['label' => 'Open Same Task, More Work →', 'route' => 'experiences.module06.cognition', 'new_tab' => true]],
                    'ordered' => ['What made the task harder?', 'Is there a specific standard or criterion?', 'Is there broader W3C guidance?', 'Is this simply a design preference?', 'What would you change first?'],
                    'note' => 'A preference can suggest a useful change. It cannot establish an accessibility failure without supporting evidence.',
                ],
                [
                    'title' => 'Can You Pick Up Where You Left Off?',
                    'paragraphs' => ['Start the same task with these details: an Audio Kit, Thursday 2 PM, a two-person interview, and a two-day loan. Before requesting it, stop and look away. Briefly discuss which information should remain visible, then return to the task. This is an interruption test.'],
                    'bullets' => ['Is the current state obvious?', 'Is the next action obvious?', 'Did the interface preserve progress?', 'Does the user have to reconstruct information from memory?'],
                    'paragraphs_after' => ['A visible summary, a clear next action, and preserved progress can reduce memory demands. Support that recommendation with W3C guidance rather than claiming every interrupted task automatically fails AA.'],
                ],
                [
                    'title' => 'Begin Challenge 06: Reduce the Friction',
                    'paragraphs' => ['Use your existing HuskyCT-managed team. Challenge 06 is a 10-point team evaluation and redesign. GearShare contains 12 deliberate issues; evaluate all 12 in the final submission.'],
                    'ordered' => ['Open GearShare and request a Camera Kit for a field shoot Thursday afternoon.', 'Identify at least two candidate design decisions.', 'Begin classifying them and finding supporting guidance.', 'Choose a meaningful part your team may redesign.'],
                    'challenge_reference' => ['title' => 'Reduce the Friction', 'description' => 'Classify with evidence, redesign one part, and choose your Top Two priorities.', 'link_label' => 'Open Challenge 06 →'],
                    'actions' => [['label' => 'Open GearShare →', 'route' => 'experiences.gearshare', 'new_tab' => true]],
                    'note' => 'Begin in class. Submit the team PDF through HuskyCT by its official deadline; no submission is required today.',
                ],
            ],
            'resources' => $cognitiveResources,
        ],
    ],
    'challenge' => [
        'label' => 'CHALLENGE 06',
        'title' => 'Reduce the Friction',
        'metadata' => 'Team Challenge · 10 points',
        'overview_heading' => 'Challenge 06: Reduce the Friction',
        'status' => 'upcoming',
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
$module['sessions'][13]['presentation_slides'] = [
    ['title' => $session13['title'], 'paragraphs' => [$session13['overview']], 'question' => $session13['question']],
    ['title' => $session13['sections'][0]['title'], 'paragraphs' => $session13['sections'][0]['paragraphs_after'], 'question' => $session13['sections'][0]['emphasis'][0]],
    ['title' => $session13['sections'][1]['title'], 'example_view' => $session13['sections'][1]['example_view'], 'question' => 'Which version makes the action, deadline, and location easier to find?', 'evidence' => 'W3C supplemental cognitive-accessibility guidance', 'note' => 'Clear content and instructions reduce interpretation. These recommendations are not themselves WCAG AA conformance requirements.'],
    ['title' => $session13['sections'][2]['title'], 'paragraphs' => [$session13['sections'][2]['paragraphs'][0]], 'actions' => $session13['sections'][2]['actions'], 'question' => $session13['sections'][2]['emphasis'][0], 'evidence' => 'WCAG 2.2 · 3.3.7 Redundant Entry · Level A', 'note' => 'Added in WCAG 2.2. In the same process, auto-populate earlier information or make it available to select, unless an exception applies.'],
    ['title' => $session13['sections'][3]['title'], 'paragraphs' => [$session13['sections'][3]['paragraphs'][0]], 'actions' => $session13['sections'][2]['actions'], 'question' => $session13['sections'][3]['emphasis'][0], 'evidence' => '3.2.1 On Focus / 3.2.2 On Input · Level A', 'note' => 'Focus alone must not change context. Changing a setting must not automatically change context without advance advice. A content update is not always a context change.'],
    ['title' => $session13['sections'][4]['title'], 'paragraphs' => [$session13['sections'][4]['paragraphs'][0]], 'question' => $session13['sections'][4]['emphasis'][0], 'evidence' => '3.2.4 Consistent Identification · Level AA', 'note' => 'The criterion concerns the same functionality within a set of web pages. Same-page inconsistency alone does not establish the full criterion.'],
    ['title' => $session13['sections'][5]['title'], 'paragraphs' => $session13['sections'][5]['paragraphs'], 'actions' => $session13['sections'][5]['actions'], 'bullets' => $session13['sections'][5]['ordered'], 'question' => 'What would you change first?', 'note' => $session13['sections'][5]['note']],
    ['title' => $session13['sections'][6]['title'], 'paragraphs' => [$session13['sections'][6]['paragraphs'][0]], 'bullets' => $session13['sections'][6]['bullets'], 'question' => 'What must you reconstruct from memory?', 'evidence' => 'W3C supplemental guidance: reduce memory demands', 'note' => 'This is an interruption test. Preserve state, make progress visible, and clarify the next action.'],
    ['title' => $session13['sections'][7]['title'], 'paragraphs' => $session13['sections'][7]['paragraphs'], 'bullets' => $session13['sections'][7]['ordered'], 'actions' => [...$session13['sections'][7]['actions'], ['label' => 'Open Challenge 06 →', 'route' => 'modules.challenge', 'params' => ['module' => 6]]], 'question' => 'Which part might your team redesign?', 'note' => $session13['sections'][7]['note']],
];

return $module;
