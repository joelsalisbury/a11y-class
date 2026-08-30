@props([
    'intro' => null,
    'title' => null,
    'description' => null,
    'href' => null,
    'linkLabel' => null,
])

@php
    $challengeTitle = $title ?? 'Challenge';
    $challengeDescription = $description ?? null;
    $challengeHref = $href ?? '#';
    $challengeLinkLabel = $linkLabel ?: 'Open Challenge →';
@endphp

<div class="rounded-xl border border-subtle bg-surface-2 p-5 md:p-6">
    @if ($intro)
        <p class="course-emphasis">{{ $intro }}</p>
    @endif

    <p class="mt-3 text-xl font-semibold tracking-tight text-ink">{{ $challengeTitle }}</p>

    @if ($challengeDescription)
        <p class="mt-3 text-sm leading-7 text-ink-muted">{{ $challengeDescription }}</p>
    @endif

    <a href="{{ $challengeHref }}" class="mt-4 inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
        {{ $challengeLinkLabel }}
    </a>
</div>