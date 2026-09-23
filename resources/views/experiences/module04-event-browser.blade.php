<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Find an Event</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            :root { color-scheme: light; }
            body { background: #f5f1fa; color: #29213d; }
            .eb-shell { max-width: 1100px; margin: 0 auto; padding: 0 1.25rem; }
            .eb-panel { background: #ffffff; border: 1px solid #ded4ef; border-radius: 14px; box-shadow: 0 16px 30px rgba(56, 37, 96, .08); }
            .eb-muted { color: #756a87; }
            .eb-viewport { overflow: hidden; }
            .eb-track { display: flex; gap: 1rem; width: max-content; transition: transform .25s ease; }
            .eb-card { width: min(78vw, 25rem); border: 1px solid #ded4ef; border-radius: 12px; background: #fcfbff; }
            .eb-detail { opacity: 0; max-height: 0; overflow: hidden; transition: opacity .2s ease, max-height .2s ease; }
            .eb-card:hover .eb-detail { opacity: 1; max-height: 8rem; }
            .eb-small-control { width: 1.65rem; height: 1.65rem; padding: 0; border: 1px solid #c9b9e5; border-radius: 4px; color: #59417d; }
            .eb-dots button { width: .55rem; height: .55rem; padding: 0; border-radius: 999px; background: #c9b9e5; }
            .eb-dots button[aria-current="true"] { background: #6c45a1; }
        </style>
    </head>
    <body class="antialiased">
        <header class="border-b border-violet-100 bg-white">
            <div class="eb-shell flex items-center justify-between gap-6 py-5">
                <div>
                    <p class="text-xs uppercase tracking-[0.16em] eb-muted">UConn events</p>
                    <p class="text-lg font-semibold">Find an Event</p>
                </div>
                <nav class="flex items-center gap-4 text-sm font-medium">
                    <a href="{{ route('experiences.module04.lab') }}" class="text-violet-800 hover:text-violet-950 focus-visible:focus-ring rounded-sm">Back to Interaction Lab</a>
                    <a href="{{ route('modules.show', ['module' => 4]) }}" class="eb-muted hover:text-violet-950 focus-visible:focus-ring rounded-sm">Course site</a>
                </nav>
            </div>
        </header>

        <main class="eb-shell py-10 md:py-14">
            <div class="max-w-3xl space-y-4">
                <p class="text-sm font-semibold uppercase tracking-[0.14em] text-violet-700">What's happening on campus</p>
                <h1 class="text-4xl font-semibold tracking-tight md:text-5xl">Find something worth attending.</h1>
                <p class="text-base leading-8 eb-muted">Browse upcoming talks, workshops, and gatherings across the university.</p>
                <p class="eb-panel px-4 py-3 text-sm font-semibold">Find the Accessibility Workshop and determine where and when it is happening.</p>
            </div>

            <section class="eb-panel mt-8 p-5 md:p-7" aria-labelledby="events-heading">
                <div class="flex items-end justify-between gap-4">
                    <div>
                        <h2 id="events-heading" class="text-2xl font-semibold">Featured events</h2>
                        <p class="mt-1 text-sm eb-muted">Swipe through the latest listings.</p>
                    </div>
                    <div class="flex gap-1">
                        <button type="button" id="previous-event" class="eb-small-control" aria-label="Previous event">‹</button>
                        <button type="button" id="next-event" class="eb-small-control" aria-label="Next event">›</button>
                    </div>
                </div>

                <div id="event-viewport" class="eb-viewport mt-6" aria-live="polite">
                    <div id="event-track" class="eb-track">
                        <article class="eb-card p-5" data-event="Student Film Night">
                            <p class="text-xs uppercase tracking-[0.14em] eb-muted">Friday, October 2</p>
                            <h3 class="mt-2 text-xl font-semibold">Student Film Night</h3>
                            <p class="mt-3 text-sm leading-6 eb-muted">A screening and conversation with student filmmakers.</p>
                            <div class="eb-detail mt-4 text-sm leading-6"><p><strong>Where:</strong> Student Union Theater</p><p><strong>When:</strong> 7:00 PM</p></div>
                        </article>

                        <article class="eb-card p-5" data-event="Accessibility Workshop">
                            <p class="text-xs uppercase tracking-[0.14em] eb-muted">Tuesday, October 6</p>
                            <h3 class="mt-2 text-xl font-semibold">Accessibility Workshop</h3>
                            <p class="mt-3 text-sm leading-6 eb-muted">A practical session on inclusive digital design.</p>
                            <div class="eb-detail mt-4 text-sm leading-6"><p><strong>Where:</strong> Homer Babbidge Library, Room 209</p><p><strong>When:</strong> 3:30 PM</p></div>
                        </article>

                        <article class="eb-card p-5" data-event="Design Futures Talk">
                            <p class="text-xs uppercase tracking-[0.14em] eb-muted">Thursday, October 8</p>
                            <h3 class="mt-2 text-xl font-semibold">Design Futures Talk</h3>
                            <p class="mt-3 text-sm leading-6 eb-muted">Researchers discuss emerging tools for creative practice.</p>
                            <div class="eb-detail mt-4 text-sm leading-6"><p><strong>Where:</strong> Art Building Auditorium</p><p><strong>When:</strong> 5:00 PM</p></div>
                        </article>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-between gap-4">
                    <p id="event-position" class="text-sm eb-muted">Event 1 of 3</p>
                    <div class="eb-dots flex items-center gap-2" aria-label="Event pages">
                        <button type="button" aria-label="Show event 1" aria-current="true" data-page="0"></button>
                        <button type="button" aria-label="Show event 2" aria-current="false" data-page="1"></button>
                        <button type="button" aria-label="Show event 3" aria-current="false" data-page="2"></button>
                    </div>
                </div>
            </section>
        </main>

        <script>
            (() => {
                const viewport = document.getElementById('event-viewport');
                const track = document.getElementById('event-track');
                const cards = [...track.querySelectorAll('.eb-card')];
                const position = document.getElementById('event-position');
                const dots = [...document.querySelectorAll('[data-page]')];
                let page = 0;
                let startX = null;

                const showPage = (nextPage) => {
                    page = Math.max(0, Math.min(cards.length - 1, nextPage));
                    const offset = cards[page].offsetLeft;
                    track.style.transform = `translateX(-${offset}px)`;
                    position.textContent = `Event ${page + 1} of ${cards.length}`;
                    dots.forEach((dot) => dot.setAttribute('aria-current', dot.dataset.page === String(page) ? 'true' : 'false'));
                };

                document.getElementById('previous-event').addEventListener('click', () => showPage(page - 1));
                document.getElementById('next-event').addEventListener('click', () => showPage(page + 1));
                dots.forEach((dot) => dot.addEventListener('click', () => showPage(Number(dot.dataset.page))));
                viewport.addEventListener('pointerdown', (event) => { startX = event.clientX; viewport.setPointerCapture(event.pointerId); });
                viewport.addEventListener('pointerup', (event) => {
                    if (startX === null) return;
                    const distance = event.clientX - startX;
                    if (Math.abs(distance) > 35) showPage(page + (distance < 0 ? 1 : -1));
                    startX = null;
                });
            })();
        </script>
    </body>
</html>
