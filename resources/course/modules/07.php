<?php

$toolResources = [
    ['label' => 'WAVE', 'href' => 'https://wave.webaim.org/', 'meta' => 'WebAIM · Evaluation tool'],
    ['label' => 'WAVE Help', 'href' => 'https://wave.webaim.org/help', 'meta' => 'WebAIM · Reading a report'],
    ['label' => 'WAVE Icon Documentation', 'href' => 'https://wave.webaim.org/api/docs?format=html', 'meta' => 'WebAIM · Icons and explanations'],
    ['label' => 'Lighthouse Accessibility Score', 'href' => 'https://developer.chrome.com/docs/lighthouse/accessibility/scoring', 'meta' => 'Chrome · Automated audits and scoring'],
    ['label' => 'Evaluating Web Accessibility', 'href' => 'https://www.w3.org/WAI/test-evaluate/', 'meta' => 'W3C WAI · Evaluation guidance'],
    ['label' => 'Testing Tools', 'route' => 'field-guide.entry', 'params' => ['entry' => 'testing-tools'], 'meta' => 'Course Field Guide'],
];
$verificationResources = [
    ['label' => 'WCAG 2.2 Quick Reference', 'href' => 'https://www.w3.org/WAI/WCAG22/quickref/', 'meta' => 'W3C · Criteria, levels, and techniques'],
    ['label' => 'Info and Relationships', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/info-and-relationships.html', 'meta' => 'W3C · 1.3.1 · A'],
    ['label' => 'Keyboard', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/keyboard.html', 'meta' => 'W3C · 2.1.1 · A'],
    ['label' => 'Non-text Content', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/non-text-content.html', 'meta' => 'W3C · 1.1.1 · A'],
    ['label' => 'Status Messages', 'href' => 'https://www.w3.org/WAI/WCAG22/Understanding/status-messages.html', 'meta' => 'W3C · 4.1.3 · AA'],
    ['label' => 'AI & Accessibility', 'route' => 'field-guide.entry', 'params' => ['entry' => 'ai-accessibility'], 'meta' => 'Course Field Guide'],
];
$toolAction = ['label' => 'Open Studio Booking sample →', 'route' => 'experiences.module07.tools', 'new_tab' => true];
$aiAction = ['label' => 'Open Studio Plan sample →', 'href' => '/samples/module07-studio-plan.html', 'new_tab' => true];
$workflow = [
    'Observe — What actually happened? Describe behavior before adopting a tool’s explanation.',
    'Claim — What specific accessibility problem do you think that behavior indicates?',
    'Evidence — What supports the conclusion? Use WCAG / W3C, official institutional or legal guidance where relevant, direct measurement, or reproducible browser behavior.',
    'Test — What could establish the claim? Choose keyboard, screen reader, accessibility tree, WAVE, Lighthouse, contrast measurement, zoom/reflow, or direct task completion to fit the question.',
    'Fix — What change addresses the actual problem?',
    'Retest — Repeat the relevant test. Was the problem corrected? Does the task still work? Did the change introduce another problem?',
];

$module = [
    'label' => 'MODULE 07',
    'title' => 'The AI Says It’s Accessible. Is It?',
    'central_question' => 'What can a tool tell you about accessibility, and what still has to be established through evidence and testing?',
    'overview' => 'Accessibility tools can find real problems quickly. They can also miss barriers, flag things that require human judgment, or produce results that sound more definitive than they are. This module looks at what WAVE, Lighthouse, and generative AI can tell you, what they cannot, and how to verify a finding before you rely on it.',
    'status' => 'complete',
    'sessions' => [
        14 => [
            'label' => 'SESSION 14',
            'title' => 'What Can the Tool Actually Tell You?',
            'status' => 'complete',
            'question' => 'What does an automated accessibility result actually establish?',
            'summary' => 'Read WAVE deliberately, compare Lighthouse on the same page, and identify what still requires you.',
            'overview' => 'Automated tools are good at checking conditions that software can evaluate consistently. Accessibility includes many things software cannot determine on its own.',
            'sections' => [
                ['title' => 'Zero Errors. What Do You Know?', 'paragraphs' => ['Before continuing, write one sentence answering the question below. Return to it after testing the sample.'], 'emphasis' => ['If a tool reports zero errors, what have you actually established?']],
                ['title' => 'Your Tools for This Module', 'paragraphs' => ['Work through both sessions independently. Use presentation mode or View all; every activity and reveal includes its own instructions. Keep brief notes. Only Challenge 07 is submitted.', 'You need WAVE, Chrome Lighthouse, and one generative AI assistant for Session 15. No paid product or model is required. No other accessibility extension is assigned.', 'For a public course sample, enter its full URL at wave.webaim.org. If you are running the course locally or behind a login, the WAVE extension can evaluate it in your browser; the online service cannot reach localhost. Lighthouse is already built into Chrome.']],
                ['title' => 'Read WAVE Deliberately', 'example_view' => 'course.examples.module07.wave-guide'],
                ['title' => 'Try This First: Studio Booking', 'paragraphs' => ['Open the sample in a new tab. Your task is to choose a studio time and reserve it. Run WAVE before opening Check Your Work. Keep this original page for the Lighthouse comparison.', 'In your notes, record one Error, one Alert, one Feature, and one thing WAVE did not establish. Include the affected element and the next inspection or test you would use. These are learning notes, not a separate submission.'], 'actions' => [$toolAction], 'example_view' => 'course.examples.module07.wave-reveal'],
                ['title' => 'What Does the Score Mean?', 'paragraphs' => ['On that same original sample, open Chrome DevTools → Lighthouse → Accessibility. Select Accessibility, run the page analysis, and expand a finding to inspect its element and explanation. You do not need a browser extension.', 'Lighthouse scores the automated accessibility audits it performs. Manual checks do not contribute to that score. The result is not a WCAG conformance score: even 100 leaves questions for human testing. Record one finding and one manual check the report asks you to do.'], 'actions' => [$toolAction]],
                ['title' => 'Compare Your Results', 'paragraphs' => ['Use the same original page and state for both reports. Copy this table into your notes; no formal submission is required.'], 'example_view' => 'course.examples.module07.comparison', 'paragraphs_after' => ['Tools use different rules, cover different conditions, and present results differently. Some tools share underlying rules or engines, so agreement is not necessarily independent confirmation. Multiple reports still leave gaps. A WAVE Feature and a Lighthouse passed audit also describe different things.'], 'emphasis' => ['Why don’t two automated tools necessarily give you the same report?']],
                ['title' => 'What Still Requires You?', 'bullets' => ['Alt text: alt="Three students using equipment in a studio" exists. Does it communicate the image’s purpose in this context? Revisit Module 03.', 'Keyboard interaction: reasonable-looking markup does not establish working behavior. Use the control, as in Module 04.', 'Error messages: a relationship or error container may exist. Does its message actually help someone recover? Revisit Module 05.', 'Cognitive burden: dense instructions can use valid markup and still create a broader accessibility concern. Apply Module 06 without inventing a WCAG failure.'], 'emphasis' => ['Which of these can a rule reliably determine without understanding the task?']],
                ['title' => 'What Kind of Result Is This?', 'bullets' => ['Automated finding — a rule software can evaluate directly.', 'Needs human review — the tool identifies something that requires context or judgment.', 'Manual test — the condition must be evaluated through interaction, perception, or task context.'], 'paragraphs_after' => ['Return to your opening sentence. Zero reported errors establishes only that the tested rules did not report errors on the evaluated page and state. What remains untested?'], 'closing_emphasis' => ['A tool report is not a conformance determination.', 'How do you know?']],
            ],
            'resources' => $toolResources,
        ],
        15 => [
            'label' => 'SESSION 15',
            'title' => 'How Do You Know the Fix Worked?',
            'status' => 'complete',
            'question' => 'How do you verify an accessibility claim or proposed correction?',
            'summary' => 'Investigate AI claims, test a proposed correction, and build evidence for a defensible conclusion.',
            'overview' => 'Generative AI can help you inspect code, suggest explanations, and propose corrections. Treat it as a useful assistant whose output requires verification, just as a tool report needs interpretation.',
            'sections' => [
                ['title' => 'Observe → Claim → Evidence → Test → Fix → Retest', 'bullets' => $workflow, 'emphasis' => ['How do you know?']],
                ['title' => 'One Assistant. One Shared Sample.', 'paragraphs' => ['Use Microsoft Copilot, ChatGPT, or another comparable generative AI assistant you already use. A free option is sufficient. Use only the fictional Studio Plan sample below; do not upload personal, sensitive, or university-restricted data.', 'Open the working sample and try saving a plan with the pointer and keyboard. Then copy all the supplied HTML, CSS, and JavaScript into your assistant with the exact initial prompt below. The code includes the behavior; no screenshot is needed. Different responses are expected.'], 'actions' => [$aiAction], 'example_view' => 'course.examples.module07.ai-sample'],
                ['title' => 'Investigate Three Claims', 'paragraphs' => ['For at least three AI claims, use Observe → Claim → Evidence → Test → Fix → Retest. Keep this investigation in your learning notes; it is not another formal assignment.', 'Reproduce or inspect the claimed behavior. Open the cited WCAG source and check the criterion number, scope, and A/AA/AAA level. Decide whether it supports the claim. Evaluate the correction and retest where applicable.', 'If the assistant gives fewer than three claims, ask it to assess heading semantics, keyboard activation, image purpose, and save feedback. Keep the original response and this follow-up. Do not manufacture a failure to reach three.'], 'bullets' => ['Supported — the observation and source support the conclusion.', 'Partially supported — something useful was noticed, but the claim overstates, misclassifies, or incompletely explains it.', 'Unsupported — the evidence does not establish the claim.'], 'example_view' => 'course.examples.module07.claim-record'],
                ['title' => 'Does This Fix the Button?', 'paragraphs' => ['An assistant suggests adding role="button" and tabindex="0" to a clickable div. Before revealing the answer, inspect the snippet below. What do those attributes establish? What would you still test?'], 'example_view' => 'course.examples.module07.button-reveal'],
                ['title' => 'Check Your Investigation', 'paragraphs' => ['Compare your evidence with these observations only after investigating the response. An assistant may find these issues, miss them, or cite an unrelated criterion. Judge its actual claims.'], 'example_view' => 'course.examples.module07.ai-reveal'],
                ['title' => 'Make One Change. Retest It.', 'paragraphs' => ['Download the Studio Plan HTML from the sample section. Save an original copy and a working copy. Open the working file in Chrome and edit it in any text editor. Everything is in one file; nothing is installed or submitted by the sample.', 'Choose one supported correction. Record the original behavior and test steps, edit the working copy, save it, reload the browser, and repeat the same test. Also complete the task with pointer and keyboard to check for regressions.', 'For a keyboard correction, compare Tab, Enter, and Space before and after. Inspect the accessible name and role in Chrome’s accessibility tree. WAVE or a higher Lighthouse score cannot replace the interaction test. For an announcement claim, verify actual announcement with a screen reader available to you; if you cannot, record that limit instead of claiming success.', 'Use your original WAVE and Lighthouse reports for context. To scan a local working copy with WAVE, use WAVE’s browser extension. Recheck the affected rule when relevant, then state precisely what the retest establishes.'], 'actions' => [$aiAction]],
                ['title' => 'Prove It', 'paragraphs' => ['You now have a workflow for both ordinary automation and generative AI. A plausible explanation starts an investigation; evidence and repeatable tests support the conclusion.'], 'emphasis' => ['AI output is not evidence.', 'A tool report is not a conformance determination.'], 'challenge_reference' => ['intro' => 'Apply the workflow individually.', 'title' => 'Challenge 07 — Prove It', 'description' => 'Review one approved UConn page: explore automated reports, validate findings, test manually, and verify AI claims with WCAG evidence.']],
            ],
            'resources' => [...$verificationResources, ...$toolResources],
        ],
    ],
    'challenge' => [
        'title' => 'Prove It',
        'metadata' => 'Individual Challenge · 10 points',
        'question' => 'What evidence supports your accessibility claim, and how do you know?',
        'summary' => 'Review one approved public UConn page using WAVE, Lighthouse, manual testing, and AI. Validate findings and support your conclusions with WCAG evidence.',
        'problem_title' => 'The Task',
        'problem_view' => 'course.examples.module07.challenge-task',
        'assignment_view' => 'course.examples.module07.challenge-parts',
        'approved_pages' => [
            ['label' => 'UConn Student Activities', 'href' => 'https://studentactivities.uconn.edu/'],
            ['label' => 'UConn Recreation', 'href' => 'https://recreation.uconn.edu/'],
            ['label' => 'UConn Dining Services', 'href' => 'https://dining.uconn.edu/'],
            ['label' => 'UConn Library', 'href' => 'https://library.uconn.edu/'],
        ],
        'ai_prompt' => 'I am reviewing this webpage for accessibility. Here are several findings from WAVE, Lighthouse, and my manual testing. For each, tell me whether the evidence appears to support an accessibility issue, identify the relevant WCAG success criterion and level where applicable, and suggest what I should verify before making the claim.',
        'deliverable' => [
            'title' => 'Submit',
            'summary' => 'Submit one concise individual PDF through HuskyCT.',
            'checklist' => [
                'Selected UConn page, including URL and review context',
                'WAVE notes',
                'Lighthouse notes',
                'Three validated automated findings',
                'At least two manual tests and one manual observation',
                'Three checked AI claims or recommendations',
                'At least three relevant WCAG citations, with number, name, level, and W3C source',
                'Short final reflection',
                'Brief AI Use Note',
            ],
        ],
        'format_note' => 'Screenshots are encouraged where useful. You do not need a screenshot of every result, and there is no prescribed page count.',
        'ai_use' => 'Name your assistant and briefly describe how you used it, including any follow-up prompts. Distinguish its suggestions from your verified conclusions.',
        'evaluation_total' => 10,
        'evaluation_criteria' => [
            ['title' => 'Tool exploration', 'points' => 2, 'description' => 'Meaningfully uses and documents both WAVE and Lighthouse.'],
            ['title' => 'Validate findings', 'points' => 3, 'description' => 'Investigates three automated findings and supports conclusions with appropriate evidence.'],
            ['title' => 'Manual testing', 'points' => 2, 'description' => 'Uses appropriate manual testing and recognizes something automation does not establish.'],
            ['title' => 'AI verification and WCAG evidence', 'points' => 2, 'description' => 'Checks AI claims and uses relevant WCAG criteria accurately.'],
            ['title' => 'Limits, communication, and AI Use Note', 'points' => 1, 'description' => 'Keeps conclusions within the available evidence and communicates clearly.'],
        ],
        'class_work' => [],
        'class_work_empty_message' => 'Challenge 07 work will appear here after the challenge cycle.',
    ],
    'resources' => [...$toolResources, ...$verificationResources],
    'resource_collections' => [
        ['title' => 'Automated Evaluation', 'resources' => $toolResources],
        ['title' => 'Claims, Evidence, and Verification', 'resources' => $verificationResources],
    ],
];

foreach ($module['sessions'] as &$session) {
    $session['presentation_slides'] = [
        ['title' => $session['title'], 'paragraphs' => [$session['overview']], 'question' => $session['question']],
    ];

    foreach ($session['sections'] as $section) {
        $paragraphs = [...($section['paragraphs'] ?? []), ...($section['paragraphs_after'] ?? [])];
        $notes = [...($section['emphasis'] ?? []), ...($section['closing_emphasis'] ?? [])];
        $slide = ['title' => $section['title'], 'paragraphs' => $paragraphs, 'bullets' => $section['bullets'] ?? [], 'actions' => $section['actions'] ?? [], 'example_view' => $section['example_view'] ?? null, 'note' => implode(' ', $notes)];

        if (! empty($section['challenge_reference'])) {
            $slide['actions'][] = ['label' => 'Open Challenge 07 →', 'route' => 'modules.challenge', 'params' => ['module' => 7]];
        }

        $session['presentation_slides'][] = $slide;
    }
}
unset($session);

return $module;
