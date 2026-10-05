<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Screen Reader Lab</title>

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
            .tabbed { display: grid; gap: 1rem; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); }
            .mini-note { font-size: 0.8rem; line-height: 1.5; color: #475569; }
            .key-tag {
                display: inline-flex; align-items: center; gap: 0.35rem;
                border-radius: 9999px; background: #e0f2fe; color: #0f172a;
                border: 1px solid #bae6fd; font-size: 0.72rem; font-weight: 700;
                letter-spacing: 0.08em; text-transform: uppercase; padding: 0.3rem 0.55rem;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <header class="border-b border-slate-200 bg-white/90 backdrop-blur-sm">
            <div class="lab-shell flex flex-col gap-3 py-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.18em] text-slate-500">Module 05 · Session 10</p>
                    <h1 class="text-xl font-semibold text-slate-900">Screen Reader Lab</h1>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('modules.session', ['module' => 5, 'session' => 10]) }}" class="rounded-lg border border-slate-200 bg-white px-3 py-2 text-sm font-medium text-slate-700 hover:border-slate-300 hover:text-slate-900">
                        Back to Session 10
                    </a>
                </div>
            </div>
        </header>

        <main class="lab-shell py-8 md:py-10">
            <div class="mb-8 max-w-3xl space-y-3">
                <p class="text-xs uppercase tracking-[0.18em] text-slate-500">Hands-on practice</p>
                <p class="text-lg leading-8 text-slate-700">Use the screen reader and try the page in the way the instructions say. The goal is to listen to the interface, not to memorize a giant command list.</p>
            </div>

            <div class="space-y-8">
                <section class="lab-card p-5 md:p-6" aria-labelledby="headings-heading">
                    <h2 id="headings-heading" class="text-2xl font-semibold tracking-tight text-slate-900">Headings</h2>
                    <p class="mt-3 text-slate-700">Navigate by headings rather than reading from the top.</p>
                    <div class="tabbed mt-5">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">NVDA</p>
                            <div class="mt-3 flex flex-wrap gap-2">
                                <span class="key-tag">H</span>
                                <span class="key-tag">Shift + H</span>
                            </div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">VoiceOver</p>
                            <div class="mt-3 flex flex-wrap gap-2">
                                <span class="key-tag">VO + Command + H</span>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-slate-700">Could you understand the organization of this page from its headings alone?</p>
                </section>

                <section class="lab-card p-5 md:p-6" aria-labelledby="landmarks-heading">
                    <h2 id="landmarks-heading" class="text-2xl font-semibold tracking-tight text-slate-900">Landmarks</h2>
                    <p class="mt-3 text-slate-700">Move through major regions of the page without visually scanning everything.</p>
                    <div class="tabbed mt-5">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">NVDA</p>
                            <div class="mt-3 flex flex-wrap gap-2">
                                <span class="key-tag">D</span>
                                <span class="key-tag">Shift + D</span>
                            </div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">VoiceOver</p>
                            <p class="mt-3 text-sm text-slate-700">Use the Rotor or the structural navigation supported by the WebAIM guide for landmarks and regions.</p>
                        </div>
                    </div>
                    <p class="mt-4 text-slate-700">Can you locate the major regions of the page without visually scanning it?</p>
                </section>

                <section class="lab-card p-5 md:p-6" aria-labelledby="controls-heading">
                    <h2 id="controls-heading" class="text-2xl font-semibold tracking-tight text-slate-900">Controls</h2>
                    <p class="mt-3 text-slate-700">Find the control without pointing at it with the mouse.</p>
                    <div class="tabbed mt-5">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">NVDA</p>
                            <div class="mt-3 flex flex-wrap gap-2">
                                <span class="key-tag">Tab</span>
                                <span class="key-tag">F</span>
                                <span class="key-tag">B</span>
                            </div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">VoiceOver</p>
                            <div class="mt-3 flex flex-wrap gap-2">
                                <span class="key-tag">Tab</span>
                                <span class="key-tag">VO + Command + J</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 space-y-3 rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <p class="font-medium text-slate-900">Try these questions:</p>
                        <ul class="list-disc space-y-1 pl-5 text-slate-700">
                            <li>What is this control called?</li>
                            <li>What kind of control is it?</li>
                            <li>Does its announced state match what you see?</li>
                        </ul>
                    </div>
                </section>

                <section class="lab-card p-5 md:p-6" aria-labelledby="forms-heading">
                    <h2 id="forms-heading" class="text-2xl font-semibold tracking-tight text-slate-900">Forms</h2>
                    <p class="mt-3 text-slate-700">Navigate to the field without using the mouse and listen before typing.</p>
                    <div class="mt-5 rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <form class="space-y-3">
                            <label for="screen-reader-name" class="block text-sm font-medium text-slate-900">Full name</label>
                            <input id="screen-reader-name" type="text" class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-slate-900" placeholder="Your name">

                            <label for="screen-reader-email" class="block text-sm font-medium text-slate-900">Email address</label>
                            <input id="screen-reader-email" type="email" class="w-full rounded-xl border border-slate-300 bg-white px-3 py-2 text-slate-900" placeholder="name@example.com">

                            <fieldset class="space-y-2">
                                <legend class="text-sm font-medium text-slate-900">Choose a role</legend>
                                <label class="flex items-center gap-2"><input type="radio" name="role" value="student"> Student</label>
                                <label class="flex items-center gap-2"><input type="radio" name="role" value="instructor"> Instructor</label>
                            </fieldset>
                        </form>
                    </div>
                    <p class="mt-4 text-slate-700">Identify the label/name, the control type, the required state when relevant, the value or state when relevant, and the surrounding instructions. Could you understand what this field expects without looking at it?</p>
                </section>

                <section class="lab-card p-5 md:p-6" aria-labelledby="images-heading">
                    <h2 id="images-heading" class="text-2xl font-semibold tracking-tight text-slate-900">Images</h2>
                    <p class="mt-3 text-slate-700">Listen to the image description and decide whether it preserves the purpose of the image.</p>
                    <div class="tabbed mt-5">
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">NVDA</p>
                            <div class="mt-3 flex flex-wrap gap-2">
                                <span class="key-tag">G</span>
                                <span class="key-tag">Shift + G</span>
                            </div>
                        </div>
                        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">
                            <p class="text-sm font-semibold uppercase tracking-[0.15em] text-slate-500">VoiceOver</p>
                            <div class="mt-3 flex flex-wrap gap-2">
                                <span class="key-tag">VO + Command + G</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 flex items-center gap-4 rounded-2xl border border-slate-200 bg-slate-50 p-4">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=400&q=80" alt="Laptop on a desk next to a notebook and mug in a bright classroom" width="180" height="120" class="rounded-xl border border-slate-300">
                        <p class="text-slate-700">Does what you hear preserve the purpose of the image?</p>
                    </div>
                </section>
            </div>
        </main>
    </body>
</html>
