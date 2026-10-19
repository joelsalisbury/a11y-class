@php
    $revised = request()->query('version') === 'revised';
    $slide = filter_var(request()->query('slide'), FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 9]]);
    $returnHref = route('modules.session', ['module' => 7, 'session' => 14]).($slide ? '#slide-'.$slide : '');
@endphp
<x-module06-demo-layout title="Studio Booking" :returnHref="$returnHref" returnLabel="Return to Session 14">
    <header>
        <p class="muted">Campus Media Studio · Fictional course sample{{ $revised ? ' · Revised version' : '' }}</p>
        <h1>Book your studio time</h1>
        <p>A quiet space for your next recording. Choose a time, check availability, and reserve a session.</p>
    </header>
    <img src="{{ asset('images/gearshare-field.svg') }}" alt="" width="640" height="360" style="max-width:100%;height:auto;margin-top:1rem;border-radius:1rem">
    <section class="panel" aria-labelledby="booking-title">
        <h2 id="booking-title">Find a session</h2>
        <div class="field">
            <label for="studio-time">Studio time</label>
            <select id="studio-time"><option>Tuesday, 10:00–11:00 AM</option><option>Thursday, 2:00–3:00 PM</option></select>
        </div>
        <button type="button" @if($revised) aria-label="Find available times" @endif onclick="document.getElementById('availability').textContent = 'Available: ' + document.getElementById('studio-time').value">
            <svg aria-hidden="true" focusable="false" width="24" height="24" viewBox="0 0 24 24"><circle cx="10" cy="10" r="6" fill="none" stroke="currentColor" stroke-width="2"/><path d="m15 15 6 6" stroke="currentColor" stroke-width="2"/></svg>
        </button>
        <p id="availability" role="status">Both sessions currently have space.</p>
        <p style="background:#fff;color:{{ $revised ? '#475569' : '#aaaaaa' }};font-size:14px">Your booking includes 15 minutes of setup time.</p>
        @if($revised)
            <button type="button" onclick="document.getElementById('confirmation').textContent = 'Reserved: ' + document.getElementById('studio-time').value">Reserve this time</button>
        @else
            <div role="button" style="display:inline-block;background:#0f172a;color:white;padding:.6rem 1rem;border-radius:.4rem;cursor:pointer;font-weight:600" onclick="document.getElementById('confirmation').textContent = 'Reserved: ' + document.getElementById('studio-time').value">Reserve this time</div>
        @endif
        <p id="confirmation" role="status"></p>
    </section>
    <p>For the studio preparation checklist, <a href="#prepare-title">Click here</a>.</p>
    <section class="panel" aria-labelledby="prepare-title">
        <h2 id="prepare-title">Before you arrive</h2>
        <ul><li>Bring your project files.</li><li>Check in at the media desk.</li><li>Leave the studio ready for the next person.</li></ul>
    </section>
</x-module06-demo-layout>
