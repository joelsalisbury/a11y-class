<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Form Clarity Lab</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root { color-scheme: light; }
            body {
                background: linear-gradient(180deg, #f8fafc 0%, #ffffff 220px);
                color: #0f172a;
            }
            .lab-shell { max-width: 1100px; margin: 0 auto; padding: 0 1.1rem; }
            .lab-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 18px; box-shadow: 0 12px 30px rgba(15, 23, 42, 0.04); }
            .lab-field {
                width: 100%; border: 1px solid #d7deea; border-radius: 12px; padding: 0.7rem 0.8rem; font-size: 0.95rem; color: #0f172a; background: #fff;
            }
            .lab-field:focus { outline: 2px solid rgba(37,99,235,0.2); outline-offset: 2px; }
            .lab-note { display: block; font-size: 0.78rem; line-height: 1.5; color: #475569; }
            .lab-helper { display: block; border: 1px solid #dfe7f1; border-radius: 10px; background: #f8fafc; color: #334155; padding: 0.75rem 0.85rem; font-size: 0.82rem; line-height: 1.5; }
            .question {
                font-size: 0.93rem; font-weight: 600; color: #0f172a; margin-top: 1rem;
            }
            .task-box {
                margin-top: 1rem; border-left: 3px solid #cbd5e1; padding-left: 0.85rem; background: #f8fafc; border-radius: 6px; color: #334155; font-size: 0.92rem; line-height: 1.6;
            }
            .reveal-panel {
                display: none; margin-top: 1rem; border: 1px solid #dfe7f1; border-radius: 12px; background: #f8fafc; padding: 1rem 1.1rem; color: #334155;
            }
            .reveal-panel.is-visible { display: block; }
            .reveal-label {
                display: inline-block; margin-bottom: 0.6rem; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.14em; text-transform: uppercase; color: #475569;
            }
            .reset-button, .inspect-button {
                border: 1px solid #d8e1ee; border-radius: 10px; background: #fff; color: #0f172a; padding: 0.6rem 0.9rem; font-weight: 600; cursor: pointer;
            }
            .inspect-button { background: #f8fafc; }
            .screen-reader-hint {
                margin-top: 0.85rem; font-size: 0.76rem; letter-spacing: 0.08em; text-transform: uppercase; color: #64748b; font-weight: 700;
            }
            .inline-code {
                display: inline-block; margin-top: 0.35rem; padding: 0.2rem 0.45rem; border-radius: 6px; background: rgba(148, 163, 184, 0.12); border: 1px solid rgba(148, 163, 184, 0.2); font-family: ui-monospace, SFMono-Regular, Menlo, monospace; font-size: 0.78rem; color: #0f172a;
            }
            .stack { display: grid; gap: 0.75rem; }
            .mini-grid { display: grid; gap: 1rem; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); }
            .muted { color: #475569; }
        </style>
    </head>
    <body class="font-sans antialiased">
        <header class="border-b border-slate-200 bg-white/90 backdrop-blur-sm">
            <div class="lab-shell flex flex-col gap-3 py-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.18em] text-slate-500">Module 05 · Session 10</p>
                    <h1 class="text-xl font-semibold text-slate-900">Form Clarity Lab</h1>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" class="reset-button" data-reset-lab>Reset all examples</button>
                    <a href="{{ route('modules.session', ['module' => 5, 'session' => 10]) }}" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:border-slate-300 hover:text-slate-900">
                        Back to Session 10
                    </a>
                </div>
            </div>
        </header>

        <main class="lab-shell py-8 md:py-10">
            <div class="mb-8 max-w-3xl space-y-4">
                <p class="text-xs uppercase tracking-[0.18em] text-slate-500">Teaching example</p>
                <h2 class="text-2xl font-semibold tracking-tight text-slate-900">These forms are not obviously broken.</h2>
                <p class="text-lg leading-8 text-slate-700">Use them normally first. Then navigate them with a screen reader or inspect their accessibility information. Look for places where the visual interface and the semantic interface tell different stories.</p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('experiences.module05.screen-reader-lab') }}" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:border-slate-300 hover:text-slate-900">Screen Reader Quick Start</a>
                </div>
                <ol class="list-decimal pl-6 text-sm leading-7 text-slate-700 space-y-1">
                    <li>Look at the form.</li>
                    <li>Decide what it appears to communicate.</li>
                    <li>Navigate directly to the controls with a screen reader.</li>
                    <li>Listen to the name, type, state, and relevant instructions.</li>
                    <li>Inspect the markup or accessibility information when useful.</li>
                    <li>Decide whether the visual and semantic interfaces agree.</li>
                </ol>
            </div>

            <div class="space-y-8">
                <section class="lab-card p-5 md:p-6" data-example="example-1">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="text-2xl font-semibold tracking-tight text-slate-900">Example 1: What Is This Field Actually Called?</h2>
                        <div class="flex items-center gap-2">
                            <button type="button" class="inspect-button" data-reveal="example-1">Inspect / Reveal</button>
                            <button type="button" class="reset-button" data-reset-example="example-1">Reset</button>
                        </div>
                    </div>

                    <div class="stack mt-5">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <label for="email-field-example-1" class="block text-sm font-medium text-slate-900">Email address</label>
                            <input id="email-field-example-1" type="email" class="lab-field mt-2" aria-label="Username" placeholder="name@example.com">
                        </div>
                        <div class="task-box">Task: Navigate directly to the field with your screen reader. Do not read the surrounding page first.</div>
                        <p class="question">The page says “Email address.” What does the screen reader call the field?</p>
                        <ul class="list-disc pl-5 text-sm leading-7 text-slate-700">
                            <li>Do the visual label and accessible name agree?</li>
                            <li>Which source is creating the mismatch?</li>
                            <li>What would you remove or change?</li>
                        </ul>
                        <p class="screen-reader-hint">NVDA: F to move among form controls</p>
                    </div>

                    <div class="reveal-panel" data-reveal-panel="example-1">
                        <span class="reveal-label">Reveal</span>
                        <p>The visible label says “Email address,” but the input also has an unnecessary <span class="inline-code">aria-label="Username"</span>. That accessible name overrides the otherwise-good native label. The form looks correct, but the semantic interface is telling a different story.</p>
                        <p class="mt-3"><strong>Teaching point:</strong> Native HTML first. No ARIA is better than bad ARIA.</p>
                    </div>
                </section>

                <section class="lab-card p-5 md:p-6" data-example="example-2">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="text-2xl font-semibold tracking-tight text-slate-900">Example 2: Did the Instructions Come With the Field?</h2>
                        <div class="flex items-center gap-2">
                            <button type="button" class="inspect-button" data-reveal="example-2">Inspect / Reveal</button>
                            <button type="button" class="reset-button" data-reset-example="example-2">Reset</button>
                        </div>
                    </div>

                    <div class="stack mt-5">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <label for="student-id-field-example-2" class="block text-sm font-medium text-slate-900">Student ID</label>
                            <input id="student-id-field-example-2" class="lab-field mt-2" placeholder="1234567">
                            <p class="lab-note mt-3">Enter all 7 digits. Do not include spaces or dashes.</p>
                        </div>
                        <div class="task-box">Task: Navigate directly to Student ID using form-control navigation rather than reading the page from the top.</div>
                        <p class="question">When you arrive at the field directly, do you hear the information needed to complete it correctly?</p>
                        <p class="screen-reader-hint">VoiceOver: use the course quick-start instructions</p>
                    </div>

                    <div class="reveal-panel" data-reveal-panel="example-2">
                        <span class="reveal-label">Reveal</span>
                        <p>The visible instruction is present, but it is only ordinary text next to the field. It is not associated with the input in the accessible name or description. A user arriving directly at the field may hear only the label and not the formatting guidance.</p>
                        <p class="mt-3"><strong>Corrected pattern:</strong> the field keeps the same visual appearance, but the helper text is associated with the field via an appropriate description relationship such as <span class="inline-code">aria-describedby</span>.</p>
                    </div>
                </section>

                <section class="lab-card p-5 md:p-6" data-example="example-3">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="text-2xl font-semibold tracking-tight text-slate-900">Example 3: Which "Yes" Is This?</h2>
                        <div class="flex items-center gap-2">
                            <button type="button" class="inspect-button" data-reveal="example-3">Inspect / Reveal</button>
                            <button type="button" class="reset-button" data-reset-example="example-3">Reset</button>
                        </div>
                    </div>

                    <div class="stack mt-5">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-sm font-medium text-slate-900">Will you attend the networking lunch?</p>
                            <div class="stack mt-3">
                                <label class="flex items-center gap-2"><input type="radio" name="visit-lunch" value="Yes"> Yes</label>
                                <label class="flex items-center gap-2"><input type="radio" name="visit-lunch" value="No"> No</label>
                            </div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-sm font-medium text-slate-900">Do you need parking?</p>
                            <div class="stack mt-3">
                                <label class="flex items-center gap-2"><input type="radio" name="need-parking" value="Yes"> Yes</label>
                                <label class="flex items-center gap-2"><input type="radio" name="need-parking" value="No"> No</label>
                            </div>
                        </div>
                        <div class="task-box">Task: Navigate directly among the radio buttons rather than reading the whole form sequentially.</div>
                        <p class="question">As you move among Yes and No choices, can you reliably tell which question each choice answers?</p>
                        <p class="screen-reader-hint">NVDA: F to move among form controls</p>
                    </div>

                    <div class="reveal-panel" data-reveal-panel="example-3">
                        <span class="reveal-label">Reveal</span>
                        <p>The visible questions are present, but the radio groups are not programmatically associated with their question text. Each option still reads as a choice, but the relationship between “this set of choices” and “this question” is not preserved when users move directly from control to control.</p>
                        <p class="mt-3"><strong>Corrected pattern:</strong> each set is wrapped in a semantic group such as <span class="inline-code">&lt;fieldset&gt;</span> and <span class="inline-code">&lt;legend&gt;</span>, with the visual layout otherwise kept nearly identical.</p>
                    </div>
                </section>

                <section class="lab-card p-5 md:p-6" data-example="example-4">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="text-2xl font-semibold tracking-tight text-slate-900">Example 4: Is Required Actually Required?</h2>
                        <div class="flex items-center gap-2">
                            <button type="button" class="inspect-button" data-reveal="example-4">Inspect / Reveal</button>
                            <button type="button" class="reset-button" data-reset-example="example-4">Reset</button>
                        </div>
                    </div>

                    <div class="stack mt-5">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <div class="stack">
                                <div>
                                    <label for="full-name-field" class="block text-sm font-medium text-slate-900">Full name <span class="muted">*</span></label>
                                    <input id="full-name-field" class="lab-field mt-2" placeholder="Your full name">
                                </div>
                                <div>
                                    <label for="email-required-field" class="block text-sm font-medium text-slate-900">Email address <span class="muted">*</span></label>
                                    <input id="email-required-field" type="email" class="lab-field mt-2" placeholder="name@example.com" required>
                                </div>
                                <div>
                                    <label for="portfolio-url-field" class="block text-sm font-medium text-slate-900">Portfolio URL</label>
                                    <input id="portfolio-url-field" type="url" class="lab-field mt-2" placeholder="https://example.com">
                                </div>
                                <p class="lab-note">* Required</p>
                            </div>
                        </div>
                        <div class="task-box">Task: Navigate directly from field to field with the screen reader.</div>
                        <p class="question">The screen says two fields are required. Does the semantic interface agree?</p>
                        <ul class="list-disc pl-5 text-sm leading-7 text-slate-700">
                            <li>Which fields announce required state?</li>
                            <li>Is the asterisk itself enough?</li>
                            <li>What should the markup communicate?</li>
                        </ul>
                        <p class="screen-reader-hint">NVDA: Tab and Shift + Tab through forms</p>
                    </div>

                    <div class="reveal-panel" data-reveal-panel="example-4">
                        <span class="reveal-label">Reveal</span>
                        <p>The form visually marks two fields as required, but only one of them is actually required in the semantic interface. The visual asterisk communicates a convention; the browser and assistive technology need the actual required state to be exposed.</p>
                        <p class="mt-3"><strong>Teaching point:</strong> important state should not exist only visually. Prefer native <span class="inline-code">required</span> where it accurately represents the form behavior.</p>
                    </div>
                </section>

                <section class="lab-card p-5 md:p-6" data-example="example-5">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="text-2xl font-semibold tracking-tight text-slate-900">Example 5: What Does the Browser Know About This Field?</h2>
                        <div class="flex items-center gap-2">
                            <button type="button" class="inspect-button" data-reveal="example-5">Inspect / Reveal</button>
                            <button type="button" class="reset-button" data-reset-example="example-5">Reset</button>
                        </div>
                    </div>

                    <div class="stack mt-5">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <div class="stack">
                                <div>
                                    <label for="full-name-purpose" class="block text-sm font-medium text-slate-900">Full name</label>
                                    <input id="full-name-purpose" class="lab-field mt-2" placeholder="Jordan Lee">
                                </div>
                                <div>
                                    <label for="email-purpose" class="block text-sm font-medium text-slate-900">Email address</label>
                                    <input id="email-purpose" class="lab-field mt-2" placeholder="name@example.com">
                                </div>
                                <div>
                                    <label for="phone-purpose" class="block text-sm font-medium text-slate-900">Phone number</label>
                                    <input id="phone-purpose" class="lab-field mt-2" placeholder="(555) 123-4567">
                                </div>
                            </div>
                        </div>
                        <div class="task-box">Task: Inspect the fields. What does the markup tell the browser about the purpose of the information being requested?</div>
                        <p class="question">A field can have a good label and still omit useful information. What else can the browser know about its purpose?</p>
                        <p class="screen-reader-hint">Inspect the accessibility information in the browser</p>
                    </div>

                    <div class="reveal-panel" data-reveal-panel="example-5">
                        <span class="reveal-label">Reveal</span>
                        <p>The visible labels are fine, but the browser does not know whether the field expects a name, email, or phone number. Adding appropriate native semantics such as <span class="inline-code">type="email"</span>, <span class="inline-code">type="tel"</span>, and relevant autocomplete tokens like <span class="inline-code">autocomplete="name"</span> can support autofill, input behavior, and assistive technology. Good labels are necessary, but they are not the only signal the browser can use.</p>
                        <p class="mt-3"><strong>Brief connection:</strong> this relates to identifying input purpose and can support more helpful input behavior without depending on personal browser autofill data.</p>
                    </div>
                </section>
            </div>
        </main>

        <script>
            (() => {
                const revealButtons = document.querySelectorAll('[data-reveal]');
                const resetButtons = document.querySelectorAll('[data-reset-example]');
                const pageReset = document.querySelector('[data-reset-lab]');

                revealButtons.forEach((button) => {
                    button.addEventListener('click', () => {
                        const key = button.dataset.reveal;
                        const panel = document.querySelector('[data-reveal-panel="' + key + '"]');
                        if (panel) {
                            panel.classList.toggle('is-visible');
                        }
                    });
                });

                resetButtons.forEach((button) => {
                    button.addEventListener('click', () => {
                        const key = button.dataset.resetExample;
                        const panel = document.querySelector('[data-reveal-panel="' + key + '"]');
                        if (panel) {
                            panel.classList.remove('is-visible');
                        }
                        const formFields = document.querySelectorAll('[data-example="' + key + '"] input');
                        formFields.forEach((field) => {
                            if (field.type === 'radio') {
                                field.checked = false;
                            } else {
                                field.value = '';
                            }
                        });
                    });
                });

                if (pageReset) {
                    pageReset.addEventListener('click', () => {
                        document.querySelectorAll('.reveal-panel').forEach((panel) => panel.classList.remove('is-visible'));
                        document.querySelectorAll('input').forEach((field) => {
                            if (field.type === 'radio') {
                                field.checked = false;
                            } else {
                                field.value = '';
                            }
                        });
                    });
                }
            })();
        </script>
    </body>
</html>
