<x-layouts.app title="Media Lab">
    <div class="mx-auto max-w-6xl space-y-8 py-10">
        <x-page-heading
            label="Module {{ $module['number'] }}"
            title="Media Lab"
            subtitle="A small set of real media items for discussion and Challenge 03."
        />

        <div class="rounded-xl border border-subtle bg-surface-2 p-5 text-sm leading-7 text-ink-muted">
            <p><strong class="text-ink">Prompt:</strong> What information or function would someone lose if they could not perceive each item as presented?</p>
        </div>

        <div class="grid gap-6 lg:grid-cols-2">
            @foreach ($items as $item)
                <article class="rounded-xl border border-subtle bg-surface-2 p-4 md:p-5">
                    <div class="mb-3 flex items-center justify-between gap-3">
                        <h2 class="text-xl font-semibold text-ink">{{ $item['title'] }}</h2>
                        @if (!empty($item['type']))
                            <span class="rounded-full border border-subtle bg-surface-3 px-2 py-1 text-[10px] font-medium uppercase tracking-[0.18em] text-ink-muted">{{ $item['type'] }}</span>
                        @endif
                    </div>

                    @if (($item['kind'] ?? null) === 'image' && !empty($item['src']))
                        <img src="{{ $item['src'] }}" alt="{{ $item['alt'] ?? '' }}" class="w-full rounded-lg border border-subtle bg-surface-3" />
                    @endif

                    @if (($item['kind'] ?? null) === 'chart' && !empty($item['svg']))
                        {!! $item['svg'] !!}
                    @endif

                    @if (($item['kind'] ?? null) === 'audio' && !empty($item['src']))
                        <audio controls class="w-full mt-3">
                            <source src="{{ $item['src'] }}" type="{{ $item['mime'] ?? 'audio/mpeg' }}">
                            Your browser does not support the audio element.
                        </audio>
                    @endif

                    @if (($item['kind'] ?? null) === 'video' && !empty($item['src']))
                        <video controls class="mt-3 w-full rounded-lg border border-subtle bg-surface-3">
                            <source src="{{ $item['src'] }}" type="{{ $item['mime'] ?? 'video/mp4' }}">
                            Your browser does not support the video element.
                        </video>
                    @endif

                    @if (($item['kind'] ?? null) === 'link' && !empty($item['src']))
                        <a href="{{ $item['src'] }}" target="_blank" rel="noreferrer" class="mt-3 inline-flex text-sm font-semibold text-accent underline decoration-accent/40 underline-offset-4 hover:decoration-accent">
                            Open resource
                        </a>
                    @endif

                    @if (!empty($item['context']))
                        <p class="mt-4 text-sm leading-7 text-ink-muted">{{ $item['context'] }}</p>
                    @endif

                    @if (!empty($item['source']))
                        <p class="mt-3 text-xs uppercase tracking-[0.12em] text-ink-muted">Source</p>
                        <p class="mt-1 text-sm leading-7 text-ink-muted">{{ $item['source'] }}</p>
                    @endif
                </article>
            @endforeach
        </div>
    </div>
</x-layouts.app>
