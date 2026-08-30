@props([
    'submission' => [],
])

@php
    $team = $submission['team'] ?? 'Team';
    $shape = $submission['shape'] ?? 'circle';
    $tone = $submission['tone'] ?? 'cyan';
    $title = $submission['title'] ?? null;
    $description = $submission['description'] ?? null;
    $instructorNote = $submission['instructor_note'] ?? null;
    $date = $submission['date'] ?? null;
    $challengeLabel = $submission['challenge_label'] ?? null;

    $artifact = $submission['artifact'] ?? null;

    if (is_string($artifact)) {
        $artifact = ['url' => $artifact];
    }

    $artifact = is_array($artifact) ? $artifact : [];

    $artifactUrl = $artifact['url'] ?? ($submission['artifact_url'] ?? null);
    $artifactLabel = $artifact['label'] ?? ($submission['artifact_label'] ?? null);
    $artifactType = $artifact['type'] ?? ($submission['artifact_type'] ?? null);
    $artifactNewTab = (bool) ($artifact['new_tab'] ?? $submission['artifact_new_tab'] ?? false);
    $artifactExternal = (bool) ($artifact['external'] ?? $submission['artifact_external'] ?? false);
    $artifactGlyph = ($artifactNewTab || $artifactExternal) ? '↗' : '→';

    if (! $artifactLabel) {
        $artifactLabel = $title ? 'Open '.$team.' '.$title : 'Open artifact for '.$team;
    }

    $heading = $title ?: 'Archived submission';
    $headingId = Illuminate\Support\Str::slug($team.'-'.$heading);
@endphp

<article {{ $attributes->merge(['class' => 'flex h-full flex-col rounded-xl border border-subtle bg-surface-2 p-5 md:p-6']) }} aria-labelledby="{{ $headingId }}">
    <div class="flex items-start justify-between gap-4">
        <x-team-identity :team="$team" :shape="$shape" :tone="$tone" />

        @if ($challengeLabel || $date)
            <div class="shrink-0 text-right">
                @if ($challengeLabel)
                    <p class="meta-label">{{ $challengeLabel }}</p>
                @endif

                @if ($date)
                    <p class="mt-1 font-mono text-xs uppercase tracking-[0.14em] text-ink-muted">{{ $date }}</p>
                @endif
            </div>
        @endif
    </div>

    <h3 id="{{ $headingId }}" class="mt-5 text-xl font-semibold tracking-tight text-ink">{{ $heading }}</h3>

    @if ($description)
        <p class="mt-3 text-sm leading-7 text-ink-muted">{{ $description }}</p>
    @endif

    @if ($artifactUrl)
        <div class="mt-4 space-y-2">
            @if ($artifactType)
                <p class="meta-label">{{ $artifactType }}</p>
            @endif

            <a href="{{ $artifactUrl }}" @if ($artifactNewTab || $artifactExternal) target="_blank" rel="noopener noreferrer" @endif class="inline-flex items-start gap-2 text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                <span>{{ $artifactLabel }}</span>
                <span aria-hidden="true">{{ $artifactGlyph }}</span>
            </a>
        </div>
    @endif

    @if ($instructorNote)
        <div class="mt-5 rounded-xl border border-subtle bg-surface-3/70 p-4">
            <p class="meta-label">What to notice</p>
            <p class="mt-2 text-sm leading-7 text-ink-muted">{{ $instructorNote }}</p>
        </div>
    @endif
</article>
