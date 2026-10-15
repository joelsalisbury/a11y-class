<x-module06-demo-layout
    title="How Much Can You Keep in Your Head?"
    :returnHref="route('modules.session', ['module' => 6, 'session' => 13]).(request()->integer('slide') >= 1 && request()->integer('slide') <= 9 ? '#slide-'.request()->integer('slide') : '')"
    returnLabel="Return to Session 13"
>
    <div data-cognitive-load-demo>
        <h1>How Much Can You Keep in Your Head?</h1>
        <p class="intro">Complete one equipment reservation twice. Pay attention to the effort the interface creates, not just whether you can finish.</p>

        <section class="panel" data-screen="brief" aria-labelledby="demo-task-title">
            <h2 id="demo-task-title">Your task</h2>
            <p>Reserve a <strong>Camera Kit</strong> for a <strong>three-person documentary shoot</strong> on <strong>Thursday morning</strong>. Include a <strong>tripod</strong> and return the kit <strong>the next day</strong>.</p>
            <p class="muted">Use fictional information only. This classroom simulation does not submit or save a real reservation.</p>
            <div class="actions">
                <button type="button" data-action="start-high">Start Version A</button>
            </div>
        </section>

        <section class="panel version-panel" data-screen="high" aria-labelledby="high-title" hidden>
            <p class="eyebrow">VERSION A · HIGHER COGNITIVE LOAD</p>
            <h2 id="high-title" tabindex="-1">Make a reservation</h2>
            <p>Choose options for the equipment request.</p>
            <form data-reservation-form="high" novalidate>
                <section data-step="0" aria-labelledby="high-equipment-title">
                    <h3 id="high-equipment-title" tabindex="-1">Choose equipment</h3>
                    <div class="field">
                        <label for="high-kit">Equipment package</label>
                        <select id="high-kit" data-field="kit">
                            <option value="">Choose a package</option>
                            <option value="camera">Camera Kit</option>
                            <option value="audio">Audio Kit</option>
                            <option value="lighting">Lighting Kit</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="high-project">Production category</label>
                        <select id="high-project" data-field="project">
                            <option value="">Choose a category</option>
                            <option value="documentary">Documentary</option>
                            <option value="interview">Interview</option>
                            <option value="performance">Performance</option>
                        </select>
                    </div>
                    <div class="actions">
                        <button type="button" data-action="high-next">Continue</button>
                        <button type="button" class="secondary" data-action="restart">Restart demonstration</button>
                    </div>
                </section>

                <aside class="panel interruption" data-high-interruption aria-labelledby="interruption-title" hidden>
                    <h3 id="interruption-title" tabindex="-1">A note from the equipment desk</h3>
                    <p>Your request was interrupted. Your choices are still here.</p>
                    <div class="actions">
                        <button type="button" data-action="high-resume">Return to reservation</button>
                        <button type="button" class="secondary" data-action="restart">Restart demonstration</button>
                    </div>
                </aside>

                <section data-step="1" aria-labelledby="high-people-title" hidden>
                    <h3 id="high-people-title" tabindex="-1">Request details</h3>
                    <div class="field">
                        <label for="high-crew">People on the reservation</label>
                        <select id="high-crew" data-field="crew">
                            <option value="">Choose a number</option>
                            <option value="1">1 person</option>
                            <option value="2">2 people</option>
                            <option value="3">3 people</option>
                            <option value="4">4 people</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="high-day">Requested date</label>
                        <select id="high-day" data-field="day">
                            <option value="">Choose a date</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                        </select>
                    </div>
                    <div class="actions">
                        <button type="button" class="secondary" data-action="high-back">Back to package</button>
                        <button type="button" data-action="high-next">Next details</button>
                        <button type="button" class="secondary" data-action="restart">Restart demonstration</button>
                    </div>
                </section>

                <section data-step="2" aria-labelledby="high-pickup-title" hidden>
                    <h3 id="high-pickup-title" tabindex="-1">Collection options</h3>
                    <fieldset class="field">
                        <legend>Accessories</legend>
                        <label class="check-option" for="high-tripod">
                            <input id="high-tripod" type="checkbox" data-field="tripod">
                            Add a tripod
                        </label>
                    </fieldset>
                    <div class="field">
                        <label for="high-period">Collection period</label>
                        <select id="high-period" data-field="period">
                            <option value="">Choose a period</option>
                            <option value="morning">Morning</option>
                            <option value="afternoon">Afternoon</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="high-return">Loan length</label>
                        <select id="high-return" data-field="return">
                            <option value="">Choose a return time</option>
                            <option value="next-day">Return the next day</option>
                            <option value="two-days">Return in two days</option>
                        </select>
                    </div>
                    <div class="actions">
                        <button type="button" class="secondary" data-action="high-back">Change reservation</button>
                        <button type="button" data-action="high-review">Check the request</button>
                        <button type="button" class="secondary" data-action="restart">Restart demonstration</button>
                    </div>
                </section>

                <section data-step="3" aria-labelledby="high-review-title" hidden>
                    <h3 id="high-review-title" tabindex="-1">Request summary</h3>
                    <p>Check the choices you made.</p>
                    <dl class="reservation-summary" data-summary="high"></dl>
                    <details class="edit-details">
                        <summary>Change an earlier choice</summary>
                        <div class="actions">
                            <button type="button" class="secondary" data-action="high-edit" data-target-step="0">Equipment</button>
                            <button type="button" class="secondary" data-action="high-edit" data-target-step="1">Reservation details</button>
                            <button type="button" class="secondary" data-action="high-edit" data-target-step="2">Collection options</button>
                        </div>
                    </details>
                    <div class="actions">
                        <button type="button" data-action="high-submit">Send request</button>
                        <button type="button" class="secondary" data-action="restart">Restart demonstration</button>
                    </div>
                    <div class="feedback error" data-feedback="high" role="alert" hidden>
                        <p>The equipment desk could not prepare this request. Review your choices and try again.</p>
                        <button type="button" class="secondary" data-action="high-correct">Return to reservation</button>
                    </div>
                </section>
            </form>
        </section>

        <section class="panel completion" data-screen="high-complete" aria-labelledby="high-complete-title" hidden>
            <h2 id="high-complete-title" tabindex="-1">Version A complete</h2>
            <p>Your reservation is ready. Notice what you had to remember, where the process felt uncertain, and how the interruption affected you.</p>
            <dl class="reservation-summary" data-summary="high-complete"></dl>
            <div class="reflection">
                <h3>Pause before Version B</h3>
                <ul>
                    <li>What did you have to keep in mind between steps?</li>
                    <li>When were you least sure about your progress or next move?</li>
                </ul>
            </div>
            <div class="actions">
                <button type="button" data-action="start-low">Try the same task in Version B</button>
                <button type="button" class="secondary" data-action="restart">Restart demonstration</button>
            </div>
        </section>

        <section class="panel version-panel" data-screen="low" aria-labelledby="low-title" hidden>
            <p class="eyebrow">VERSION B · REDUCED COGNITIVE LOAD</p>
            <h2 id="low-title" tabindex="-1">Reserve equipment</h2>
            <aside class="task-card" aria-labelledby="low-task-title">
                <h3 id="low-task-title">Your task requirements</h3>
                <ul>
                    <li>Camera Kit for a three-person documentary shoot</li>
                    <li>Thursday morning pickup with a tripod</li>
                    <li>Return the next day</li>
                </ul>
            </aside>
            <ol class="progress-list" aria-label="Reservation progress" data-progress="low">
                <li aria-current="step">Project</li>
                <li>Equipment</li>
                <li>Pickup</li>
                <li>Review</li>
            </ol>
            <div class="live-summary" aria-live="polite" aria-atomic="true" data-live-summary></div>
            <form data-reservation-form="low" novalidate>
                <section data-step="0" aria-labelledby="low-project-title">
                    <h3 id="low-project-title" tabindex="-1">1. Project</h3>
                    <div class="field">
                        <label for="low-project">Project type</label>
                        <select id="low-project" data-field="project">
                            <option value="">Choose a project type</option>
                            <option value="documentary">Documentary</option>
                            <option value="interview">Interview</option>
                            <option value="performance">Performance</option>
                        </select>
                        <p class="field-help">Choose the format for this shoot.</p>
                    </div>
                    <div class="field">
                        <label for="low-crew">Crew size</label>
                        <select id="low-crew" data-field="crew">
                            <option value="">Choose crew size</option>
                            <option value="1">1 person</option>
                            <option value="2">2 people</option>
                            <option value="3">3 people</option>
                            <option value="4">4 people</option>
                        </select>
                    </div>
                    <div class="actions">
                        <button type="button" data-action="low-next">Continue to equipment</button>
                        <button type="button" class="secondary" data-action="restart">Restart demonstration</button>
                    </div>
                </section>

                <section data-step="1" aria-labelledby="low-equipment-title" hidden>
                    <h3 id="low-equipment-title" tabindex="-1">2. Equipment</h3>
                    <div class="field">
                        <label for="low-kit">Equipment kit</label>
                        <select id="low-kit" data-field="kit">
                            <option value="">Choose an equipment kit</option>
                            <option value="camera">Camera Kit</option>
                            <option value="audio">Audio Kit</option>
                            <option value="lighting">Lighting Kit</option>
                        </select>
                    </div>
                    <fieldset class="field">
                        <legend>Accessories</legend>
                        <label class="check-option" for="low-tripod">
                            <input id="low-tripod" type="checkbox" data-field="tripod">
                            Include a tripod
                        </label>
                    </fieldset>
                    <div class="actions">
                        <button type="button" class="secondary" data-action="low-back">Back to project</button>
                        <button type="button" data-action="low-next">Continue to pickup</button>
                        <button type="button" class="secondary" data-action="restart">Restart demonstration</button>
                    </div>
                </section>

                <section data-step="2" aria-labelledby="low-pickup-title" hidden>
                    <h3 id="low-pickup-title" tabindex="-1">3. Pickup</h3>
                    <div class="field">
                        <label for="low-day">Pickup day</label>
                        <select id="low-day" data-field="day">
                            <option value="">Choose a pickup day</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="low-period">Pickup time</label>
                        <select id="low-period" data-field="period">
                            <option value="">Choose a pickup time</option>
                            <option value="morning">Morning</option>
                            <option value="afternoon">Afternoon</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="low-return">Return</label>
                        <select id="low-return" data-field="return">
                            <option value="">Choose a return time</option>
                            <option value="next-day">The next day</option>
                            <option value="two-days">In two days</option>
                        </select>
                    </div>
                    <div class="actions">
                        <button type="button" class="secondary" data-action="low-back">Back to equipment</button>
                        <button type="button" data-action="low-review">Review reservation</button>
                        <button type="button" class="secondary" data-action="restart">Restart demonstration</button>
                    </div>
                </section>

                <section data-step="3" aria-labelledby="low-review-title" hidden>
                    <h3 id="low-review-title" tabindex="-1">Review your reservation</h3>
                    <dl class="reservation-summary" data-summary="low"></dl>
                    <div class="actions">
                        <button type="button" class="secondary" data-action="low-back">Back to pickup</button>
                        <button type="button" data-action="low-submit">Confirm reservation</button>
                        <button type="button" class="secondary" data-action="restart">Restart demonstration</button>
                    </div>
                    <div class="feedback error" data-feedback="low" role="alert" hidden>
                        <p>Please update the choices that do not match the task:</p>
                        <ul data-error-list></ul>
                    </div>
                </section>
            </form>
        </section>

        <section class="panel completion" data-screen="low-complete" aria-labelledby="low-complete-title" hidden>
            <h2 id="low-complete-title" tabindex="-1">Version B complete</h2>
            <p>Your reservation is confirmed in this local practice experience. Compare it with Version A.</p>
            <dl class="reservation-summary" data-summary="low-complete"></dl>
            <div class="reflection">
                <h3>Compare the experience</h3>
                <ul>
                    <li>What information did you have to remember in Version A?</li>
                    <li>When did you feel uncertain about progress or revisiting a choice?</li>
                    <li>Which specific changes made Version B easier?</li>
                </ul>
            </div>
            <div class="criteria">
                <h3>Usability, cognitive accessibility, and WCAG</h3>
                <p>Cognitive load is a usability concern; cognitive accessibility is a broader design objective. WCAG defines specific, testable requirements, not a measure of total mental effort.</p>
                <ul>
                    <li><strong><a href="https://www.w3.org/WAI/WCAG22/Understanding/headings-and-labels.html" target="_blank" rel="noopener">2.4.6 Headings and Labels (AA)</a>:</strong> headings and labels that are provided describe their topic or purpose. Both versions use descriptive headings and labels, so the harder flow does not demonstrate a failure of this criterion.</li>
                    <li><strong><a href="https://www.w3.org/WAI/WCAG22/Understanding/labels-or-instructions.html" target="_blank" rel="noopener">3.3.2 Labels or Instructions (A)</a>:</strong> labels or instructions are provided when input is required. The controls in both versions are labeled; confusing terminology elsewhere is not automatically a failure of this criterion.</li>
                    <li><strong><a href="https://www.w3.org/WAI/WCAG22/Understanding/redundant-entry.html" target="_blank" rel="noopener">3.3.7 Redundant Entry (A)</a>:</strong> information already entered or provided that is required again within the same process must be auto-populated or available to select, unless an exception applies. This simulation collects each reservation detail once; memory demands from a task brief do not by themselves demonstrate that repeat-entry condition.</li>
                    <li><strong><a href="https://www.w3.org/WAI/WCAG22/Understanding/consistent-navigation.html" target="_blank" rel="noopener">3.2.3 Consistent Navigation (AA)</a>:</strong> repeated navigation mechanisms are in the same relative order across pages in a set. These simulated steps are on one page, so this activity does not test that criterion.</li>
                </ul>
                <p class="key-takeaway"><strong>An interface can satisfy applicable WCAG success criteria while still imposing unnecessary cognitive demands on its users.</strong></p>
            </div>
            <div class="actions">
                <button type="button" data-action="restart">Restart demonstration</button>
                <a href="{{ route('modules.session', ['module' => 6, 'session' => 13]).(request()->integer('slide') >= 1 && request()->integer('slide') <= 9 ? '#slide-'.request()->integer('slide') : '') }}">Return to Session 13</a>
            </div>
        </section>
    </div>

    <style>
        [data-cognitive-load-demo] { --demo-muted: #475569; --demo-border: #cbd5e1; --demo-accent: #075985; }
        [data-cognitive-load-demo] .intro { font-size: 1.15rem; max-width: 72ch; }
        [data-cognitive-load-demo] .eyebrow { color: var(--demo-accent); font-size: .8rem; font-weight: 700; letter-spacing: .12em; }
        [data-cognitive-load-demo] h3 { margin-top: 1.25rem; }
        [data-cognitive-load-demo] .field { margin: 1.25rem 0; }
        [data-cognitive-load-demo] .field-help, [data-cognitive-load-demo] .muted { color: var(--demo-muted); font-size: .95rem; }
        [data-cognitive-load-demo] select { min-height: 2.8rem; }
        [data-cognitive-load-demo] .check-option { display: flex; align-items: center; gap: .65rem; margin-top: .65rem; }
        [data-cognitive-load-demo] .check-option input { width: 1.15rem; height: 1.15rem; accent-color: var(--demo-accent); }
        [data-cognitive-load-demo] .task-card { border-left: 4px solid var(--demo-accent); background: #f0f9ff; padding: .75rem 1rem; margin: 1rem 0; }
        [data-cognitive-load-demo] .task-card h3 { margin-top: 0; }
        [data-cognitive-load-demo] .progress-list { display: flex; flex-wrap: wrap; gap: .5rem; padding: 0; list-style: none; counter-reset: progress; }
        [data-cognitive-load-demo] .progress-list li { border: 1px solid var(--demo-border); border-radius: 999px; padding: .25rem .75rem; }
        [data-cognitive-load-demo] .progress-list li[aria-current="step"] { border-color: var(--demo-accent); background: #e0f2fe; font-weight: 700; }
        [data-cognitive-load-demo] .live-summary { border: 1px solid var(--demo-border); border-radius: .5rem; padding: .75rem 1rem; margin: 1rem 0; background: #f8fafc; }
        [data-cognitive-load-demo] .reservation-summary { display: grid; grid-template-columns: minmax(8rem, .7fr) minmax(0, 1fr); gap: .4rem 1rem; margin: 1rem 0; }
        [data-cognitive-load-demo] .reservation-summary dt { font-weight: 650; }
        [data-cognitive-load-demo] .reservation-summary dd { margin: 0; }
        [data-cognitive-load-demo] .edit-details { margin: 1.25rem 0; }
        [data-cognitive-load-demo] .edit-details summary { width: fit-content; cursor: pointer; font-weight: 650; }
        [data-cognitive-load-demo] .feedback { margin-top: 1.25rem; border-left: 4px solid #b91c1c; padding: .5rem 1rem; background: #fef2f2; }
        [data-cognitive-load-demo] .feedback p { margin-top: .35rem; }
        [data-cognitive-load-demo] .reflection, [data-cognitive-load-demo] .criteria { border-top: 1px solid var(--demo-border); padding-top: 1rem; margin-top: 1.5rem; }
        [data-cognitive-load-demo] .key-takeaway { border-left: 4px solid var(--demo-accent); padding: .75rem 1rem; background: #f0f9ff; }
        [data-cognitive-load-demo] .actions { align-items: center; }
        [data-cognitive-load-demo] a:focus-visible, [data-cognitive-load-demo] button:focus-visible, [data-cognitive-load-demo] input:focus-visible, [data-cognitive-load-demo] select:focus-visible, [data-cognitive-load-demo] summary:focus-visible { outline: 3px solid #0369a1; outline-offset: 4px; }
        @media (max-width: 560px) {
            [data-cognitive-load-demo] .reservation-summary { grid-template-columns: 1fr; gap: 0; }
            [data-cognitive-load-demo] .reservation-summary dd { margin-bottom: .65rem; }
        }
        @media (prefers-reduced-motion: reduce) { [data-cognitive-load-demo] * { scroll-behavior: auto !important; } }
    </style>

</x-module06-demo-layout>
