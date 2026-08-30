@props([
    'module',
    'title',
    'status' => 'upcoming',
    'href' => null,
    'summary' => null,
])

@php
    $wrapperClass = $href ? 'module-card group' : 'module-card';
@endphp

<article {{ $attributes->merge(['class' => $wrapperClass]) }}>
    <div class="flex items-center justify-between gap-3">
        <x-meta-label>Module {{ str_pad((string) $module, 2, '0', STR_PAD_LEFT) }}</x-meta-label>
        <x-status-badge :status="$status" />
    </div>

    <h3 class="mt-4 text-xl font-semibold tracking-tight text-ink">{{ $title }}</h3>

    @if ($summary)
        <p class="mt-3 text-sm leading-7 text-ink-muted">{{ $summary }}</p>
    @endif

    @if ($href)
        <a href="{{ $href }}" class="module-card-link">
            Open module overview
            <span aria-hidden="true">→</span>
        </a>
    @endif
</article>
