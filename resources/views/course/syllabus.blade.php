<x-layouts.app title="Syllabus">
    @php
        $moduleRoadmap = array_values(\App\Support\Course::modules());

        $toc = [
            ['id' => 'overview', 'label' => 'Overview'],
            ['id' => 'approach', 'label' => 'Approach'],
            ['id' => 'learning-objectives', 'label' => 'Learning Objectives'],
            ['id' => 'standards-legal-context', 'label' => 'Standards & Legal Context'],
            ['id' => 'course-website-tools', 'label' => 'Course Website & Tools'],
            ['id' => 'teams-challenges', 'label' => 'Teams & Challenges'],
            ['id' => 'quizzes', 'label' => 'Quizzes'],
            ['id' => 'final-project', 'label' => 'Final Project'],
            ['id' => 'grading', 'label' => 'Grading'],
            ['id' => 'module-roadmap', 'label' => 'Module Roadmap'],
            ['id' => 'generative-ai', 'label' => 'Generative AI'],
        ];
    @endphp

    <x-page-heading
        label="Course Policies"
        title="Syllabus"
        subtitle="Long-form course reference and expectations. The official syllabus is published in HuskyCT/Blackboard."
    />

    <x-callout title="Official Syllabus" class="mt-8 max-w-4xl">
        The official course syllabus will be published in HuskyCT/Blackboard. This website is intended to provide a useful, current representation of the course structure, activities, and expectations. Any substantive changes to course requirements, grading, assignments, or policies will be communicated to students through the appropriate official course channels.
    </x-callout>

    @php
        $course = \App\Support\Course::config();
        $courseMeta = $course['course'];
        $instructor = $course['instructor'];
    @endphp

    <div class="mt-10 grid gap-8 lg:grid-cols-[16rem_minmax(0,1fr)] lg:items-start">
        <aside class="module-nav-rail hidden lg:block" aria-label="Syllabus navigation">
            <div class="module-nav-rail-panel">
                <p class="meta-label">Syllabus navigation</p>
                <nav class="mt-4" aria-label="Syllabus sections">
                    <ul class="module-nav-list">
                        @foreach ($toc as $item)
                            <li>
                                <a href="#{{ $item['id'] }}" class="module-nav-link">
                                    <span>{{ $item['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="space-y-10">
            <div class="lg:hidden">
                <details class="module-nav-disclosure">
                    <summary class="module-nav-summary">
                        <span>
                            <span class="meta-label">Syllabus navigation</span>
                            <span class="mt-1 block text-sm font-medium text-ink">Jump to a section</span>
                        </span>
                        <span class="text-xs uppercase tracking-[0.14em] text-ink-muted">Open</span>
                    </summary>
                    <nav class="mt-4" aria-label="Syllabus sections">
                        <ul class="module-nav-list">
                            @foreach ($toc as $item)
                                <li>
                                    <a href="#{{ $item['id'] }}" class="module-nav-link">
                                        <span>{{ $item['label'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </details>
            </div>

            <article class="course-flow max-w-4xl">
                <section id="course-information" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Course Information</h2>
                    <div class="course-copy">
                        <p><strong class="text-ink">Instructor:</strong> {{ $instructor['name'] }}</p>
                        <p><strong class="text-ink">Email:</strong> <a href="mailto:{{ $courseMeta['email'] }}" class="font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">{{ $courseMeta['email'] }}</a></p>
                        <p><strong class="text-ink">Meeting:</strong> {{ $courseMeta['meeting_days'] }}, {{ $courseMeta['meeting_time'] }}</p>
                        <p><strong class="text-ink">Location:</strong> {{ $courseMeta['location'] }}</p>
                        <p><strong class="text-ink">Office Hours:</strong> {{ $courseMeta['office_hours'] }}</p>
                    </div>
                </section>

                <section id="about-your-instructor" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">About Your Instructor</h2>
                    <div class="course-copy">
                        @foreach ($instructor['bio'] as $paragraph)
                            @if ($loop->first)
                                <p>I’m <strong class="text-ink">{{ $instructor['name'] }}</strong>. I’m the Director of <a href="{{ $instructor['website'] }}" target="_blank" rel="noopener noreferrer" class="font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">{{ $instructor['website_label'] }}</a> at UConn, where I lead a multidisciplinary team working across digital product design and development, institutional data, research, and emerging technology.</p>
                            @else
                                <p>{!! $paragraph !!}</p>
                            @endif
                        @endforeach
                    </div>
                </section>

                <section id="overview" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Course Description</h2>
                    <div class="course-copy">
                        <p>
                            DMD 3998 examines accessibility and inclusion in interactive media through critique, applied production, and collaborative challenge work. Students build fluency in standards, policy, and practical design decisions while learning how to make persuasive evidence-based accessibility judgments.
                        </p>
                        <p>
                            Accessibility here is not treated as a side topic. It is part of the course's core design process, and it is revisited through reading, testing, research, making, revision, and critique across the semester.
                        </p>
                    </div>
                </section>

                <section id="approach" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Course Format and Approach</h2>
                    <div class="course-copy">
                        <p>
                            The course is organized around modules, sessions, challenges, and class work rather than fixed calendar weeks. A module may take one, two, or more class sessions depending on class progress, holidays, cancellations, particularly productive investigations, and other instructional needs.
                        </p>
                        <p>
                            The course website is the primary instructional hub for today/current course activity, modules, sessions, challenges, the Field Guide, readings and authoritative resources, accessibility tools and demonstrations, sample interactive experiences, assignment information, archived class work, and course information.
                        </p>
                        <p>
                            HuskyCT/Blackboard remains the official location for grades, assignment submission, quizzes, the official syllabus, and other official LMS functions. The Laravel site complements that system; it does not replace it.
                        </p>
                    </div>
                </section>

                <section id="learning-objectives" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Learning Objectives</h2>
                    <div class="course-copy">
                        <ul>
                            <li>Explain core accessibility frameworks and inclusive design concepts.</li>
                            <li>Analyze interfaces using legal, standards, and institutional perspectives.</li>
                            <li>Communicate remediation priorities with clear evidence and rationale.</li>
                            <li>Use accessibility tools, standards references, and AI critically rather than uncritically.</li>
                            <li>Distinguish accessibility claims from unsupported assumptions, opinions, or automated outputs.</li>
                        </ul>
                    </div>
                </section>

                <section id="standards-legal-context" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Accessibility Standards and Legal Context</h2>
                    <div class="course-copy">
                        <p>
                            Students study accessibility through multiple sources of authority: legal requirements, technical standards such as WCAG, and institutional policy. The course emphasizes distributed inquiry followed by collective synthesis so that students can explain not only what a standard says, but why it matters and what it can and cannot prove.
                        </p>
                        <p>
                            Module 01 introduces the Legal Lens, Standards Lens, and Institutional Lens. Later modules continue that pattern by connecting visual design, media, interaction, structure, cognition, and AI practice to standards-based evaluation and remediation.
                        </p>
                        <p>
                            In legal and policy terms, Section 504 remains relevant to federally funded educational programs and activities, ADA Title II applies to public entities such as public universities, and Section 508 governs federal-agency information and communication technology. These frameworks are related but not interchangeable, and UConn's Digital Accessibility Policy operationalizes relevant requirements within the institution's context.
                        </p>
                    </div>
                </section>

                <section id="course-website-tools" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Course Website and Tools</h2>
                    <div class="course-copy">
                        <p>
                            The course website is designed as a working studio and reference library. It includes Today, Modules, Sessions, Challenges, the Field Guide, sample experiences, and archived class work so students can revisit the course structure while studying or preparing for quizzes and the final project.
                        </p>
                        <p>
                            The site also hosts demonstrations, study references, and sample interactive experiences used during accessibility investigation. These are instructional materials, not official grade records or the source of formal course policy.
                        </p>
                        <ul>
                            <li>Today / current course activity</li>
                            <li>Modules</li>
                            <li>Sessions</li>
                            <li>Challenges</li>
                            <li>Field Guide</li>
                            <li>Readings and authoritative resources</li>
                            <li>Accessibility tools and demonstrations</li>
                            <li>Sample interactive experiences</li>
                            <li>Archived Class Work / team deliverables</li>
                        </ul>
                    </div>
                </section>

                <section id="teams-challenges" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Team Challenges</h2>
                    <div class="course-copy">
                        <p>
                            The class uses persistent teams for distributed inquiry followed by collective synthesis. Different teams may investigate different dimensions of a shared problem, such as legal requirements, technical standards, institutional policy, user impact, technical implementation, or testing.
                        </p>
                        <p>
                            Team membership is assigned and managed in HuskyCT/Blackboard. The course website may refer to team identities and team challenge work, but it is not the source of team membership records.
                        </p>
                        <p>
                            The course includes 10 team challenges. These are team challenges or module challenges, not weekly challenges, and they are not tied to a rigid calendar schedule. Teams investigate, test, discuss, and then produce a concise deliverable that can later be archived as shared study material in the module's Class Work area.
                        </p>
                        <p>
                            Teams generally do not give formal presentations for each challenge. Instead, challenges are used to support investigation, critique, and synthesis.
                        </p>
                    </div>

                    <div class="mt-6 space-y-4">
                        <h3 class="text-lg font-semibold text-ink">Challenge and Studio Rhythm</h3>
                        <div class="course-copy">
                            <p>A typical challenge may include:</p>
                            <ul>
                                <li>review or critique of previous class work;</li>
                                <li>introduction of a new problem or question;</li>
                                <li>guided investigation;</li>
                                <li>authoritative-source research;</li>
                                <li>use of accessibility tools and AI;</li>
                                <li>design, testing, and prototyping;</li>
                                <li>instructor consultation;</li>
                                <li>completion and submission of a team deliverable.</li>
                            </ul>
                            <p>
                                Completed team work may later be added to the appropriate module's Class Work archive so students can review all three team approaches while studying or revisiting course concepts.
                            </p>
                        </div>
                    </div>
                </section>

                <section id="quizzes" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Quizzes</h2>
                    <div class="course-copy">
                        <p>
                            The course includes 3 individual quizzes. These quizzes emphasize application, reasoning, accessibility scenarios, WCAG concepts, remediation, distinguishing accessibility from compliance, identifying unsupported claims, and interpreting markup or interface behavior.
                        </p>
                        <p>
                            Quizzes are checkpoints for reading and reasoning, not memorization exercises. They ask students to explain how evidence supports an accessibility judgment.
                        </p>
                    </div>
                </section>

                <section id="final-project" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Final Project</h2>
                    <div class="course-copy">
                        <p>
                            The final project receives approximately the final two weeks of instructional time. Students independently apply the course process: Investigate → identify barriers → establish evidence → prioritize → redesign → test → defend.
                        </p>
                        <p>
                            The point of the project is not merely to check accessibility boxes. Students are expected to make an experience meaningfully better and provide convincing evidence for that work.
                        </p>
                    </div>
                </section>

                <section id="grading" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Grading</h2>
                    <div class="course-copy">
                        <table>
                            <thead>
                                <tr>
                                    <th>Component</th>
                                    <th>Weight</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>10 Team Challenges</td>
                                    <td>35%</td>
                                </tr>
                                <tr>
                                    <td>Individual Team Contribution</td>
                                    <td>5%</td>
                                </tr>
                                <tr>
                                    <td>3 Individual Quizzes</td>
                                    <td>30%</td>
                                </tr>
                                <tr>
                                    <td>Individual Final Project</td>
                                    <td>30%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <section id="module-roadmap" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Working Module Roadmap</h2>
                    <div class="course-copy">
                        <p>
                            The module sequence and pacing are subject to change based on class progress, emerging technologies, cancellations, and particularly productive areas of investigation. Modules are not tied to specific calendar weeks. All substantive changes will be communicated to students.
                        </p>
                        <p>
                            <strong>Note:</strong> Team challenge grades normally apply to all members of the team. Individual grades may be adjusted when there is clear evidence that a student did not meaningfully participate.
                        </p>
                    </div>

                    <div class="mt-6 space-y-6">
                        @foreach ($moduleRoadmap as $module)
                            <section class="rounded-xl border border-subtle bg-surface-2 p-5">
                                <h3 class="text-lg font-semibold text-ink">Module {{ str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) }} — {{ $module['title'] }}</h3>
                                @if (!empty($module['central_question']))
                                    <p class="mt-2 text-sm font-medium text-accent-cyan">Central question: {{ $module['central_question'] }}</p>
                                @endif
                            </section>
                        @endforeach
                    </div>

                    <div class="mt-6 course-copy">
                        <p>Synthesis, assessment, and final studio time are woven around the challenge sequence. In practice, the course also includes:</p>
                        <ul>
                            <li>Quiz #1, Quiz #2, and Quiz #3 at appropriate checkpoints;</li>
                            <li>synthesis of accessibility evaluation methods;</li>
                            <li>automated versus manual testing;</li>
                            <li>sustainable accessibility and design systems;</li>
                            <li>organizational accessibility;</li>
                            <li>emerging AI practices;</li>
                            <li>advanced assistive-technology work;</li>
                            <li>flexible catch-up studio time where useful;</li>
                            <li>preparation for the final project;</li>
                            <li>approximately two weeks of final-project studio, critique, testing, refinement, and presentation.</li>
                        </ul>
                    </div>
                </section>

                <section id="generative-ai" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Artificial Intelligence / Generative AI</h2>
                    <div class="course-copy">
                        <p class="course-emphasis">AI output is not evidence that something is accessible.</p>
                        <p>
                            Generative AI may be used unless an assignment says otherwise. Students must disclose meaningful use, verify important claims, and be able to explain their process when asked. AI can help with research, explanation, critique, drafting, and exploration, but it cannot replace evidence, testing, or the student's responsibility for the work.
                        </p>
                        <p>
                            Privacy and data considerations still apply. Students should not paste sensitive or private information into external tools unless explicitly permitted by the assignment or instructor guidance. If an assignment limits AI use or requires a particular method, those instructions take precedence.
                        </p>
                        <p>
                            The course maintains academic-integrity expectations around sources, process, and authorship. When AI use is unclear, students may be asked to explain how it was used, what sources informed the work, and what testing supports the final submission.
                        </p>
                    </div>

                    <div class="mt-6 space-y-4">
                        <h3 class="text-lg font-semibold text-ink">How I Use Generative AI</h3>
                        <div class="course-copy">
                            <p>
                                I use generative AI in course design, exercises, scenarios, examples, drafting and revising materials, example interfaces or code, and in exploring accessibility problems and possible solutions for the course website content.
                            </p>
                            <p>
                                I do not use AI to independently evaluate student work or determine grades. AI can help me draft, test, and refine instructional materials, but the instructional judgment remains mine.
                            </p>
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </div>
</x-layouts.app>
