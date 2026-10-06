<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Semantic Controls</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --page: #f4f7f5;
                --surface: #ffffff;
                --surface-soft: #edf3f1;
                --border: #cbd6d3;
                --ink: #18343a;
                --muted: #4c6265;
                --focus: #a14326;
                --selected: #d8ece8;
                --selected-ink: #174b45;
            }

            * { box-sizing: border-box; }

            body {
                margin: 0;
                color: var(--ink);
                background: var(--page);
                font-family: 'Instrument Sans', sans-serif;
            }

            .page-shell {
                width: min(100% - 2rem, 1440px);
                margin: 0 auto;
                padding: 1.5rem 0 4rem;
            }

            .topbar {
                margin-bottom: 1.25rem;
                padding: 0.85rem 1rem;
                border: 1px solid var(--border);
                border-radius: 8px;
                background: var(--surface);
            }

            .topbar a {
                color: var(--ink);
                font-weight: 650;
                text-decoration-thickness: 1px;
                text-underline-offset: 0.2em;
            }

            .page-heading {
                margin-bottom: 1.5rem;
            }

            h1 {
                margin: 0 0 0.8rem;
                font-size: 2.35rem;
                line-height: 1.1;
            }

            .intro {
                margin: 0;
                padding: 1rem 1.2rem;
                border-left: 4px solid #397f78;
                background: #e7f0ed;
                color: #203e40;
            }

            .intro p {
                margin: 0;
                font-size: 1.05rem;
                line-height: 1.55;
            }

            .intro p + p {
                margin-top: 0.45rem;
                color: #405b5d;
            }

            .examples {
                display: grid;
                gap: 1rem;
            }

            .example {
                padding: 1.1rem;
                border: 1px solid var(--border);
                border-radius: 8px;
                background: var(--surface);
            }

            .example h2 {
                margin: 0 0 1rem;
                font-size: 1.6rem;
                line-height: 1.2;
            }

            .variant-list {
                display: grid;
                gap: 0.85rem;
            }

            .variant-label {
                margin-bottom: 0.45rem;
                color: var(--muted);
                font-size: 0.8rem;
                font-weight: 750;
                text-transform: uppercase;
            }

            .layout {
                display: grid;
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
                gap: 0.75rem;
            }

            .code-panel,
            .render-panel {
                min-width: 0;
                padding: 0.85rem;
                border: 1px solid var(--border);
                border-radius: 7px;
                background: #f7f9f8;
            }

            .panel-title {
                margin: 0 0 0.6rem;
                color: var(--muted);
                font-size: 0.75rem;
                font-weight: 750;
                letter-spacing: 0.08em;
                text-transform: uppercase;
            }

            pre {
                min-height: 100%;
                margin: 0;
                overflow-x: auto;
                padding: 0.75rem;
                border-radius: 5px;
                background: #e8eeec;
                color: #193b40;
                white-space: pre-wrap;
                overflow-wrap: anywhere;
            }

            code {
                font-family: ui-monospace, SFMono-Regular, Menlo, monospace;
                font-size: 0.85rem;
                line-height: 1.5;
            }

            .render-surface {
                display: flex;
                min-height: 112px;
                align-items: center;
                padding: 0.85rem;
                border: 1px dashed #b8c7c3;
                border-radius: 5px;
                background: #ffffff;
            }

            .control {
                display: inline-flex;
                min-height: 2.75rem;
                align-items: center;
                justify-content: center;
                padding: 0.65rem 1rem;
                border: 1px solid #375d61;
                border-radius: 6px;
                background: #e7f0ed;
                color: #18343a;
                appearance: none;
                font: inherit;
                font-weight: 650;
                text-decoration: none;
                cursor: pointer;
            }

            .control:hover,
            .segment-button:hover {
                background: #d8e7e3;
            }

            .demo-status {
                min-height: 1.4rem;
                margin: 0.55rem 0 0;
                color: var(--selected-ink);
                font-weight: 650;
            }

            .switch {
                position: relative;
                display: inline-flex;
                min-height: 2.5rem;
                align-items: center;
                gap: 0.65rem;
                color: var(--ink);
                font: inherit;
                font-weight: 650;
                cursor: pointer;
            }

            .switch-track {
                position: relative;
                display: inline-block;
                width: 3rem;
                height: 1.7rem;
                flex: 0 0 auto;
                border: 1px solid #69817e;
                border-radius: 999px;
                background: #dbe3e1;
                transition: background-color 120ms ease;
            }

            .switch-track::after {
                position: absolute;
                top: 0.17rem;
                left: 0.18rem;
                width: 1.2rem;
                height: 1.2rem;
                border-radius: 50%;
                background: #ffffff;
                box-shadow: 0 1px 2px rgb(24 52 58 / 25%);
                content: '';
                transition: transform 120ms ease;
            }

            .switch input:checked + .switch-track,
            .switch.is-on .switch-track {
                border-color: #397f78;
                background: #397f78;
            }

            .switch input:checked + .switch-track::after,
            .switch.is-on .switch-track::after {
                transform: translateX(1.35rem);
            }

            .switch input {
                position: absolute;
                width: 1px;
                height: 1px;
                overflow: hidden;
                clip-path: inset(50%);
                white-space: nowrap;
            }

            .switch input:focus-visible + .switch-track {
                outline: 3px solid var(--focus);
                outline-offset: 3px;
            }

            .segmented-control {
                display: grid;
                width: min(100%, 34rem);
                gap: 0.5rem;
                margin: 0;
                padding: 0;
                border: 0;
            }

            .segmented-control legend,
            .group-label {
                display: block;
                margin-bottom: 0.1rem;
                color: var(--ink);
                font-weight: 700;
            }

            .segments {
                display: flex;
                overflow: hidden;
                border: 1px solid #718581;
                border-radius: 6px;
            }

            .segment {
                position: relative;
                display: flex;
                min-width: 0;
                flex: 1 1 0;
                cursor: pointer;
            }

            .segment + .segment,
            .segment-button + .segment-button {
                border-left: 1px solid #b8c7c3;
            }

            .segment input {
                position: absolute;
                width: 1px;
                height: 1px;
                overflow: hidden;
                clip-path: inset(50%);
                white-space: nowrap;
            }

            .segment span,
            .segment-button {
                display: flex;
                width: 100%;
                min-height: 2.75rem;
                align-items: center;
                justify-content: center;
                padding: 0.45rem;
                border: 0;
                background: #ffffff;
                color: var(--ink);
                font: inherit;
                text-align: center;
            }

            .segment input:checked + span,
            .segment-button.is-selected {
                background: var(--selected);
                color: var(--selected-ink);
                font-weight: 700;
            }

            .segment input:focus-visible + span,
            .segment-button:focus-visible {
                position: relative;
                z-index: 1;
                outline: 3px solid var(--focus);
                outline-offset: -3px;
            }

            .segment-button {
                cursor: pointer;
            }

            .field-demo {
                display: grid;
                width: min(100%, 28rem);
                gap: 0.4rem;
            }

            .field-label {
                color: var(--ink);
                font-weight: 700;
            }

            .text-input {
                display: block;
                width: 100%;
                min-height: 2.8rem;
                padding: 0.6rem 0.75rem;
                border: 1px solid #718581;
                border-radius: 5px;
                background: #ffffff;
                color: var(--ink);
                font: inherit;
            }

            .fake-input {
                display: flex;
                align-items: center;
            }

            .text-input:focus-visible {
                outline: 3px solid var(--focus);
                outline-offset: 2px;
            }

            .disclosure {
                width: min(100%, 30rem);
                border: 1px solid #718581;
                border-radius: 6px;
                background: #ffffff;
            }

            .disclosure summary,
            .disclosure-trigger {
                display: flex;
                min-height: 2.9rem;
                align-items: center;
                justify-content: space-between;
                gap: 1rem;
                padding: 0.65rem 0.8rem;
                color: var(--ink);
                font-weight: 700;
                list-style: none;
                cursor: pointer;
            }

            .disclosure summary::-webkit-details-marker {
                display: none;
            }

            .disclosure summary::after,
            .disclosure-trigger::after {
                width: 0.55rem;
                height: 0.55rem;
                flex: 0 0 auto;
                border-right: 2px solid currentColor;
                border-bottom: 2px solid currentColor;
                content: '';
                transform: rotate(45deg) translateY(-0.15rem);
                transition: transform 120ms ease;
            }

            .disclosure[open] summary::after,
            .disclosure-trigger.is-open::after {
                transform: rotate(225deg) translate(-0.1rem, -0.1rem);
            }

            .disclosure p,
            .disclosure-content {
                margin: 0;
                padding: 0.75rem 0.8rem 0.9rem;
                border-top: 1px solid var(--border);
                color: #405b5d;
                line-height: 1.5;
            }

            .icon-button {
                display: inline-flex;
                width: 2.8rem;
                height: 2.8rem;
                align-items: center;
                justify-content: center;
                border: 1px solid #375d61;
                border-radius: 6px;
                background: #e7f0ed;
                color: #18343a;
                cursor: pointer;
            }

            .icon-button:hover {
                background: #d8e7e3;
            }

            .icon-button svg {
                width: 1.2rem;
                height: 1.2rem;
            }

            .icon-comparison {
                display: flex;
                width: 100%;
                align-items: center;
                justify-content: space-evenly;
                gap: 1rem;
            }

            .icon-option {
                display: grid;
                justify-items: center;
                gap: 0.25rem;
            }

            .question {
                margin: 0.9rem 0 0;
                font-weight: 700;
                line-height: 1.5;
            }

            .reveal {
                margin-top: 0.65rem;
                border-left: 3px solid #397f78;
                background: #f1f6f4;
            }

            .reveal summary {
                width: fit-content;
                padding: 0.5rem 0.65rem;
                color: #245d57;
                font-weight: 700;
                cursor: pointer;
            }

            .reveal-content {
                padding: 0 0.75rem 0.75rem;
                line-height: 1.55;
            }

            .reveal-content ul {
                margin: 0;
                padding-left: 1.2rem;
            }

            .takeaways {
                margin-top: 1.4rem;
                padding: 1.1rem;
                border-top: 3px solid #397f78;
                background: #e7f0ed;
            }

            .takeaways h2 {
                margin: 0 0 0.65rem;
                font-size: 1.45rem;
            }

            .takeaways ul {
                display: grid;
                gap: 0.35rem;
                margin: 0;
                padding-left: 1.25rem;
            }

            :focus-visible {
                outline: 3px solid var(--focus);
                outline-offset: 3px;
            }

            @media (max-width: 800px) {
                .layout {
                    grid-template-columns: 1fr;
                }
            }

            @media (max-width: 540px) {
                .page-shell {
                    width: min(100% - 1rem, 1440px);
                    padding-top: 0.5rem;
                }

                .example {
                    padding: 0.75rem;
                }

                .example h2 {
                    font-size: 1.35rem;
                }

                .code-panel,
                .render-panel {
                    padding: 0.65rem;
                }

                pre {
                    padding: 0.55rem;
                }

                code {
                    font-size: 0.78rem;
                }
            }
        </style>
    </head>
    <body>
        <main class="page-shell">
            <header class="topbar">
                <nav aria-label="Page navigation">
                    <a href="/modules/5">Back to Module 05</a>
                </nav>
            </header>

            <header class="page-heading">
                <h1>Semantic Controls</h1>
                <blockquote class="intro">
                    <p>CSS can make almost anything look like a control. HTML determines what the browser understands it to be.</p>
                    <p>Compare the rendered controls with their markup. Look for differences in purpose, behavior, grouping, name, and state.</p>
                </blockquote>
            </header>

            <div class="examples">
                <article class="example" aria-labelledby="example-1">
                    <h2 id="example-1">Link or Button?</h2>
                    <div class="variant-list">
                        <section>
                            <div class="variant-label">A</div>
                            <div class="layout">
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;a class="control" href="/experiences/module-05/schedule"&gt;
    View schedule
