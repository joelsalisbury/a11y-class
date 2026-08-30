<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Design Futures 2026 Registration</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                color-scheme: light;
            }

            body {
                background: linear-gradient(180deg, #f4f7fb 0%, #ffffff 220px);
                color: #0f172a;
            }

            .df-shell {
                margin: 0 auto;
                max-width: 1080px;
                padding: 0 1.25rem;
            }

            .df-card {
                border: 1px solid #d8e2ef;
                border-radius: 14px;
                background: #ffffff;
                box-shadow: 0 10px 20px rgba(15, 23, 42, 0.04);
            }

            .df-muted {
                color: #a7b1c2;
            }

            .df-pill {
                height: 0.7rem;
                width: 0.7rem;
                border-radius: 9999px;
                display: inline-block;
            }

            .df-program.is-selected {
                border-color: #2563eb;
                box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.18);
            }

            .df-back-link:focus-visible,
            .df-action:focus-visible,
            .df-submit:focus-visible {
                outline: none;
                box-shadow: none;
            }

            .df-field-error {
                border-color: #dc2626;
                background: #fff8f8;
            }

            .df-hidden {
                display: none;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <header class="border-b border-slate-200 bg-white/90">
            <div class="df-shell flex items-center justify-between py-5">
                <div>
                    <p class="text-xs uppercase tracking-[0.16em] text-slate-500">Design Futures 2026</p>
                    <p class="text-lg font-semibold text-slate-900">Student Showcase &amp; Interactive Media Symposium</p>
                </div>

                <a href="{{ route('modules.session', ['module' => 1, 'session' => 1]) }}" class="df-back-link text-sm font-medium text-slate-600 hover:text-slate-900">
                    Back to course
                </a>
            </div>
        </header>

        <main class="df-shell py-10 md:py-14">
            <section class="grid gap-8 lg:grid-cols-12">
                <div class="space-y-6 lg:col-span-7">
                    <div class="space-y-4">
                        <h1 class="text-4xl font-semibold tracking-tight text-slate-900 md:text-5xl">Design Futures 2026</h1>
                        <p class="text-lg text-slate-700">Student Showcase &amp; Interactive Media Symposium</p>
                        <p class="max-w-2xl text-base leading-8 text-slate-700">
                            Join student designers, media producers, and faculty guests for a day of portfolio showcases,
                            prototype demos, and hands-on talks about creative technology.
                        </p>
                    </div>

                    <div class="grid gap-4 md:grid-cols-3">
                        <article class="df-card p-4">
                            <p class="text-xs uppercase tracking-[0.14em] text-slate-500">Date</p>
                            <p class="mt-2 text-sm font-medium text-slate-900">Friday, Oct 9, 2026</p>
                        </article>
                        <article class="df-card p-4">
                            <p class="text-xs uppercase tracking-[0.14em] text-slate-500">Time</p>
                            <p class="mt-2 text-sm font-medium text-slate-900">9:30 AM - 4:15 PM</p>
                        </article>
                        <article class="df-card p-4">
                            <p class="text-xs uppercase tracking-[0.14em] text-slate-500">Venue</p>
                            <p class="mt-2 text-sm font-medium text-slate-900">North Studio Commons</p>
                        </article>
                    </div>

                    <div class="df-card overflow-hidden">
                        <img src="{{ asset('images/design-futures-poster.svg') }}" alt="Event poster" class="h-auto w-full">
                    </div>

                    <div class="df-card p-5 md:p-6">
                        <p class="text-xs uppercase tracking-[0.14em] text-slate-500">Program highlights</p>
                        <p class="mt-3 text-sm leading-7 text-slate-700">Choose one track for your primary afternoon sessions:</p>

                        <div class="mt-3 flex items-center gap-4 text-xs df-muted">
                            <p class="inline-flex items-center gap-2"><span class="df-pill bg-emerald-500"></span>Good availability</p>
                            <p class="inline-flex items-center gap-2"><span class="df-pill bg-amber-500"></span>Limited</p>
                            <p class="inline-flex items-center gap-2"><span class="df-pill bg-rose-500"></span>Nearly full</p>
                        </div>

                        <div id="program-options" class="mt-4 grid gap-4 md:grid-cols-3">
                            <div class="df-program cursor-pointer rounded-xl border border-slate-200 p-4 transition hover:border-slate-400" data-track="Immersive Narrative Lab">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-semibold text-slate-900">Immersive Narrative Lab</p>
                                    <span class="df-pill bg-emerald-500"></span>
                                </div>
                                <p class="mt-2 text-sm leading-6 text-slate-700">Story systems, branching structures, and interactive pacing.</p>
                                <p class="mt-2 text-xs"><a href="#" class="df-action text-blue-700 hover:text-blue-900">Learn more</a></p>
                            </div>

                            <div class="df-program cursor-pointer rounded-xl border border-slate-200 p-4 transition hover:border-slate-400" data-track="Physical Computing Studio">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-semibold text-slate-900">Physical Computing Studio</p>
                                    <span class="df-pill bg-amber-500"></span>
                                </div>
                                <p class="mt-2 text-sm leading-6 text-slate-700">Sensor-driven installations and responsive environments.</p>
                                <p class="mt-2 text-xs"><a href="#" class="df-action text-blue-700 hover:text-blue-900">Learn more</a></p>
                            </div>

                            <div class="df-program cursor-pointer rounded-xl border border-slate-200 p-4 transition hover:border-slate-400" data-track="Creative Technology Showcase">
                                <div class="flex items-center justify-between">
                                    <p class="text-sm font-semibold text-slate-900">Creative Technology Showcase</p>
                                    <span class="df-pill bg-rose-500"></span>
                                </div>
                                <p class="mt-2 text-sm leading-6 text-slate-700">Live demos of interactive media prototypes and installation concepts.</p>
                                <p class="mt-2 text-xs"><a href="#" class="df-action text-blue-700 hover:text-blue-900">Learn more</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="df-card p-5 md:p-6">
                        <h3 class="text-xl font-semibold text-slate-900">Session details</h3>
                        <p class="mt-3 text-sm leading-7 text-slate-700">Morning block includes keynote, gallery walk, and project lightning talks.</p>
                        <p class="mt-1 text-sm leading-7 df-muted">Doors open at 9:00 AM. Portfolio review requests close at 11:20 AM.</p>
                        <div class="mt-4 space-y-2 text-sm text-slate-700">
                            <p>Keynote speaker and opening remarks <a href="#" class="df-action text-blue-700 hover:text-blue-900">Learn more</a></p>
                            <p>Exhibitor map and project showcase schedule <a href="#" class="df-action text-blue-700 hover:text-blue-900">Learn more</a></p>
                            <p>Portfolio review sign-up details <a href="#" class="df-action text-blue-700 hover:text-blue-900">Learn more</a></p>
                        </div>
                    </div>
                </div>

                <aside class="lg:col-span-5">
                    <section class="df-card p-5 md:p-6">
                        <h3 class="text-2xl font-semibold tracking-tight text-slate-900">Register</h3>
                        <p class="mt-2 text-sm text-slate-700">Reserve your spot for Design Futures 2026.</p>
                        <p class="mt-1 text-xs df-muted">Fields marked with * are required.</p>

                        <div id="form-errors" class="df-hidden mt-4 rounded-lg border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-800"></div>

                        <form id="registration-form" class="mt-5 space-y-3" novalidate>
                            <input id="selected-track" name="track" type="hidden">

                            <div>
                                <input name="name" type="text" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm text-slate-900" placeholder="Full name *">
                            </div>

                            <div>
                                <input name="email" type="email" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm text-slate-900" placeholder="Email address *">
                            </div>

                            <div>
                                <input name="major" type="text" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm text-slate-900" placeholder="Major or program *">
                            </div>

                            <div>
                                <input name="portfolio" type="url" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm text-slate-900" placeholder="Portfolio URL (optional)">
                            </div>

                            <div class="rounded-lg border border-slate-200 p-3">
                                <p class="text-sm font-medium text-slate-900">Need accommodations?</p>
                                <div class="mt-2 flex gap-4 text-sm text-slate-700">
                                    <label class="inline-flex items-center gap-2">
                                        <input name="accommodation" type="radio" value="yes">
                                        Yes
                                    </label>
                                    <label class="inline-flex items-center gap-2">
                                        <input name="accommodation" type="radio" value="no">
                                        No
                                    </label>
                                </div>
                                <textarea name="accommodation_notes" class="mt-3 w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm text-slate-900" rows="3" placeholder="If yes, tell us what would support your participation"></textarea>
                            </div>

                            <button type="submit" class="df-submit mt-2 inline-flex w-full items-center justify-center rounded-lg bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-700">
                                Complete registration
                            </button>
                        </form>

                        <div id="confirmation" class="df-hidden mt-5 rounded-lg border border-emerald-300 bg-emerald-50 px-4 py-3 text-sm text-emerald-900">
                            Registration confirmed. We sent a confirmation message to your email with your track details.
                        </div>
                    </section>
                </aside>
            </section>
        </main>

        <script>
            (() => {
                const trackInput = document.getElementById('selected-track');
                const cards = Array.from(document.querySelectorAll('.df-program'));
                const form = document.getElementById('registration-form');
                const errorBox = document.getElementById('form-errors');
                const confirmation = document.getElementById('confirmation');

                cards.forEach((card) => {
                    card.addEventListener('click', () => {
                        cards.forEach((other) => other.classList.remove('is-selected'));
                        card.classList.add('is-selected');
                        trackInput.value = card.dataset.track || '';
                    });
                });

                form.addEventListener('submit', (event) => {
                    event.preventDefault();

                    const name = form.elements.namedItem('name');
                    const email = form.elements.namedItem('email');
                    const major = form.elements.namedItem('major');
                    const errors = [];

                    [name, email, major].forEach((field) => {
                        field.classList.remove('df-field-error');
                    });

                    if (!name.value.trim()) {
                        errors.push('Add your full name.');
                        name.classList.add('df-field-error');
                    }

                    if (!email.value.trim() || !email.value.includes('@')) {
                        errors.push('Use a valid email address.');
                        email.classList.add('df-field-error');
                    }

                    if (!major.value.trim()) {
                        errors.push('Add your major or program.');
                        major.classList.add('df-field-error');
                    }

                    if (!trackInput.value) {
                        errors.push('Choose one program track.');
                    }

                    if (errors.length > 0) {
                        errorBox.classList.remove('df-hidden');
                        errorBox.innerHTML = '<p class="font-semibold">Please check your registration details.</p><p class="mt-1">' + errors.join(' ') + '</p>';
                        confirmation.classList.add('df-hidden');
                        return;
                    }

                    errorBox.classList.add('df-hidden');
                    confirmation.classList.remove('df-hidden');
                });
            })();
        </script>
    </body>
</html>
