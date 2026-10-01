<x-layouts.app title="Precision Gauntlet">
    <div class="mx-auto max-w-7xl px-4 py-8 md:px-8 lg:px-10">
        <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="meta-label">Module 04 · Session 09</p>
                <h1 class="mt-3 text-3xl font-semibold tracking-tight text-ink md:text-5xl">Precision Gauntlet</h1>
                <p class="mt-3 max-w-3xl text-lg leading-8 text-ink-muted">How precise does the interface expect you to be?</p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('modules.session', ['module' => 4, 'session' => 9]) }}" class="inline-flex rounded-sm border border-subtle bg-surface-2 px-3.5 py-2 text-sm font-medium text-ink hover:border-accent-cyan/60 hover:text-accent-cyan focus-visible:focus-ring">Back to Session 09</a>
                <button type="button" data-reset-all class="inline-flex rounded-sm border border-accent-cyan/60 bg-accent-cyan/10 px-3.5 py-2 text-sm font-medium text-accent-cyan hover:bg-accent-cyan/20 focus-visible:focus-ring">Reset All</button>
            </div>
        </div>

        <div class="mb-10 max-w-4xl rounded-xl border border-subtle bg-surface-2/70 p-4 text-sm leading-7 text-ink-muted md:p-5">
            <p class="font-medium text-ink">Try each interaction before analyzing it.</p>
            <p class="mt-2">Pay attention to what the interface assumes about how accurately, quickly, or consistently you can operate a pointer.</p>
        </div>

        <div class="grid gap-6 xl:grid-cols-2">
            <section class="rounded-2xl border border-subtle bg-surface-2 p-5 shadow-sm" data-demo-card="tiny">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="meta-label">Demo 1</p>
                        <h2 class="mt-2 text-2xl font-semibold text-ink">Tiny Targets</h2>
                    </div>
                    <button type="button" data-toggle="tiny" aria-pressed="false" class="inline-flex rounded-sm border border-subtle bg-surface-3 px-2.5 py-1.5 text-xs font-semibold uppercase tracking-[0.12em] text-ink hover:border-accent-cyan/60 hover:text-accent-cyan focus-visible:focus-ring">Improve the targets</button>
                </div>

                <p class="mt-4 text-sm leading-7 text-ink-muted">Activate the highlighted target. It is intentionally small and close to other controls.</p>

                <div class="mt-5 rounded-xl border border-subtle bg-surface-3 p-4">
                    <div class="tiny-target-board" data-tiny-board>
                        <button type="button" class="tiny-target tiny-target-correct" data-tiny-target="correct" aria-label="Target 1"> </button>
                        <button type="button" class="tiny-target" data-tiny-target="other" aria-label="Target 2"> </button>
                        <button type="button" class="tiny-target" data-tiny-target="other" aria-label="Target 3"> </button>
                        <button type="button" class="tiny-target" data-tiny-target="other" aria-label="Target 4"> </button>
                        <button type="button" class="tiny-target" data-tiny-target="other" aria-label="Target 5"> </button>
                        <button type="button" class="tiny-target" data-tiny-target="other" aria-label="Target 6"> </button>
                        <button type="button" class="tiny-target" data-tiny-target="other" aria-label="Target 7"> </button>
                        <button type="button" class="tiny-target" data-tiny-target="other" aria-label="Target 8"> </button>
                    </div>
                </div>

                <div class="mt-4 flex items-center justify-between gap-3">
                    <p data-tiny-status class="text-sm font-medium text-ink">Try to hit the highlighted target.</p>
                    <button type="button" data-reset="tiny" class="inline-flex rounded-sm border border-subtle px-2.5 py-1.5 text-xs font-medium text-ink hover:border-accent-cyan/60 hover:text-accent-cyan focus-visible:focus-ring">Reset</button>
                </div>

                <details class="mt-5 rounded-lg border border-subtle bg-surface-1 p-3">
                    <summary class="cursor-pointer list-none text-sm font-medium text-ink">What should we check?</summary>
                    <ul class="mt-3 list-disc space-y-2 pl-5 text-sm leading-7 text-ink-muted marker:text-ink">
                        <li>Does the target size match the precision required by the task?</li>
                        <li>What happens when the pointer is slightly off?</li>
                        <li>Does the interface assume a steady hand or a very precise input device?</li>
                    </ul>
                </details>
            </section>

            <section class="rounded-2xl border border-subtle bg-surface-2 p-5 shadow-sm" data-demo-card="drag">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="meta-label">Demo 2</p>
                        <h2 class="mt-2 text-2xl font-semibold text-ink">Drag It</h2>
                    </div>
                    <button type="button" data-toggle="drag" aria-pressed="false" class="inline-flex rounded-sm border border-subtle bg-surface-3 px-2.5 py-1.5 text-xs font-semibold uppercase tracking-[0.12em] text-ink hover:border-accent-cyan/60 hover:text-accent-cyan focus-visible:focus-ring">Add another way</button>
                </div>

                <p class="mt-4 text-sm leading-7 text-ink-muted">Order the cards: Blue, Orange, Green.</p>

                <div class="mt-5 rounded-xl border border-subtle bg-surface-3 p-4" data-drag-zone>
                    <div class="drag-items" data-drag-items>
                        <div class="drag-item is-blue" draggable="true" data-drag-card="blue">Blue</div>
                        <div class="drag-item is-orange" draggable="true" data-drag-card="orange">Orange</div>
                        <div class="drag-item is-green" draggable="true" data-drag-card="green">Green</div>
                    </div>

                    <div class="mt-4 grid gap-2 sm:grid-cols-3">
                        <div class="drag-slot" data-drop-slot="1">1</div>
                        <div class="drag-slot" data-drop-slot="2">2</div>
                        <div class="drag-slot" data-drop-slot="3">3</div>
                    </div>
                </div>

                <div class="mt-4 flex items-center justify-between gap-3">
                    <p data-drag-status class="text-sm font-medium text-ink">Drag the cards into the correct order.</p>
                    <button type="button" data-reset="drag" class="inline-flex rounded-sm border border-subtle px-2.5 py-1.5 text-xs font-medium text-ink hover:border-accent-cyan/60 hover:text-accent-cyan focus-visible:focus-ring">Reset</button>
                </div>

                <details class="mt-5 rounded-lg border border-subtle bg-surface-1 p-3">
                    <summary class="cursor-pointer list-none text-sm font-medium text-ink">Investigate</summary>
                    <ul class="mt-3 list-disc space-y-2 pl-5 text-sm leading-7 text-ink-muted marker:text-ink">
                        <li>Is dragging the only way to complete the task?</li>
                        <li>What changes when the interface offers a simple alternative such as Move Up / Move Down?</li>
                        <li>Does the comparison reveal a broader usability issue beyond one specific input method?</li>
                    </ul>
                </details>
            </section>

            <section class="rounded-2xl border border-subtle bg-surface-2 p-5 shadow-sm" data-demo-card="gesture">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="meta-label">Demo 3</p>
                        <h2 class="mt-2 text-2xl font-semibold text-ink">Gesture Required</h2>
                    </div>
                    <button type="button" data-toggle="gesture" aria-pressed="false" class="inline-flex rounded-sm border border-subtle bg-surface-3 px-2.5 py-1.5 text-xs font-semibold uppercase tracking-[0.12em] text-ink hover:border-accent-cyan/60 hover:text-accent-cyan focus-visible:focus-ring">USE A SIMPLE CONTROL</button>
                </div>

                <p class="mt-4 text-sm leading-7 text-ink-muted">Some interfaces require a particular pointer movement to perform an action. Try completing this action as presented.</p>

                <div class="mt-5 rounded-xl border border-subtle bg-surface-3 p-4">
                    <div class="gesture-demo" data-gesture-demo data-mode="gesture">
                        <div class="gesture-track" data-gesture-track aria-label="Swipe to confirm reservation">
                            <div class="gesture-handle" data-gesture-handle aria-label="Swipe handle">
                                <span aria-hidden="true">→</span>
                            </div>
                            <div class="gesture-label" aria-hidden="true">Swipe to confirm →</div>
                        </div>

                        <button type="button" class="gesture-button" data-gesture-button hidden>Confirm reservation</button>
                        <p class="gesture-result" data-gesture-result aria-live="polite" hidden>Reservation confirmed</p>

                        <div class="gesture-learning" data-gesture-learning hidden>
                            <p class="font-semibold text-ink">What changed?</p>
                            <p class="mt-1 text-sm leading-6 text-ink-muted">The outcome did not change. Only the physical interaction required to produce it changed.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-4 flex items-center justify-between gap-3">
                    <p data-gesture-status class="text-sm font-medium text-ink">Swipe the handle to the right to confirm.</p>
                    <button type="button" data-reset="gesture" class="inline-flex rounded-sm border border-subtle px-2.5 py-1.5 text-xs font-medium text-ink hover:border-accent-cyan/60 hover:text-accent-cyan focus-visible:focus-ring">Reset</button>
                </div>

                <details class="mt-5 rounded-lg border border-subtle bg-surface-1 p-3">
                    <summary class="cursor-pointer list-none text-sm font-medium text-ink">What should we check?</summary>
                    <ul class="mt-3 list-disc space-y-2 pl-5 text-sm leading-7 text-ink-muted marker:text-ink">
                        <li>Does this function require a particular path or gesture?</li>
                        <li>Can the same result be achieved with a simpler pointer action?</li>
                        <li>What assumptions does the interaction make about motor control or pointer use?</li>
                        <li>Is making the gesture easier the same thing as providing an alternative?</li>
                    </ul>
                </details>
            </section>

            <section class="rounded-2xl border border-subtle bg-surface-2 p-5 shadow-sm" data-demo-card="tooltip">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <p class="meta-label">Demo 4</p>
                        <h2 class="mt-2 text-2xl font-semibold text-ink">The Disappearing Tooltip</h2>
                    </div>
                    <button type="button" data-toggle="tooltip" aria-pressed="false" class="inline-flex rounded-sm border border-subtle bg-surface-3 px-2.5 py-1.5 text-xs font-semibold uppercase tracking-[0.12em] text-ink hover:border-accent-cyan/60 hover:text-accent-cyan focus-visible:focus-ring">Fix the behavior</button>
                </div>

                <p class="mt-4 text-sm leading-7 text-ink-muted">Hover or focus the trigger to reveal the detail. The initial version disappears when you try to read it.</p>

                <div class="mt-5 rounded-xl border border-subtle bg-surface-3 p-4">
                    <div class="tooltip-demo" data-tooltip-demo>
                        <button type="button" class="tooltip-trigger" data-tooltip-trigger aria-describedby="tooltip-help">More info</button>
                        <div class="tooltip-message" id="tooltip-help" data-tooltip-message>
                            This detail appears only while the pointer remains on the trigger. Moving to read it makes it disappear.
                        </div>
                    </div>
                </div>

                <div class="mt-4 flex items-center justify-between gap-3">
                    <p data-tooltip-status class="text-sm font-medium text-ink">Try to read the supplemental information.</p>
                    <button type="button" data-reset="tooltip" class="inline-flex rounded-sm border border-subtle px-2.5 py-1.5 text-xs font-medium text-ink hover:border-accent-cyan/60 hover:text-accent-cyan focus-visible:focus-ring">Reset</button>
                </div>

                <details class="mt-5 rounded-lg border border-subtle bg-surface-1 p-3">
                    <summary class="cursor-pointer list-none text-sm font-medium text-ink">What should we check?</summary>
                    <ul class="mt-3 list-disc space-y-2 pl-5 text-sm leading-7 text-ink-muted marker:text-ink">
                        <li>Does the information appear on hover but disappear when the pointer moves?</li>
                        <li>How does the design behave for keyboard users?</li>
                        <li>Does the interface provide a persistent, readable, dismissible pattern?</li>
                    </ul>
                </details>
            </section>
        </div>

        <section class="mt-10 rounded-2xl border border-subtle bg-surface-2 p-5 md:p-6">
            <h2 class="text-2xl font-semibold tracking-tight text-ink">Classroom discussion</h2>
            <div class="mt-4 grid gap-4 md:grid-cols-2">
                <div>
                    <p class="font-medium text-ink">What assumption did each interface make about the user?</p>
                </div>
                <div>
                    <p class="font-medium text-ink">Was the problem the input device, the user's precision, or the design?</p>
                </div>
                <div>
                    <p class="font-medium text-ink">Which claims can we support with WCAG?</p>
                </div>
                <div>
                    <p class="font-medium text-ink">Which observations might be broader usability or inclusive-design concerns?</p>
                </div>
                <div class="md:col-span-2">
                    <p class="font-medium text-ink">How would you test the improved version?</p>
                </div>
            </div>

            <div class="mt-6 space-y-2">
                <p class="text-sm font-medium text-ink">Relevant course references</p>
                <div class="flex flex-wrap gap-3 text-sm">
                    <a href="https://www.w3.org/WAI/WCAG22/Understanding/target-size-minimum.html" class="text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring">Understanding Target Size (Minimum)</a>
                    <a href="https://www.w3.org/WAI/WCAG22/Understanding/dragging-movements.html" class="text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring">Understanding Dragging Movements</a>
                    <a href="https://www.w3.org/WAI/WCAG22/Understanding/pointer-gestures.html" class="text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring">Understanding Pointer Gestures</a>
                    <a href="https://www.w3.org/WAI/WCAG22/Understanding/pointer-gestures.html" class="text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring">WCAG 2.5.1 Pointer Gestures</a>
                    <a href="https://www.w3.org/WAI/test-evaluate/easy-checks/" class="text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring">W3C WAI Easy Checks</a>
                </div>
            </div>
        </section>
    </div>

    <style>
        .tiny-target-board {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 0.7rem;
            align-items: center;
            justify-items: center;
        }

        .tiny-target {
            width: 18px;
            height: 18px;
            border: 1px solid rgba(148, 163, 184, 0.7);
            border-radius: 0.4rem;
            background: rgba(148, 163, 184, 0.12);
            transition: all 0.2s ease;
            position: relative;
        }

        .tiny-target-correct {
            outline: 2px solid rgba(34, 211, 238, 0.8);
            outline-offset: 2px;
        }

        .tiny-target-board.is-improved .tiny-target {
            width: 42px;
            height: 42px;
            border-radius: 0.75rem;
            background: rgba(34, 211, 238, 0.18);
            border-color: rgba(34, 211, 238, 0.9);
        }

        .tiny-target.is-hit {
            background: rgba(34, 197, 94, 0.3);
            border-color: rgba(34, 197, 94, 0.9);
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.15);
        }

        .drag-items {
            display: grid;
            gap: 0.75rem;
        }

        .drag-item {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 54px;
            border-radius: 0.8rem;
            border: 1px solid rgba(148, 163, 184, 0.7);
            color: #f8fafc;
            font-weight: 600;
            cursor: grab;
            user-select: none;
        }

        .drag-item.is-blue { background: rgba(59, 130, 246, 0.75); }
        .drag-item.is-orange { background: rgba(249, 115, 22, 0.76); }
        .drag-item.is-green { background: rgba(16, 185, 129, 0.78); }

        .drag-slot {
            min-height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px dashed rgba(148, 163, 184, 0.8);
            border-radius: 0.8rem;
            background: rgba(148, 163, 184, 0.08);
            color: rgba(226, 232, 240, 0.9);
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .drag-slot.has-card {
            background: rgba(34, 211, 238, 0.12);
            border-style: solid;
            border-color: rgba(34, 211, 238, 0.8);
        }

        .drag-item[data-reordered="true"] {
            border-color: rgba(34, 211, 238, 0.8);
            box-shadow: 0 0 0 2px rgba(34, 211, 238, 0.18);
        }

        .drag-item.is-button-mode {
            min-height: 48px;
            border-radius: 0.7rem;
            cursor: default;
        }

        .drag-controls {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.75rem;
            flex-wrap: wrap;
        }

        .drag-controls button {
            flex: 1;
            min-width: 100px;
            border: 1px solid rgba(148, 163, 184, 0.7);
            background: rgba(15, 23, 42, 0.4);
            color: #e2e8f0;
            border-radius: 0.65rem;
            padding: 0.65rem 0.8rem;
            font-weight: 600;
        }

        .gesture-demo {
            display: grid;
            gap: 1rem;
        }

        .gesture-track {
            position: relative;
            display: flex;
            align-items: center;
            width: min(100%, 420px);
            height: 72px;
            padding: 0.875rem 0.75rem;
            border: 1px solid rgba(148, 163, 184, 0.8);
            border-radius: 1rem;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.9), rgba(30, 41, 59, 0.8));
            overflow: hidden;
            touch-action: none;
            user-select: none;
            box-shadow: inset 0 0 0 1px rgba(15, 23, 42, 0.3);
        }

        .gesture-track::before {
            content: "";
            position: absolute;
            inset: 0.875rem 0.75rem;
            border-radius: 999px;
            background: rgba(148, 163, 184, 0.12);
            border: 1px solid rgba(148, 163, 184, 0.35);
        }

        .gesture-handle {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 56px;
            height: 56px;
            border: 1px solid rgba(34, 211, 238, 0.9);
            border-radius: 999px;
            background: linear-gradient(135deg, rgba(34, 211, 238, 0.28), rgba(126, 34, 206, 0.35));
            color: #f8fafc;
            font-size: 1.4rem;
            font-weight: 700;
            box-shadow: 0 16px 26px rgba(34, 211, 238, 0.18);
            transform: translateX(0);
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
            touch-action: none;
            cursor: grab;
        }

        .gesture-handle:active {
            cursor: grabbing;
        }

        .gesture-demo.is-dragging .gesture-handle {
            box-shadow: 0 18px 30px rgba(34, 211, 238, 0.4);
        }

        .gesture-demo.is-complete .gesture-handle {
            border-color: rgba(34, 197, 94, 0.9);
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.2), rgba(21, 128, 61, 0.3));
        }

        .gesture-label {
            position: absolute;
            left: 84px;
            right: 18px;
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: rgba(226, 232, 240, 0.92);
            pointer-events: none;
        }

        .gesture-button {
            justify-self: start;
            border: 1px solid rgba(34, 197, 94, 0.8);
            background: rgba(34, 197, 94, 0.16);
            color: #e2e8f0;
            border-radius: 0.75rem;
            padding: 0.7rem 1rem;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .gesture-result {
            margin: 0;
            font-size: 0.95rem;
            font-weight: 700;
            color: #86efac;
        }

        .gesture-learning {
            margin-top: 0.25rem;
            border: 1px solid rgba(34, 211, 238, 0.5);
            border-radius: 0.75rem;
            background: rgba(34, 211, 238, 0.08);
            padding: 0.75rem 0.875rem;
        }

        .tooltip-demo {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            min-height: 96px;
        }

        .tooltip-trigger {
            border: 1px solid rgba(148, 163, 184, 0.8);
            background: rgba(15, 23, 42, 0.8);
            color: #e2e8f0;
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            font-weight: 700;
        }

        .tooltip-message {
            position: absolute;
            left: 0;
            top: 3.25rem;
            width: min(22rem, 82vw);
            background: rgba(15, 23, 42, 0.95);
            border: 1px solid rgba(148, 163, 184, 0.8);
            border-radius: 0.85rem;
            padding: 0.8rem 0.9rem;
            color: #e2e8f0;
            line-height: 1.6;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-4px);
            transition: all 0.2s ease;
            z-index: 10;
        }

        .tooltip-demo.is-bad .tooltip-trigger:hover + .tooltip-message,
        .tooltip-demo.is-bad .tooltip-trigger:focus + .tooltip-message {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .tooltip-demo.is-bad .tooltip-message {
            pointer-events: none;
        }

        .tooltip-demo.is-fixed .tooltip-message {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            pointer-events: auto;
        }

        .tooltip-demo.is-fixed .tooltip-trigger:focus-visible + .tooltip-message,
        .tooltip-demo.is-fixed .tooltip-trigger:hover + .tooltip-message {
            opacity: 1;
            visibility: visible;
        }

        @media (max-width: 640px) {
            .tiny-target-board {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }

            .drag-controls {
                flex-direction: column;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const setTinyMode = (improved) => {
                const board = document.querySelector('[data-tiny-board]');
                const toggle = document.querySelector('[data-toggle="tiny"]');
                const status = document.querySelector('[data-tiny-status]');
                board.classList.toggle('is-improved', improved);
                toggle.setAttribute('aria-pressed', String(improved));
                toggle.textContent = improved ? 'Back to tiny targets' : 'Improve the targets';
                status.textContent = improved ? 'The targets are easier to hit now.' : 'Try to hit the highlighted target.';
                board.querySelectorAll('[data-tiny-target]').forEach((button) => {
                    button.classList.remove('is-hit');
                    button.disabled = false;
                });
            };

            document.querySelector('[data-toggle="tiny"]').addEventListener('click', () => {
                const isImproved = !document.querySelector('[data-tiny-board]').classList.contains('is-improved');
                setTinyMode(isImproved);
            });

            document.querySelectorAll('[data-tiny-target]').forEach((button) => {
                button.addEventListener('click', () => {
                    const status = document.querySelector('[data-tiny-status]');
                    const isCorrect = button.dataset.tinyTarget === 'correct';
                    const board = document.querySelector('[data-tiny-board]');

                    if (isCorrect) {
                        button.classList.add('is-hit');
                        status.textContent = 'Found it. The target was intentionally small and close to other controls.';
                    } else {
                        status.textContent = 'Not quite. Try the highlighted target again.';
                        if (!board.classList.contains('is-improved')) {
                            document.querySelector('[data-tiny-target="correct"]').classList.remove('is-hit');
                        }
                    }
                });
            });

            document.querySelector('[data-reset="tiny"]').addEventListener('click', () => {
                setTinyMode(false);
            });

            const resetDrag = () => {
                const zone = document.querySelector('[data-drag-zone]');
                const status = document.querySelector('[data-drag-status]');
                const controls = document.querySelector('[data-drag-items]');
                const slots = zone.querySelectorAll('[data-drop-slot]');
                const items = ['blue', 'orange', 'green'];

                controls.innerHTML = '';
                items.forEach((item) => {
                    const card = document.createElement('div');
                    card.className = `drag-item ${item === 'blue' ? 'is-blue' : item === 'orange' ? 'is-orange' : 'is-green'}`;
                    card.draggable = true;
                    card.dataset.dragCard = item;
                    card.textContent = item === 'blue' ? 'Blue' : item === 'orange' ? 'Orange' : 'Green';
                    controls.appendChild(card);
                });

                slots.forEach((slot) => {
                    slot.classList.remove('has-card');
                    slot.textContent = slot.dataset.dropSlot;
                });

                status.textContent = 'Drag the cards into the correct order.';
                zone.dataset.mode = 'drag';
                document.querySelector('[data-toggle="drag"]').setAttribute('aria-pressed', 'false');
                document.querySelector('[data-toggle="drag"]').textContent = 'Add another way';
                attachDragHandlers();
            };

            const setDragMode = (useButtons) => {
                const zone = document.querySelector('[data-drag-zone]');
                const status = document.querySelector('[data-drag-status]');
                const toggle = document.querySelector('[data-toggle="drag"]');
                const controls = zone.querySelector('[data-drag-items]');
                const cards = Array.from(controls.querySelectorAll('.drag-item'));

                if (useButtons) {
                    controls.innerHTML = '';
                    const order = ['blue', 'orange', 'green'];
                    order.forEach((key, index) => {
                        const wrapper = document.createElement('div');
                        wrapper.className = 'drag-controls';
                        wrapper.innerHTML = `
                            <button type="button" data-move="${key}" data-direction="up">Move ${key === 'blue' ? 'Blue' : key === 'orange' ? 'Orange' : 'Green'} up</button>
                            <button type="button" data-move="${key}" data-direction="down">Move ${key === 'blue' ? 'Blue' : key === 'orange' ? 'Orange' : 'Green'} down</button>
                        `;
                        controls.appendChild(wrapper);
                    });
                    status.textContent = 'Use the controls to reorder the cards without dragging.';
                    toggle.textContent = 'Back to dragging';
                    toggle.setAttribute('aria-pressed', 'true');
                    attachButtonReorder();
                    return;
                }

                resetDrag();
            };

            const attachButtonReorder = () => {
                const controls = document.querySelector('[data-drag-items]');
                const buttons = controls.querySelectorAll('[data-move]');
                const zone = document.querySelector('[data-drag-zone]');
                const status = document.querySelector('[data-drag-status]');

                buttons.forEach((button) => {
                    button.addEventListener('click', () => {
                        const cardName = button.dataset.move;
                        const cards = Array.from(zone.querySelectorAll('.drag-item'));
                        const names = ['blue', 'orange', 'green'];
                        const currentIndex = names.indexOf(cardName);
                        const delta = button.dataset.direction === 'up' ? -1 : 1;
                        const targetIndex = Math.min(Math.max(currentIndex + delta, 0), names.length - 1);
                        const nextOrder = [...names];
                        const moving = nextOrder[currentIndex];
                        nextOrder[currentIndex] = nextOrder[targetIndex];
                        nextOrder[targetIndex] = moving;

                        const items = zone.querySelectorAll('.drag-item');
                        items.forEach((item) => item.remove());

                        nextOrder.forEach((name) => {
                            const card = document.createElement('div');
                            card.className = `drag-item is-${name === 'blue' ? 'blue' : name === 'orange' ? 'orange' : 'green'} is-button-mode`;
                            card.textContent = name === 'blue' ? 'Blue' : name === 'orange' ? 'Orange' : 'Green';
                            zone.querySelector('[data-drag-items]').appendChild(card);
                        });

                        const isCorrect = nextOrder.join(',') === 'blue,orange,green';
                        status.textContent = isCorrect ? 'The alternative control makes the task possible without dragging.' : 'Keep reordering until the cards are in the target sequence.';
                    });
                });
            };

            const attachDragHandlers = () => {
                const items = document.querySelectorAll('[data-drag-card]');
                const slots = document.querySelectorAll('[data-drop-slot]');
                const zone = document.querySelector('[data-drag-zone]');
                const status = document.querySelector('[data-drag-status]');
                const order = ['blue', 'orange', 'green'];
                let draggedCard = null;

                items.forEach((item) => {
                    item.addEventListener('dragstart', (event) => {
                        draggedCard = item.dataset.dragCard;
                        event.dataTransfer.effectAllowed = 'move';
                    });

                    item.addEventListener('dragend', () => {
                        draggedCard = null;
                    });
                });

                slots.forEach((slot) => {
                    slot.addEventListener('dragover', (event) => {
                        event.preventDefault();
                        slot.classList.add('has-card');
                    });

                    slot.addEventListener('drop', (event) => {
                        event.preventDefault();
                        const targetIndex = Number(slot.dataset.dropSlot) - 1;
                        const item = document.querySelector(`[data-drag-card="${draggedCard}"]`);

                        if (!item) {
                            return;
                        }

                        const sourceCard = item;
                        const currentParent = sourceCard.parentElement;
                        const currentSlot = slot;
                        currentSlot.textContent = sourceCard.textContent;
                        currentSlot.classList.add('has-card');
                        sourceCard.remove();

                        const isCorrect = order[targetIndex] === draggedCard;
                        status.textContent = isCorrect ? 'Correct order. The task depends on dragging.' : 'That is not the correct order yet.';
                    });
                });
            };

            document.querySelector('[data-toggle="drag"]').addEventListener('click', () => {
                const isButtonMode = document.querySelector('[data-drag-zone]').dataset.mode === 'buttons';
                document.querySelector('[data-drag-zone]').dataset.mode = isButtonMode ? 'drag' : 'buttons';
                setDragMode(!isButtonMode);
            });

            document.querySelector('[data-reset="drag"]').addEventListener('click', () => {
                resetDrag();
            });

            const showGestureLearning = () => {
                const learning = document.querySelector('[data-gesture-learning]');
                learning.hidden = false;
            };

            const resetGesture = () => {
                const demo = document.querySelector('[data-gesture-demo]');
                const handle = document.querySelector('[data-gesture-handle]');
                const button = document.querySelector('[data-gesture-button]');
                const result = document.querySelector('[data-gesture-result]');
                const status = document.querySelector('[data-gesture-status]');
                const learning = document.querySelector('[data-gesture-learning]');
                const toggle = document.querySelector('[data-toggle="gesture"]');

                demo.dataset.mode = 'gesture';
                demo.classList.remove('is-dragging', 'is-complete');
                handle.style.transition = 'transform 0.2s ease';
                handle.style.transform = 'translateX(0px)';
                result.hidden = true;
                button.hidden = true;
                learning.hidden = true;
                status.textContent = 'Swipe the handle to the right to confirm.';
                toggle.textContent = 'USE A SIMPLE CONTROL';
                toggle.setAttribute('aria-pressed', 'false');
            };

            const completeGesture = () => {
                const demo = document.querySelector('[data-gesture-demo]');
                const result = document.querySelector('[data-gesture-result]');
                const status = document.querySelector('[data-gesture-status]');
                const handle = document.querySelector('[data-gesture-handle]');

                demo.classList.add('is-complete');
                demo.classList.remove('is-dragging');
                handle.style.transition = 'transform 0.2s ease';
                result.hidden = false;
                result.textContent = 'Reservation confirmed';
                status.textContent = 'Reservation confirmed';
                showGestureLearning();
            };

            const setupGestureDemo = () => {
                const demo = document.querySelector('[data-gesture-demo]');
                const track = document.querySelector('[data-gesture-track]');
                const handle = document.querySelector('[data-gesture-handle]');
                const button = document.querySelector('[data-gesture-button]');
                const status = document.querySelector('[data-gesture-status]');
                const toggle = document.querySelector('[data-toggle="gesture"]');
                const learning = document.querySelector('[data-gesture-learning]');
                const result = document.querySelector('[data-gesture-result]');

                const clamp = (value, min, max) => Math.min(Math.max(value, min), max);

                let dragging = false;
                let currentX = 0;
                let pointerId = null;
                let trackWidth = 0;
                let threshold = 0;

                const setSimpleMode = () => {
                    demo.dataset.mode = 'simple';
                    demo.classList.remove('is-dragging', 'is-complete');
                    handle.style.transition = 'transform 0.2s ease';
                    handle.style.transform = 'translateX(0px)';
                    button.hidden = false;
                    result.hidden = true;
                    learning.hidden = false;
                    status.textContent = 'The simple control completes the same action.';
                    toggle.textContent = 'REQUIRE GESTURE';
                    toggle.setAttribute('aria-pressed', 'true');
                };

                const resetToGesture = () => {
                    demo.dataset.mode = 'gesture';
                    demo.classList.remove('is-dragging', 'is-complete');
                    handle.style.transition = 'transform 0.2s ease';
                    handle.style.transform = 'translateX(0px)';
                    button.hidden = true;
                    result.hidden = true;
                    learning.hidden = true;
                    status.textContent = 'Swipe the handle to the right to confirm.';
                    toggle.textContent = 'USE A SIMPLE CONTROL';
                    toggle.setAttribute('aria-pressed', 'false');
                };

                handle.addEventListener('pointerdown', (event) => {
                    if (demo.dataset.mode !== 'gesture') {
                        return;
                    }

                    event.preventDefault();
                    dragging = true;
                    pointerId = event.pointerId;
                    trackWidth = track.clientWidth - handle.offsetWidth;
                    threshold = trackWidth * 0.72;
                    demo.classList.add('is-dragging');
                    handle.style.transition = 'none';
                    handle.setPointerCapture(pointerId);
                });

                handle.addEventListener('pointermove', (event) => {
                    if (!dragging || demo.dataset.mode !== 'gesture' || event.pointerId !== pointerId) {
                        return;
                    }

                    const rect = track.getBoundingClientRect();
                    const nextX = clamp(event.clientX - rect.left - (handle.offsetWidth / 2), 0, trackWidth);
                    currentX = nextX;
                    handle.style.transform = `translateX(${nextX}px)`;

                    status.textContent = nextX >= threshold ? 'Release to confirm the reservation.' : 'Keep swiping to the right.';
                });

                handle.addEventListener('pointerup', (event) => {
                    if (!dragging || demo.dataset.mode !== 'gesture' || event.pointerId !== pointerId) {
                        return;
                    }

                    dragging = false;
                    pointerId = null;
                    demo.classList.remove('is-dragging');
                    handle.releasePointerCapture(event.pointerId);

                    if (currentX >= threshold) {
                        handle.style.transform = `translateX(${trackWidth}px)`;
                        completeGesture();
                        return;
                    }

                    handle.style.transition = 'transform 0.2s ease';
                    handle.style.transform = 'translateX(0px)';
                    status.textContent = 'Swipe the handle to the right to confirm.';
                });

                handle.addEventListener('pointercancel', () => {
                    dragging = false;
                    pointerId = null;
                    demo.classList.remove('is-dragging');
                    handle.style.transition = 'transform 0.2s ease';
                    handle.style.transform = 'translateX(0px)';
                    status.textContent = 'Swipe the handle to the right to confirm.';
                });

                handle.addEventListener('click', (event) => {
                    event.preventDefault();
                    event.stopPropagation();
                });

                button.addEventListener('click', (event) => {
                    event.preventDefault();
                    if (demo.dataset.mode !== 'simple') {
                        return;
                    }
                    result.hidden = false;
                    result.textContent = 'Reservation confirmed';
                    status.textContent = 'Reservation confirmed';
                    showGestureLearning();
                    demo.classList.add('is-complete');
                });

                toggle.addEventListener('click', () => {
                    const isSimple = demo.dataset.mode === 'simple';
                    if (isSimple) {
                        resetToGesture();
                        return;
                    }

                    setSimpleMode();
                    showGestureLearning();
                });

                document.querySelector('[data-reset="gesture"]').addEventListener('click', () => {
                    resetGesture();
                });

                resetGesture();
            };

            setupGestureDemo();

            const resetTooltip = () => {
                const demo = document.querySelector('[data-tooltip-demo]');
                const toggle = document.querySelector('[data-toggle="tooltip"]');
                const status = document.querySelector('[data-tooltip-status]');
                demo.classList.add('is-bad');
                demo.classList.remove('is-fixed');
                toggle.textContent = 'Fix the behavior';
                toggle.setAttribute('aria-pressed', 'false');
                demo.dataset.mode = 'bad';
                status.textContent = 'Try to read the supplemental information.';
            };

            document.querySelector('[data-toggle="tooltip"]').addEventListener('click', () => {
                const demo = document.querySelector('[data-tooltip-demo]');
                const toggle = document.querySelector('[data-toggle="tooltip"]');
                const status = document.querySelector('[data-tooltip-status]');
                const isFixed = demo.dataset.mode === 'fixed';
                demo.dataset.mode = isFixed ? 'bad' : 'fixed';
                demo.classList.toggle('is-fixed', !isFixed);
                demo.classList.toggle('is-bad', isFixed);
                toggle.textContent = isFixed ? 'Fix the behavior' : 'Back to the original behavior';
                toggle.setAttribute('aria-pressed', String(!isFixed));
                status.textContent = !isFixed ? 'The fixed behavior keeps the information available and readable.' : 'Try to read the supplemental information.';
            });

            document.querySelector('[data-reset="tooltip"]').addEventListener('click', () => {
                resetTooltip();
            });

            document.querySelector('[data-reset-all]').addEventListener('click', () => {
                setTinyMode(false);
                resetDrag();
                resetGesture();
                resetTooltip();
            });

            setTinyMode(false);
            resetDrag();
            resetGesture();
            resetTooltip();
        });
    </script>
</x-layouts.app>
