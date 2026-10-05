<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Semantic Controls Bench</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --bg: #f8fafc;
                --panel: #ffffff;
                --muted-panel: #f1f5f9;
                --border: #dfe7ef;
                --text: #0f172a;
                --muted: #475569;
                --focus: #2563eb;
                --accent: #1d4ed8;
                --accent-strong: #1e3a8a;
            }

            * { box-sizing: border-box; }

            body {
                margin: 0;
                font-family: 'Instrument Sans', sans-serif;
                background: var(--bg);
                color: var(--text);
            }

            .page-shell {
                max-width: 1200px;
                margin: 0 auto;
                padding: 2rem 1rem 4rem;
            }

            .topbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 1rem;
                margin-bottom: 1rem;
                padding: 0.75rem 1rem;
                border: 1px solid var(--border);
                border-radius: 14px;
                background: var(--panel);
            }

            .topbar a {
                color: var(--text);
                text-decoration: none;
                font-weight: 600;
            }

            .topbar a:hover {
                text-decoration: underline;
            }

            .examples {
                display: grid;
                gap: 1.2rem;
            }

            .example {
                border: 1px solid var(--border);
                border-radius: 18px;
                background: var(--panel);
                padding: 1.25rem;
                box-shadow: 0 12px 28px rgba(15, 23, 42, 0.04);
            }

            .example h2 {
                margin: 0 0 1rem;
                font-size: clamp(1.45rem, 2vw, 2.2rem);
            }

            .layout {
                display: grid;
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
                gap: 1rem;
            }

            @media (max-width: 800px) {
                .layout {
                    grid-template-columns: 1fr;
                }
            }

            .code-panel,
            .render-panel {
                border: 1px solid var(--border);
                border-radius: 14px;
                background: #f8fafc;
                padding: 1rem;
            }

            .code-panel h3,
            .render-panel h3 {
                margin: 0 0 0.75rem;
                font-size: 0.82rem;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                color: var(--muted);
            }

            pre {
                margin: 0;
                overflow-x: auto;
                border-radius: 10px;
                background: #e2e8f0;
                padding: 0.8rem;
                color: var(--text);
                white-space: pre-wrap;
            }

            code {
                font-family: ui-monospace, SFMono-Regular, Menlo, monospace;
                font-size: 0.92rem;
            }

            .render-surface {
                display: flex;
                flex-wrap: wrap;
                gap: 0.75rem;
                align-items: center;
                min-height: 160px;
                padding: 1rem;
                border: 1px solid var(--border);
                border-radius: 12px;
                background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            }

            .demo-link,
            .native-button,
            .simulated-button,
            .icon-button,
            .toggle-button,
            .disclosure-button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-height: 2.75rem;
                border-radius: 10px;
                border: 1px solid var(--border);
                padding: 0.7rem 1rem;
                font: inherit;
                font-weight: 600;
                cursor: pointer;
                text-decoration: none;
                color: var(--text);
                background: var(--muted-panel);
            }

            .demo-link:hover,
            .native-button:hover,
            .simulated-button:hover,
            .toggle-button:hover,
            .disclosure-button:hover,
            .icon-button:hover {
                border-color: #cbd5e1;
                background: #e2e8f0;
            }

            .demo-link {
                background: var(--accent);
                border-color: var(--accent);
                color: white;
            }

            .demo-link:hover {
                background: var(--accent-strong);
            }

            .custom-button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-height: 2.75rem;
                border-radius: 10px;
                border: 1px solid var(--border);
                padding: 0.7rem 1rem;
                background: var(--muted-panel);
                color: var(--text);
                font: inherit;
                font-weight: 600;
                cursor: pointer;
            }

            .custom-button:focus {
                outline: 3px solid var(--focus);
                outline-offset: 3px;
            }

            .icon-button {
                width: 2.75rem;
                padding: 0;
            }

            .icon-button svg {
                width: 1rem;
                height: 1rem;
            }

            .example-status {
                min-height: 1.25rem;
                margin-top: 0.75rem;
                color: var(--accent-strong);
                font-weight: 600;
            }

            .question {
                margin-top: 1rem;
                font-weight: 700;
            }

            .reveal {
                margin-top: 0.8rem;
                padding: 0.85rem 0.9rem;
                border-left: 3px solid #cbd5e1;
                background: #f8fafc;
                border-radius: 0 10px 10px 0;
            }

            .reveal ul {
                margin: 0.5rem 0 0 1.1rem;
                padding: 0;
            }

            .strong-takeaway {
                margin-top: 0.8rem;
                font-weight: 700;
            }

            .hidden-message {
                display: none;
            }

            .visible {
                display: inline-block;
            }

            button:focus-visible,
            a:focus-visible,
            .custom-button:focus-visible {
                outline: 3px solid var(--focus);
                outline-offset: 3px;
            }
        </style>
    </head>
    <body>
        <main class="page-shell">
            <header class="topbar" aria-label="Page navigation">
                <a href="/modules/5">Back to Module 05</a>
                <strong>Semantic Controls Bench</strong>
            </header>

            <div class="examples">
                <article class="example" aria-labelledby="example-1">
                    <h2 id="example-1">Link or Button?</h2>
                    <div class="layout">
                        <div class="code-panel">
                            <h3>Code</h3>
                            <pre><code>&lt;a href="/experiences/module-05/schedule"&gt;View schedule&lt;/a&gt;

