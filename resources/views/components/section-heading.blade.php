@props([
    'title',
    'description' => null,
])

<div class="space-y-2">
    <h2 class="text-2xl font-semibold tracking-tight text-ink">{{ $title }}</h2>

    @if ($description)
        <p class="max-w-3xl text-sm leading-7 text-ink-muted">{{ $description }}</p>
    @endif
</div>
