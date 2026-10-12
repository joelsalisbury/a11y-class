<x-module06-demo-layout title="Motion and Timing" :returnHref="route('modules.session', ['module' => 6, 'session' => 12]).(request()->integer('slide') >= 1 && request()->integer('slide') <= 12 ? '#slide-'.request()->integer('slide') : '')" returnLabel="Return to Session 12">
    <h1>Motion and Timing</h1>
    <p>Read an announcement, reserve a camera, and open equipment details. Compare who controls the movement and the time.</p>
    <nav aria-label="Demonstrations" class="actions">
        <a href="#moving-content">Moving content</a>
        <a href="#time-limit">Time limit</a>
        <a href="#flashing">Flashing and safety</a>
        <a href="#reduced-motion">Reduced motion</a>
    </nav>
    <style>
        .example-card { border: 1px solid #94a3b8; border-radius: .65rem; padding: 1.25rem; }
        .example-label { color: #475569; font-size: .9rem; font-weight: 600; }
        .announcement-window { overflow: hidden; margin: 1rem 0; min-height: 6rem; padding: 1rem; background: #f1f5f9; border-radius: .4rem; }
        .desk-announcement { margin: 0; font-weight: 600; }
        .desk-announcement.arriving { animation: announcement-arrival 320ms ease-out; }
        @keyframes announcement-arrival { from { transform: translateY(.5rem); } to { transform: none; } }
        .clock { font-weight: 650; font-variant-numeric: tabular-nums; }
        .kit-contents { color: #475569; }
        .kit-details { margin-top: 1rem; padding: 1rem; border-radius: .5rem; background: #f1f5f9; }
        .kit-details:not([hidden]) { animation: kit-details-arrival 600ms ease-out; }
        @keyframes kit-details-arrival {
            from { transform: translateY(40px) scale(.9); }
            to { transform: none; }
        }
        .kit-details.reduced-motion { animation: none; }
        @media (prefers-reduced-motion: reduce) {
            .kit-details:not([hidden]) { animation: none; }
        }
        .flash-diagram { margin: 1.5rem 0; padding: 1rem; background: #f1f5f9; border-radius: .5rem; }
        .time-scale { display: flex; justify-content: space-between; font-size: .85rem; font-variant-numeric: tabular-nums; }
        .flash-track { position: relative; height: 3rem; margin: .5rem .5rem 1rem; border-bottom: 2px solid #64748b; }
        .flash-mark { position: absolute; bottom: -.5rem; width: 1rem; height: 1rem; border: 2px solid #075985; border-radius: 50%; background: #bae6fd; transform: translateX(-50%); }
        .pattern-label { font-weight: 650; margin-top: 1.25rem; }
        details { margin-top: 1.25rem; }
        summary { cursor: pointer; font-weight: 600; }
        section[id] { scroll-margin-top: 1rem; }
    </style>

    <section class="panel" id="moving-content" aria-labelledby="moving-title">
        <h2 id="moving-title">Can You Stop It?</h2>
        <div class="comparison">
            @foreach (['a' => 'A: No User Control', 'b' => 'B: User Controls Movement'] as $version => $label)
                <article class="example-card" aria-labelledby="desk-title-{{ $version }}">
                    <p class="example-label">{{ $label }}</p>
                    <h3 id="desk-title-{{ $version }}">Equipment Desk</h3>
                    <p>Today’s announcements</p>
                    <div class="announcement-window"><p class="desk-announcement" id="desk-announcement-{{ $version }}">Camera kits due by 5:00 PM today</p></div>
                    @if ($version === 'b')
                        <button id="pause-updates" type="button">Pause updates</button>
                    @endif
                </article>
            @endforeach
        </div>
        <p><strong>If you are still reading when the content moves, who controls the experience?</strong></p>
        <details>
            <summary>What does the standard say?</summary>
            <p><strong>WCAG 2.2.2: Pause, Stop, Hide · Level A</strong></p>
            <p>Both components advance the same announcements every four seconds. Only B lets you keep an announcement in place while you read.</p>
            <p>Automatically moving information that lasts more than five seconds alongside other content needs a way to pause, stop, or hide it unless the movement is essential. Auto-updating information alongside other content also needs control unless essential; it has no five-second exemption.</p>
            <a href="https://www.w3.org/WAI/WCAG22/Understanding/pause-stop-hide.html">W3C: Understanding Pause, Stop, Hide</a>
        </details>
    </section>

    <section class="panel" id="time-limit" aria-labelledby="timing-title">
        <h2 id="timing-title">Why Is There a Clock?</h2>
        <p>Choose the pickup time, then confirm the reservation. The 30-second hold is deliberately short for this classroom example. No equipment is actually reserved.</p>
        <div class="comparison">
            @foreach (['a' => 'A: No Useful Adjustment', 'b' => 'B: Adjustable Timing'] as $version => $label)
                <article class="example-card" aria-labelledby="reservation-title-{{ $version }}">
                    <p class="example-label">{{ $label }}</p>
                    <h3 id="reservation-title-{{ $version }}">Camera Kit</h3>
                    <p class="kit-contents">Camera, lens, and tripod</p>
                    <p><strong>Pickup:</strong> Thursday at 2:00 PM</p>
                    <button type="button" id="choose-pickup-{{ $version }}">Select Thursday at 2:00 PM</button>
                    <div id="hold-{{ $version }}" hidden>
                        <p>We'll hold this reservation for 30 seconds.</p>
                        <p class="clock">Hold expires in <span id="countdown-{{ $version }}">0:30</span></p>
                        @if ($version === 'b')
                            <p>Need more time?</p>
                            <button type="button" class="secondary" id="add-time">Add 2 minutes</button>
                        @endif
                        <div class="actions"><button type="button" id="confirm-reservation-{{ $version }}">Confirm reservation</button></div>
                    </div>
                    <p class="status" role="status" id="reservation-status-{{ $version }}">Select a pickup time to reserve this kit.</p>
                    <button type="button" class="secondary" id="try-again-{{ $version }}" hidden>Try again</button>
                    <button type="button" class="secondary" id="another-reservation-{{ $version }}" hidden>Make another reservation</button>
                </article>
            @endforeach
        </div>
        <p><strong>Does reserving this camera actually require someone to finish within 30 seconds?</strong></p>
        <details>
            <summary>What does the standard say?</summary>
            <p><strong>WCAG 2.2.1: Timing Adjustable · Level A</strong></p>
            <p>First determine whether the time limit is necessary. Where required, let users turn it off, adjust it, or extend it. Essential timing and real-time events have defined exceptions.</p>
            <p>B offers more time from the beginning of the hold and permits repeated two-minute extensions. A conforming extension path warns users, gives at least 20 seconds to act, and allows at least ten extensions. Trying again after expiry does not replace that control.</p>
            <a href="https://www.w3.org/WAI/WCAG22/Understanding/timing-adjustable.html">W3C: Understanding Timing Adjustable</a>
        </details>
    </section>

    <section class="panel" id="flashing" aria-labelledby="flash-title">
        <h2 id="flash-title">How Fast Is Too Fast?</h2>
        <p>These diagrams describe hypothetical flashes during one second. Every marker is static. Nothing plays or flashes.</p>
        <figure class="flash-diagram">
            <div class="time-scale" aria-hidden="true"><span>0s</span><span>.25</span><span>.50</span><span>.75</span><span>1s</span></div>
            <p class="pattern-label">Pattern A: Three flashes in one second</p>
            <div class="flash-track" aria-hidden="true"><span class="flash-mark" style="left: 17%"></span><span class="flash-mark" style="left: 50%"></span><span class="flash-mark" style="left: 83%"></span></div>
            <p class="pattern-label">Pattern B: Four flashes in one second</p>
            <div class="flash-track" aria-hidden="true"><span class="flash-mark" style="left: 12.5%"></span><span class="flash-mark" style="left: 37.5%"></span><span class="flash-mark" style="left: 62.5%"></span><span class="flash-mark" style="left: 87.5%"></span></div>
            <figcaption>Each circle represents one flash: a pair of opposing brightness changes, such as light to dark and back. Both tracks cover the same one-second interval.</figcaption>
        </figure>
        <p><strong>WCAG 2.3.1: Three Flashes or Below Threshold · Level A</strong></p>
        <p>Content must not flash more than three times in any one-second period unless the flashing remains below the general flash and red flash thresholds.</p>
        <p>Frequency alone is not the entire test. Flash area, brightness, and red flashing also matter.</p>
        <p><strong>Do not guess that flashing content is safe. Avoid unnecessary flashing and evaluate any required flashing effect carefully.</strong></p>
        <p><strong>Why is this different from simply finding an animation annoying?</strong></p>
        <details><summary>Why this is a safety issue</summary><p>Flashing can trigger photosensitive seizures. This is a physical safety criterion, not simply a preference about animation. A pause button cannot prevent exposure that happens before someone reaches it.</p><a href="https://www.w3.org/WAI/WCAG22/Understanding/three-flashes-or-below-threshold.html">W3C: Understanding Three Flashes or Below Threshold</a></details>
    </section>

    <section class="panel" id="reduced-motion" aria-labelledby="reduced-title">
        <h2 id="reduced-title">What If the Motion Is the Problem?</h2>
        <p>Open the same kit details in both cards. The standard version slides upward and grows slightly; the reduced-motion alternative shows the details in place.</p>
        <div class="comparison">
            @foreach (['a' => 'A: Standard Motion', 'b' => 'B: Reduced Motion'] as $version => $label)
                <article class="example-card" aria-labelledby="field-kit-title-{{ $version }}">
                    <p class="example-label">{{ $label }}</p>
                    <h3 id="field-kit-title-{{ $version }}">Field Production Kit</h3>
                    <p class="kit-contents">Camera, tripod, microphone, and batteries</p>
                    <button type="button" id="view-details-{{ $version }}" aria-expanded="false" aria-controls="kit-details-{{ $version }}">View kit details</button>
                    <div class="kit-details {{ $version === 'b' ? 'reduced-motion' : '' }}" id="kit-details-{{ $version }}" hidden>
                        <h4>Included Equipment</h4>
                        <ul><li>Camera with lens</li><li>Tripod</li><li>Microphone with cable</li><li>Two charged batteries</li></ul>
                        <p>Available for a two-day loan. Collect at the Art Building equipment desk.</p>
                    </div>
                </article>
            @endforeach
        </div>
        <p>A reduced-motion preference in your operating system or browser also removes the animation from the standard version.</p>
        <p><strong>WCAG 2.3.3 Animation from Interactions is AAA, not AA.</strong> Responding to reduced-motion preferences is a strong accessibility practice, not itself a universal WCAG 2.1 AA requirement.</p>
        <details><summary>How the reduced-motion alternative works</summary><p>The details, controls, and task stay the same. CSS removes the slide and zoom.</p><pre><code>.kit-details:not([hidden]) { animation: kit-details-arrival 600ms ease-out; }
@keyframes kit-details-arrival {
    from { transform: translateY(40px) scale(.9); }
    to { transform: none; }
}
.kit-details.reduced-motion { animation: none; }
@media (prefers-reduced-motion: reduce) {
    .kit-details:not([hidden]) { animation: none; }
}</code></pre><a href="https://developer.mozilla.org/en-US/docs/Web/CSS/Reference/At-rules/@media/prefers-reduced-motion">MDN: prefers-reduced-motion</a></details>
    </section>

    <script>
        const announcements = [
            'Camera kits due by 5:00 PM today',
            'Audio kits are available for Thursday pickup',
            'Studio B will close at 4:00 PM',
        ];
        let updatesPaused = false;
        const pauseUpdates = document.querySelector('#pause-updates');
        ['a', 'b'].forEach(version => {
            const announcement = document.querySelector(`#desk-announcement-${version}`);
            let index = 0;
            setInterval(() => {
                if (version === 'b' && updatesPaused) return;
                index = (index + 1) % announcements.length;
                announcement.textContent = announcements[index];
                announcement.classList.remove('arriving');
                void announcement.offsetWidth;
                announcement.classList.add('arriving');
            }, 4000);
        });
        pauseUpdates.addEventListener('click', () => {
            updatesPaused = !updatesPaused;
            document.querySelector('#desk-announcement-b').style.animationPlayState = updatesPaused ? 'paused' : 'running';
            pauseUpdates.textContent = updatesPaused ? 'Resume updates' : 'Pause updates';
        });

        ['a', 'b'].forEach(version => {
            const selectPickup = document.querySelector(`#choose-pickup-${version}`);
            const hold = document.querySelector(`#hold-${version}`);
            const countdown = document.querySelector(`#countdown-${version}`);
            const confirm = document.querySelector(`#confirm-reservation-${version}`);
            const status = document.querySelector(`#reservation-status-${version}`);
            const retry = document.querySelector(`#try-again-${version}`);
            const another = document.querySelector(`#another-reservation-${version}`);
            const addTime = version === 'b' ? document.querySelector('#add-time') : null;
            let deadline = null;
            let interval;
            function tick() {
                if (deadline === null) return;
                const seconds = Math.max(0, Math.ceil((deadline - Date.now()) / 1000));
                countdown.textContent = `${Math.floor(seconds / 60)}:${String(seconds % 60).padStart(2, '0')}`;
                if (seconds === 0) {
                    clearInterval(interval);
                    deadline = null;
                    // Reveal the recovery action before moving focus out of the expired hold.
                    retry.hidden = false;
                    if (hold.contains(document.activeElement)) retry.focus();
                    hold.hidden = true;
                    status.textContent = 'Your hold expired. Please select the pickup time again.';
                }
            }
            function choosePickup() {
                clearInterval(interval);
                selectPickup.hidden = true;
                retry.hidden = true;
                another.hidden = true;
                hold.hidden = false;
                deadline = Date.now() + 30000;
                status.textContent = 'Pickup selected: Thursday at 2:00 PM. Your hold expires in 30 seconds.';
                tick();
                interval = setInterval(tick, 250);
                confirm.focus();
            }
            selectPickup.addEventListener('click', choosePickup);
            retry.addEventListener('click', () => {
                retry.hidden = true;
                selectPickup.hidden = false;
                status.textContent = 'Select a pickup time to reserve this kit.';
                selectPickup.focus();
            });
            another.addEventListener('click', () => {
                another.hidden = true;
                selectPickup.hidden = false;
                status.textContent = 'Select a pickup time to reserve this kit.';
                selectPickup.focus();
            });
            addTime?.addEventListener('click', () => {
                tick();
                if (deadline === null) return;
                deadline += 120000;
                tick();
                status.textContent = 'Two minutes added to your hold.';
            });
            confirm.addEventListener('click', () => {
                tick();
                if (deadline === null) return;
                clearInterval(interval);
                deadline = null;
                another.hidden = false;
                another.focus();
                hold.hidden = true;
                status.textContent = 'Reservation confirmed: Camera Kit, Thursday at 2:00 PM.';
            });
        });

        ['a', 'b'].forEach(version => {
            const button = document.querySelector(`#view-details-${version}`);
            const details = document.querySelector(`#kit-details-${version}`);
            button.addEventListener('click', () => {
                details.hidden = !details.hidden;
                button.setAttribute('aria-expanded', String(!details.hidden));
                button.textContent = details.hidden ? 'View kit details' : 'Hide kit details';
            });
        });
    </script>
</x-module06-demo-layout>