&lt;/a&gt;</code></pre>
                                </div>
                                <div class="render-panel">
                                    <h3 class="panel-title">Rendered</h3>
                                    <div class="render-surface">
                                        <a class="control" href="/experiences/module-05/schedule">View schedule</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="variant-label">B</div>
                            <div class="layout">
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;button class="control" type="button" data-in-page-action&gt;
    View schedule
&lt;/button&gt;</code></pre>
                                </div>
                                <div class="render-panel">
                                    <h3 class="panel-title">Rendered</h3>
                                    <div class="render-surface">
                                        <button class="control" type="button" data-in-page-action>View schedule</button>
                                    </div>
                                    <p class="demo-status" data-demo-status aria-live="polite"></p>
                                </div>
                            </div>
                        </section>
                    </div>
                    <p class="question">They can look almost identical. Are they the same kind of control?</p>
                    <details class="reveal">
                        <summary>Reveal</summary>
                        <div class="reveal-content">A link navigates. A button performs an action. Styling does not determine semantics.</div>
                    </details>
                </article>

                <article class="example" aria-labelledby="example-2">
                    <h2 id="example-2">What Comes For Free?</h2>
                    <div class="variant-list">
                        <section>
                            <div class="variant-label">A</div>
                            <div class="layout">
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;button class="control" type="button" data-save-workshop&gt;
    Save workshop
