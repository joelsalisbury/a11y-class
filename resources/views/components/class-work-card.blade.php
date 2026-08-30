@props([
    'team',
    'shape',
    'tone' => 'cyan',
    'title' => null,
    'artifact' => null,
    'description' => null,
    'instructorNote' => null,
    'date' => null,
])

<article {{ $attributes->merge(['class' => 'rounded-lg border border-subtle bg-surface-3 p-4']) }}>
    <x-team-identity :team="$team" :shape="$shape" :tone="$tone" />

    @if ($title || $artifact || $description)
        <div class="mt-4 space-y-2">
            @if ($title)
                <p class="font-medium text-ink">{{ $title }}</p>
            @endif

            @if ($artifact)
                <a href="{{ $artifact }}" class="text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong">View artifact ↗</a>
            @endif

            @if ($description)
                <p class="text-sm leading-7 text-ink-muted">{{ $description }}</p>
            @endif
        </div>
    @else
        <p class="mt-4 text-sm text-ink-muted">No submission archived yet.</p>
    @endif

    @if ($instructorNote)
        <p class="mt-3 text-xs italic text-ink-muted">{{ $instructorNote }}</p>
    @endif

    @if ($date)
        <p class="mt-3 font-mono text-xs uppercase tracking-[0.14em] text-ink-muted">{{ $date }}</p>
    @endif
</article>
