<?php

return [
    'number' => 9,
    'label' => 'MODULE 09',
    'title' => 'What Would You Fix First?',
    'status' => 'current',
    'central_question' => 'How should accessibility problems be prioritized when everything cannot be fixed at once?',
    'overview' => 'An evaluation produces observations, but teams still have to decide what to address first. This module connects task completion, user impact, evidence, and practical constraints so that a priority is a reasoned judgment rather than a guess or a tool score.',
    'learning_objectives' => [
        'Distinguish successful task completion from the effort, uncertainty, and barriers a person experiences along the way.',
        'Describe an accessibility finding with its location, evidence, affected task, and user impact.',
        'Compare findings using task completion, severity, frequency, scope, workarounds, confidence, dependencies, and effort.',
        'Explain and communicate a defensible remediation priority without treating a numerical score as a substitute for judgment.',
        'Connect a proposed improvement to evidence and describe how its effectiveness could be verified.',
    ],
    'sessions' => [
        17 => [
            'label' => 'SESSION 17',
            'title' => 'Can You Actually Complete the Task?',
            'status' => 'current',
            'question' => 'Can someone finish the task, and what did it take to get there?',
            'summary' => 'Tuesday, November 3, 2026. Look at what a website is meant to do, what it takes to do it, and what you would fix first.',
            'overview' => 'We have spent much of the semester learning to spot accessibility problems. Now comes the next question: when you find several things that could be better, where do you start? Start with what the website is supposed to help someone do. Then look at whether people can do it, what it takes to get there, and what the evidence tells you.',
            'sections' => [
                [
                    'title' => 'Start with what the website is supposed to do',
                    'paragraphs' => [
                        'A course registration system should help students register for courses. A library website should help people find books. An online store should let people buy something. Sounds obvious, right? It gives us a useful place to begin: what is someone trying to do here?',
                        'If a person cannot complete an important task, that is probably worth investigating. It does not tell us the cause all by itself, or prove a particular WCAG failure, but it does tell us to take a closer look.',
                    ],
                    'emphasis' => [
                        'First ask what the website is for. Then see whether people can actually do it.',
                    ],
                    'paragraphs_between_emphasis' => [
                        'Pay attention to both the finish line and the path someone takes to reach it.',
                    ],
                ],
                [
                    'title' => 'Getting to the finish line is not everything',
                    'paragraphs' => [
                        'Imagine two students using the same registration system. One finds five courses, builds a schedule, and submits it in ten minutes. The other spends forty minutes wrestling with confusing instructions, loses their schedule twice, and finally asks a friend to help.',
                        'Both students got the job done. Would you call those equally good experiences? And what happens when the second student does not have someone available to help?',
                        'A successful outcome matters, but it does not tell us how much effort, uncertainty, or help it took. One person finishing once also does not prove that the experience works for everyone.',
                    ],
                    'bullets_intro' => 'When you test a task, notice whether the person:',
                    'bullets' => [
                        'Reached the intended outcome.',
                        'Got there, but ran into confusion, extra effort, errors, or lost work along the way.',
                        'Could only complete part of the task, or could not complete it using the method they were testing.',
                        'Needed a workaround or another person’s help, and whether that kept the process independent.',
                    ],
                ],
                [
                    'title' => 'So, what should we fix first?',
                    'paragraphs' => [
                        'Suppose you find a keyboard-inaccessible button, instructional text with poor contrast, a decorative image with an unnecessarily long description, and an error message that does not explain what went wrong. Which matters most?',
                        'It depends on what each problem keeps people from doing. A keyboard-inaccessible button that submits an application is a bigger deal than one that opens an optional sidebar. That does not mean the other issues do not matter; it means we need to think about the task and its consequences.',
                    ],
                    'bullets_intro' => 'Here are a few questions to help you make the call:',
                    'bullets' => [
                        'What is the consequence? Does it stop someone from finishing, hide important information, or make something harder?',
                        'Who runs into it? Is it one unusual situation, or could it affect a whole group of people?',
                        'Is there another way to do the task independently?',
                        'What would it take to fix: a quick correction or a larger redesign?',
                    ],
                    'paragraphs_between_emphasis' => [
                        'You do not need an elaborate scoring system. You do need to explain your reasoning. It is also okay to say what you are not sure about, or what you would investigate next.',
                    ],
                ],
                [
                    'title' => 'A useful bug report helps someone reproduce it',
                    'paragraphs' => [
                        'If something does not work, give the next person enough detail to find it. “The course search is broken” is hard to act on.',
                        'Here is a more useful example: “On Course Search, I selected Monday and Open Sections. A course appeared even though its Monday section was full. I expected the results to show only courses with an open Monday section.” Now we know where to look, what happened, and what the person expected.',
                        'That is an example of how to write a report, not a claim that you will see this problem. And if everything works? That is useful information too. Tell us what you tested and what happened.',
                    ],
                    'emphasis' => [
                        'Say where you were, what you tried, what happened, and what you expected instead.',
                    ],
                ],
                [
                    'title' => 'Try a small triage',
                    'paragraphs' => [
                        'Let’s practice with a few reports from a fictional community library. Which would you look into first? There is no magic score or single answer hiding here. Pick one and explain your thinking. These examples are unrelated to Course Selection.',
                    ],
                    'example_view' => 'course.examples.module09.triage',
                ],
                [
                    'title' => 'Studio: Quiz 03 — Course Selection Usability Test',
                    'paragraphs' => [
                        'Today, you get to try the Course Selection application that you will investigate for your Final Project. Use your assigned team’s advising requirements to build a schedule with exactly five courses and at least 15 credits. Avoid time conflicts, fill in the fictional student-information form, and submit your plan. Can you make it all the way to the confirmation page?',
                        'As you go, jot down anything that feels confusing, does not work as expected, or takes more effort than you thought. Your short Quiz 03 report should describe what happened, include two useful observations, and recommend one improvement. Tell us what you actually tested; a task that you could not finish is still useful information.',
                        'This is Quiz 03, not another weekly challenge. The report is your Quiz 03 submission; use HuskyCT for its grading scale and official availability and deadline. If you still need to finish Challenge 08, work on that first.',
                    ],
                    'actions' => [
                        ['label' => 'Open Quiz 03 instructions', 'href' => '/modules/9#quiz-03'],
                        ['label' => 'Open Course Selection', 'route' => 'coursepath.welcome'],
                    ],
                ],
                [
                    'title' => 'Looking ahead: your Final Project',
                    'paragraphs' => [
                        'Course Selection is also the subject of your Final Project. After this first try, you will come back with tools we have practiced: WAVE, keyboard testing, screen readers, contrast checks, and AI-assisted evaluation. You will document what you find, decide what deserves attention first, and suggest ways to make it better.',
                        'You do not need to rebuild the application or write code. You do need to show how you investigated, what evidence you found, and why your recommendations make sense.',
                    ],
                    'actions' => [
                        ['label' => 'Open the Final Project assignment', 'route' => 'final-project'],
                        ['label' => 'Review screen-reader resources', 'route' => 'field-guide.entry', 'params' => ['entry' => 'screen-readers']],
                    ],
                ],
            ],
        ],
    ],
    'quiz' => [
        'id' => 'quiz-03',
        'number' => 3,
        'nav_label' => 'Quiz 03',
        'title' => 'Quiz 03 — Course Selection Usability Test',
        'metadata' => 'Individual take-home assessment · Counts in the existing Quiz category',
        'available' => 'Tuesday, November 3, 2026',
        'summary' => 'Complete an individual usability test of a meaningful Course Selection task using your assigned fictional advising path and invented student information. Focus on the outcome and the evidence you observe; a blocked task is a valid result to report.',
        'requirements' => [
            'Attempt the planning task and report whether you completed it, completed it with friction, completed it only in part, or were blocked. Identify any workaround and whether it preserved your independence.',
            'Write a concise narrative of your test: the task you attempted, the steps you took, and the result.',
            'Describe at least two useful observations. For each, include its location, what you did, what you expected, what happened, and why it matters to the task. An observation may describe a barrier, a strength, or an uncertainty.',
            'Recommend one important improvement and explain how it would help the person complete or understand the task.',
        ],
        'grading_note' => 'Submit the short report through HuskyCT and use the Quiz 03 grading scale published there. Quiz 03 remains one of the three individual quizzes worth 30% total; it is not a Challenge and has no separate grade category. Check HuskyCT for the official availability and deadline.',
    ],
];
