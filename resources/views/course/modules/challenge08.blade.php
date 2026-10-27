<x-layouts.app title="Challenge 08">
    <div class="module-shell">
        <x-course.module-navigation :module="$module" currentPage="challenge" />
        <div class="module-main">
            <x-page-heading label="Challenge 08" :title="$challenge['title']" :subtitle="$challenge['question']" />
            <div class="course-measure course-flow">
                <div class="course-copy">
                    <p class="course-emphasis">{{ $challenge['metadata'] }}</p>
                    <p>{{ $challenge['introduction'] }}</p>
                    <p><a href="{{ $challenge['href'] }}" class="inline-flex items-center gap-2 rounded-md border border-slate-300 bg-slate-100 px-4 py-2 font-semibold text-slate-900 no-underline transition hover:border-slate-400 hover:bg-slate-200 hover:text-slate-950 focus-visible:focus-ring">Visit a11yphant <span aria-hidden="true">↗</span></a></p>
                    <p class="course-emphasis">{{ $challenge['due'] }}</p>
                </div>
                <section class="course-section">
                    <x-section-heading title="Required a11yphant work" />
                    <div class="course-copy">
                        <p class="course-emphasis">{{ $challenge['required_work'] }}</p>
                        <p><a href="{{ $challenge['challenges_href'] }}" class="rounded-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring">Browse all a11yphant challenges →</a></p>
                    </div>
                </section>
                <section class="course-section">
                    <x-section-heading title="Submit one short PDF through HuskyCT" />
                    <div class="course-copy">
                        <ul>
                            @foreach ($challenge['deliverable'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                        <p>{{ $challenge['evidence_note'] }}</p>
                    </div>
                </section>
                <section class="course-section">
                    <x-section-heading title="Scoring" :description="'Total: '.$challenge['evaluation_total'].' points.'" />
                    <div class="course-copy">
                        @foreach ($challenge['evaluation_criteria'] as $criterion)
                            <h3>{{ $criterion['title'] }} · {{ $criterion['points'] }} {{ $criterion['points'] === 1 ? 'point' : 'points' }}</h3>
                            <p>{{ $criterion['description'] }}</p>
                        @endforeach
                    </div>
                </section>
            </div>
            <x-course.module-pagination :module="$module" currentPage="challenge" />
        </div>
    </div>
</x-layouts.app>
