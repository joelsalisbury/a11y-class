@php
    $copy = match ($reason) {
        'closed' => [
            'heading' => 'Joining isn\'t open right now.',
            'body' => 'Team join links are only active during class. Check back when your instructor opens joining.',
        ],
        'full' => [
            'heading' => 'All team spots have been assigned.',
            'body' => 'Please see Joel.',
        ],
        default => [
            'heading' => 'That join link isn\'t valid.',
            'body' => 'Double-check the QR code or link from class and try again.',
        ],
    };
@endphp

<x-layouts.app title="Join">
    <div class="mx-auto max-w-xl text-center">
        <x-meta-label>Join</x-meta-label>

        <h1 class="mt-4 text-3xl font-semibold tracking-tight text-ink md:text-4xl">
            {{ $copy['heading'] }}
        </h1>

        <p class="mt-4 text-lg leading-8 text-ink-muted">
            {{ $copy['body'] }}
        </p>
    </div>
</x-layouts.app>
