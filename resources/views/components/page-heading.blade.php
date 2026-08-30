@props([
    'label' => null,
    'title',
    'subtitle' => null,
])

<header class="max-w-4xl space-y-4">
    @if ($label)
        <x-meta-label>{{ $label }}</x-meta-label>
    @endif

    <h1 class="text-balance text-4xl font-semibold tracking-tight text-ink md:text-5xl">
        {{ $title }}
    </h1>

    @if ($subtitle)
        <p class="max-w-3xl text-lg leading-8 text-ink-muted">
            {{ $subtitle }}
        </p>
    @endif
</header>
