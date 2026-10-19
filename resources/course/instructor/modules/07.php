<?php

/**
 * File-only instructor guidance. Course::instructorModule(7) refuses HTTP access.
 * This live-site review has no predetermined failures or model answer key.
 */
return [
    'module' => 'MODULE 07',
    'title' => 'Challenge 07: Prove It — Live UConn Page Review',
    'not_public' => true,
    'delivery' => 'Read this source file locally. Publish the separate HuskyCT copy with the course-site assignment link.',
    'scope' => 'One approved public UConn page; one concise individual PDF; 10 points. No remediation implementation. Studio Booking and Studio Plan remain teaching activities in Sessions 14–15.',
    'grading_guidance' => [
        'Assess appropriate tool use and meaningful exploration of WAVE categories and Lighthouse audits, not error totals.',
        'Evaluate the accuracy of claims and the quality of verification: actual elements, reproducible behavior, and evidence supporting the conclusion.',
        'Three automated findings may include alerts, features, or passed audits. Accept supported qualifications and rejections. Do not require three failures.',
        'At least two appropriate manual checks and one observation should explain something automation did not establish. Correct behavior and unresolved questions are valid observations.',
        'Check at least three relevant WCAG criteria for number, name, level, W3C source, and applicability. Do not reward unrelated citations.',
        'Three AI claims or recommendations must be checked, but the AI need not be wrong. Assess appropriate skepticism through verification rather than disagreement.',
        'Judge conclusions within the reviewed page, state, and test coverage. One page cannot establish accessibility or conformance of an entire website.',
        'Live pages change. Different students may produce different valid findings. Do not penalize a student simply because their chosen page has fewer automated errors.',
        'Keep the workload appropriate for 10 points: selected findings, brief evidence, useful screenshots where needed, no exhaustive criterion checklist or full professional audit.',
    ],
    'rubric' => [
        ['title' => 'Tool exploration', 'points' => 2],
        ['title' => 'Validate findings', 'points' => 3],
        ['title' => 'Manual testing', 'points' => 2],
        ['title' => 'AI verification and WCAG evidence', 'points' => 2],
        ['title' => 'Limits, communication, and AI Use Note', 'points' => 1],
    ],
];
