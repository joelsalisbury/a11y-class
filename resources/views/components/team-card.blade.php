@props([
    'team',
    'shape',
    'tone' => 'cyan',
    'description' => null,
    'showShapeLabel' => false,
])

<article {{ $attributes->merge(['class' => 'rounded-lg border border-subtle bg-surface-3 p-4']) }}>
    <x-team-identity :team="$team" :shape="$shape" :tone="$tone" :showShapeLabel="$showShapeLabel" />

    @if ($description || $slot->isNotEmpty())
        <div class="mt-3 text-sm leading-7 text-ink-muted">
            @if ($description)
                <p>{{ $description }}</p>
            @endif

            {{ $slot }}
        </div>
    @endif
</article>