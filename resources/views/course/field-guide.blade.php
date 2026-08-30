<x-layouts.app title="Field Guide">
    <x-page-heading
        label="Reference"
        title="Field Guide"
        subtitle="A non-linear documentation index for concepts, standards, and methods used across the semester."
    />

    <div class="course-measure mt-8">
        <p class="course-copy">{{ $guide['intro'] }}</p>
    </div>

    <div class="course-flow mt-10">
        @foreach ($guide['categories'] as $category)
            <section class="course-section">
                <h2 class="text-2xl font-semibold tracking-tight text-ink">{{ $category['title'] }}</h2>

                <div class="mt-4 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($category['entries'] as $entry)
                        <x-panel as="article" class="h-full">
                            <div class="course-panel-copy">
                                <x-meta-label>{{ $category['title'] }}</x-meta-label>

                                <h3 class="text-lg font-semibold text-ink">
                                    <a href="{{ route('field-guide.entry', ['entry' => $entry['slug']]) }}" class="inline-flex items-start gap-2 text-ink hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                                        <span>{{ $entry['title'] }}</span>
                                    </a>
                                </h3>

                                <p>{{ $entry['summary'] }}</p>

                                @if (!empty($entry['in_this_course'][0]))
                                    <p class="font-mono text-xs uppercase tracking-[0.14em] text-ink-muted">
                                        {{ $entry['in_this_course'][0]['label'] }}
                                    </p>
                                @endif

                                @if (!empty($entry['status_note']))
                                    <p class="text-sm text-ink-muted">{{ $entry['status_note'] }}</p>
                                @endif
                            </div>
                        </x-panel>
                    @endforeach
                </div>
            </section>
        @endforeach
    </div>
</x-layouts.app>
