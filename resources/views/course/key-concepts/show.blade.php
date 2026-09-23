<x-layouts.app title="{{ $concept['title'] }}">
    <div class="mx-auto max-w-4xl py-10">
        <div class="mb-8 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-xs font-medium uppercase tracking-[0.2em] text-ink-muted">Module {{ $module }} · Key Concept {{ $conceptIndex }} of {{ $conceptTotal }}</p>
            <a href="{{ route('modules.key-concepts', ['module' => $module]) }}" class="text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring">All Key Concepts</a>
        </div>

        <article class="space-y-8">
            <header class="space-y-4">
                <h1 class="text-4xl font-semibold tracking-tight text-ink md:text-5xl">{{ $concept['title'] }}</h1>
                <p class="max-w-3xl text-xl leading-8 text-ink-muted">{{ $concept['summary'] }}</p>
            </header>

            @if (!empty($concept['emphasis']))
                <p class="text-2xl font-semibold leading-9 text-ink">{{ $concept['emphasis'] }}</p>
            @endif

            @if (!empty($concept['examples']))
                <section class="space-y-3">
                    <h2 class="text-lg font-semibold uppercase tracking-[0.12em] text-ink-muted">Try It</h2>
                    <ul class="list-disc space-y-3 pl-5 text-lg leading-8 text-ink-muted marker:text-ink">
                        @foreach ($concept['examples'] as $example)
                            <li>{{ $example }}</li>
                        @endforeach
                    </ul>
                </section>
            @endif

            @if (!empty($concept['quick_test']))
                <section class="rounded-xl border border-accent-cyan/40 bg-surface-2 p-6 md:p-8">
                    <h2 class="text-lg font-semibold uppercase tracking-[0.12em] text-ink-muted">Quick Test</h2>
                    <p class="mt-4 text-2xl font-semibold leading-9 text-ink">{{ $concept['quick_test'] }}</p>
                </section>
            @endif

            @if (!empty($concept['references']))
                <section class="rounded-xl border border-subtle bg-surface-2 p-6 md:p-8">
                    <h2 class="text-lg font-semibold uppercase tracking-[0.12em] text-ink-muted">Read / Reference</h2>
                    <ul class="mt-5 space-y-5">
                        @foreach ($concept['references'] as $reference)
                            <li class="space-y-2">
                                <p class="text-base font-semibold text-ink">
                                    <a href="{{ $reference['href'] }}" target="_blank" rel="noreferrer" class="text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring">
                                        {{ $reference['label'] }}
                                    </a>
                                </p>
                                <p class="text-base leading-7 text-ink-muted">{{ $reference['description'] }}</p>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endif
        </article>

        <nav class="mt-10 flex flex-col gap-3 border-t border-subtle pt-6 sm:flex-row sm:items-center sm:justify-between" aria-label="Key concept navigation">
            <div class="min-w-0">
                @if ($previousConcept)
                    <a href="{{ route('modules.key-concepts.show', ['module' => $module, 'slug' => $previousConcept['slug']]) }}" class="inline-flex items-center gap-2 text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring" aria-label="Previous concept: {{ $previousConcept['title'] }}">
                        ← Previous Concept
                    </a>
                @endif
            </div>

            <div class="min-w-0">
                @if ($nextConcept)
                    <a href="{{ route('modules.key-concepts.show', ['module' => $module, 'slug' => $nextConcept['slug']]) }}" class="inline-flex items-center gap-2 text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring" aria-label="Next concept: {{ $nextConcept['title'] }}">
                        Next Concept →
                    </a>
                @endif
            </div>
        </nav>
    </div>
</x-layouts.app>
