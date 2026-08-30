@props([
    'submissions' => [],
    'title' => 'Class Work',
    'description' => 'Team submissions appear here after the challenge cycle.',
    'emptyMessage' => 'Team deliverables will appear here after the challenge cycle.',
])

@php
    $visibleSubmissions = collect($submissions)->filter(function ($submission) {
        return filled(data_get($submission, 'title'))
            || filled(data_get($submission, 'description'))
            || filled(data_get($submission, 'artifact.url'))
            || filled(data_get($submission, 'artifact'))
            || filled(data_get($submission, 'artifact_url'));
    })->values();
@endphp

<section {{ $attributes->merge(['class' => 'module-anchor space-y-5']) }}>
    <x-section-heading :title="$title" :description="$description" />

    @if ($visibleSubmissions->isEmpty())
        <div class="space-y-4">
            <p class="course-copy max-w-2xl">{{ $emptyMessage }}</p>

            @if (count($submissions))
                <div class="flex flex-wrap gap-3">
                    @foreach ($submissions as $submission)
                        <x-team-identity :team="$submission['team']" :shape="$submission['shape']" :tone="$submission['tone'] ?? 'cyan'" :showShapeLabel="false" class="shrink-0" />
                    @endforeach
                </div>
            @endif
        </div>
    @else
        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($visibleSubmissions as $submission)
                <x-class-work-card :submission="$submission" />
            @endforeach
        </div>
    @endif
</section>