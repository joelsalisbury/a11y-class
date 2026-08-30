<x-layouts.app title="Field Guide">
    <x-page-heading
        label="Reference"
        title="Field Guide"
        subtitle="A documentation-style index of concepts, methods, and tools used throughout the course."
    />

    @php
        $entries = [
            ['title' => 'Accessibility'],
            ['title' => 'Disability & Inclusive Design'],
            [
                'title' => 'WCAG',
                'summary' => 'Use WCAG Overview for orientation, then move to Quick Reference and Understanding pages while investigating claims.',
                'link' => 'https://www.w3.org/WAI/standards-guidelines/wcag/',
                'meta' => 'W3C',
            ],
            [
                'title' => 'POUR',
                'summary' => 'Treat POUR as a navigation map for accessibility evidence, not as a memorization list.',
                'link' => 'https://www.w3.org/WAI/WCAG22/quickref/',
                'meta' => 'W3C Quick Reference',
            ],
            [
                'title' => 'Law & Policy',
                'summary' => 'Start with DOJ web accessibility rule guidance and UConn policy sources before using secondary summaries.',
                'link' => 'https://www.ada.gov/resources/2024-03-08-web-rule/',
                'meta' => 'DOJ',
            ],
            ['title' => 'Visual Design'],
            ['title' => 'Alternative Text'],
            ['title' => 'Audio, Video & Captions'],
            ['title' => 'Keyboard'],
            ['title' => 'Forms'],
            ['title' => 'Screen Readers'],
            ['title' => 'Semantic HTML'],
            ['title' => 'Cognitive Accessibility'],
            ['title' => 'AI & Accessibility'],
            ['title' => 'Testing Tools'],
        ];
    @endphp

    <div class="mt-10 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($entries as $entry)
            <x-panel as="article" class="h-full">
                <div class="course-panel-copy">
                    <x-meta-label>Reference Entry</x-meta-label>
                    <h2 class="text-lg font-semibold text-ink">{{ $entry['title'] }}</h2>
                    <p>{{ $entry['summary'] ?? 'Placeholder summary text for scope, key terms, and recommended references.' }}</p>
                    <a href="{{ $entry['link'] ?? '#' }}" class="inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                        Open entry
                    </a>
                    @if (!empty($entry['meta']))
                        <p class="font-mono text-xs uppercase tracking-[0.14em] text-ink-muted">{{ $entry['meta'] }}</p>
                    @endif
                </div>
            </x-panel>
        @endforeach
    </div>
</x-layouts.app>
