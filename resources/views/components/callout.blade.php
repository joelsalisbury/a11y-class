@props([
    'title' => 'Note',
])

<aside {{ $attributes->merge(['class' => 'callout']) }}>
    <p class="callout-title">{{ $title }}</p>
    <div class="mt-2 text-sm leading-7 text-ink-muted">
        {{ $slot }}
    </div>
</aside>
