<x-layouts.app title="Final Project — Make It Better: Course Selection Accessibility Case Study">
    <x-page-heading
        label="Individual Final Project · 30% of the course grade"
        title="Final Project — Make It Better: Course Selection Accessibility Case Study"
        subtitle="Released Tuesday, November 3, 2026 · Submit through HuskyCT"
    />

    <div class="mt-8 grid gap-10 lg:grid-cols-[minmax(0,1fr)_16rem] lg:items-start">
        <article class="course-flow max-w-4xl">
            <section id="start" class="course-section">
                <h2 class="text-2xl font-semibold text-ink">How do you know?</h2>
                <div class="course-copy">
                    <p>Investigate Course Selection, complete your assigned five-course planning scenario, and build an evidence-based case for making the experience more accessible. Identify meaningful barriers, decide what matters most, and propose solutions you can explain and verify.</p>
                    <p><strong>This project is entirely individual.</strong> Your standing team determines only the fictional advising scenario. You investigate, develop proposals, and submit your own work. You are not required to find every issue, rebuild the application, produce an interactive prototype, or write code.</p>
                    <a href="{{ route('coursepath.welcome') }}" class="inline-flex rounded-lg bg-accent-cyan px-5 py-3 font-semibold text-surface-1 focus-visible:focus-ring">Open Course Selection ↗</a>
                    <p>Course Selection is a fictional academic-planning portal. Use invented student details and an email ending in @example.test. No real registration or academic record is created. If an interaction prevents equitable participation, contact the instructor for an alternative way to complete the scenario.</p>
                </div>
            </section>

            <section id="scenario" class="course-section">
                <h2 class="text-2xl font-semibold text-ink">Your planning scenario</h2>
                <div class="course-copy">
                    <p>Select your assigned team in Course Selection. Build a proposed schedule with <strong>exactly five courses and at least 15 credits</strong>. Avoid overlapping meeting times, choose open sections, and meet prerequisites and enrollment restrictions. Complete the fictional student-information form, review and submit the proposal, then inspect the confirmation and revision workflow.</p>
                    <table>
                        <caption class="text-left text-sm text-ink-muted">The advising path changes the scenario, not the individual grading.</caption>
                        <thead>
                            <tr><th>Assigned team</th><th>Advising path and requirements</th></tr>
                        </thead>
                        <tbody>
                            <tr><th scope="row">Cyan Triangle</th><td><strong>Creative Practice:</strong> at least two Design, Media, or Art courses; at least one writing-intensive course; at least one course outside those creative disciplines.</td></tr>
                            <tr><th scope="row">Amber Circle</th><td><strong>Technology &amp; Systems:</strong> at least two Computer Science, Data Science, or Engineering courses; at least one quantitative reasoning course; at least one humanities or arts course.</td></tr>
                            <tr><th scope="row">Violet Square</th><td><strong>Society &amp; Communication:</strong> at least two Communication, Sociology, or Psychology courses; at least one writing-intensive course; at least one quantitative or technical course.</td></tr>
                        </tbody>
                    </table>
                    <p>One course may satisfy multiple requirements. Course Selection defines the eligible humanities, arts, and technical departments in its advising brief. Several valid schedules are possible for each path. Document the choices and tradeoffs in your own scenario.</p>
                </div>
            </section>

            <section id="case-study" class="course-section">
                <h2 class="text-2xl font-semibold text-ink">Deliverable A — Accessibility Case Study</h2>
                <div class="course-copy">
                    <p>Combine the investigation, findings, priorities, remediation proposal, verification plans, and reflection in <strong>one organized PDF of about 8–12 pages</strong>. An optional appendix may hold additional evidence. Keep the main report concise and make evidence easy to follow.</p>

                    <h3 class="text-lg font-semibold text-ink">1. Investigate the experience</h3>
                    <p>Complete your assigned scenario and explore the major areas: advising brief, catalog, course details, schedule builder and requirements checker, student information, review, and confirmation. Use at least four distinct evaluation approaches, including the required WAVE and screen-reader testing below.</p>
                    <ul>
                        <li>Use WAVE on at least <strong>three distinct Course Selection pages or materially different application states</strong>. The WAVE browser extension is appropriate for a site or state that the online service cannot reach. Record what you inspected and distinguish tool output from verified findings.</li>
                        <li>Use a screen reader to attempt at least <strong>two meaningful tasks</strong>, such as finding course requirements, building or revising a schedule, or completing and reviewing the student-information workflow. Record what was announced and whether you could complete each task.</li>
                        <li>Also test the core workflow with a keyboard and inspect zoom/reflow at 200% and, where practical, 400%. Choose additional methods that fit your questions.</li>
                        <li>Document your browser, tools, versions where available, steps, observed results, and limitations. An accessibility-tree inspection can support an investigation, but it does not establish what a screen reader actually announced.</li>
                        <li>Do not claim a test you did not conduct. If a tool or assistive technology was unavailable, state that limitation and contact the instructor about an alternative.</li>
                    </ul>
                    <p><a href="https://wave.webaim.org/extension/" target="_blank" rel="noopener noreferrer" class="font-medium text-accent-cyan">WAVE browser extension ↗</a> · <a href="{{ route('field-guide.entry', ['entry' => 'screen-readers']) }}" class="font-medium text-accent-cyan">Course screen-reader guides</a> · <a href="{{ route('field-guide.entry', ['entry' => 'nvda']) }}" class="font-medium text-accent-cyan">NVDA setup and testing resources</a></p>

                    <h3 class="text-lg font-semibold text-ink">2. Report findings and evidence</h3>
                    <p>Document <strong>8–12 substantive accessibility or inclusive-design findings across at least four application areas</strong>. For each, identify its location, reproducible steps, what you expected and observed, evidence, user and task consequences, and a proposed improvement. Cite a WCAG success criterion and level where it is relevant and accurately applies.</p>
                    <ul>
                        <li>Include at least <strong>six accurately applied WCAG success-criterion references</strong> across the report. A citation is not proof by itself.</li>
                        <li>Support or clarify at least <strong>two findings through manual testing</strong>, such as keyboard interaction or one of your screen-reader tasks.</li>
                        <li>Discuss at least <strong>two investigated potential problems</strong> that you conclude are accessible, defensible, or insufficiently supported as failures. Explain the evidence and reasoning behind each conclusion.</li>
                        <li>Distinguish confirmed standards failures from broader usability or inclusive-design concerns. A task may succeed and still impose substantial effort; a failed task does not, by itself, prove a particular standards violation.</li>
                    </ul>
                    <p>A tool result is a lead, not proof. Evidence quality matters more than padding the findings to reach a number. Investigate unexpected behavior before deciding what it means.</p>

                    <h3 class="text-lg font-semibold text-ink">3. Prioritize five findings</h3>
                    <p>Identify your <strong>five highest-priority findings</strong> and explain their order. Consider task completion, severity and user impact, who is affected, frequency and scope, available workarounds, confidence in the evidence, dependencies, and effort. State what you would address later and why. A low-cost change is not automatically the most important, and no numerical scoring formula is required.</p>

                    <h3 class="text-lg font-semibold text-ink">4. Verify at least three AI claims</h3>
                    <p>If you use an AI assistant, identify the tool and relevant prompt, select at least <strong>three specific claims about accessibility or your findings</strong>, and independently verify each with an authoritative source, an appropriate test, or both. For each claim, state whether your evidence supports, contradicts, or leaves it uncertain. Do not treat another AI response as independent verification. If you did not use AI, say so.</p>

                    <h3 class="text-lg font-semibold text-ink">5. Reflect</h3>
                    <p>Briefly explain what you learned, what remains uncertain, and how you made your testing and prioritization decisions. Include an AI Use Note that describes meaningful use or explicitly states that you did not use AI. Protect private information; use only the fictional details supplied for the scenario.</p>
                </div>
            </section>

            <section id="proposal" class="course-section">
                <h2 class="text-2xl font-semibold text-ink">Deliverable B — Accessibility Remediation Proposal</h2>
                <div class="course-copy">
                    <p>Within the same PDF, propose solutions for <strong>at least five documented findings, including your three highest-priority findings</strong>. Use annotated screenshots, before-and-after images, wireframes, mockups, written interaction specifications, or another suitable representation.</p>
                    <p><strong>Working code and interactive prototypes are not required.</strong> Grading does not depend on visual polish, programming sophistication, or tool choice. For each solution, explain what changes, why it addresses the observed barrier, how the improved interaction should behave, and how you would verify it. Include keyboard, focus, feedback, and nonvisual behavior where relevant.</p>
                    <p>Do not create a second required document or rely on an external artifact to complete the submission. A screenshot or specification can propose a change, but does not establish that an interaction works or that a page conforms to WCAG.</p>
                </div>
            </section>

            <section id="rubric" class="course-section">
                <h2 class="text-2xl font-semibold text-ink">Grading rubric — 100 points</h2>
                <div class="course-copy">
                    <table>
                        <thead>
                            <tr><th scope="col">Category</th><th scope="col">Points</th><th scope="col">What strong work demonstrates</th></tr>
                        </thead>
                        <tbody>
                            <tr><th scope="row">Investigation and testing</th><td>20</td><td>Completes the assigned scenario, uses the required WAVE and screen-reader testing with varied methods, and documents reproducible tests and honest limitations.</td></tr>
                            <tr><th scope="row">Findings and supporting evidence</th><td>25</td><td>Accurate observations, clear reproduction and user consequences, strong evidence, correct standards interpretation, and careful treatment of defensible implementations.</td></tr>
                            <tr><th scope="row">Prioritization and judgment</th><td>15</td><td>A justified top five that weighs task completion, impact, affected users, frequency, scope, workarounds, confidence, dependencies, and effort.</td></tr>
                            <tr><th scope="row">Remediation proposals</th><td>25</td><td>At least five appropriate solutions, including the top three priorities, with clear rationale and sufficient detail to explain the intended behavior.</td></tr>
                            <tr><th scope="row">Verification plans and limitations</th><td>10</td><td>Credible checks for each solution; a clear distinction between observed results and proposed future tests.</td></tr>
                            <tr><th scope="row">Communication and AI disclosure</th><td>5</td><td>An organized, readable case study with traceable evidence, sources, reflection, and a clear AI Use Note.</td></tr>
                            <tr><th scope="row">Total</th><td><strong>100</strong></td><td>The final project is 30% of the course grade.</td></tr>
                        </tbody>
                    </table>
                    <p>Finding more issues or producing more elaborate artifacts does not earn extra credit by itself. The standard is a convincing, evidence-based accessibility judgment.</p>
                </div>
            </section>

            <section id="milestones" class="course-section">
                <h2 class="text-2xl font-semibold text-ink">Milestones and studio work</h2>
                <div class="course-copy">
                    <p>Asynchronous materials support investigation; studio-oriented meetings provide time for questions and individual check-ins. These checkpoints are <strong>formative, not additional graded assignments</strong>. No formal presentation is required.</p>
                    <dl class="space-y-4">
                        <div><dt class="font-semibold text-ink">Launch · Tuesday, November 3, 2026</dt><dd>Course Selection, advising scenarios, and final-project instructions available.</dd></div>
                        <div><dt class="font-semibold text-ink">Investigation checkpoint · Week of November 9</dt><dd>Bring initial testing, evidence, and candidate findings.</dd></div>
                        <div><dt class="font-semibold text-ink">Prioritization checkpoint · Week of November 16</dt><dd>Review findings, top priorities, and your proposed remediation scope.</dd></div>
                        <div><dt class="font-semibold text-ink">Remediation checkpoint · Week of November 30</dt><dd>Review draft solutions and verification plans.</dd></div>
                        <div><dt class="font-semibold text-ink">Final submission</dt><dd>Follow the authoritative course schedule or deadline posted in HuskyCT.</dd></div>
                    </dl>
                </div>
            </section>

            <section id="submission" class="course-section">
                <h2 class="text-2xl font-semibold text-ink">Submission</h2>
                <div class="course-copy">
                    <p>Submit <strong>one PDF through HuskyCT</strong>. Include the case study and remediation proposal in the report; add an optional appendix if useful. The course website supplies assignment instructions; HuskyCT handles submission and grading.</p>
                    <p>Before submitting, check that your evidence can be reproduced, your standards references apply, your top three priorities appear in the proposal, your AI claims are independently verified, and your verification claims match the work you actually performed. Use HuskyCT for the authoritative final deadline; no additional due date is set on this page.</p>
                </div>
            </section>
        </article>

        <aside class="space-y-6 lg:sticky lg:top-8">
            <x-panel>
                <p class="meta-label">Project at a glance</p>
                <dl class="mt-4 space-y-4 text-sm">
                    <div><dt class="font-semibold text-ink">Work</dt><dd class="mt-1 text-ink-muted">Individual · team-specific scenario</dd></div>
                    <div><dt class="font-semibold text-ink">Weight</dt><dd class="mt-1 text-ink-muted">30% of the course grade</dd></div>
                    <div><dt class="font-semibold text-ink">Submit</dt><dd class="mt-1 text-ink-muted">One PDF through HuskyCT</dd></div>
                    <div><dt class="font-semibold text-ink">Deadline</dt><dd class="mt-1 text-ink-muted">See the authoritative deadline in HuskyCT</dd></div>
                </dl>
            </x-panel>
            <nav aria-label="Final project sections" class="flex flex-col gap-3 text-sm">
                <a href="#scenario">Planning scenario</a>
                <a href="#case-study">Case study</a>
                <a href="#proposal">Remediation proposal</a>
                <a href="#rubric">Rubric</a>
                <a href="#milestones">Milestones</a>
                <a href="#submission">Submission</a>
            </nav>
        </aside>
    </div>
</x-layouts.app>