&lt;/button&gt;</code></pre>
                                </div>
                                <div class="render-panel">
                                    <h3 class="panel-title">Rendered</h3>
                                    <div class="render-surface">
                                        <button class="control" type="button" data-save-workshop>Save workshop</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="variant-label">B</div>
                            <div class="layout">
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;div class="control" onclick="saveWorkshop()"&gt;
    Save workshop
&lt;/div&gt;</code></pre>
                                </div>
                                <div class="render-panel">
                                    <h3 class="panel-title">Rendered</h3>
                                    <div class="render-surface">
                                        <div class="control" onclick="saveWorkshop()">Save workshop</div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <p class="demo-status" data-save-status aria-live="polite"></p>
                    <p class="question">They look the same. What does the native button already know how to do?</p>
                    <details class="reveal">
                        <summary>Reveal</summary>
                        <div class="reveal-content">
                            <ul>
                                <li>receive keyboard focus;</li>
                                <li>activate from the keyboard;</li>
                                <li>expose button semantics;</li>
                                <li>follow expected browser behavior.</li>
                            </ul>
                            <p><strong>Native controls already know how to behave.</strong></p>
                        </div>
                    </details>
                </article>

                <article class="example" aria-labelledby="example-3">
                    <h2 id="example-3">Is This Actually a Checkbox?</h2>
                    <div class="variant-list">
                        <section>
                            <div class="variant-label">A</div>
                            <div class="layout">
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;label class="switch"&gt;
    &lt;input type="checkbox"&gt;
    &lt;span class="switch-track" aria-hidden="true"&gt;&lt;/span&gt;
    Email reminders
