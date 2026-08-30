<x-layouts.app title="Your Team">
    <div class="mx-auto max-w-xl">
        <x-meta-label>Your Team</x-meta-label>

        <div class="team-reveal-panel team-tone-{{ $team->tone() }} mt-4">
            <span class="team-reveal-symbol" aria-hidden="true">{{ $team->symbol() }}</span>

            <h1 class="team-reveal-name">
                {{ $team->label() }}
            </h1>

            <p class="mt-4 text-xl font-medium text-ink-muted">
                {{ $team->tagline() }}
            </p>
        </div>

        <p class="mt-8 text-center text-sm leading-7 text-ink-muted">
            Your browser will remember this assignment. You do not need to enter your name.
        </p>
    </div>
</x-layouts.app>
