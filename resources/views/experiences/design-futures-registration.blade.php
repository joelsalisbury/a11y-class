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
                background: linear-gradient(180deg, #f7f9fc 0%, #ffffff 220px);
                color: #0f172a;
            }

            a {
                color: inherit;
            }

            .df-shell {
                max-width: 1180px;
                margin: 0 auto;
                padding: 0 1.2rem;
            }

            .df-card {
                border: 1px solid #dfe7ef;
                border-radius: 20px;
                background: #fff;
                box-shadow: 0 16px 40px rgba(15, 23, 42, 0.05);
            }

            .step-track {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 0.75rem;
            }

            .step-button {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                border: 1px solid #dbe4ee;
                border-radius: 14px;
                background: #f8fafc;
                padding: 0.9rem 1rem;
                font-size: 0.8rem;
                font-weight: 600;
                color: #475569;
                transition: all 0.2s ease;
            }

            .step-button.is-active {
                border-color: #2563eb;
                background: #eff6ff;
                color: #0f172a;
                box-shadow: inset 0 0 0 1px rgba(37, 99, 235, 0.15);
            }

            .step-number {
                display: inline-flex;
                width: 1.8rem;
                height: 1.8rem;
                align-items: center;
                justify-content: center;
                border-radius: 9999px;
                background: #e2e8f0;
                color: #0f172a;
                font-size: 0.8rem;
            }

            .step-button.is-active .step-number {
                background: #2563eb;
                color: #fff;
            }

            .step-panel {
                display: none;
            }

            .step-panel.is-active {
                display: block;
            }

            .workshop-card {
                border: 1px solid #dfe7ef;
                border-radius: 18px;
                background: #fff;
                padding: 1rem;
                cursor: pointer;
                transition: border-color 0.2s ease, box-shadow 0.2s ease;
                user-select: none;
            }

            .workshop-card.is-selected {
                border-color: #2563eb;
                box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.14);
                background: #f8fbff;
            }

            .workshop-card[data-seat="limited"] {
                background: #fffdf6;
            }

            .workshop-card[data-seat="few"] {
                background: #fff6f7;
            }

            .workshop-meta {
                color: #9ca3af;
            }

            .df-pill {
                display: inline-flex;
                width: 0.72rem;
                height: 0.72rem;
                border-radius: 9999px;
                margin-right: 0.4rem;
            }

            .df-map {
                position: relative;
                min-height: 210px;
                border-radius: 14px;
                overflow: hidden;
                border: 1px solid #dfe7ef;
                background:
                    linear-gradient(135deg, rgba(95, 165, 255, 0.16), rgba(118, 114, 255, 0.09)),
                    linear-gradient(90deg, rgba(15, 23, 42, 0.05) 1px, transparent 1px),
                    linear-gradient(rgba(15, 23, 42, 0.05) 1px, transparent 1px),
                    #f8fafc;
                background-size: auto, 30px 30px, 30px 30px, auto;
            }

            .df-map-pin {
                position: absolute;
                width: 12px;
                height: 12px;
                border-radius: 9999px;
                background: #2563eb;
                box-shadow: 0 0 0 6px rgba(37, 99, 235, 0.14);
            }

            .df-map-pin.one { top: 32%; left: 28%; }
            .df-map-pin.two { top: 52%; left: 62%; }
            .df-map-pin.three { top: 68%; left: 44%; }

            .single-field {
                width: 100%;
                border: 1px solid #d3dce7;
                border-radius: 12px;
                background: #fff;
                padding: 0.7rem 0.85rem;
                font-size: 0.95rem;
                color: #0f172a;
            }

            .single-field::placeholder {
                color: #64748b;
            }

            .field-block {
                display: grid;
                gap: 0.4rem;
            }

            .field-label {
                font-size: 0.9rem;
                font-weight: 600;
                color: #0f172a;
            }

            .field-caption {
                font-size: 0.75rem;
                color: #64748b;
            }

            .field-error {
                border-color: #dc2626;
                background: #fff7f7;
            }

            .error-box {
                display: none;
                border: 1px solid #fecaca;
                border-radius: 12px;
                background: #fff1f2;
                padding: 0.8rem 1rem;
                color: #7f1d1d;
                font-size: 0.9rem;
            }

            .error-box.visible {
                display: block;
            }

            .review-list {
                display: grid;
                gap: 0.8rem;
            }

            .review-item {
                padding: 0.8rem 1rem;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                background: #f8fafc;
            }

            .review-item dt {
                font-size: 0.75rem;
                letter-spacing: 0.08em;
                text-transform: uppercase;
                color: #64748b;
            }

            .review-item dd {
                margin: 0.35rem 0 0;
                color: #0f172a;
                font-weight: 600;
            }

            .df-hidden {
                display: none;
            }

            .visually-hidden {
                position: absolute;
                width: 1px;
                height: 1px;
                padding: 0;
                margin: -1px;
                overflow: hidden;
                clip: rect(0, 0, 0, 0);
                white-space: nowrap;
                border: 0;
            }

            @media (max-width: 768px) {
                .step-track {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <header class="border-b border-slate-200 bg-white/90 backdrop-blur-sm">
            <div class="df-shell flex flex-col gap-3 py-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.18em] text-slate-500">Design Futures 2026</p>
                    <p class="text-lg font-semibold text-slate-900">Student Showcase &amp; Interactive Media Symposium</p>
                </div>

                <div class="flex items-center gap-3 text-sm">
                    <button id="reset-experience" type="button" class="rounded-lg border border-slate-200 bg-white px-3 py-2 font-medium text-slate-700 transition hover:border-slate-300 hover:text-slate-900">
                        Reset experience
                    </button>
                    <a href="{{ route('modules.challenge', ['module' => 5]) }}" class="rounded-lg border border-slate-200 px-3 py-2 font-medium text-slate-700 transition hover:border-slate-300 hover:text-slate-900">
                        Return to Challenge 05
                    </a>
                </div>
            </div>
        </header>

        <main class="df-shell py-10 md:py-14">
            <div class="mx-auto max-w-5xl">
                <div class="mb-8 space-y-3">
                    <p class="text-xs uppercase tracking-[0.18em] text-slate-500">Registration experience</p>
                    <h1 class="text-4xl font-semibold tracking-tight text-slate-900 md:text-5xl">Design Futures 2026 Registration</h1>
                    <p class="max-w-3xl text-lg leading-8 text-slate-700">Complete the registration in four stages: explore the event, choose the workshop, register, and review before submitting.</p>
                </div>

                <div class="step-track mb-8" aria-label="Registration steps">
                    <button type="button" class="step-button is-active" data-step-button="1" aria-current="step">
                        <span class="step-number">1</span>
                        <span>Explore the Event</span>
                    </button>
                    <button type="button" class="step-button" data-step-button="2">
                        <span class="step-number">2</span>
                        <span>Choose a Workshop</span>
                    </button>
                    <button type="button" class="step-button" data-step-button="3">
                        <span class="step-number">3</span>
                        <span>Register</span>
                    </button>
                    <button type="button" class="step-button" data-step-button="4">
                        <span class="step-number">4</span>
                        <span>Review and Submit</span>
                    </button>
                </div>

                <div class="df-card p-5 md:p-7">
                    <section class="step-panel is-active" data-step-panel="1">
                        <div class="grid gap-6 lg:grid-cols-[1.1fr_0.9fr] lg:items-start">
                            <div class="space-y-5">
                                <div>
                                    <p class="text-xs uppercase tracking-[0.16em] text-slate-500">Step 1</p>
                                    <h2 class="mt-2 text-2xl font-semibold tracking-tight text-slate-900">Explore the Event</h2>
                                </div>

                                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                                    <p class="text-xs uppercase tracking-[0.16em] text-slate-500">Design Futures 2026</p>
                                    <h3 class="mt-3 text-3xl font-semibold text-slate-900">Student Showcase &amp; Interactive Media Symposium</h3>
                                    <dl class="mt-4 grid gap-3 text-sm text-slate-700 sm:grid-cols-2">
                                        <div>
                                            <dt class="font-semibold text-slate-900">Date</dt>
                                            <dd>Friday, October 9, 2026</dd>
                                        </div>
                                        <div>
                                            <dt class="font-semibold text-slate-900">Time</dt>
                                            <dd>9:30 AM – 4:15 PM</dd>
                                        </div>
                                        <div>
                                            <dt class="font-semibold text-slate-900">Venue</dt>
                                            <dd>North Studio Commons</dd>
                                        </div>
                                        <div>
                                            <dt class="font-semibold text-slate-900">Registration</dt>
                                            <dd>Deadline: October 7, 2026</dd>
                                        </div>
                                    </dl>
                                </div>

                                <p class="text-base leading-7 text-slate-700">Design Futures 2026 brings together students, faculty, and designers to explore how interactive media can shape cultural, civic, and everyday experiences. The event combines workshops, live demonstrations, research discussions, and a showcase of student work.</p>

                                <div class="rounded-xl border border-slate-200 bg-white p-4">
                                    <p class="text-xs uppercase tracking-[0.15em] text-slate-500">Accessibility information</p>
                                    <a href="#" class="mt-2 inline-flex text-sm font-medium text-sky-700 underline decoration-sky-400 underline-offset-4">Accessibility</a>
                                </div>

                                <div class="flex flex-wrap items-center justify-between gap-3">
                                    <p class="text-sm text-slate-600">Choose a workshop and continue with registration.</p>
                                    <button data-continue-button type="button" class="rounded-lg bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700 disabled:cursor-not-allowed disabled:bg-slate-300">
                                        Choose a Workshop
                                    </button>
                                </div>
                            </div>

                            <aside class="space-y-4">
                                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
                                    <img src="{{ asset('images/design-futures-poster.svg') }}" alt="Poster for the Design Futures 2026 conference" class="h-full w-full object-cover">
                                </div>

                                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                                    <p class="text-xs uppercase tracking-[0.14em] text-slate-500">Promotional video</p>
                                    <video controls class="mt-3 w-full rounded-xl border border-slate-200 bg-slate-900" preload="metadata" aria-label="Design Futures 2026 promotional video">
                                        <source src="https://interactive-examples.mdn.mozilla.net/media/cc0-videos/flower.mp4" type="video/mp4">
                                    </video>
                                    <div class="mt-3 rounded-xl border border-slate-200 bg-white p-3 text-sm leading-6 text-slate-700">
                                        <p class="font-semibold text-slate-900">Transcript</p>
                                        <p class="mt-2">Design Futures 2026 brings students, researchers, and designers together to explore how creative technology can shape more inclusive, expressive, and useful experiences. Sessions highlight research, interactive prototypes, and case studies from across the field.</p>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </section>

                    <section class="step-panel" data-step-panel="2">
                        <div class="space-y-4">
                            <div>
                                <p class="text-xs uppercase tracking-[0.16em] text-slate-500">Step 2</p>
                                <h2 class="mt-2 text-2xl font-semibold tracking-tight text-slate-900">Choose a Workshop</h2>
                            </div>

                            <div class="grid gap-4 md:grid-cols-2">
                                <article class="workshop-card" data-workshop="Immersive Narrative Lab" data-seat="open" tabindex="-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-semibold text-slate-900">Immersive Narrative Lab</h3>
                                        <span class="df-pill bg-emerald-500"></span>
                                    </div>
                                    <p class="mt-2 text-sm leading-6 text-slate-700">Story systems, branching structures, and interactive pacing.</p>
                                    <ul class="mt-3 space-y-1 text-xs text-slate-600">
                                        <li class="workshop-meta">Friday, 1:30 PM</li>
                                        <li class="workshop-meta">North Studio 204</li>
                                    </ul>
                                </article>

                                <article class="workshop-card" data-workshop="Physical Computing Studio" data-seat="limited" tabindex="-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-semibold text-slate-900">Physical Computing Studio</h3>
                                        <span class="df-pill bg-amber-500"></span>
                                    </div>
                                    <p class="mt-2 text-sm leading-6 text-slate-700">Sensor-driven installations and responsive environments.</p>
                                    <ul class="mt-3 space-y-1 text-xs text-slate-600">
                                        <li class="workshop-meta">Friday, 2:00 PM</li>
                                        <li class="workshop-meta">Fitzgerald Annex B</li>
                                    </ul>
                                </article>

                                <article class="workshop-card" data-workshop="Creative Technology Showcase" data-seat="few" tabindex="-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-semibold text-slate-900">Creative Technology Showcase</h3>
                                        <span class="df-pill bg-rose-500"></span>
                                    </div>
                                    <p class="mt-2 text-sm leading-6 text-slate-700">Live demos of interactive systems, prototypes, and installation work.</p>
                                    <ul class="mt-3 space-y-1 text-xs text-slate-600">
                                        <li class="workshop-meta">Friday, 3:15 PM</li>
                                        <li class="workshop-meta">Innovation Hall</li>
                                    </ul>
                                </article>

                                <article class="workshop-card" data-workshop="Inclusive Design Roundtable" data-seat="open" tabindex="-1">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-semibold text-slate-900">Inclusive Design Roundtable</h3>
                                        <span class="df-pill bg-emerald-500"></span>
                                    </div>
                                    <p class="mt-2 text-sm leading-6 text-slate-700">Discuss research, polish, and evaluation methods for real projects.</p>
                                    <ul class="mt-3 space-y-1 text-xs text-slate-600">
                                        <li class="workshop-meta">Friday, 4:00 PM</li>
                                        <li class="workshop-meta">North Studio 150</li>
                                    </ul>
                                </article>
                            </div>

                            <aside class="space-y-4">
                                <div class="df-map" aria-label="Venue map">
                                    <img src="{{ asset('images/design-futures-poster.svg') }}" alt="Venue map" class="h-full w-full object-cover">
                                    <span class="df-map-pin one" aria-hidden="true"></span>
                                    <span class="df-map-pin two" aria-hidden="true"></span>
                                    <span class="df-map-pin three" aria-hidden="true"></span>
                                </div>

                                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                                    <p class="text-xs uppercase tracking-[0.14em] text-slate-500">Event details</p>
                                    <dl class="mt-3 space-y-2 text-sm text-slate-700">
                                        <div>
                                            <dt class="font-semibold text-slate-900">Date</dt>
                                            <dd>Friday, October 9, 2026</dd>
                                        </div>
                                        <div>
                                            <dt class="font-semibold text-slate-900">Time</dt>
                                            <dd>9:30 AM – 4:15 PM</dd>
                                        </div>
                                        <div>
                                            <dt class="font-semibold text-slate-900">Venue</dt>
                                            <dd>North Studio Commons</dd>
                                        </div>
                                    </dl>
                                </div>
                            </aside>

                            <div class="mt-6 flex justify-end">
                                <button data-continue-button type="button" class="rounded-lg bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-slate-700 disabled:cursor-not-allowed disabled:bg-slate-300" disabled>
                                    Continue to Register
                                </button>
                            </div>
                        </div>
                    </section>

                    <section class="step-panel" data-step-panel="3">
                        <div class="space-y-4">
                            <div>
                                <p class="text-xs uppercase tracking-[0.16em] text-slate-500">Step 3</p>
                                <h2 class="mt-2 text-2xl font-semibold tracking-tight text-slate-900">Register</h2>
                            </div>

                            <div id="step-2-error" class="error-box" aria-live="polite"></div>

                            <form id="registration-form" novalidate>
                                <div class="grid gap-5 md:grid-cols-2">
                                    <div class="field-block md:col-span-2">
                                        <label for="full-name" class="field-label">Full name</label>
                                        <input id="full-name" name="full_name" class="single-field" type="text" placeholder="Your full name">
                                    </div>

                                    <div class="field-block md:col-span-2">
                                        <label class="field-label" style="display: none;">Email address</label>
                                        <input id="email" name="email" class="single-field" type="email" placeholder="Email address *">
                                    </div>

                                    <div class="field-block">
                                        <label for="program" class="field-label">Program or major</label>
                                        <input id="program" name="program" class="single-field" type="text" placeholder="e.g. DMD, Design, HCI">
                                    </div>

                                    <div class="field-block">
                                        <label for="phone" class="field-label">Phone number</label>
                                        <input id="phone" name="phone" class="single-field" type="tel" placeholder="(860) 555-1212">
                                    </div>

                                    <div class="field-block">
                                        <label for="class-year" class="field-label">Class year</label>
                                        <input id="class-year" name="class_year" class="single-field" type="text" placeholder="2027">
                                    </div>

                                    <div class="field-block">
                                        <label for="dietary" class="field-label">Dietary preference</label>
                                        <select id="dietary" name="dietary" class="single-field">
                                            <option value="">Select one</option>
                                            <option>No preference</option>
                                            <option>Vegetarian</option>
                                            <option>Vegan</option>
                                        </select>
                                    </div>

                                    <div class="field-block md:col-span-2">
                                        <span class="field-label">Need accommodations?</span>
                                        <div class="mt-2 flex flex-wrap gap-4 rounded-xl border border-slate-200 bg-slate-50 p-3 text-sm text-slate-700">
                                            <label class="inline-flex items-center gap-2">
                                                <input type="radio" name="accommodations" value="yes">
                                                Yes
                                            </label>
                                            <label class="inline-flex items-center gap-2">
                                                <input type="radio" name="accommodations" value="no">
                                                No
                                            </label>
                                        </div>
                                        <textarea id="accommodation-notes" name="accommodation_notes" class="single-field mt-3" rows="3" placeholder="If you need support, tell us what would help."></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="mt-6 flex items-center justify-between gap-4">
                            <button type="button" class="rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-medium text-slate-700 hover:border-slate-300" data-go-back="2">
                                Back
                            </button>
                            <button type="button" id="continue-to-review" class="rounded-lg bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-700">
                                Continue to Review
                            </button>
                        </div>
                    </section>

                    <section class="step-panel" data-step-panel="4">
                        <div class="space-y-5">
                            <div>
                                <p class="text-xs uppercase tracking-[0.16em] text-slate-500">Step 4</p>
                                <h2 class="mt-2 text-2xl font-semibold tracking-tight text-slate-900">Review and Submit</h2>
                            </div>

                            <div id="review-error" class="error-box" aria-live="polite"></div>

                            <dl class="review-list" id="review-summary">
                                <div class="review-item">
                                    <dt>Full name</dt>
                                    <dd id="review-name">—</dd>
                                </div>
                                <div class="review-item">
                                    <dt>Email</dt>
                                    <dd id="review-email">—</dd>
                                </div>
                                <div class="review-item">
                                    <dt>Program or major</dt>
                                    <dd id="review-program">—</dd>
                                </div>
                                <div class="review-item">
                                    <dt>Phone number</dt>
                                    <dd id="review-phone">—</dd>
                                </div>
                                <div class="review-item">
                                    <dt>Class year</dt>
                                    <dd id="review-year">—</dd>
                                </div>
                                <div class="review-item">
                                    <dt>Dietary preference</dt>
                                    <dd id="review-dietary">—</dd>
                                </div>
                            </dl>

                            <div id="confirmation" class="df-hidden rounded-lg border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-900">
                                Registration received. We have saved your workshop selection and contact information for the event team.
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-between gap-4">
                            <button type="button" class="rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-sm font-medium text-slate-700 hover:border-slate-300" data-go-back="3">
                                Back
                            </button>
                            <button type="button" id="submit-registration" class="rounded-lg bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white hover:bg-slate-700">
                                Complete Registration
                            </button>
                        </div>
                    </section>
                </div>
            </div>
        </main>

        <footer class="border-t border-slate-200 bg-slate-50/80">
            <div class="df-shell flex flex-col gap-3 py-5 md:flex-row md:items-center md:justify-between">
                <p class="text-sm text-slate-700">Accessibility</p>
                <a href="#" class="text-sm text-slate-700 underline decoration-slate-400 underline-offset-4">
                    Accessibility verified: WAVE found 0 errors. This site meets WCAG 2.1 AA and Section 508 requirements.
                </a>
            </div>
        </footer>

        <script>
            (() => {
                const state = {
                    step: 1,
                    workshop: '',
                };

                const stepButtons = Array.from(document.querySelectorAll('[data-step-button]'));
                const panels = Array.from(document.querySelectorAll('[data-step-panel]'));
                const workshopCards = Array.from(document.querySelectorAll('.workshop-card'));
                const continueButtons = Array.from(document.querySelectorAll('[data-continue-button]'));
                const form = document.getElementById('registration-form');
                const reviewError = document.getElementById('review-error');
                const step2Error = document.getElementById('step-2-error');
                const confirmation = document.getElementById('confirmation');
                const resetButton = document.getElementById('reset-experience');

                function showStep(stepNumber) {
                    state.step = stepNumber;

                    stepButtons.forEach((button) => {
                        const isActive = Number(button.dataset.stepButton) === stepNumber;
                        button.classList.toggle('is-active', isActive);
                        button.setAttribute('aria-current', isActive ? 'step' : 'false');
                    });

                    panels.forEach((panel) => {
                        panel.classList.toggle('is-active', Number(panel.dataset.stepPanel) === stepNumber);
                    });
                }

                function clearFormErrors() {
                    form.querySelectorAll('.field-error').forEach((field) => field.classList.remove('field-error'));
                    step2Error.classList.remove('visible');
                    step2Error.textContent = '';
                    reviewError.classList.remove('visible');
                    reviewError.textContent = '';
                }

                function syncReview() {
                    const fullName = document.getElementById('full-name').value.trim();
                    const email = document.getElementById('email').value.trim();
                    const program = document.getElementById('program').value.trim();
                    const phone = document.getElementById('phone').value.trim();
                    const classYear = document.getElementById('class-year').value.trim();
                    const dietary = document.getElementById('dietary').value.trim();

                    document.getElementById('review-name').textContent = fullName || '—';
                    document.getElementById('review-email').textContent = email || '—';
                    document.getElementById('review-program').textContent = program || '—';
                    document.getElementById('review-phone').textContent = phone || '—';
                    document.getElementById('review-year').textContent = classYear || '—';
                    document.getElementById('review-dietary').textContent = dietary || '—';
                }

                workshopCards.forEach((card) => {
                    card.addEventListener('click', () => {
                        workshopCards.forEach((other) => other.classList.remove('is-selected'));
                        card.classList.add('is-selected');
                        state.workshop = card.dataset.workshop || '';
                        continueButtons.forEach((button) => {
                            button.disabled = !state.workshop;
                        });
                    });
                });

                continueButtons.forEach((button) => {
                    button.addEventListener('click', () => {
                        if (state.step === 1) {
                            showStep(2);
                            return;
                        }

                        if (state.step === 2) {
                            if (!state.workshop) {
                                return;
                            }

                            showStep(3);
                        }
                    });
                });

                document.getElementById('continue-to-review').addEventListener('click', () => {
                    clearFormErrors();

                    const fullName = document.getElementById('full-name');
                    const email = document.getElementById('email');
                    const program = document.getElementById('program');
                    const phone = document.getElementById('phone');
                    const errors = [];

                    [fullName, email, program, phone].forEach((field) => field.classList.remove('field-error'));

                    if (!fullName.value.trim()) {
                        fullName.classList.add('field-error');
                    }

                    if (!email.value.trim()) {
                        email.classList.add('field-error');
                    }

                    if (!program.value.trim()) {
                        program.classList.add('field-error');
                        errors.push('Please check the highlighted fields.');
                    }

                    if (!phone.value.trim()) {
                        phone.classList.add('field-error');
                    }

                    const validPhonePattern = /^\(\d{3}\) \d{3}-\d{4}$/;
                    if (phone.value.trim() && !validPhonePattern.test(phone.value.trim())) {
                        phone.classList.add('field-error');
                        errors.push('Enter the phone number in the format (860) 555-1212.');
                    }

                    if (errors.length > 0) {
                        state.workshop = '';
                        workshopCards.forEach((card) => card.classList.remove('is-selected'));
                        continueButtons.forEach((button) => {
                            button.disabled = true;
                        });
                        step2Error.textContent = errors.join(' ');
                        step2Error.classList.add('visible');
                        return;
                    }

                    syncReview();
                    showStep(4);
                });

                document.getElementById('submit-registration').addEventListener('click', () => {
                    reviewError.classList.remove('visible');
                    reviewError.textContent = '';

                    const email = document.getElementById('email').value.trim();
                    const fullName = document.getElementById('full-name').value.trim();
                    const program = document.getElementById('program').value.trim();

                    if (!state.workshop || !email || !fullName || !program || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                        reviewError.textContent = 'A few details still need attention before we can finalize the registration.';
                        reviewError.classList.add('visible');
                        showStep(3);
                        return;
                    }

                    confirmation.classList.remove('df-hidden');
                    document.getElementById('submit-registration').textContent = 'Registration submitted';
                    document.getElementById('submit-registration').disabled = true;
                });

                document.querySelectorAll('[data-go-back]').forEach((button) => {
                    button.addEventListener('click', () => {
                        const target = Number(button.dataset.goBack);
                        showStep(target);
                    });
                });

                resetButton.addEventListener('click', () => {
                    form.reset();
                    workshopCards.forEach((card) => card.classList.remove('is-selected'));
                    state.workshop = '';
                    continueButtons.forEach((button) => {
                        button.disabled = true;
                    });
                    confirmation.classList.add('df-hidden');
                    document.getElementById('submit-registration').disabled = false;
                    document.getElementById('submit-registration').textContent = 'Complete Registration';
                    clearFormErrors();
                    syncReview();
                    showStep(1);
                });

                syncReview();
            })();
        </script>
    </body>
</html>