&lt;/label&gt;</code></pre>
                                </div>
                                <div class="render-panel">
                                    <h3 class="panel-title">Rendered</h3>
                                    <div class="render-surface">
                                        <label class="switch">
                                            <input type="checkbox">
                                            <span class="switch-track" aria-hidden="true"></span>
                                            Email reminders
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="variant-label">B</div>
                            <div class="layout">
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;div class="switch" onclick="toggleFakeSwitch(this)"&gt;
    &lt;span class="switch-track" aria-hidden="true"&gt;&lt;/span&gt;
    Email reminders
&lt;/div&gt;</code></pre>
                                </div>
                                <div class="render-panel">
                                    <h3 class="panel-title">Rendered</h3>
                                    <div class="render-surface">
                                        <div class="switch" onclick="toggleFakeSwitch(this)">
                                            <span class="switch-track" aria-hidden="true"></span>
                                            Email reminders
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <p class="question">Both look like switches. Which one actually has a checked state the browser understands?</p>
                    <details class="reveal">
                        <summary>Reveal</summary>
                        <div class="reveal-content">The native checkbox carries checkbox semantics and meaningful checked or unchecked state. Its appearance can change without throwing away those native semantics.</div>
                    </details>
                </article>

                <article class="example" aria-labelledby="example-4">
                    <h2 id="example-4">Are These One Question?</h2>
                    <div class="variant-list">
                        <section>
                            <div class="variant-label">A</div>
                            <div class="layout">
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;fieldset class="segmented-control"&gt;
    &lt;legend&gt;Workshop level&lt;/legend&gt;
    &lt;div class="segments"&gt;
        &lt;label class="segment"&gt;
            &lt;input type="radio" name="level" value="beginner" checked&gt;
            &lt;span&gt;Beginner&lt;/span&gt;
        &lt;/label&gt;
        &lt;label class="segment"&gt;
            &lt;input type="radio" name="level" value="intermediate"&gt;
            &lt;span&gt;Intermediate&lt;/span&gt;
        &lt;/label&gt;
        &lt;label class="segment"&gt;
            &lt;input type="radio" name="level" value="advanced"&gt;
            &lt;span&gt;Advanced&lt;/span&gt;
        &lt;/label&gt;
    &lt;/div&gt;
