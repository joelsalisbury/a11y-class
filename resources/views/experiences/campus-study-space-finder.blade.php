<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Campus Study Space Finder</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            :root {
                color-scheme: light dark;
                --finder-bg: #f5f7f2;
                --finder-surface: #ffffff;
                --finder-ink: #1e2b25;
                --finder-muted: #a4ada6;
                --finder-line: #dce4dc;
                --finder-accent: #286b58;
            }

            @media (prefers-color-scheme: dark) {
                :root {
                    --finder-bg: #17201c;
                    --finder-surface: #202b25;
                    --finder-ink: #edf5ee;
                    --finder-muted: #aab8ad;
                    --finder-line: #435248;
                    --finder-accent: #9dd0ad;
                }
            }

            .finder-shell { max-width: 1180px; margin: 0 auto; padding: 0 1.25rem; }
            .finder-card { background: var(--finder-surface); border: 1px solid var(--finder-line); border-radius: 10px; }
            .finder-muted { color: var(--finder-muted); }
            .finder-status { display: inline-block; width: .7rem; height: .7rem; border-radius: 999px; }
            .finder-status-open { background: #8abf45; }
            .finder-status-limited { background: #d3a228; }
            .finder-status-full { background: #c85f63; }
            .finder-filter[aria-pressed="true"] { background: var(--finder-ink); color: var(--finder-surface); }
            .finder-room[aria-pressed="true"] { border-color: var(--finder-accent); box-shadow: 0 0 0 2px color-mix(in srgb, var(--finder-accent) 25%, transparent); }
            .finder-details { height: 4.7rem; overflow: hidden; }
            .finder-results { min-width: 720px; }
            .finder-focus:focus-visible { outline: 3px solid #e5b84a; outline-offset: 3px; }
        </style>
    </head>
    <body style="background: var(--finder-bg); color: var(--finder-ink);" class="antialiased">
        <header style="border-bottom: 1px solid var(--finder-line); background: var(--finder-surface);">
            <div class="finder-shell flex items-center justify-between gap-6 py-5">
                <div>
                    <p class="text-xs uppercase tracking-[0.16em] finder-muted">UConn Campus Life</p>
                    <p class="text-lg font-semibold">Campus Study Space Finder</p>
                </div>
                <a href="{{ route('modules.session', ['module' => 2, 'session' => 3]) }}" class="finder-focus text-sm font-medium" style="color: var(--finder-accent);">Back to course</a>
            </div>
        </header>

        <main class="finder-shell py-10 md:py-14">
            <div class="max-w-3xl space-y-3">
                <p class="text-sm font-medium" style="color: var(--finder-accent);">Find a place that fits your next block of work</p>
                <h1 class="text-4xl font-semibold tracking-tight md:text-5xl">Study spaces, at a glance.</h1>
                <p class="text-base leading-8 finder-muted">Compare available spaces by noise level, equipment, and distance from where you are starting.</p>
            </div>

            <section class="finder-card mt-8 p-5 md:p-6" aria-labelledby="finder-controls">
                <h2 id="finder-controls" class="text-xl font-semibold">What are you looking for?</h2>
                <div class="mt-4 flex flex-wrap gap-2" role="group" aria-label="Study space type">
                    <button type="button" class="finder-filter finder-focus rounded-full border px-4 py-2 text-sm" style="border-color: var(--finder-line);" aria-pressed="true" data-filter="all">All spaces</button>
                    <button type="button" class="finder-filter finder-focus rounded-full border px-4 py-2 text-sm" style="border-color: var(--finder-line);" aria-pressed="false" data-filter="quiet">Quiet</button>
                    <button type="button" class="finder-filter finder-focus rounded-full border px-4 py-2 text-sm" style="border-color: var(--finder-line);" aria-pressed="false" data-filter="group">Group work</button>
                    <button type="button" class="finder-filter finder-focus rounded-full border px-4 py-2 text-sm" style="border-color: var(--finder-line);" aria-pressed="false" data-filter="power">Power outlets</button>
                </div>
                <div class="mt-5 flex flex-wrap items-center gap-5 text-sm finder-muted">
                    <span class="inline-flex items-center gap-2"><span class="finder-status finder-status-open"></span>Available now</span>
                    <span class="inline-flex items-center gap-2"><span class="finder-status finder-status-limited"></span>Limited</span>
                    <span class="inline-flex items-center gap-2"><span class="finder-status finder-status-full"></span>Nearly full</span>
                </div>
            </section>

            <section class="mt-8 overflow-x-auto" aria-labelledby="results-heading">
                <div class="mb-4 flex items-end justify-between gap-4">
                    <div>
                        <h2 id="results-heading" class="text-2xl font-semibold">Recommended spaces</h2>
                        <p class="mt-1 text-sm finder-muted">Updated a few minutes ago</p>
                    </div>
                    <button type="button" class="finder-focus text-sm font-medium" style="color: var(--finder-accent);">Sort: closest first</button>
                </div>

                <div class="finder-results grid gap-5 md:grid-cols-3">
                    <button type="button" class="finder-room finder-focus finder-card text-left transition" aria-pressed="false" data-tags="quiet power">
                        <div class="p-5">
                            <div class="flex items-start justify-between gap-4">
                                <div><p class="text-xs uppercase tracking-[0.14em] finder-muted">Homer Babbidge Library</p><h3 class="mt-2 text-xl font-semibold">North Reading Room</h3></div>
                                <span class="finder-status finder-status-open" title="Available now"></span>
                            </div>
                            <div class="finder-details mt-4 space-y-2 text-sm finder-muted"><p>Quiet · Individual tables</p><p>Power at every table · 4 min walk</p><p>Open until 11:00 PM</p></div>
                            <div class="mt-5 flex items-center justify-between text-sm"><span class="finder-muted">12 seats open</span><span style="color: var(--finder-accent);">View space</span></div>
                        </div>
                    </button>

                    <button type="button" class="finder-room finder-focus finder-card text-left transition" aria-pressed="false" data-tags="group power">
                        <div class="p-5">
                            <div class="flex items-start justify-between gap-4">
                                <div><p class="text-xs uppercase tracking-[0.14em] finder-muted">Student Union</p><h3 class="mt-2 text-xl font-semibold">Innovation Lounge</h3></div>
                                <span class="finder-status finder-status-limited" title="Limited availability"></span>
                            </div>
                            <div class="finder-details mt-4 space-y-2 text-sm finder-muted"><p>Conversation welcome · Group tables</p><p>Power near the windows · 7 min walk</p><p>Open until 9:00 PM</p></div>
                            <div class="mt-5 flex items-center justify-between text-sm"><span class="finder-muted">3 tables open</span><span style="color: var(--finder-accent);">View space</span></div>
                        </div>
                    </button>

                    <button type="button" class="finder-room finder-focus finder-card text-left transition" aria-pressed="false" data-tags="quiet">
                        <div class="p-5">
                            <div class="flex items-start justify-between gap-4">
                                <div><p class="text-xs uppercase tracking-[0.14em] finder-muted">Oak Hall</p><h3 class="mt-2 text-xl font-semibold">Garden Level</h3></div>
                                <span class="finder-status finder-status-full" title="Nearly full"></span>
                            </div>
                            <div class="finder-details mt-4 space-y-2 text-sm finder-muted"><p>Quiet · Soft seating</p><p>Limited power · 11 min walk</p><p>Open until 8:00 PM</p></div>
                            <div class="mt-5 flex items-center justify-between text-sm"><span class="finder-muted">1 seat open</span><span style="color: var(--finder-accent);">View space</span></div>
                        </div>
                    </button>
                </div>
            </section>

            <section class="finder-card mt-8 p-5 md:p-6">
                <p class="text-xs uppercase tracking-[0.14em] finder-muted">Your shortlist</p>
                <div id="selection-message" class="mt-3 text-sm finder-muted">Choose a space to compare it with your needs.</div>
            </section>
        </main>

        <script>
            (() => {
                const filters = [...document.querySelectorAll('[data-filter]')];
                const rooms = [...document.querySelectorAll('.finder-room')];
                const message = document.getElementById('selection-message');

                filters.forEach((filter) => filter.addEventListener('click', () => {
                    filters.forEach((item) => item.setAttribute('aria-pressed', item === filter ? 'true' : 'false'));
                    const value = filter.dataset.filter;
                    rooms.forEach((room) => {
                        room.hidden = value !== 'all' && !room.dataset.tags.split(' ').includes(value);
                    });
                }));

                rooms.forEach((room) => room.addEventListener('click', () => {
                    rooms.forEach((item) => item.setAttribute('aria-pressed', item === room ? 'true' : 'false'));
                    message.textContent = `${room.querySelector('h3').textContent} added to your shortlist.`;
                }));
            })();
        </script>
    </body>
</html>