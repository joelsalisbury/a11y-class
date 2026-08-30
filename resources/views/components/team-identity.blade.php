@props([
    'team',
    'shape',
    'tone' => 'cyan',
])

@php
    $toneClasses = [
        'cyan' => 'team-tone-cyan',
        'amber' => 'team-tone-amber',
        'violet' => 'team-tone-violet',
    ];
@endphp

<div {{ $attributes->merge(['class' => 'team-chip ' . ($toneClasses[$tone] ?? $toneClasses['cyan'])]) }}>
    <span class="shape-mark" aria-hidden="true">
        @if ($shape === 'triangle')
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4L20 19H4L12 4Z" stroke="currentColor" stroke-width="1.75" />
            </svg>
        @elseif ($shape === 'circle')
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.75" />
            </svg>
        @else
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="5" y="5" width="14" height="14" stroke="currentColor" stroke-width="1.75" />
            </svg>
        @endif
    </span>

    <div>
        <p class="font-medium text-ink">{{ $team }}</p>
        <p class="text-xs uppercase tracking-[0.14em] text-ink-muted">{{ ucfirst($shape) }}</p>
    </div>
</div>