&lt;/fieldset&gt;</code></pre>
                                </div>
                                <div class="render-panel">
                                    <h3 class="panel-title">Rendered</h3>
                                    <div class="render-surface">
                                        <fieldset class="segmented-control">
                                            <legend>Workshop level</legend>
                                            <div class="segments">
                                                <label class="segment">
                                                    <input type="radio" name="level" value="beginner" checked>
                                                    <span>Beginner</span>
                                                </label>
                                                <label class="segment">
                                                    <input type="radio" name="level" value="intermediate">
                                                    <span>Intermediate</span>
                                                </label>
                                                <label class="segment">
                                                    <input type="radio" name="level" value="advanced">
                                                    <span>Advanced</span>
                                                </label>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="variant-label">B</div>
                            <div class="layout">
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;div class="segmented-control"&gt;
    &lt;span class="group-label"&gt;Workshop level&lt;/span&gt;
    &lt;div class="segments"&gt;
        &lt;button class="segment-button is-selected" type="button"&gt;Beginner&lt;/button&gt;
        &lt;button class="segment-button" type="button"&gt;Intermediate&lt;/button&gt;
        &lt;button class="segment-button" type="button"&gt;Advanced&lt;/button&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                                </div>
                                <div class="render-panel">
                                    <h3 class="panel-title">Rendered</h3>
                                    <div class="render-surface">
                                        <div class="segmented-control">
                                            <span class="group-label">Workshop level</span>
                                            <div class="segments">
                                                <button class="segment-button is-selected" type="button">Beginner</button>
                                                <button class="segment-button" type="button">Intermediate</button>
                                                <button class="segment-button" type="button">Advanced</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <p class="question">Visually, both let you choose one option. Does the browser know these choices belong to one question?</p>
                    <details class="reveal">
                        <summary>Reveal</summary>
                        <div class="reveal-content">
                            <ul>
                                <li>Radio buttons communicate mutually exclusive choices.</li>
                                <li>The shared <code>name</code> establishes one choice set, and <code>fieldset</code>/<code>legend</code> can provide its question.</li>
                                <li>Three ordinary buttons remain three ordinary buttons unless their behavior and semantics are deliberately recreated.</li>
                            </ul>
                        </div>
                    </details>
                </article>

                <article class="example" aria-labelledby="example-5">
                    <h2 id="example-5">Is This Actually an Input?</h2>
                    <div class="variant-list">
                        <section>
                            <div class="variant-label">A</div>
                            <div class="layout">
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;label class="field-label" for="email-demo"&gt;
    Email address
