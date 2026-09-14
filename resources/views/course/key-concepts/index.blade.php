<x-layouts.app title="{{ $collection['title'] }}">
    <div class="mx-auto max-w-4xl space-y-10 py-10">
        <x-page-heading
            label="Module {{ $module }}"
            title="{{ $collection['title'] }}"
            subtitle="A short sequence of concepts for class discussion."
        />

        <div class="space-y-4">
            @foreach ($collection['concepts'] as $index => $concept)
                <a href="{{ route('modules.key-concepts.show', ['module' => $module, 'slug' => $concept['slug']]) }}" class="block rounded-lg border border-subtle bg-surface-2 p-5 transition hover:border-accent-cyan/60 hover:bg-surface-3 focus-visible:focus-ring">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-xs font-medium uppercase tracking-[0.18em] text-ink-muted">Concept {{ $index + 1 }}</p>
                            <h2 class="mt-2 text-2xl font-semibold text-ink">{{ $concept['title'] }}</h2>
                        </div>
                        <span class="text-sm font-medium text-accent-cyan">Open →</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layouts.app>
