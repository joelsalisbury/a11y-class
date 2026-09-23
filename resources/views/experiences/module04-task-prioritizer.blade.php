<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Prioritize Your Tasks</title>
        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            :root { color-scheme: light; }
            body { background: #fbf6ea; color: #3c2b17; }
            .tp-shell { max-width: 920px; margin: 0 auto; padding: 0 1.25rem; }
            .tp-panel { background: #fffdf8; border: 1px solid #ead9b8; border-radius: 14px; box-shadow: 0 16px 30px rgba(91, 62, 18, .08); }
            .tp-muted { color: #806f58; }
            .tp-list { display: flex; flex-direction: column; gap: .55rem; }
            .tp-item { display: flex; align-items: center; gap: .7rem; min-height: 4.2rem; border: 1px solid #e3cda4; border-radius: 10px; background: #ffffff; padding: .75rem; transition: transform .15s ease, box-shadow .15s ease; }
            .tp-item.is-dragging { opacity: .55; box-shadow: 0 12px 24px rgba(91, 62, 18, .14); }
            .tp-handle { display: grid; place-items: center; width: 1.45rem; height: 1.45rem; color: #9a7b43; font-size: .85rem; letter-spacing: .15em; cursor: grab; }
            .tp-rank { display: grid; place-items: center; width: 1.65rem; height: 1.65rem; border-radius: 999px; background: #f2e5ca; color: #795a2b; font-size: .8rem; font-weight: 700; }
        </style>
    </head>
    <body class="antialiased">
        <header class="border-b border-amber-100 bg-white">
            <div class="tp-shell flex items-center justify-between gap-6 py-5">
                <div>
                    <p class="text-xs uppercase tracking-[0.16em] tp-muted">Weekly planning board</p>
                    <p class="text-lg font-semibold">Prioritize Your Tasks</p>
                </div>
                <nav class="flex items-center gap-4 text-sm font-medium">
                    <a href="{{ route('experiences.module04.lab') }}" class="text-amber-800 hover:text-amber-950 focus-visible:focus-ring rounded-sm">Back to Interaction Lab</a>
                    <a href="{{ route('modules.show', ['module' => 4]) }}" class="tp-muted hover:text-amber-950 focus-visible:focus-ring rounded-sm">Course site</a>
                </nav>
            </div>
        </header>

        <main class="tp-shell py-10 md:py-14">
            <div class="max-w-3xl space-y-4">
                <p class="text-sm font-semibold uppercase tracking-[0.14em] text-amber-700">This week</p>
                <h1 class="text-4xl font-semibold tracking-tight md:text-5xl">Make room for what matters.</h1>
                <p class="text-base leading-8 tp-muted">Move the tasks into the order you want to tackle them.</p>
                <p class="tp-panel px-4 py-3 text-sm font-semibold">Put the five tasks in priority order from highest to lowest.</p>
            </div>

            <section class="tp-panel mt-8 p-5 md:p-7" aria-labelledby="priority-heading">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <h2 id="priority-heading" class="text-2xl font-semibold">Your priority list</h2>
                        <p class="mt-1 text-sm tp-muted">Highest priority belongs at the top.</p>
                    </div>
                    <span id="priority-status" class="text-sm tp-muted">Five tasks</span>
                </div>

                <ol id="priority-list" class="tp-list mt-6" aria-label="Tasks to prioritize">
                    <li class="tp-item" draggable="true" data-task="Prepare project brief">
                        <span class="tp-handle" aria-hidden="true">::</span><span class="tp-rank">1</span><span class="text-sm font-medium">Prepare project brief</span>
                    </li>
                    <li class="tp-item" draggable="true" data-task="Schedule team check-in">
                        <span class="tp-handle" aria-hidden="true">::</span><span class="tp-rank">2</span><span class="text-sm font-medium">Schedule team check-in</span>
                    </li>
                    <li class="tp-item" draggable="true" data-task="Review accessibility notes">
                        <span class="tp-handle" aria-hidden="true">::</span><span class="tp-rank">3</span><span class="text-sm font-medium">Review accessibility notes</span>
                    </li>
                    <li class="tp-item" draggable="true" data-task="Submit equipment request">
                        <span class="tp-handle" aria-hidden="true">::</span><span class="tp-rank">4</span><span class="text-sm font-medium">Submit equipment request</span>
                    </li>
                    <li class="tp-item" draggable="true" data-task="Reserve editing room">
                        <span class="tp-handle" aria-hidden="true">::</span><span class="tp-rank">5</span><span class="text-sm font-medium">Reserve editing room</span>
                    </li>
                </ol>

                <p id="priority-message" class="mt-6 text-sm tp-muted">Arrange the list, then review your order.</p>
            </section>
        </main>

        <script>
            (() => {
                const list = document.getElementById('priority-list');
                const message = document.getElementById('priority-message');
                let draggedItem = null;

                const updateRanks = () => {
                    [...list.children].forEach((item, index) => item.querySelector('.tp-rank').textContent = index + 1);
                    message.textContent = `Current order: ${[...list.children].map((item) => item.dataset.task).join(', ')}.`;
                };

                list.querySelectorAll('.tp-item').forEach((item) => {
                    item.addEventListener('dragstart', () => {
                        draggedItem = item;
                        item.classList.add('is-dragging');
                    });
                    item.addEventListener('dragend', () => {
                        item.classList.remove('is-dragging');
                        draggedItem = null;
                    });
                    item.addEventListener('dragover', (event) => {
                        event.preventDefault();
                        if (!draggedItem || draggedItem === item) return;
                        const box = item.getBoundingClientRect();
                        const after = event.clientY > box.top + box.height / 2;
                        list.insertBefore(draggedItem, after ? item.nextElementSibling : item);
                        updateRanks();
                    });
                });
            })();
        </script>
    </body>
</html>
