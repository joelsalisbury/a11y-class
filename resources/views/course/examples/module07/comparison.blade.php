<div class="overflow-x-auto">
    <table class="w-full border-collapse text-left text-base">
        <caption class="mb-3 text-left text-ink-muted">Learning notes — same original Studio Booking page and state</caption>
        <thead><tr><th scope="col" class="border-b border-subtle p-3">Question</th><th scope="col" class="border-b border-subtle p-3">WAVE</th><th scope="col" class="border-b border-subtle p-3">Lighthouse</th></tr></thead>
        <tbody>
            @foreach (['What did it identify?', 'What did it ask me to inspect?', 'What did it not establish?'] as $question)
                <tr><th scope="row" class="border-b border-subtle p-3 font-medium">{{ $question }}</th><td class="border-b border-subtle p-3">Your notes</td><td class="border-b border-subtle p-3">Your notes</td></tr>
            @endforeach
        </tbody>
    </table>
</div>
