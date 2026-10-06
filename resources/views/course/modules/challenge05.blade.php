<x-layouts.app :title="$challenge['title']">
    <div class="module-shell">
        <x-course.module-navigation :module="$module" currentPage="challenge" />

        <div class="module-main">
            <x-page-heading
                label="CHALLENGE 05"
                title="Challenge 05: Accessibility Review"
                subtitle="What can you establish about the accessibility of an interactive experience, and what evidence supports your conclusions?"
            />

            <div class="course-flow">
                <section class="course-section">
                    <p class="course-emphasis">Individual Challenge · 10 points</p>
                    <p>MakerMap contains 20 deliberate accessibility issues based on material from Modules 01–05.</p>
                    <p>Conduct a complete accessibility review and identify all 20.</p>
                    <p>Use multiple testing methods. Support your conclusions with evidence, recommend corrections, and explain how you would verify them.</p>
                    <p>Challenge 05 is individual and cumulative across Modules 01–05. Begin during Session 10 and return after Session 11 to add screen-reader testing.</p>
                </section>

                <section class="course-section">
                    <x-section-heading title="Your task" />
                    <div class="course-copy">
                        <p>Use MakerMap to find a creative space for a project, compare available resources, review location and orientation information, and submit an orientation request.</p>
                        <p><a href="{{ route('experiences.makermap') }}" target="_blank" rel="noopener noreferrer" class="inline-flex rounded-sm text-base font-semibold text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring">Open MakerMap →</a></p>
                    </div>
                </section>

                <section class="course-section">
                    <x-section-heading title="Review Process" description="Use the methods needed to identify and verify all 20 issues. The Review Record documents your testing; the findings are the focus of the report." />
                    <div class="course-copy">
                        <ol>
                            <li><strong>Normal use:</strong> Understand the service and complete its main task.</li>
                            <li><strong>Visual inspection:</strong> Review contrast, color dependence, text enlargement, and reflow; measure where appropriate.</li>
                            <li><strong>Media review:</strong> Evaluate meaningful images, the map, and prerecorded video.</li>
                            <li><strong>Keyboard testing:</strong> Try important interactions without a mouse or trackpad.</li>
                            <li><strong>Semantic/browser inspection:</strong> Inspect page structure, headings, controls, names, states, and relationships.</li>
                            <li><strong>Form and error testing:</strong> Complete the form, make errors, correct them, and submit successfully.</li>
                            <li><strong>Screen-reader testing:</strong> After Session 11, return to MakerMap and test structure, controls, form fields, errors, and status.</li>
                            <li><strong>Automated/assisted testing:</strong> Use WAVE, Accessibility Bookmarklets, a browser accessibility inspector, or another course-approved tool. <strong>Automated output is not proof of accessibility.</strong></li>
                        </ol>
                    </div>
                </section>

                <section class="course-section">
                    <x-section-heading title="Deliverable" description="Submit one individual PDF through HuskyCT. Make it as long as necessary to document all 20 findings clearly and concisely. Screenshots may be used where helpful; one screenshot per finding is not required." />
                    <div class="course-copy">
                        <p>HuskyCT is the official location for submission, grades, and deadline information.</p>
                    </div>

                    <section class="course-section">
                        <h3 class="text-xl font-semibold text-ink">Section 1: Review Record</h3>
                        <p class="text-sm leading-7 text-ink-muted">Keep this brief. Record the method/tool, browser or device where relevant, and what part of MakerMap you tested.</p>
                        <div class="overflow-x-auto">
                            <table>
                                <thead>
                                    <tr><th scope="col">Method</th><th scope="col">Tool / browser / device</th><th scope="col">What I tested</th></tr>
                                </thead>
                                <tbody>
                                    <tr><th scope="row">Normal use</th><td></td><td></td></tr>
                                    <tr><th scope="row">Visual inspection</th><td></td><td></td></tr>
                                    <tr><th scope="row">Media review</th><td></td><td></td></tr>
                                    <tr><th scope="row">Keyboard testing</th><td></td><td></td></tr>
                                    <tr><th scope="row">Semantic/browser inspection</th><td></td><td></td></tr>
                                    <tr><th scope="row">Form and error testing</th><td></td><td></td></tr>
                                    <tr><th scope="row">Screen-reader testing</th><td></td><td></td></tr>
                                    <tr><th scope="row">Automated/assisted testing</th><td></td><td></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <section class="course-section">
                        <h3 class="text-xl font-semibold text-ink">Section 2: All 20 Findings</h3>
                        <div class="course-copy">
                            <p>Document all 20 deliberate issues. Keep each entry concise and specific enough that another person could reproduce the behavior.</p>
                            <ul>
                                <li><strong>Observation:</strong> What is wrong? Describe what you observed or reproduced.</li>
                                <li><strong>Evidence:</strong> Cite relevant authoritative guidance, a measurement, or direct testing evidence.</li>
                                <li><strong>Recommendation:</strong> State what should change to address the actual barrier.</li>
                                <li><strong>Verification:</strong> Explain how you would confirm the correction works.</li>
                            </ul>
                            <p>Include impact where it helps explain the significance. Avoid repeating a generic impact paragraph for every entry. Automated output alone is not sufficient evidence.</p>
                        </div>
                    </section>

                    <section class="course-section">
                        <h3 class="text-xl font-semibold text-ink">Section 3: Overall Judgment</h3>
                        <div class="course-copy">
                            <h4>Top Five Priorities</h4>
                            <p>Rank the five issues you would address first and give a concise rationale for each. There is no single required prioritization formula.</p>
                            <h4>One Thing You Would Not Call a Failure</h4>
                            <p>Identify one aspect of MakerMap you might personally change but cannot confidently establish as an accessibility failure. Explain briefly.</p>
                        </div>
                    </section>

                    <section class="course-section">
                        <h3 class="text-xl font-semibold text-ink">AI Use Note</h3>
                        <div class="course-copy">
                            <p class="course-emphasis">AI output is not evidence.</p>
                            <p>Include a brief note about AI use. You remain responsible for reproducing findings, verifying sources, checking citations, and making your own accessibility judgment.</p>
                        </div>
                    </section>
                </section>

                <section class="course-section">
                    <x-section-heading title="Scoring" description="Challenge 05 is worth 10 points." />
                    <div class="course-copy">
                        <ul>
                            <li><strong>Coverage and accuracy · 4 points:</strong> 4: essentially all issues accurately identified and reproducible; 3: most issues with generally accurate diagnoses; 2: significant gaps or several inaccurate/duplicate findings; 1: limited review with major gaps; 0: not meaningfully completed.</li>
                            <li><strong>Evidence · 2 points:</strong> 2: claims consistently supported by appropriate sources, measurements, or direct testing; 1: evidence mixed, weak, or inconsistently matched; 0: findings largely unsupported.</li>
                            <li><strong>Recommendations and verification · 2 points:</strong> 2: recommendations address the problems and verification meaningfully confirms correction; 1: mixed, vague, or incomplete; 0: missing or substantially inappropriate.</li>
                            <li><strong>Testing process · 1 point:</strong> 1: credible use of multiple relevant methods, including screen-reader testing; 0: missing or clearly insufficient.</li>
                            <li><strong>Prioritization, communication, and AI Use Note · 1 point:</strong> 1: Top Five demonstrates judgment, report is clear, non-failure distinction is reasonable, and AI Use Note is included; 0: substantially incomplete.</li>
                        </ul>
                        <p><strong>Total: 10 points. Individual submission.</strong></p>
                    </div>
                </section>

                <section class="course-section">
                    <x-section-heading title="Testing Resources" />
                    <div class="course-copy">
                        <ul>
                            <li><a href="https://wave.webaim.org/" target="_blank" rel="noopener noreferrer">WAVE Web Accessibility Evaluation Tools</a></li>
                            <li><a href="https://accessibility-bookmarklets.org/" target="_blank" rel="noopener noreferrer">Accessibility Bookmarklets</a></li>
                            <li><a href="https://www.w3.org/WAI/WCAG22/Understanding/" target="_blank" rel="noopener noreferrer">W3C WCAG 2.2 Understanding documents</a></li>
                            <li><a href="{{ route('field-guide') }}">Course Field Guide: Accessibility Testing Workflow</a></li>
                        </ul>
                    </div>
                </section>

                <section class="course-section">
                    <x-section-heading title="Submission and Deadline" />
                    <div class="course-copy">
                        <p>Submit your individual PDF through HuskyCT. HuskyCT remains the official source for the due date, submission, and grades.</p>
                        <a href="{{ route('modules.show', ['module' => 5]) }}" class="inline-flex rounded-sm text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring">Return to Module 05 →</a>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-layouts.app>