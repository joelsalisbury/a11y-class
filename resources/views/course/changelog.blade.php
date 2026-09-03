<x-layouts.app title="Changelog">
    <x-page-heading
        label="Course updates"
        title="Changelog"
        subtitle="Notable updates and corrections to course materials will be recorded here throughout the semester."
    />

    <div class="course-measure mt-8 space-y-6">
        @forelse ($entries as $entry)
            <article class="rounded-xl border border-subtle bg-surface-2/70 p-5 md:p-6">
                <header class="flex flex-col gap-3 md:flex-row md:items-baseline md:justify-between">
                    <div>
                        <p class="meta-label">
                            <time datetime="{{ $entry['date'] }}">{{ \Carbon\Carbon::parse($entry['date'])->format('F j, Y') }}</time>
                        </p>
                        <h2 class="mt-3 text-2xl font-semibold tracking-tight text-ink">{{ $entry['title'] }}</h2>
                    </div>

                    @if (!empty($entry['modules']))
                        <ul class="flex flex-wrap gap-2 text-sm text-ink-muted" aria-label="Affected modules">
                            @foreach ($entry['modules'] as $module)
                                <li class="rounded-full border border-subtle px-2.5 py-1">{{ $module }}</li>
                            @endforeach
                        </ul>
                    @endif
                </header>

                <div class="mt-4 course-copy">
                    <p>{{ $entry['description'] }}</p>
                </div>
            </article>
        @empty
            <p class="course-copy">No updates have been recorded yet.</p>
        @endforelse
    </div>
</x-layouts.app>