&lt;/label&gt;
&lt;input
    class="text-input"
    id="email-demo"
    type="email"
    autocomplete="email"
    value="mira@example.org"
&gt;</code></pre>
                                </div>
                                <div class="render-panel">
                                    <h3 class="panel-title">Rendered</h3>
                                    <div class="render-surface">
                                        <div class="field-demo">
                                            <label class="field-label" for="email-demo">Email address</label>
                                            <input class="text-input" id="email-demo" type="email" autocomplete="email" value="mira@example.org">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="variant-label">B</div>
                            <div class="layout">
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;div class="field-demo"&gt;
    &lt;span class="field-label"&gt;Email address&lt;/span&gt;
    &lt;div class="text-input fake-input"&gt;mira@example.org&lt;/div&gt;
&lt;/div&gt;</code></pre>
                                </div>
                                <div class="render-panel">
                                    <h3 class="panel-title">Rendered</h3>
                                    <div class="render-surface">
                                        <div class="field-demo">
                                            <span class="field-label">Email address</span>
                                            <div class="text-input fake-input">mira@example.org</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <p class="question">Both may look like places to enter text. Does that mean they communicate the same thing?</p>
                    <details class="reveal">
                        <summary>Reveal</summary>
                        <div class="reveal-content">Visual resemblance does not make an element a native form control. The email input exposes its control type, value, editable behavior, label, and autocomplete metadata to the browser; the generic element is only a styled display. Browsers and assistive technology do not necessarily announce autocomplete metadata aloud.</div>
                    </details>
                </article>

                <article class="example" aria-labelledby="example-6">
                    <h2 id="example-6">What State Is It In?</h2>
                    <div class="variant-list">
                        <section>
                            <div class="variant-label">A</div>
                            <div class="layout">
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;details class="disclosure"&gt;
    &lt;summary&gt;Workshop details&lt;/summary&gt;
    &lt;p&gt;Bring your laptop. Materials are provided.&lt;/p&gt;
&lt;/details&gt;</code></pre>
                                </div>
                                <div class="render-panel">
                                    <h3 class="panel-title">Rendered</h3>
                                    <div class="render-surface">
                                        <details class="disclosure">
                                            <summary>Workshop details</summary>
                                            <p>Bring your laptop. Materials are provided.</p>
                                        </details>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section>
                            <div class="variant-label">B</div>
                            <div class="layout">
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;div class="disclosure"&gt;
    &lt;div class="disclosure-trigger" onclick="toggleDetails(this)"&gt;Workshop details&lt;/div&gt;
    &lt;div class="disclosure-content" hidden&gt;
        Bring your laptop. Materials are provided.
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
                                </div>
                                <div class="render-panel">
                                    <h3 class="panel-title">Rendered</h3>
                                    <div class="render-surface">
                                        <div class="disclosure">
                                            <div class="disclosure-trigger" onclick="toggleDetails(this)">Workshop details</div>
                                            <div class="disclosure-content" hidden>Bring your laptop. Materials are provided.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <p class="question">Both reveal more content. Which implementation communicates that there is an open/closed state?</p>
                    <details class="reveal">
                        <summary>Reveal</summary>
                        <div class="reveal-content">Showing or hiding content is not the whole interaction. Expanded or collapsed is meaningful state, and native disclosure controls provide much of this behavior automatically.</div>
                    </details>
                </article>

                <article class="example" aria-labelledby="example-7">
                    <h2 id="example-7">What Is This Control Called?</h2>
                    <div class="layout">
                        <div class="variant-list">
                            <section>
                                <div class="variant-label">A</div>
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;button type="button" aria-label="Share workshop" class="icon-button"&gt;
    &lt;svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"&gt;
        &lt;circle cx="18" cy="5" r="3"&gt;&lt;/circle&gt;
        &lt;circle cx="6" cy="12" r="3"&gt;&lt;/circle&gt;
        &lt;circle cx="18" cy="19" r="3"&gt;&lt;/circle&gt;
        &lt;path d="m8.7 10.6 6.6-4.2M8.7 13.4l6.6 4.2"&gt;&lt;/path&gt;
    &lt;/svg&gt;
