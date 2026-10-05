<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Workshop Registration Demo</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                color-scheme: light;
            }

            body {
                margin: 0;
                font-family: 'Instrument Sans', sans-serif;
                background: #f8fafc;
                color: #0f172a;
            }

            .demo-shell {
                max-width: 860px;
                margin: 0 auto;
                padding: 2rem 1.25rem 4rem;
            }

            .panel {
                border: 1px solid #dfe7ef;
                border-radius: 18px;
                background: white;
                padding: 1.5rem;
                box-shadow: 0 12px 28px rgba(15, 23, 42, 0.04);
            }

            h1, h2, h3, p {
                margin: 0;
            }

            h1 {
                font-size: clamp(2rem, 3vw, 2.4rem);
                line-height: 1.2;
            }

            .field,
            .radio-group,
            .textarea-field {
                display: grid;
                gap: 0.5rem;
            }

            .field,
            .textarea-field {
                margin-top: 1rem;
            }

            .field-group {
                display: grid;
                gap: 1rem;
            }

            label,
            legend {
                font-weight: 600;
                color: #0f172a;
            }

            .instruction {
                font-size: 0.9rem;
                color: #475569;
            }

            input,
            textarea,
            select,
            button {
                font: inherit;
            }

            input,
            textarea,
            select {
                width: 100%;
                border: 1px solid #cbd5e1;
                border-radius: 10px;
                padding: 0.8rem 0.9rem;
                color: #0f172a;
                background: #fff;
                box-sizing: border-box;
            }

            input:focus,
            textarea:focus,
            select:focus,
            button:focus {
                outline: 2px solid #2563eb;
                outline-offset: 2px;
            }

            textarea {
                min-height: 110px;
                resize: vertical;
            }

            .field-error {
                border-color: #b91c1c;
                background: #fff7f7;
            }

            .error-summary {
                display: none;
                margin-top: 1rem;
                border: 1px solid #fecaca;
                border-radius: 12px;
                background: #fff1f2;
                color: #7f1d1d;
                padding: 1rem 1.1rem;
            }

            .error-summary.visible {
                display: block;
            }

            .error-summary h2 {
                font-size: 1.25rem;
                margin-bottom: 0.5rem;
            }

            .error-summary ul {
                margin: 0.6rem 0 0;
                padding-left: 1.2rem;
            }

            .error-summary a {
                color: inherit;
                font-weight: 600;
            }

            .inline-error {
                display: none;
                margin-top: 0.4rem;
                font-size: 0.88rem;
                color: #b91c1c;
                font-weight: 600;
            }

            .inline-error.visible {
                display: block;
            }

            .radio-group {
                display: grid;
                gap: 0.7rem;
                padding: 0.85rem;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                background: #f8fafc;
            }

            .radio-option {
                display: flex;
                align-items: center;
                gap: 0.7rem;
                font-weight: 500;
                width: fit-content;
                max-width: 100%;
            }

            .radio-option input {
                width: auto;
                margin: 0;
            }

            .button-row {
                display: flex;
                flex-wrap: wrap;
                gap: 0.8rem;
                margin-top: 1.5rem;
            }

            button {
                border: 1px solid #dfe7ef;
                border-radius: 10px;
                padding: 0.8rem 1.1rem;
                font-weight: 700;
                cursor: pointer;
            }

            .primary-button {
                background: #0f172a;
                color: white;
                border-color: #0f172a;
            }

            .secondary-button {
                background: white;
                color: #0f172a;
            }

            .success-state {
                display: none;
                margin-top: 1.25rem;
                border: 1px solid #bbf7d0;
                border-radius: 12px;
                background: #ecfdf5;
                color: #166534;
                padding: 1rem 1.1rem;
            }

            .success-state.visible {
                display: block;
            }

            .section {
                margin-top: 2rem;
                padding-top: 1.5rem;
                border-top: 1px solid #e2e8f0;
            }

            .question-list {
                margin: 0.9rem 0 0;
                padding-left: 1.2rem;
            }

            .question-list li + li {
                margin-top: 0.5rem;
            }

            details {
                border: 1px solid #dfe7ef;
                border-radius: 12px;
                background: #fff;
                padding: 0.8rem 1rem;
            }

            details + details {
                margin-top: 0.8rem;
            }

            summary {
                cursor: pointer;
                font-weight: 600;
            }

            pre {
                margin: 0.8rem 0 0;
                overflow-x: auto;
                border-radius: 12px;
                background: #f8fafc;
                border: 1px solid #e2e8f0;
                padding: 0.8rem;
                line-height: 1.5;
            }

            code {
                font-family: 'SFMono-Regular', Consolas, monospace;
                font-size: 0.9rem;
            }

            .link-row {
                margin-top: 1rem;
            }

            a {
                color: #0f172a;
            }
        </style>
    </head>
    <body>
        <main class="demo-shell">
            <section class="panel" aria-labelledby="registration-title">
                <h1 id="registration-title">Workshop Registration</h1>

                <div id="error-summary" class="error-summary" role="alert" aria-live="polite">
                    <h2>Check your registration</h2>
                    <p>We found <span id="error-count">0</span> things to fix:</p>
                    <ul id="error-summary-list"></ul>
                </div>

                <form id="workshop-registration" novalidate>
                    <div class="field-group">
                        <div class="field">
                            <label for="full-name">Full name (required)</label>
                            <input id="full-name" name="full_name" type="text" autocomplete="name" aria-describedby="full-name-error" required>
                            <div id="full-name-error" class="inline-error" aria-live="polite">Enter your full name.</div>
                        </div>

                        <div class="field">
                            <label for="email">Email address (required)</label>
                            <input id="email" name="email" type="email" inputmode="email" autocomplete="email" aria-describedby="email-error" required>
                            <div id="email-error" class="inline-error" aria-live="polite">Enter a valid email address.</div>
                        </div>

                        <div class="field">
                            <label for="phone">Phone number</label>
                            <input id="phone" name="phone" type="tel" inputmode="numeric" autocomplete="tel" aria-describedby="phone-error" placeholder="860-555-1212">
                            <div class="instruction">Example: 860-555-1212</div>
                            <div id="phone-error" class="inline-error" aria-live="polite">Enter a 10-digit phone number.</div>
                        </div>

                        <fieldset class="field" id="workshop-choice-group" aria-describedby="workshop-error">
                            <legend>Workshop choice (required)</legend>
                            <div class="radio-group" role="radiogroup" aria-labelledby="workshop-choice-group">
                                <label class="radio-option">
                                    <input type="radio" name="workshop" value="Accessible Interfaces">
                                    <span>Accessible Interfaces</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="workshop" value="Interactive Storytelling">
                                    <span>Interactive Storytelling</span>
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="workshop" value="Physical Computing">
                                    <span>Physical Computing</span>
                                </label>
                            </div>
                            <div id="workshop-error" class="inline-error" aria-live="polite">Choose a workshop.</div>
                        </fieldset>

                        <div class="textarea-field">
                            <label for="needs">Accessibility or dietary needs</label>
                            <textarea id="needs" name="needs" aria-describedby="needs-help"></textarea>
                            <div id="needs-help" class="instruction">Share anything you would like the event team to know.</div>
                        </div>
                    </div>

                    <div class="button-row">
                        <button type="submit" class="primary-button">Register</button>
                        <button type="button" class="secondary-button" id="reset-form">Reset form</button>
                    </div>
                </form>

                <div id="success-state" class="success-state" role="status" aria-live="polite">
                    <h2>Registration complete</h2>
                    <p class="link-row">You’re registered for <strong id="selected-workshop">your workshop</strong>.</p>
                    <div class="button-row">
                        <button type="button" class="secondary-button" id="start-over">Start over</button>
                    </div>
                </div>
            </section>

            <section class="section" aria-labelledby="what-to-notice-title">
                <h2 id="what-to-notice-title">What to Notice</h2>
                <ol class="question-list">
                    <li>Before submitting, what does the form tell you about each field?</li>
                    <li>Which information is required?</li>
                    <li>Which controls belong together?</li>
                    <li>After an error, can you tell exactly what needs to change?</li>
                    <li>What valid work did the form preserve?</li>
                    <li>How easy is it to correct the problem and continue?</li>
                </ol>
            </section>

            <section class="section" aria-labelledby="under-the-hood-title">
                <h2 id="under-the-hood-title">Under the Hood</h2>

                <details>
                    <summary>Label and input</summary>
                    <pre><code>&lt;label for="full-name"&gt;Full name (required)&lt;/label&gt;
