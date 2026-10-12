@php
    $kits = [
        'camera' => ['name' => 'Camera Kit', 'description' => 'A compact setup for interviews, location footage, and field shoots.', 'contents' => 'Mirrorless camera, lens, tripod, and batteries', 'availability' => '2 available Thursday', 'desk' => 'Media Building', 'alt' => 'Equipment photo'],
        'audio' => ['name' => 'Audio Kit', 'description' => 'Record dialogue and location sound with a portable audio setup.', 'contents' => 'Recorder, shotgun microphone, headphones, and cables', 'availability' => '3 available Thursday', 'desk' => 'Media Building', 'alt' => 'Portable recorder with a shotgun microphone and headphones'],
        'lighting' => ['name' => 'Lighting Kit', 'description' => 'Shape an interview or small studio scene with portable LED lighting.', 'contents' => 'Two LED panels, stands, batteries, and modifiers', 'availability' => '2 available Thursday', 'desk' => 'Art Building', 'alt' => 'Two LED light panels on stands with a battery'],
        'field' => ['name' => 'Field Production Kit', 'description' => 'A combined camera and audio setup for a small production crew.', 'contents' => 'Camera, recorder, microphone, tripod, and batteries', 'availability' => '1 available Thursday', 'desk' => 'Media Building', 'alt' => 'Camera, portable recorder, microphone, and tripod arranged as a production kit'],
    ];