&lt;/button&gt;</code></pre>
                                </div>
                            </section>
                            <section>
                                <div class="variant-label">B</div>
                                <div class="code-panel">
                                    <h3 class="panel-title">Code</h3>
                                    <pre><code>&lt;button type="button" class="icon-button"&gt;
    &lt;svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"&gt;
        &lt;circle cx="18" cy="5" r="3"&gt;&lt;/circle&gt;
        &lt;circle cx="6" cy="12" r="3"&gt;&lt;/circle&gt;
        &lt;circle cx="18" cy="19" r="3"&gt;&lt;/circle&gt;
        &lt;path d="m8.7 10.6 6.6-4.2M8.7 13.4l6.6 4.2"&gt;&lt;/path&gt;
    &lt;/svg&gt;
&lt;/button&gt;</code></pre>
                                </div>
                            </section>
                        </div>
                        <div class="render-panel">
                            <h3 class="panel-title">Rendered</h3>
                            <div class="render-surface">
                                <div class="icon-comparison">
                                    <div class="icon-option">
                                        <div class="variant-label">A</div>
                                        <button type="button" aria-label="Share workshop" class="icon-button">
                                            <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                                <circle cx="18" cy="5" r="3"></circle>
                                                <circle cx="6" cy="12" r="3"></circle>
                                                <circle cx="18" cy="19" r="3"></circle>
                                                <path d="m8.7 10.6 6.6-4.2M8.7 13.4l6.6 4.2"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="icon-option">
                                        <div class="variant-label">B</div>
                                        <button type="button" class="icon-button">
                                            <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                                                <circle cx="18" cy="5" r="3"></circle>
                                                <circle cx="6" cy="12" r="3"></circle>
                                                <circle cx="18" cy="19" r="3"></circle>
                                                <path d="m8.7 10.6 6.6-4.2M8.7 13.4l6.6 4.2"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="question">They look identical. Do they have the same name?</p>
                    <details class="reveal">
                        <summary>Reveal</summary>
                        <div class="reveal-content">An icon can communicate visually, but an icon-only control still needs a useful accessible name. A control can have that name without visible text.</div>
                    </details>
                </article>
            </div>

            <section class="takeaways" aria-labelledby="takeaways-title">
                <h2 id="takeaways-title">What changed?</h2>
                <ul>
                    <li><strong>Purpose:</strong> link, button, checkbox, radio, input</li>
                    <li><strong>Name:</strong> what the control is called</li>
                    <li><strong>State:</strong> checked, selected, expanded, pressed</li>
                    <li><strong>Relationships:</strong> which controls belong together</li>
                    <li><strong>Behavior:</strong> what browsers and keyboards already know how to do</li>
                </ul>
                <p><strong>Start with the native element that matches the interaction.</strong></p>
            </section>
        </main>

        <script>
            document.querySelector('[data-in-page-action]').addEventListener('click', () => {
                document.querySelector('[data-demo-status]').textContent = 'This button performed an in-page action.';
            });

            function saveWorkshop() {
                document.querySelector('[data-save-status]').textContent = 'Workshop saved.';
            }

            document.querySelectorAll('[data-save-workshop]').forEach((button) => {
                button.addEventListener('click', saveWorkshop);
            });

            function toggleFakeSwitch(element) {
                element.classList.toggle('is-on');
            }

            document.querySelector('.segment-button').parentElement.addEventListener('click', (event) => {
                if (event.target.matches('button')) {
                    event.currentTarget.querySelectorAll('button').forEach((button) => {
                        button.classList.toggle('is-selected', button === event.target);
                    });
                }
            });

            function toggleDetails(trigger) {
                const content = trigger.nextElementSibling;
                const isOpen = content.hidden;

                content.hidden = !isOpen;
                trigger.classList.toggle('is-open', isOpen);
            }
        </script>
    </body>
</html>
