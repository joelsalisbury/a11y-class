<x-module06-demo-layout title="Cognitive Accessibility Examples" :returnHref="route('modules.session', ['module' => 6, 'session' => 13]).(request()->integer('slide') >= 1 && request()->integer('slide') <= 9 ? '#slide-'.request()->integer('slide') : '')" returnLabel="Return to Session 13">
    <h1>Cognitive Accessibility Examples</h1>
    <p>Compare a few small interactions, then complete one equipment task. Use fictional information; requests stay in this page.</p>
    <section class="panel" aria-labelledby="memory-title">
        <h2 id="memory-title">Why Am I Entering This Again?</h2>
        <form id="memory-start">
            <label for="first-contact">Contact email (required)</label>
            <input id="first-contact" type="email" required autocomplete="email" aria-describedby="contact-help">
            <p id="contact-help" class="muted">Use a fictional address, such as student@example.edu.</p>
            <button type="submit">Save contact and compare</button>
        </form>
        <div id="memory-compare" hidden>
            <div class="comparison">
                <form id="repeat-form"><h3>A: Enter It Again</h3><label for="repeat-contact">Contact email for pickup (required)</label><input id="repeat-contact" type="email" required><button type="submit">Confirm pickup contact</button></form>
                <form id="reuse-form"><h3>B: Reuse It</h3><label for="reuse-contact">Contact email for pickup (required)</label><input id="reuse-contact" type="email" required><button type="submit">Confirm pickup contact</button></form>
            </div>
            <p><strong>3.3.7 Redundant Entry · Level A · Added in WCAG 2.2.</strong> B makes earlier information available; A adds unnecessary re-entry. Exceptions still need to be considered.</p>
        </div>
        <p class="status" role="status" id="memory-status">Enter a contact to begin.</p>
        <button type="button" class="secondary" id="memory-reset">Reset comparison</button>
    </section>
    <section class="panel" aria-labelledby="predict-title">
        <h2 id="predict-title">Did I Ask It to Do That?</h2>
        <p>Compare the selection behaviors. The first moves focus as soon as the value changes. The second waits for your explicit action.</p>
        <div class="comparison">
            <div><h3>A: Immediate Context Change</h3><label for="jump-location">Pickup location</label><select id="jump-location"><option value="">Choose location</option><option>Art Building</option><option>Media Studio</option></select></div>
            <div><h3>B: Explicit Action</h3><label for="stay-location">Pickup location</label><select id="stay-location"><option value="">Choose location</option><option>Art Building</option><option>Media Studio</option></select><div class="actions"><button type="button" id="review-location">Review pickup</button></div></div>
        </div>
        <div class="panel" id="pickup-review" tabindex="-1"><h3>Pickup Review</h3><p id="location-result">No location reviewed.</p><button type="button" class="secondary" id="back-location">Return to location choice</button></div>
        <p>Moving focus is a context change. On Input allows a context change if users were advised beforehand; this teaching comparison announces what will happen. On Focus concerns merely arriving at a control. GearShare asks you to evaluate its own behavior.</p>
    </section>
    <section class="panel" aria-labelledby="stress-title">
        <h2 id="stress-title">Same Task, More Work</h2>
        <p>Choose a production-equipment kit and a pickup window. You can disable the short preview animation. Start the interruption test here before submitting.</p>
        <label class="inline-label"><input type="checkbox" id="stress-reduced" checked> Reduce preview motion</label>
        <p>In order to facilitate resource allocation within the production inventory service, selection of a kit should be undertaken in conjunction with identification of a suitable collection window, with loan-duration and project-format specifications entered prior to finalization; contact information supplied for the project record is additionally requested for the collection record.</p>
        <form id="stress-form">
            <div class="field"><label for="stress-email">Project contact email (required)</label><input id="stress-email" type="email" required autocomplete="email"></div>
            <fieldset><legend>Equipment kit (required)</legend><div class="actions">
                @foreach (['Camera Kit' => 'Reserve', 'Audio Kit' => 'Choose', 'Lighting Kit' => 'Select kit'] as $kit => $action)
                    <label class="inline-label"><input type="radio" name="stress-kit" value="{{ $kit }}" required> {{ $action }}: {{ $kit }}</label>
                @endforeach
            </div></fieldset>
            <div id="stress-preview" class="status" role="status">No kit selected.</div>
            <div class="comparison">
                <div class="field"><label for="stress-window">Pickup window (required)</label><select id="stress-window" required><option value="">Choose a window</option><option>Thursday 10 AM</option><option>Thursday 2 PM</option><option>Friday 10 AM</option><option>Friday 2 PM</option></select></div>
                <div class="field"><label for="stress-format">Project format</label><select id="stress-format"><option>Interview</option><option>Documentary</option><option>Animation reference</option><option>Performance</option><option>Product shoot</option><option>Soundscape</option><option>Location survey</option></select></div>
                <div class="field"><label for="stress-crew">Crew size</label><select id="stress-crew"><option>One person</option><option>Two people</option><option>Three people</option><option>Four people</option><option>Five or more</option></select></div>
                <div class="field"><label for="stress-duration">Loan duration</label><select id="stress-duration"><option>One day</option><option>Two days</option></select></div>
            </div>
            <div class="field"><label for="stress-repeat">Pickup contact email (required)</label><input id="stress-repeat" type="email" required></div>
            <section id="stress-review" tabindex="-1"><h3>Request Summary</h3><p id="stress-summary">Select a kit and pickup window.</p></section>
            <div class="actions"><button type="submit">Request equipment</button><button type="button" class="secondary" id="stress-back">Return to pickup window</button><button type="reset" class="secondary">Start over</button></div>
            <p class="status" role="status" id="stress-status">No request sent.</p>
        </form>
        <p>For the interruption test, stop before requesting. Look away and discuss another question briefly. Return: is the state obvious, is progress preserved, and what must you reconstruct?</p>
    </section>
    <style>
        #stress-preview { margin: 1rem 0; }
        #stress-preview.arrival { animation: stress-arrival 500ms ease-out; }
        @keyframes stress-arrival { from { transform: translateX(40px); } to { transform: none; } }
        @media (prefers-reduced-motion: reduce) { #stress-preview.arrival { animation: none; } }
    </style>
    <script>
        const memoryStart = document.querySelector('#memory-start');
        memoryStart.addEventListener('submit', event => {
            event.preventDefault();
            document.querySelector('#reuse-contact').value = document.querySelector('#first-contact').value;
            document.querySelector('#first-contact').value = '';
            memoryStart.hidden = true;
            document.querySelector('#memory-compare').hidden = false;
            document.querySelector('#memory-status').textContent = 'Contact saved. Compare the two versions.';
            document.querySelector('#repeat-contact').focus();
        });
        ['repeat', 'reuse'].forEach(version => document.querySelector(`#${version}-form`).addEventListener('submit', event => {
            event.preventDefault();
            document.querySelector('#memory-status').textContent = `${version === 'reuse' ? 'Reused' : 'Re-entered'} pickup contact confirmed.`;
        }));
        document.querySelector('#memory-reset').addEventListener('click', () => {
            memoryStart.reset();
            memoryStart.hidden = false;
            document.querySelector('#repeat-form').reset();
            document.querySelector('#reuse-form').reset();
            document.querySelector('#memory-compare').hidden = true;
            document.querySelector('#memory-status').textContent = 'Comparison reset.';
            document.querySelector('#first-contact').focus();
        });
        let locationSource = document.querySelector('#jump-location');
        function reviewLocation(source) {
            locationSource = source;
            document.querySelector('#location-result').textContent = `Pickup: ${source.value || 'No location selected'}.`;
            document.querySelector('#pickup-review').focus();
        }
        locationSource.addEventListener('change', event => reviewLocation(event.target));
        document.querySelector('#review-location').addEventListener('click', () => reviewLocation(document.querySelector('#stay-location')));
        document.querySelector('#back-location').addEventListener('click', () => locationSource.focus());
        const stress = document.querySelector('#stress-form');
        const summary = document.querySelector('#stress-summary');
        stress.addEventListener('change', event => {
            const kit = stress.querySelector('[name=stress-kit]:checked')?.value ?? 'No kit';
            summary.textContent = `${kit}; ${document.querySelector('#stress-window').value || 'no window'}; ${document.querySelector('#stress-format').value}; ${document.querySelector('#stress-crew').value}; ${document.querySelector('#stress-duration').value}.`;
            if (event.target.name === 'stress-kit') {
                const preview = document.querySelector('#stress-preview');
                preview.textContent = `${kit} selected.`;
                preview.classList.remove('arrival');
                void preview.offsetWidth;
                if (!document.querySelector('#stress-reduced').checked) preview.classList.add('arrival');
            }
            if (event.target.id === 'stress-window') document.querySelector('#stress-review').focus();
        });
        document.querySelector('#stress-back').addEventListener('click', () => document.querySelector('#stress-window').focus());
        document.querySelector('#stress-reduced').addEventListener('change', event => {
            if (event.target.checked) document.querySelector('#stress-preview').classList.remove('arrival');
        });
        stress.addEventListener('submit', event => {
            event.preventDefault();
            document.querySelector('#stress-status').textContent = `Local request confirmed: ${summary.textContent}`;
        });
        stress.addEventListener('reset', () => {
            summary.textContent = 'Select a kit and pickup window.';
            document.querySelector('#stress-preview').textContent = 'No kit selected.';
            document.querySelector('#stress-status').textContent = 'Task reset.';
        });
    </script>
</x-module06-demo-layout>
