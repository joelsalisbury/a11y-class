<x-layouts.app title="Field Guide">
    <x-page-heading
        label="Reference"
        title="Field Guide"
        subtitle="A documentation-style index of concepts, methods, and tools used throughout the course."
    />

    @php
        $entries = [
            'Accessibility',
            'Disability & Inclusive Design',
            'WCAG',
            'POUR',
            'Law & Policy',
            'Visual Design',
            'Alternative Text',
            'Audio, Video & Captions',
            'Keyboard',
            'Forms',
            'Screen Readers',
            'Semantic HTML',
            'Cognitive Accessibility',
            'AI & Accessibility',
            'Testing Tools',
        ];
    @endphp

    <div class="mt-10 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
        @foreach ($entries as $entry)
            <x-panel as="article" class="h-full">
                <div class="course-panel-copy">
                    <x-meta-label>Reference Entry</x-meta-label>
                    <h2 class="text-lg font-semibold text-ink">{{ $entry }}</h2>
                    <p>Placeholder summary text for scope, key terms, and recommended references.</p>
                    <a href="#" class="inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                        Open entry
                    </a>
                </div>
            </x-panel>
        @endforeach
    </div>
</x-layouts.app>