&lt;button type="button"&gt;View schedule&lt;/button&gt;</code></pre>
                        </div>
                        <div class="render-panel">
                            <h3>Rendered result</h3>
                            <div class="render-surface" aria-label="Link and button examples">
                                <a href="/experiences/module-05/schedule" class="demo-link">View schedule</a>
                                <button type="button" class="native-button" id="example-one-button">View schedule</button>
                            </div>
                            <div id="example-one-status" class="example-status" aria-live="polite"></div>
                        </div>
                    </div>

                    <p class="question">They can look almost identical. Are they the same control?</p>
                    <div class="reveal">
                        <div>- a link navigates to another resource/location;</div>
                        <div>- a button performs an action in the current interface.</div>
                    </div>
                    <div class="strong-takeaway">Appearance does not determine semantics.</div>
                </article>

                <article class="example" aria-labelledby="example-2">
                    <h2 id="example-2">What Comes For Free?</h2>
                    <div class="layout">
                        <div class="code-panel">
                            <h3>Code</h3>
                            <pre><code>&lt;button type="button"&gt;Save workshop&lt;/button&gt;

&lt;div class="button" onclick="saveWorkshop()"&gt;
    Save workshop
&lt;/div&gt;</code></pre>
                        </div>
                        <div class="render-panel">
                            <h3>Rendered result</h3>
                            <div class="render-surface" aria-label="Native button and custom div examples">
                                <button type="button" class="native-button" id="native-save-button">Save workshop</button>
                                <div class="custom-button" id="custom-save-button">Save workshop</div>
                            </div>
                            <div id="example-two-status" class="example-status" aria-live="polite"></div>
                        </div>
                    </div>

                    <p class="question">They look the same. What does the native button already know how to do?</p>
                    <div class="reveal">
                        <ul>
                            <li>keyboard focus;</li>
                            <li>activation behavior;</li>
                            <li>button semantics;</li>
                            <li>expected browser behavior.</li>
                        </ul>
                    </div>
                    <div class="strong-takeaway">Native controls already know how to behave.</div>
                </article>

            </div>
        </main>

        <script>
            const exampleOneButton = document.getElementById('example-one-button');
            const exampleOneStatus = document.getElementById('example-one-status');
            exampleOneButton.addEventListener('click', () => {
                exampleOneStatus.textContent = 'Schedule saved for later.';
            });

            const nativeSaveButton = document.getElementById('native-save-button');
            const customSaveButton = document.getElementById('custom-save-button');
            const exampleTwoStatus = document.getElementById('example-two-status');

            nativeSaveButton.addEventListener('click', () => {
                exampleTwoStatus.textContent = 'Native button activation is built in.';
            });

            customSaveButton.addEventListener('click', () => {
                exampleTwoStatus.textContent = 'Custom div click works, but it is not a native button.';
            });

        </script>
    </body>
</html>