&lt;input id="full-name" name="full_name" required&gt;</code></pre>
                    <p class="link-row">The label identifies the control, while the native required attribute communicates required state.</p>
                </details>

                <details>
                    <summary>Related controls</summary>
                    <pre><code>&lt;fieldset&gt;
    &lt;legend&gt;Workshop choice (required)&lt;/legend&gt;
    ...
&lt;/fieldset&gt;</code></pre>
                    <p class="link-row">The legend supplies context for the related radio buttons.</p>
                </details>

                <details>
                    <summary>Instructions and errors</summary>
                    <pre><code>&lt;input aria-describedby="phone-error" aria-invalid="true"&gt;
&lt;div id="phone-error"&gt;Enter a 10-digit phone number.&lt;/div&gt;</code></pre>
                    <p class="link-row">Helpful relationships exist in the interface when the user needs both context and a clear recovery path.</p>
                </details>
            </section>

            <section class="section" aria-labelledby="challenge-transition-title">
                <h2 id="challenge-transition-title">Next step</h2>
                <p>You’ve now seen how structure, controls, and forms communicate before and after an interaction. Next, use those same questions to begin your individual accessibility review.</p>
                <div class="link-row">
                    <a href="{{ route('modules.challenge', ['module' => 5]) }}" class="inline-flex items-center rounded-md border border-slate-300 bg-slate-100 px-3 py-1.5 text-sm font-medium text-slate-900 hover:border-slate-400 hover:bg-slate-200 hover:text-slate-950 focus-visible:focus-ring">Open Challenge 05</a>
                </div>
            </section>
        </main>

        <script>
            (() => {
                const form = document.getElementById('workshop-registration');
                const errorSummary = document.getElementById('error-summary');
                const errorList = document.getElementById('error-summary-list');
                const errorCount = document.getElementById('error-count');
                const successState = document.getElementById('success-state');
                const selectedWorkshop = document.getElementById('selected-workshop');
                const resetFormButton = document.getElementById('reset-form');
                const startOverButton = document.getElementById('start-over');

                const fieldMap = {
                    'full-name': {
                        input: document.getElementById('full-name'),
                        error: document.getElementById('full-name-error'),
                        message: 'Enter your full name.',
                    },
                    email: {
                        input: document.getElementById('email'),
                        error: document.getElementById('email-error'),
                        message: 'Enter a valid email address.',
                    },
                    phone: {
                        input: document.getElementById('phone'),
                        error: document.getElementById('phone-error'),
                        message: 'Enter a 10-digit phone number.',
                    },
                    workshop: {
                        input: null,
                        error: document.getElementById('workshop-error'),
                        message: 'Choose a workshop.',
                    },
                };

                function clearError(fieldName) {
                    const config = fieldMap[fieldName];
                    if (!config) return;

                    if (config.input) {
                        config.input.classList.remove('field-error');
                        config.input.setAttribute('aria-invalid', 'false');
                    }

                    if (config.error) {
                        config.error.classList.remove('visible');
                    }
                }

                function setError(fieldName, message) {
                    const config = fieldMap[fieldName];
                    if (!config) return;

                    if (config.input) {
                        config.input.classList.add('field-error');
                        config.input.setAttribute('aria-invalid', 'true');
                    }

                    if (config.error) {
                        config.error.textContent = message || config.message;
                        config.error.classList.add('visible');
                    }
                }

                function clearAllErrors() {
                    Object.keys(fieldMap).forEach((fieldName) => clearError(fieldName));
                    errorSummary.classList.remove('visible');
                    errorList.innerHTML = '';
                    errorCount.textContent = '0';
                }

                function normalizePhone(value) {
                    const digits = (value || '').replace(/\D+/g, '');
                    return digits;
                }

                function validateForm() {
                    clearAllErrors();

                    const fullName = document.getElementById('full-name').value.trim();
                    const email = document.getElementById('email').value.trim();
                    const phone = document.getElementById('phone').value.trim();
                    const chosenWorkshop = form.querySelector('input[name="workshop"]:checked');
                    const errors = [];

                    if (!fullName) {
                        setError('full-name', 'Enter your full name.');
                        errors.push({ label: 'Enter your full name.', href: '#full-name' });
                    }

                    if (!email) {
                        setError('email', 'Enter a valid email address.');
                        errors.push({ label: 'Enter a valid email address.', href: '#email' });
                    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                        setError('email', 'Enter a valid email address.');
                        errors.push({ label: 'Enter a valid email address.', href: '#email' });
                    }

                    if (phone) {
                        const digits = normalizePhone(phone);
                        if (digits.length !== 10) {
                            setError('phone', 'Enter a 10-digit phone number.');
                            errors.push({ label: 'Enter a 10-digit phone number.', href: '#phone' });
                        }
                    }

                    if (!chosenWorkshop) {
                        setError('workshop', 'Choose a workshop.');
                        errors.push({ label: 'Choose a workshop.', href: '#workshop-choice-group' });
                    }

                    if (errors.length > 0) {
                        errorSummary.classList.add('visible');
                        errorCount.textContent = String(errors.length);
                        errorList.innerHTML = errors.map((error) => `<li><a href="${error.href}">${error.label}</a></li>`).join('');
                        return false;
                    }

                    return true;
                }

                function resetFormState() {
                    form.reset();
                    clearAllErrors();
                    successState.classList.remove('visible');
                    form.style.display = 'block';
                }

                form.addEventListener('submit', (event) => {
                    event.preventDefault();

                    const isValid = validateForm();
                    if (!isValid) {
                        return;
                    }

                    const workshop = form.querySelector('input[name="workshop"]:checked').value;
                    selectedWorkshop.textContent = workshop;
                    successState.classList.add('visible');
                    form.style.display = 'none';
                });

                resetFormButton.addEventListener('click', () => {
                    resetFormState();
                });

                startOverButton.addEventListener('click', () => {
                    resetFormState();
                });
            })();
        </script>
    </body>
</html>
