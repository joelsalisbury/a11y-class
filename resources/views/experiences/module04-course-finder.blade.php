<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Course Finder</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            :root { color-scheme: light; }
            body { background: #eef4f3; color: #14343a; }
            .cf-shell { max-width: 1120px; margin: 0 auto; padding: 0 1.25rem; }
            .cf-panel { background: #ffffff; border: 1px solid #cbdedb; border-radius: 14px; box-shadow: 0 16px 30px rgba(20, 52, 58, .07); }
            .cf-muted { color: #657c7c; }
            .cf-control { border: 1px solid #b9cfcc; border-radius: 8px; padding: .65rem .8rem; font-size: .875rem; }
            .cf-control:focus { outline: none; }
            .cf-filter-active { background: #14343a; color: #ffffff; border-color: #14343a; }
            .cf-card { border: 1px solid #cbdedb; border-radius: 12px; background: #fbfdfc; }
            .cf-card:nth-child(1) { order: 3; }
            .cf-card:nth-child(2) { order: 1; }
            .cf-card:nth-child(3) { order: 4; }
            .cf-card:nth-child(4) { order: 2; }
            .cf-shortlisted { border-color: #168c83; box-shadow: 0 0 0 3px rgba(22, 140, 131, .14); }
            .cf-focusless:focus-visible { outline: none; box-shadow: none; }
            .cf-hidden { display: none; }
        </style>
    </head>
    <body class="antialiased">
        <header class="border-b border-teal-100 bg-white">
            <div class="cf-shell flex items-center justify-between gap-6 py-5">
                <div>
                    <p class="text-xs uppercase tracking-[0.16em] cf-muted">UConn Course Finder</p>
                    <p class="text-lg font-semibold">Find a course for next semester</p>
                </div>
                <nav class="flex items-center gap-4 text-sm font-medium">
                    <a href="{{ route('experiences.module04.lab') }}" class="text-teal-800 hover:text-teal-950 focus-visible:focus-ring rounded-sm">Back to Interaction Lab</a>
                    <a href="{{ route('modules.show', ['module' => 4]) }}" class="cf-muted hover:text-teal-950 focus-visible:focus-ring rounded-sm">Course site</a>
                </nav>
            </div>
        </header>

        <main class="cf-shell py-10 md:py-14">
            <div class="max-w-3xl space-y-4">
                <p class="text-sm font-semibold uppercase tracking-[0.14em] text-teal-700">Fall 2026 registration preview</p>
                <h1 class="text-4xl font-semibold tracking-tight md:text-5xl">Find a course that fits.</h1>
                <p class="text-base leading-8 cf-muted">Browse the catalog, compare meeting patterns, and keep a shortlist for later.</p>
                <p class="cf-panel px-4 py-3 text-sm font-semibold">Find a course that meets on Tuesday and add it to your shortlist.</p>
            </div>

            <section class="cf-panel mt-8 p-5 md:p-6" aria-labelledby="course-filters">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <h2 id="course-filters" class="text-xl font-semibold">Search courses</h2>
                        <p class="mt-1 text-sm cf-muted">Filter by the day you need.</p>
                    </div>
                    <label class="text-sm font-medium">Search <input id="course-search" class="cf-control ml-2 w-44" type="search" placeholder="Course or topic"></label>
                </div>
                <div class="mt-5 flex flex-wrap gap-2" role="group" aria-label="Meeting day">
                    <button type="button" class="cf-control cf-filter-active focus-visible:focus-ring" data-day="all" aria-pressed="true">All days</button>
                    <button type="button" class="cf-control focus-visible:focus-ring" data-day="monday" aria-pressed="false">Monday</button>
                    <div class="cf-control cursor-pointer" data-day="tuesday" aria-pressed="false">Tuesday</div>
                    <button type="button" class="cf-control focus-visible:focus-ring" data-day="wednesday" aria-pressed="false">Wednesday</button>
                </div>
            </section>

            <section class="mt-8" aria-labelledby="course-results">
                <div class="mb-4 flex items-end justify-between gap-4">
                    <div>
                        <h2 id="course-results" class="text-2xl font-semibold">Course results</h2>
                        <p class="mt-1 text-sm cf-muted">Showing four courses</p>
                    </div>
                    <span id="result-count" class="text-sm cf-muted">4 courses</span>
                </div>

                <div id="course-cards" class="grid gap-4 md:grid-cols-2">
                    <article class="cf-card p-5" data-day="tuesday" data-search="design systems interaction">
                        <p class="text-xs uppercase tracking-[0.14em] cf-muted">DMD 3410 · 3 credits</p>
                        <h3 class="mt-2 text-xl font-semibold">Interaction Design Systems</h3>
                        <p class="mt-2 text-sm leading-6 cf-muted">Tuesday · 10:00 AM · Art Building 228</p>
                        <p class="mt-4 text-sm leading-6">Study how components, patterns, and systems shape interactive products.</p>
                        <div tabindex="0" role="button" class="cf-control cf-focusless mt-5 w-full text-teal-900" data-shortlist="Interaction Design Systems">Add to shortlist</div>
                    </article>

                    <article class="cf-card p-5" data-day="monday" data-search="creative coding programming">
                        <p class="text-xs uppercase tracking-[0.14em] cf-muted">DMD 2300 · 3 credits</p>
                        <h3 class="mt-2 text-xl font-semibold">Creative Coding Studio</h3>
                        <p class="mt-2 text-sm leading-6 cf-muted">Monday · 1:00 PM · Art Building 214</p>
                        <p class="mt-4 text-sm leading-6">Build small interactive experiments with code, sound, and visual systems.</p>
                        <button type="button" class="cf-control cf-focusless mt-5 w-full text-teal-900" data-shortlist="Creative Coding Studio">Add to shortlist</button>
                    </article>

                    <article class="cf-card p-5" data-day="wednesday" data-search="media history culture">
                        <p class="text-xs uppercase tracking-[0.14em] cf-muted">DMD 2101 · 3 credits</p>
                        <h3 class="mt-2 text-xl font-semibold">Media Histories</h3>
                        <p class="mt-2 text-sm leading-6 cf-muted">Wednesday · 3:00 PM · Oak Hall 112</p>
                        <p class="mt-4 text-sm leading-6">Trace the tools, platforms, and cultural forces behind digital media.</p>
                        <button type="button" class="cf-control cf-focusless mt-5 w-full text-teal-900" data-shortlist="Media Histories">Add to shortlist</button>
                    </article>

                    <article class="cf-card p-5" data-day="tuesday" data-search="typography visual communication">
                        <p class="text-xs uppercase tracking-[0.14em] cf-muted">DMD 3125 · 3 credits</p>
                        <h3 class="mt-2 text-xl font-semibold">Typography for Screens</h3>
                        <p class="mt-2 text-sm leading-6 cf-muted">Tuesday · 2:30 PM · Art Building 105</p>
                        <p class="mt-4 text-sm leading-6">Explore type, hierarchy, rhythm, and readable communication on screens.</p>
                        <button type="button" class="cf-control cf-focusless mt-5 w-full text-teal-900" data-shortlist="Typography for Screens">Add to shortlist</button>
                    </article>
                </div>
            </section>

            <section class="cf-panel mt-8 p-5 md:p-6" aria-labelledby="shortlist-heading">
                <p class="text-xs uppercase tracking-[0.14em] cf-muted">Your shortlist</p>
                <h2 id="shortlist-heading" class="mt-2 text-xl font-semibold">Courses to revisit</h2>
                <p id="shortlist-message" class="mt-3 text-sm cf-muted">No courses added yet.</p>
            </section>
        </main>

        <script>
            (() => {
                const filters = [...document.querySelectorAll('[data-day]')];
                const cards = [...document.querySelectorAll('#course-cards article')];
                const search = document.getElementById('course-search');
                const resultCount = document.getElementById('result-count');
                const shortlistMessage = document.getElementById('shortlist-message');
                const shortlist = [];
                let selectedDay = 'all';

                const updateResults = () => {
                    const query = search.value.trim().toLowerCase();
                    let visible = 0;
                    cards.forEach((card) => {
                        const matchesDay = selectedDay === 'all' || card.dataset.day === selectedDay;
                        const matchesSearch = !query || card.dataset.search.includes(query);
                        card.hidden = !(matchesDay && matchesSearch);
                        if (!card.hidden) visible += 1;
                    });
                    resultCount.textContent = `${visible} ${visible === 1 ? 'course' : 'courses'}`;
                };

                filters.forEach((filter) => filter.addEventListener('click', () => {
                    selectedDay = filter.dataset.day;
                    filters.forEach((item) => {
                        item.setAttribute('aria-pressed', item === filter ? 'true' : 'false');
                        item.classList.toggle('cf-filter-active', item === filter);
                    });
                    updateResults();
                }));

                search.addEventListener('input', updateResults);
                document.querySelectorAll('[data-shortlist]').forEach((button) => button.addEventListener('click', () => {
                    const course = button.dataset.shortlist;
                    if (!shortlist.includes(course)) shortlist.push(course);
                    button.closest('article').classList.add('cf-shortlisted');
                    shortlistMessage.textContent = `${shortlist.join(', ')} added to your shortlist.`;
                }));
            })();
        </script>
    </body>
</html>
