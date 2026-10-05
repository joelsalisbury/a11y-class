<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Semantic Structure Bench</title>

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

            .intro {
                margin-bottom: 1.25rem;
                padding: 1rem 1.1rem;
                border: 1px solid var(--border);
                border-radius: 14px;
                background: var(--panel);
            }

            .intro p {
                margin: 0;
                font-size: 1.05rem;
                line-height: 1.6;
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
                font-size: clamp(1.4rem, 2vw, 2.1rem);
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
                font-size: 0.8rem;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                color: var(--muted);
            }

            .code-stack {
                display: grid;
                gap: 0.8rem;
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
                font-size: 0.9rem;
            }

            .render-surface {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 0.75rem;
                min-height: 175px;
                padding: 1rem;
                border: 1px solid var(--border);
                border-radius: 12px;
                background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            }

            .variant {
                display: grid;
                align-content: center;
                gap: 0.55rem;
                padding: 0.7rem;
                border: 1px solid var(--border);
                border-radius: 12px;
                background: #f8fafc;
                min-height: 120px;
            }

            .variant-label {
                font-size: 0.72rem;
                letter-spacing: 0.12em;
                text-transform: uppercase;
                color: var(--muted);
                font-weight: 700;
            }

            .section-title,
            .section-label,
            .nav-bar,
            .list-row,
            .form-row,
            .card-title {
                margin: 0;
                font: inherit;
                color: var(--text);
            }

            .section-title {
                font-size: 1.25rem;
                font-weight: 700;
                letter-spacing: -0.02em;
                color: #0f172a;
                padding: 0.35rem 0;
            }

            .list-rows {
                display: grid;
                gap: 0.4rem;
            }

            .list-row {
                border: 1px solid var(--border);
                border-radius: 8px;
                background: #fff;
                padding: 0.6rem 0.7rem;
            }

            .nav-bar {
                display: flex;
                gap: 0.5rem;
                flex-wrap: wrap;
                padding: 0.5rem;
                border: 1px solid var(--border);
                border-radius: 10px;
                background: #f8fafc;
            }

            .nav-link {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                min-height: 2.2rem;
                padding: 0.45rem 0.8rem;
                border-radius: 8px;
                border: 1px solid var(--border);
                background: #eff6ff;
                color: var(--text);
                text-decoration: none;
                font-weight: 600;
            }

            .form-panel {
                display: grid;
                gap: 0.6rem;
                padding: 0.7rem;
                border: 1px solid var(--border);
                border-radius: 10px;
                background: #fff;
            }

            .form-row {
                display: grid;
                gap: 0.2rem;
            }

            .label {
                font-size: 0.85rem;
                font-weight: 700;
            }

            .input,
            .select {
                min-height: 2.2rem;
                border: 1px solid var(--border);
                border-radius: 8px;
                background: #fff;
                padding: 0.55rem 0.7rem;
                font: inherit;
                color: var(--text);
            }

            .card {
                display: grid;
                gap: 0.6rem;
                padding: 0.8rem;
                border: 1px solid var(--border);
                border-radius: 10px;
                background: #fff;
            }

            .card-title {
                font-weight: 700;
            }

            .meta {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                flex-wrap: wrap;
                color: var(--muted);
                font-size: 0.88rem;
            }

            .pill {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.25rem 0.5rem;
                border: 1px solid var(--border);
                border-radius: 9999px;
                background: #f1f5f9;
            }

            .question {
                margin-top: 1rem;
                font-weight: 700;
            }

            .reveal {
                margin-top: 0.8rem;
                padding: 0.85rem 0.95rem;
                border-left: 3px solid #cbd5e1;
                border-radius: 0 10px 10px 0;
                background: #f8fafc;
            }

            .reveal strong {
                display: block;
                margin-bottom: 0.35rem;
            }

            @media (max-width: 560px) {
                .render-surface {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>
    <body>
        <main class="page-shell">
            <header class="topbar" aria-label="Page navigation">
                <a href="/modules/5">Back to Module 05</a>
                <strong>Semantic Structure Bench</strong>
            </header>

            <div class="intro">
                <p>If these look the same, does the browser understand them the same way?</p>
            </div>

            <div class="examples">
                <article class="example" aria-labelledby="example-1">
                    <h2 id="example-1">Is It Actually a Heading?</h2>
                    <div class="layout">
                        <div class="code-panel">
                            <h3>Code A</h3>
                            <pre><code>&lt;div class="section-title"&gt;
    Upcoming Workshops
&lt;/div&gt;</code></pre>
                            <h3>Code B</h3>
                            <pre><code>&lt;h2 class="section-title"&gt;
    Upcoming Workshops
&lt;/h2&gt;</code></pre>
                        </div>
                        <div class="render-panel">
                            <h3>Rendered</h3>
                            <div class="render-surface">
                                <div class="variant">
                                    <div class="variant-label">A</div>
                                    <div class="section-title">Upcoming Workshops</div>
                                </div>
                                <div class="variant">
                                    <div class="variant-label">B</div>
                                    <h2 class="section-title">Upcoming Workshops</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="question">If these look the same, does the browser understand them the same way?</p>
                    <div class="reveal">
                        <strong>Reveal</strong>
                        A is a styled div. B is a heading. The browser can announce B as a heading and users can jump between headings using a screen reader.
                    </div>
                </article>

                <article class="example" aria-labelledby="example-2">
                    <h2 id="example-2">Is This a List?</h2>
                    <div class="layout">
                        <div class="code-panel">
                            <h3>Code A</h3>
                            <pre><code>&lt;div class="list-rows"&gt;
    &lt;div class="list-row"&gt;Accessible design&lt;/div&gt;
    &lt;div class="list-row"&gt;Keyboard testing&lt;/div&gt;
    &lt;div class="list-row"&gt;Screen-reader practice&lt;/div&gt;
&lt;/div&gt;</code></pre>
                            <h3>Code B</h3>
                            <pre><code>&lt;ul&gt;
    &lt;li&gt;Accessible design&lt;/li&gt;
    &lt;li&gt;Keyboard testing&lt;/li&gt;
    &lt;li&gt;Screen-reader practice&lt;/li&gt;
&lt;/ul&gt;</code></pre>
                        </div>
                        <div class="render-panel">
                            <h3>Rendered</h3>
                            <div class="render-surface">
                                <div class="variant">
                                    <div class="variant-label">A</div>
                                    <div class="list-rows">
                                        <div class="list-row">Accessible design</div>
                                        <div class="list-row">Keyboard testing</div>
                                        <div class="list-row">Screen-reader practice</div>
                                    </div>
                                </div>
                                <div class="variant">
                                    <div class="variant-label">B</div>
                                    <ul>
                                        <li>Accessible design</li>
                                        <li>Keyboard testing</li>
                                        <li>Screen-reader practice</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="question">If these look the same, does the browser understand them the same way?</p>
                    <div class="reveal">
                        <strong>Reveal</strong>
                        A is just a set of divs; B is a real list. A screen reader can announce the number of items and move through them as a list.
                    </div>
                </article>

                <article class="example" aria-labelledby="example-3">
                    <h2 id="example-3">Is This Navigation?</h2>
                    <div class="layout">
                        <div class="code-panel">
                            <h3>Code A</h3>
                            <pre><code>&lt;div class="nav-bar"&gt;
    &lt;a href="#"&gt;Home&lt;/a&gt;
    &lt;a href="#"&gt;Schedule&lt;/a&gt;
    &lt;a href="#"&gt;Resources&lt;/a&gt;
&lt;/div&gt;</code></pre>
                            <h3>Code B</h3>
                            <pre><code>&lt;nav aria-label="Main navigation"&gt;
    &lt;a href="#"&gt;Home&lt;/a&gt;
    &lt;a href="#"&gt;Schedule&lt;/a&gt;
    &lt;a href="#"&gt;Resources&lt;/a&gt;
&lt;/nav&gt;</code></pre>
                        </div>
                        <div class="render-panel">
                            <h3>Rendered</h3>
                            <div class="render-surface">
                                <div class="variant">
                                    <div class="variant-label">A</div>
                                    <div class="nav-bar">
                                        <a href="#" class="nav-link">Home</a>
                                        <a href="#" class="nav-link">Schedule</a>
                                        <a href="#" class="nav-link">Resources</a>
                                    </div>
                                </div>
                                <div class="variant">
                                    <div class="variant-label">B</div>
                                    <nav aria-label="Main navigation" class="nav-bar">
                                        <a href="#" class="nav-link">Home</a>
                                        <a href="#" class="nav-link">Schedule</a>
                                        <a href="#" class="nav-link">Resources</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="question">If these look the same, does the browser understand them the same way?</p>
                    <div class="reveal">
                        <strong>Reveal</strong>
                        Both have links, but only B communicates that this is a navigation landmark. A screen reader can identify and jump to landing areas in the page.
                    </div>
                </article>

                <article class="example" aria-labelledby="example-4">
                    <h2 id="example-4">Is This a Label or Just Text?</h2>
                    <div class="layout">
                        <div class="code-panel">
                            <h3>Code A</h3>
                            <pre><code>&lt;p&gt;Workshop choice&lt;/p&gt;
&lt;select&gt;
    &lt;option&gt;Design systems&lt;/option&gt;
    &lt;option&gt;Inclusive forms&lt;/option&gt;
&lt;/select&gt;</code></pre>
                            <h3>Code B</h3>
                            <pre><code>&lt;label for="workshop"&gt;Workshop choice&lt;/label&gt;
&lt;select id="workshop"&gt;
    &lt;option&gt;Design systems&lt;/option&gt;
    &lt;option&gt;Inclusive forms&lt;/option&gt;
&lt;/select&gt;</code></pre>
                        </div>
                        <div class="render-panel">
                            <h3>Rendered</h3>
                            <div class="render-surface">
                                <div class="variant">
                                    <div class="variant-label">A</div>
                                    <div class="form-panel">
                                        <div class="form-row">
                                            <div class="label">Workshop choice</div>
                                            <select class="select">
                                                <option>Design systems</option>
                                                <option>Inclusive forms</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="variant">
                                    <div class="variant-label">B</div>
                                    <div class="form-panel">
                                        <div class="form-row">
                                            <label for="workshop" class="label">Workshop choice</label>
                                            <select id="workshop" class="select">
                                                <option>Design systems</option>
                                                <option>Inclusive forms</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="question">If these look the same, does the browser understand them the same way?</p>
                    <div class="reveal">
                        <strong>Reveal</strong>
                        A can be visually associated, but B exposes a proper label relationship. A screen reader can announce the field name more reliably and users can understand the control without guessing.
                    </div>
                </article>

                <article class="example" aria-labelledby="example-5">
                    <h2 id="example-5">Are These in the Same Group?</h2>
                    <div class="layout">
                        <div class="code-panel">
                            <h3>Code A</h3>
                            <pre><code>&lt;div class="checklist"&gt;
    &lt;label&gt;&lt;input type="checkbox"&gt; Access needs&lt;/label&gt;
    &lt;label&gt;&lt;input type="checkbox"&gt; Dietary requirements&lt;/label&gt;
&lt;/div&gt;</code></pre>
                            <h3>Code B</h3>
                            <pre><code>&lt;fieldset&gt;
    &lt;legend&gt;Support needs&lt;/legend&gt;
    &lt;label&gt;&lt;input type="checkbox"&gt; Access needs&lt;/label&gt;
    &lt;label&gt;&lt;input type="checkbox"&gt; Dietary requirements&lt;/label&gt;
&lt;/fieldset&gt;</code></pre>
                        </div>
                        <div class="render-panel">
                            <h3>Rendered</h3>
                            <div class="render-surface">
                                <div class="variant">
                                    <div class="variant-label">A</div>
                                    <div class="card">
                                        <label><input type="checkbox"> Access needs</label>
                                        <label><input type="checkbox"> Dietary requirements</label>
                                    </div>
                                </div>
                                <div class="variant">
                                    <div class="variant-label">B</div>
                                    <fieldset class="card">
                                        <legend>Support needs</legend>
                                        <label><input type="checkbox"> Access needs</label>
                                        <label><input type="checkbox"> Dietary requirements</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="question">If these look the same, does the browser understand them the same way?</p>
                    <div class="reveal">
                        <strong>Reveal</strong>
                        A is a loose collection of controls. B is a named group. The browser can announce the grouping and help users understand how the options relate to each other.
                    </div>
                </article>

                <article class="example" aria-labelledby="example-6">
                    <h2 id="example-6">Is This the Main Content?</h2>
                    <div class="layout">
                        <div class="code-panel">
                            <h3>Code A</h3>
                            <pre><code>&lt;div class="page"&gt;
    &lt;h1&gt;Workshop registration&lt;/h1&gt;
    &lt;p&gt;Register for the Friday clinic.&lt;/p&gt;
&lt;/div&gt;</code></pre>
                            <h3>Code B</h3>
                            <pre><code>&lt;main&gt;
    &lt;h1&gt;Workshop registration&lt;/h1&gt;
    &lt;p&gt;Register for the Friday clinic.&lt;/p&gt;
&lt;/main&gt;</code></pre>
                        </div>
                        <div class="render-panel">
                            <h3>Rendered</h3>
                            <div class="render-surface">
                                <div class="variant">
                                    <div class="variant-label">A</div>
                                    <div class="card">
                                        <div class="card-title">Workshop registration</div>
                                        <div>Register for the Friday clinic.</div>
                                    </div>
                                </div>
                                <div class="variant">
                                    <div class="variant-label">B</div>
                                    <main class="card">
                                        <div class="card-title">Workshop registration</div>
                                        <div>Register for the Friday clinic.</div>
                                    </main>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="question">If these look the same, does the browser understand them the same way?</p>
                    <div class="reveal">
                        <strong>Reveal</strong>
                        Both may appear the same, but B communicates a document landmark: this is the main content area. Assistive technology can find the primary content more quickly.
                    </div>
                </article>
            </div>
        </main>
    </body>
</html>