@endphp
<x-module06-demo-layout title="GearShare" :returnHref="route('modules.challenge', ['module' => 6])" returnLabel="Return to Challenge 06">
    <style>
        @layer base {
            .kit-detail:not([hidden]) { animation-duration: 600ms !important; }
        }
        .gear-header { padding: 1rem 0 2rem; border-bottom: 1px solid #cbd5e1; }
        .service-label { color: #075985; font-weight: 650; font-size: .85rem; letter-spacing: .06em; text-transform: uppercase; }
        .gear-header p { max-width: 42rem; }
        .desk-updates { background: #e0f2fe; border: 1px solid #7dd3fc; border-radius: .7rem; margin: 1.5rem 0; padding: 1rem 1.25rem; }
        .desk-updates h2 { font-size: 1rem; margin: 0; }
        .desk-update { margin-bottom: 0; }
        .desk-update.arriving { animation: desk-arrival 350ms ease-out; }
        @keyframes desk-arrival { from { transform: translateY(.5rem); } to { transform: none; } }
        .borrower-record { background: white; border: 1px solid #cbd5e1; border-radius: .7rem; padding: 1.25rem; }
        .borrower-record h2 { font-size: 1.1rem; }
        .lookup-row { display: flex; flex-wrap: wrap; align-items: end; gap: 1rem; }
        .lookup-row .field { flex: 1 1 18rem; margin: 0; }
        .catalog { margin-top: 2.5rem; }
        .kit-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 340px), 1fr)); gap: 1.25rem; }
        .kit-card { background: white; border: 1px solid #94a3b8; border-radius: .8rem; overflow: hidden; }
        .kit-card.is-selected { border-color: #075985; box-shadow: 0 0 0 2px #075985; }
        .kit-image { display: block; width: 100%; height: 160px; object-fit: contain; background: #eef2f6; }
        .kit-body { padding: 1.25rem; }
        .kit-body h3 { font-size: 1.3rem; }
        .clearance-dot { display: inline-block; width: .85rem; height: .85rem; border-radius: 50%; border: 1px solid #0f172a; vertical-align: middle; }
        .clearance-ready { background: #166534; }
        .clearance-approval { background: #b45309; }
        .pickup-hours { color: #a8b0bc; font-size: .875rem; }
        .availability { color: #166534; font-weight: 600; }
        .kit-detail { margin-top: 1.25rem; border-top: 1px solid #cbd5e1; padding-top: 1rem; }
        .kit-detail:not([hidden]) { animation: kit-detail-arrival 600ms ease-out; }
        @keyframes kit-detail-arrival { from { transform: translateX(35px) scale(.92); } to { transform: none; } }
        .recommendation { display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem; margin-top: 1.25rem; padding: 1.25rem; background: #e2e8f0; border: 1px solid #94a3b8; border-radius: .7rem; }
        .recommendation p { margin: .25rem 0; }
        .request-selection { padding: 1rem; background: #f1f5f9; border: 1px solid #94a3b8; border-radius: .5rem; }
        .hold-clock { font-variant-numeric: tabular-nums; font-weight: 650; }
        .policy-copy { max-width: 46rem; }
        .review-list { display: grid; grid-template-columns: minmax(7rem, 1fr) 2fr; gap: .5rem 1rem; margin: 1rem 0; }
        .review-list dt { font-weight: 650; }
        .review-list dd { margin: 0; overflow-wrap: anywhere; }
        .confirmation { border-color: #166534; }
    </style>
    <header class="gear-header">
        <p class="service-label">University Production Services</p>
        <h1>GearShare</h1>
        <p class="text-xl">Borrow production equipment for your next project.</p>
        <p>Browse equipment for coursework and student productions, arrange a desk pickup, and send your request.</p>
        <p class="muted">Fictional service. Requests are local to this page; use made-up borrower details.</p>
    </header>
    <noscript><p>Equipment requests need JavaScript. You can still browse kit contents and borrowing information below.</p></noscript>
    <section class="desk-updates" aria-labelledby="updates-title">
        <h2 id="updates-title">Equipment Desk Updates</h2>
        <p id="desk-update" class="desk-update">Media Building desk closes at 5:00 PM</p>
    </section>
    <section class="borrower-record" aria-labelledby="record-title">
        <h2 id="record-title">Your Borrower Record</h2>
        <form id="borrower-form" class="lookup-row">
            <div class="field"><label for="borrower-email">University email (required)</label><input id="borrower-email" type="email" autocomplete="email" required aria-describedby="record-help"><p id="record-help" class="muted">Use your university email to identify your equipment request.</p></div>
            <button type="submit">Use borrower record</button>
        </form>
        <p id="borrower-status" role="status"></p>
    </section>
    <section class="catalog" aria-labelledby="equipment-title">
        <h2 id="equipment-title">Find Equipment</h2>
        <p>Available for Thursday pickup. Both desks can arrange collection; staff will confirm your requested window.</p>
        <p class="muted">Availability: <span class="clearance-dot clearance-ready" aria-hidden="true"></span> Ready for pickup · <span class="clearance-dot clearance-approval" aria-hidden="true"></span> Staff clearance needed</p>
        <div class="kit-grid">
            @foreach ($kits as $id => $kit)
                <article class="kit-card" data-kit-card="{{ $id }}" aria-labelledby="kit-title-{{ $id }}">
                    <img class="kit-image" src="{{ asset('images/gearshare-'.$id.'.svg') }}" alt="{{ $kit['alt'] }}" width="400" height="180">
                    <div class="kit-body">
                        <h3 id="kit-title-{{ $id }}">{{ $kit['name'] }}</h3>
                        <p>{{ $kit['description'] }}</p>
                        <p class="availability">{{ $kit['availability'] }}</p>
                        <p>Availability: <span class="clearance-dot {{ $id === 'field' ? 'clearance-approval' : 'clearance-ready' }}" aria-hidden="true"></span><span class="sr-only">{{ $id === 'field' ? 'Staff clearance needed' : 'Ready for pickup' }}</span></p>
                        @if ($id === 'camera')
                            <p class="pickup-hours">Pickup desk hours: 9:00 AM–5:00 PM</p>
                            <p class="muted">Check the pictured camera body and lens before requesting.</p>
                        @endif
                        <p>Equipment desk: {{ $kit['desk'] }}</p>
                        <div class="actions">
                            <button type="button" class="secondary" data-details="{{ $id }}" aria-controls="details-{{ $id }}" aria-expanded="false">View details<span class="sr-only">: {{ $kit['name'] }}</span></button>
                            <button type="button" data-kit="{{ $id }}" data-name="{{ $kit['name'] }}" aria-pressed="false">Add to request<span class="sr-only">: {{ $kit['name'] }}</span></button>
                        </div>
                        <div id="details-{{ $id }}" class="kit-detail" role="region" aria-labelledby="details-title-{{ $id }}" hidden>
                            <h4 id="details-title-{{ $id }}">Included in {{ $kit['name'] }}</h4>
                            <p>{{ $kit['contents'] }}.</p>
                            <p>Most loans are due the next business day. Ask desk staff about weekend borrowing or longer production schedules.</p>
                            <button type="button" data-kit="{{ $id }}" data-name="{{ $kit['name'] }}" aria-pressed="false">Reserve this kit<span class="sr-only">: {{ $kit['name'] }}</span></button>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        <aside class="recommendation" aria-labelledby="recommended-title">
            <div><h3 id="recommended-title">Planning a Field Shoot?</h3><p>The Camera Kit includes a mirrorless camera, lens, tripod, and batteries.</p></div>
            <button type="button" data-kit="camera" data-name="Camera Kit" aria-pressed="false">Choose kit<span class="sr-only">: Camera Kit</span></button>
        </aside>
    </section>
    <form id="request-form">
        <section class="panel" aria-labelledby="request-title">
            <h2 id="request-title">Your Request</h2>
            <div class="request-selection"><p id="selection-status" role="status">No equipment selected. Add a kit to your request.</p><p id="hold-line" hidden><span id="held-kit">Camera Kit</span> held for you for <span id="hold-time" class="hold-clock">5:00</span></p></div>
            <p id="hold-status" role="status"></p>
            <div class="field"><label for="pickup-location">Pickup location (required)</label><select id="pickup-location" required><option value="">Choose a location</option><option>Media Building</option><option>Art Building</option></select></div>
            <section aria-labelledby="pickup-heading">
                <h3 id="pickup-heading" tabindex="-1">Arrange Your Pickup</h3>
                <div class="comparison">
                    <div class="field"><label for="pickup-day">Pickup day (required)</label><select id="pickup-day" required><option value="">Choose a day</option><option>Thursday</option><option>Friday</option></select></div>
                    <div class="field"><label for="pickup-time">Pickup window (required)</label><select id="pickup-time" required><option value="">Choose a window</option><option>10:00–10:15 AM</option><option>2:00–2:15 PM</option><option>3:00–3:15 PM</option></select></div>
                </div>
                <button type="button" class="secondary" id="change-location">Change pickup location</button>
            </section>
        </section>
        <section class="panel" aria-labelledby="borrower-title">
            <h2 id="borrower-title">Borrower Information</h2>
            <div class="comparison">
                <div class="field"><label for="borrower-name">Full name (required)</label><input id="borrower-name" autocomplete="name" required></div>
                <div class="field"><label for="project-name">Project or course (required)</label><input id="project-name" aria-label="Equipment return reference" required aria-describedby="project-help"><p id="project-help" class="muted">For example, DMD 3998 field shoot.</p></div>
            </div>
        </section>
        <section class="panel" aria-labelledby="accessories-title">
            <h2 id="accessories-title">Optional Accessories</h2>
            <p>Standard batteries are included with your kit. Add a spare battery for a longer field shoot.</p>
            <button type="button" class="secondary" id="extra-battery" aria-pressed="false">Add a spare battery</button>
            <p id="battery-status" role="status">Standard kit batteries only.</p>
        </section>
        <section class="panel" aria-labelledby="borrowing-title">
            <h2 id="borrowing-title">Borrowing Details</h2>
            <div class="policy-copy">
                <p>Equipment loans support current coursework and student productions, and borrowers should bring their student ID when collecting a kit from the selected desk. Pickup windows are fifteen minutes long; if you arrive after your window, staff may release the reservation to another borrower, so contact the desk before your pickup time if your production schedule changes. Some equipment requires staff approval, and staff will contact you before confirming a request that needs approval.</p>
                <p>Most equipment is due the next business day during desk hours. Weekend borrowing follows a different schedule and must be approved in advance, with the return time confirmed by staff rather than assumed to follow the usual next-business-day arrangement. Lighting kits returned after 3:00 PM may not be available for same-day collection because staff need time to check and recharge them.</p>
                <p>Return the kit to the desk where you collected it, including all batteries, cables, and accessories supplied with the loan. Please tell staff about missing items or equipment problems when you return it, and allow enough time for the return check if you have another pickup scheduled. Your notification email below should match the university email used for your borrower record so that pickup and return messages reach the contact associated with this request.</p>
            </div>
        </section>
        <section class="panel" aria-labelledby="submit-title">
            <h2 id="submit-title">Review and Submit</h2>
            <dl class="review-list"><dt>Equipment</dt><dd id="summary-kit">Not selected</dd><dt>Pickup</dt><dd id="summary-pickup">Choose a location, day, and window</dd><dt>Return</dt><dd>Next business day, unless staff confirms another arrangement</dd></dl>
            <div class="field"><label for="notification-email">Notification email (required)</label><input id="notification-email" type="email" autocomplete="email" required aria-describedby="notification-help"><p id="notification-help" class="muted">Enter the university email used for your borrower record. We’ll send pickup confirmation and return information here.</p></div>
            <button type="submit" id="submit-request">Submit request</button>
            <p id="request-status" class="status" role="status"></p>
        </section>
    </form>
    <section class="panel confirmation" id="confirmation" aria-labelledby="confirmation-title" hidden>
        <h2 id="confirmation-title" tabindex="-1">Request Received</h2>
        <p id="confirmation-summary"></p>
        <p>Bring your student ID. Staff will confirm availability and the pickup window by email. Most equipment is due the next business day.</p>
        <button type="button" class="secondary" id="new-request">Make another request</button>
    </section>
    <script>
        const kitButtons = [...document.querySelectorAll('[data-kit]')];
        const cards = [...document.querySelectorAll('[data-kit-card]')];
        const borrowerForm = document.querySelector('#borrower-form');
        const requestForm = document.querySelector('#request-form');
        const notification = document.querySelector('#notification-email');
        const locationSelect = document.querySelector('#pickup-location');
        const day = document.querySelector('#pickup-day');
        const time = document.querySelector('#pickup-time');
        const holdLine = document.querySelector('#hold-line');
        const requestStatus = document.querySelector('#request-status');
        let borrowerEmail = '';
        let selectedKit = null;
        let selectedName = '';
        let deadline = null;
        let holdInterval;
        let confirmed = false;
        let extraBattery = false;
        const batteryButton = document.querySelector('#extra-battery');
        batteryButton.addEventListener('pointerup', () => {
            extraBattery = !extraBattery;
            batteryButton.setAttribute('aria-pressed', String(extraBattery));
            document.querySelector('#battery-status').textContent = extraBattery ? 'A spare battery is included in your request.' : 'Standard kit batteries only.';
        });
        const updates = ['Media Building desk closes at 5:00 PM', 'Lighting kits returned after 3:00 PM may not be available same-day', 'Weekend pickups require advance approval'];
        let updateIndex = 0;
        setInterval(() => {
            updateIndex = (updateIndex + 1) % updates.length;
            const update = document.querySelector('#desk-update');
            update.textContent = updates[updateIndex];
            update.classList.remove('arriving');
            void update.offsetWidth;
            update.classList.add('arriving');
        }, 6500);
        function updateRequest() {
            kitButtons.forEach(button => button.setAttribute('aria-pressed', String(button.dataset.kit === selectedKit)));
            cards.forEach(card => card.classList.toggle('is-selected', card.dataset.kitCard === selectedKit));
            document.querySelector('#selection-status').textContent = selectedKit ? `${selectedName} added to your request.` : 'No equipment selected. Add a kit to your request.';
            document.querySelector('#summary-kit').textContent = selectedKit ? selectedName : 'Not selected';
            document.querySelector('#summary-pickup').textContent = [locationSelect.value, day.value, time.value].filter(Boolean).join(', ') || 'Choose a location, day, and window';
        }
        function tick() {
            if (deadline === null || confirmed) return;
            const seconds = Math.max(0, Math.ceil((deadline - Date.now()) / 1000));
            document.querySelector('#hold-time').textContent = `${Math.floor(seconds / 60)}:${String(seconds % 60).padStart(2, '0')}`;
            if (seconds === 0) {
                clearInterval(holdInterval);
                deadline = null;
                selectedKit = null;
                selectedName = '';
                holdLine.hidden = true;
                document.querySelector('#hold-status').textContent = 'Your hold expired and the kit has been released. Choose the kit again to continue. Your pickup and borrower details are still here.';
                updateRequest();
            }
        }
        kitButtons.forEach(button => button.addEventListener('click', () => {
            if (confirmed) return;
            tick();
            requestStatus.textContent = '';
            selectedKit = button.dataset.kit;
            selectedName = button.dataset.name;
            if (deadline === null) {
                deadline = Date.now() + 300000;
                clearInterval(holdInterval);
                holdInterval = setInterval(tick, 250);
            }
            holdLine.hidden = false;
            document.querySelector('#held-kit').textContent = selectedName;
            document.querySelector('#hold-status').textContent = '';
            tick();
            updateRequest();
        }));
        document.querySelectorAll('[data-details]').forEach(button => button.addEventListener('click', () => {
            const detail = document.querySelector(`#details-${button.dataset.details}`);
            detail.hidden = !detail.hidden;
            button.setAttribute('aria-expanded', String(!detail.hidden));
        }));
        borrowerForm.addEventListener('submit', event => {
            event.preventDefault();
            requestStatus.textContent = '';
            borrowerEmail = document.querySelector('#borrower-email').value.trim();
            document.querySelector('#borrower-email').value = '';
            borrowerForm.hidden = true;
            document.querySelector('#borrower-status').textContent = 'Borrower record ready for this request.';
            kitButtons[0].focus();
        });
        locationSelect.addEventListener('change', () => {
            updateRequest();
            const pickupHeading = document.querySelector('#pickup-heading');
            pickupHeading.focus();
            pickupHeading.scrollIntoView({ block: 'center', behavior: 'instant' });
        });
        document.querySelector('#change-location').addEventListener('click', () => locationSelect.focus());
        day.addEventListener('change', updateRequest);
        time.addEventListener('change', updateRequest);
        notification.addEventListener('input', () => notification.setCustomValidity(''));
        requestForm.addEventListener('submit', event => {
            event.preventDefault();
            if (confirmed) return;
            tick();
            if (!borrowerEmail) {
                requestStatus.textContent = 'Use your university email to save a borrower record before submitting.';
                document.querySelector('#borrower-email').focus();
                return;
            }
            if (!selectedKit) {
                requestStatus.textContent = 'Add an equipment kit before submitting your request.';
                kitButtons[0].focus();
                return;
            }
            if (notification.value.trim().toLowerCase() !== borrowerEmail.toLowerCase()) {
                notification.setCustomValidity('Enter the same university email used for your borrower record.');
                notification.reportValidity();
                return;
            }
            confirmed = true;
            kitButtons.forEach(button => { button.disabled = true; });
            clearInterval(holdInterval);
            deadline = null;
            holdLine.hidden = true;
            requestForm.hidden = true;
            document.querySelector('#confirmation').hidden = false;
            document.querySelector('#confirmation-summary').textContent = `${selectedName} requested for ${day.value}, ${time.value} at the ${locationSelect.value} desk. Pickup confirmation will be sent to ${notification.value.trim()}.${extraBattery ? ' A spare battery is included.' : ''}`;
            document.querySelector('#confirmation-title').focus();
        });
        document.querySelector('#new-request').addEventListener('click', () => {
            confirmed = false;
            extraBattery = false;
            batteryButton.setAttribute('aria-pressed', 'false');
            document.querySelector('#battery-status').textContent = 'Standard kit batteries only.';
            kitButtons.forEach(button => { button.disabled = false; });
            selectedKit = null;
            selectedName = '';
            borrowerEmail = '';
            deadline = null;
            clearInterval(holdInterval);
            borrowerForm.reset();
            requestForm.reset();
            notification.setCustomValidity('');
            borrowerForm.hidden = false;
            requestForm.hidden = false;
            document.querySelector('#confirmation').hidden = true;
            document.querySelector('#borrower-status').textContent = '';
            document.querySelector('#hold-status').textContent = '';
            requestStatus.textContent = '';
            updateRequest();
            document.querySelector('#borrower-email').focus();
        });
    </script>
</x-module06-demo-layout>
