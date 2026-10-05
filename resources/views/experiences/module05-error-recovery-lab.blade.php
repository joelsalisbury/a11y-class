<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Error & Recovery Lab</title>

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
            .lab-field.is-error { border-color: #dc2626; background: #fff5f5; }
            .mini-note { font-size: 0.8rem; line-height: 1.5; color: #475569; }
            .error-box {
                display: none; border-radius: 10px; border: 1px solid #fecaca; background: #fff1f2; color: #7f1d1d; padding: 0.7rem 0.85rem; margin-top: 0.8rem; font-size: 0.9rem;
            }
            .error-box.visible { display: block; }
            .success-box {
                display: none; border-radius: 10px; border: 1px solid #bbf7d0; background: #f0fdf4; color: #166534; padding: 0.7rem 0.85rem; margin-top: 0.8rem; font-size: 0.9rem;
            }
            .success-box.visible { display: block; }
            .reset-button {
                border: 1px solid #d8e1ee; border-radius: 10px; background: #fff; color: #0f172a; padding: 0.6rem 0.9rem; font-weight: 600; cursor: pointer;
            }
            .example-grid { display: grid; gap: 1rem; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); }
            .question { font-size: 0.93rem; font-weight: 600; color: #0f172a; margin-top: 1rem; }
        </style>
    </head>
    <body class="font-sans antialiased">
        <header class="border-b border-slate-200 bg-white/90 backdrop-blur-sm">
            <div class="lab-shell flex flex-col gap-3 py-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.18em] text-slate-500">Module 05 · Session 11</p>
                    <h1 class="text-xl font-semibold text-slate-900">Error &amp; Recovery Lab</h1>
                </div>
                <div class="flex items-center gap-3">
                    <button type="button" class="reset-button" data-reset-lab>Reset all examples</button>
                    <a href="{{ route('modules.session', ['module' => 5, 'session' => 11]) }}" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:border-slate-300 hover:text-slate-900">
                        Back to Session 11
                    </a>
                </div>
            </div>
        </header>

        <main class="lab-shell py-8 md:py-10">
            <div class="mb-8 max-w-3xl space-y-3">
                <p class="text-xs uppercase tracking-[0.18em] text-slate-500">Teaching example</p>
                <p class="text-lg leading-8 text-slate-700">Make a mistake on purpose. What does the interface do next?</p>
            </div>

            <div class="space-y-8">
                <section class="lab-card p-5 md:p-6">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="text-2xl font-semibold tracking-tight text-slate-900">Example 1: Something Went Wrong</h2>
                        <button type="button" class="reset-button" data-reset-example="error-1">Reset example</button>
                    </div>

                    <div class="example-grid mt-5">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="mb-2 text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">Version A</p>
                            <form class="space-y-3 form-vague" novalidate>
                                <label for="email-vague" class="block text-sm font-medium text-slate-900">Email address</label>
                                <input id="email-vague" type="email" class="lab-field" placeholder="name@example.com">
                                <button type="submit" class="rounded-lg bg-slate-900 px-3 py-2 text-sm font-semibold text-white">Submit</button>
                                <div class="error-box">Please check the form.</div>
                            </form>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="mb-2 text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">Version B</p>
                            <form class="space-y-3 form-specific" novalidate>
                                <label for="email-specific" class="block text-sm font-medium text-slate-900">Email address</label>
                                <input id="email-specific" type="email" class="lab-field" placeholder="name@example.com">
                                <button type="submit" class="rounded-lg bg-slate-900 px-3 py-2 text-sm font-semibold text-white">Submit</button>
                                <div class="error-box">Email address is required.</div>
                            </form>
                        </div>
                    </div>

                    <p class="question">What exactly would you fix?</p>
                </section>

                <section class="lab-card p-5 md:p-6">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="text-2xl font-semibold tracking-tight text-slate-900">Example 2: One Mistake, Start Over</h2>
                        <button type="button" class="reset-button" data-reset-example="error-2">Reset example</button>
                    </div>

                    <div class="example-grid mt-5">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="mb-2 text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">Version A</p>
                            <form class="space-y-3 form-loses-work" novalidate>
                                <input type="text" class="lab-field" data-field="first-name" placeholder="First name">
                                <input type="email" class="lab-field" data-field="email" placeholder="Email address">
                                <input type="text" class="lab-field" data-field="course" placeholder="Course">
                                <button type="submit" class="rounded-lg bg-slate-900 px-3 py-2 text-sm font-semibold text-white">Continue</button>
                                <div class="error-box">Please check the form.</div>
                            </form>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="mb-2 text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">Version B</p>
                            <form class="space-y-3 form-preserves-work" novalidate>
                                <input type="text" class="lab-field" data-field="first-name" placeholder="First name">
                                <input type="email" class="lab-field" data-field="email" placeholder="Email address">
                                <input type="text" class="lab-field" data-field="course" placeholder="Course">
                                <button type="submit" class="rounded-lg bg-slate-900 px-3 py-2 text-sm font-semibold text-white">Continue</button>
                                <div class="error-box">Email address is required.</div>
                            </form>
                        </div>
                    </div>

                    <p class="question">How much work did one mistake cost you?</p>
                </section>

                <section class="lab-card p-5 md:p-6">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="text-2xl font-semibold tracking-tight text-slate-900">Example 3: Are You Sure?</h2>
                        <button type="button" class="reset-button" data-reset-example="error-3">Reset example</button>
                    </div>

                    <div class="example-grid mt-5">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="mb-2 text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">Version A</p>
                            <button type="button" class="rounded-lg bg-rose-600 px-3 py-2 text-sm font-semibold text-white action-immediate">Delete Saved Registration</button>
                            <div class="success-box">Saved registration deleted. This is a simulated action only.</div>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="mb-2 text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">Version B</p>
                            <button type="button" class="rounded-lg bg-rose-600 px-3 py-2 text-sm font-semibold text-white action-confirm">Delete Saved Registration</button>
                            <div class="success-box">Review before deleting. No data has been changed.</div>
                        </div>
                    </div>

                    <p class="question">What happens if you clicked the wrong thing?</p>
                </section>
            </div>
        </main>

        <script>
            (() => {
                const resetButtons = document.querySelectorAll('[data-reset-example]');
                const pageReset = document.querySelector('[data-reset-lab]');

                const resetForm = (form) => {
                    form.reset();
                    form.querySelectorAll('.error-box').forEach((box) => {
                        box.classList.remove('visible');
                        box.textContent = 'Please check the form.';
                    });
                    form.querySelectorAll('.lab-field').forEach((field) => {
                        field.classList.remove('is-error');
                    });
                };

                document.querySelectorAll('.form-vague').forEach((form) => {
                    form.addEventListener('submit', (event) => {
                        event.preventDefault();
                        const input = form.querySelector('input');
                        const message = form.querySelector('.error-box');
                        if (!input.value.trim()) {
                            input.classList.add('is-error');
                            message.classList.add('visible');
                        } else {
                            input.classList.remove('is-error');
                            message.classList.remove('visible');
                        }
                    });
                });

                document.querySelectorAll('.form-specific').forEach((form) => {
                    form.addEventListener('submit', (event) => {
                        event.preventDefault();
                        const input = form.querySelector('input');
                        const message = form.querySelector('.error-box');
                        if (!input.value.trim()) {
                            input.classList.add('is-error');
                            message.textContent = 'Email address is required.';
                            message.classList.add('visible');
                        } else {
                            input.classList.remove('is-error');
                            message.classList.remove('visible');
                        }
                    });
                });

                document.querySelectorAll('.form-loses-work').forEach((form) => {
                    form.addEventListener('submit', (event) => {
                        event.preventDefault();
                        const email = form.querySelector('[data-field="email"]');
                        const error = form.querySelector('.error-box');
                        form.querySelectorAll('.lab-field').forEach((field) => field.classList.remove('is-error'));
                        if (!email.value.trim()) {
                            form.querySelectorAll('.lab-field').forEach((field) => {
                                field.value = '';
                                field.classList.add('is-error');
                            });
                            error.textContent = 'Please check the form.';
                            error.classList.add('visible');
                        }
                    });
                });

                document.querySelectorAll('.form-preserves-work').forEach((form) => {
                    form.addEventListener('submit', (event) => {
                        event.preventDefault();
                        const email = form.querySelector('[data-field="email"]');
                        const error = form.querySelector('.error-box');
                        form.querySelectorAll('.lab-field').forEach((field) => field.classList.remove('is-error'));
                        if (!email.value.trim()) {
                            email.classList.add('is-error');
                            error.textContent = 'Email address is required.';
                            error.classList.add('visible');
                        } else {
                            error.classList.remove('visible');
                        }
                    });
                });

                document.querySelector('.action-immediate').addEventListener('click', () => {
                    const box = document.querySelector('.action-immediate').nextElementSibling;
                    box.classList.add('visible');
                });

                document.querySelector('.action-confirm').addEventListener('click', () => {
                    const box = document.querySelector('.action-confirm').nextElementSibling;
                    box.textContent = 'Review before deleting. No data has been changed.';
                    box.classList.add('visible');
                });

                resetButtons.forEach((button) => {
                    button.addEventListener('click', () => {
                        const example = button.dataset.resetExample;
                        if (example === 'error-1') {
                            document.querySelectorAll('.form-vague, .form-specific').forEach(resetForm);
                        }
                        if (example === 'error-2') {
                            document.querySelectorAll('.form-loses-work, .form-preserves-work').forEach(resetForm);
                        }
                        if (example === 'error-3') {
                            document.querySelectorAll('.success-box').forEach((box) => box.classList.remove('visible'));
                        }
                    });
                });

                pageReset.addEventListener('click', () => {
                    document.querySelectorAll('form').forEach(resetForm);
                    document.querySelectorAll('.success-box').forEach((box) => box.classList.remove('visible'));
                    document.querySelectorAll('.error-box').forEach((box) => box.classList.remove('visible'));
                });
            })();
        </script>
    </body>
</html>
