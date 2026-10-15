@props(['slides' => [], 'title'])

@if (empty($slides))
    {{ $slot }}
@else
    <div data-session-presentation>
        <div class="mb-6 flex flex-wrap items-center gap-3" data-presentation-controls hidden>
            <button type="button" data-view-all class="rounded-md border border-subtle px-4 py-2 font-medium text-ink hover:bg-surface-3 focus-visible:focus-ring">View all</button>
            <button type="button" data-present hidden class="rounded-md border border-subtle px-4 py-2 font-medium text-ink hover:bg-surface-3 focus-visible:focus-ring">Presentation mode</button>
            <a href="#session-resources" class="rounded-sm text-accent-cyan focus-visible:focus-ring">Full Resources →</a>
        </div>
        <div data-presentation-deck hidden>
            <h1 class="sr-only">{{ $title }}</h1>
            @foreach ($slides as $index => $slide)
                <section id="slide-{{ $index + 1 }}" data-session-slide class="session-slide" aria-labelledby="slide-title-{{ $index + 1 }}" hidden>
                    <h2 id="slide-title-{{ $index + 1 }}" tabindex="-1" class="text-balance text-3xl font-semibold tracking-tight text-ink focus-visible:focus-ring md:text-4xl">{{ $slide['title'] }}</h2>
                    <div class="mt-8 space-y-5 text-lg leading-relaxed text-ink-muted md:text-xl">
                        @foreach ($slide['paragraphs'] ?? [] as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach
                        @if (!empty($slide['example_view']))
                            <div class="presentation-example course-copy">@include($slide['example_view'])</div>
                        @endif
                        @if (!empty($slide['actions']))
                            <div class="flex flex-wrap gap-3">
                                @foreach ($slide['actions'] as $action)
                                    @php
                                        $href = isset($action['route']) ? route($action['route'], $action['params'] ?? []) : $action['href'];
                                        if (!empty($action['new_tab'])) {
                                            [$base, $anchor] = array_pad(explode('#', $href, 2), 2, null);
                                            $href = $base.(str_contains($base, '?') ? '&' : '?').'slide='.($index + 1).($anchor ? '#'.$anchor : '');
                                        }
                                    @endphp
                                    <a href="{{ $href }}" @if (!empty($action['new_tab'])) target="_blank" rel="noopener noreferrer" @endif class="rounded-md border border-subtle bg-surface-2 px-4 py-2 font-medium text-accent-cyan hover:bg-surface-3 focus-visible:focus-ring">{{ $action['label'] }}</a>
                                @endforeach
                            </div>
                        @endif
                        @if (!empty($slide['bullets']))
                            <ul class="list-disc space-y-2 pl-6">
                                @foreach ($slide['bullets'] as $item)<li>{{ $item }}</li>@endforeach
                            </ul>
                        @endif
                        @if (!empty($slide['date_rows']))
                            <dl aria-label="Important dates" class="overflow-hidden rounded-lg border border-subtle bg-surface-2 text-base leading-relaxed md:text-lg">
                                @foreach ($slide['date_rows'] as $row)
                                    <div class="grid gap-1 border-b border-subtle px-4 py-3 last:border-b-0 md:grid-cols-[minmax(8rem,0.8fr)_minmax(0,2fr)] md:gap-4">
                                        <dt class="font-semibold text-accent-cyan">{{ $row['date'] }}</dt>
                                        <dd class="text-ink-muted">{{ $row['details'] }}</dd>
                                    </div>
                                @endforeach
                            </dl>
                        @endif
                        @foreach ($slide['categories'] ?? [] as $category)
                            <h3 class="text-xl font-semibold text-ink md:text-2xl">{{ $category }}</h3>
                        @endforeach
                        @if (!empty($slide['question']))
                            <p class="border-l-2 border-accent-cyan pl-5 text-xl font-semibold text-ink md:text-2xl">{{ $slide['question'] }}</p>
                        @endif
                        @if (!empty($slide['evidence']))
                            <p class="font-semibold text-accent-cyan">{{ $slide['evidence'] }}</p>
                        @endif
                        @if (!empty($slide['safety_note']))
                            <p class="font-semibold text-ink">{{ $slide['safety_note'] }}</p>
                        @endif
                        @if (!empty($slide['note']))
                            <p class="text-base leading-relaxed md:text-lg">{{ $slide['note'] }}</p>
                        @endif
                    </div>
                </section>
            @endforeach
            <div class="mt-8 flex flex-wrap items-center gap-4 border-t border-subtle pt-5">
                <button type="button" data-slide-previous class="rounded-md border border-subtle px-4 py-2 font-medium focus-visible:focus-ring disabled:opacity-40">Previous</button>
                <span data-slide-progress class="font-mono text-sm text-ink-muted"></span>
                <button type="button" data-slide-next class="rounded-md border border-subtle px-4 py-2 font-medium focus-visible:focus-ring disabled:opacity-40">Next</button>
            </div>
            <p class="mt-3 text-sm text-ink-muted">Use Left and Right Arrow keys outside links and controls.</p>
            <p data-slide-announcement role="status" aria-live="polite" aria-atomic="true" class="sr-only"></p>
        </div>
        <div data-session-review>{{ $slot }}</div>
    </div>
@endif
