@props([
    'href',
    'meta' => null,
])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'resource-link']) }}>
    <span>
        <span class="font-medium text-ink">{{ $slot }}</span>
        @if ($meta)
            <span class="block text-sm text-ink-muted">{{ $meta }}</span>
        @endif
    </span>
    <span aria-hidden="true" class="resource-link-arrow">↗</span>
</a>
