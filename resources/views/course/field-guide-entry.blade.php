<x-layouts.app :title="$entry['title']">
    <nav aria-label="Breadcrumb" class="mb-6">
        <ol class="flex flex-wrap items-center gap-2 text-sm text-ink-muted">
            <li>
                <a href="{{ route('field-guide') }}" class="hover:text-ink focus-visible:focus-ring rounded-sm">Field Guide</a>
            </li>
            <li aria-hidden="true">/</li>
            <li>
                <span>{{ $category['title'] }}</span>
            </li>
        </ol>
    </nav>

    <x-page-heading
        :label="$category['title']"
        :title="$entry['title']"
        :subtitle="$entry['summary']"
    />

    <div class="course-measure mt-10">
        <div class="course-flow">
            @if (!empty($entry['overview']))
                <section class="course-section">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Overview</h2>
                    <div class="course-copy">
                        <p>{{ $entry['overview'] }}</p>
                    </div>
                </section>
            @endif

            @if (!empty($entry['why_it_matters']))
                <section class="course-section">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Why It Matters</h2>
                    <div class="course-copy">
                        <p>{{ $entry['why_it_matters'] }}</p>
                    </div>
                </section>
            @endif

            @if (!empty($entry['what_to_look_for']))
                <section class="course-section">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">What to Look For</h2>
                    <div class="course-copy">
                        <ul>
                            @foreach ($entry['what_to_look_for'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            @endif

            @if (!empty($entry['standards_guidance']))
                <section class="course-section">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Standards & Guidance</h2>
                    <div class="course-copy">
                        <ul>
                            @foreach ($entry['standards_guidance'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            @endif

            @if (!empty($entry['authoritative_resources']))
                <section class="course-section">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Authoritative Resources</h2>
                    <div class="mt-4 space-y-2">
                        @foreach ($entry['authoritative_resources'] as $resource)
                            <x-resource-link :href="isset($resource['route']) ? route($resource['route'], $resource['params'] ?? []) : $resource['href']" :meta="$resource['source'] ?? ($resource['meta'] ?? null)">
                                {{ $resource['label'] }}
                            </x-resource-link>
                        @endforeach
                    </div>
                </section>
            @endif

            @if (!empty($entry['in_this_course']))
                <section class="course-section">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">In This Course</h2>
                    <div class="mt-4 space-y-2">
                        @foreach ($entry['in_this_course'] as $item)
                            <x-resource-link :href="isset($item['route']) ? route($item['route'], $item['params'] ?? []) : $item['href']" :meta="$item['meta'] ?? 'Course'">
                                {{ $item['label'] }}
                            </x-resource-link>
                        @endforeach
                    </div>
                </section>
            @endif

            @if (!empty($entry['status_note']) && empty($entry['overview']))
                <x-callout title="Coverage Status">
                    {{ $entry['status_note'] }}
                </x-callout>
            @endif

            @if (!empty($entry['related_entries']))
                <section class="course-section">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Related Entries</h2>
                    <div class="mt-4 flex flex-wrap gap-2">
                        @foreach ($guideCategories as $guideCategory)
                            @foreach ($guideCategory['entries'] as $candidate)
                                @if (in_array($candidate['slug'], $entry['related_entries'], true))
                                    <a
                                        href="{{ route('field-guide.entry', ['entry' => $candidate['slug']]) }}"
                                        class="rounded-full border border-subtle bg-surface-2 px-3 py-1.5 text-sm text-ink-muted hover:border-accent-cyan/50 hover:text-ink focus-visible:focus-ring"
                                    >
                                        {{ $candidate['title'] }}
                                    </a>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </div>

    @if ($previousEntry || $nextEntry)
        <nav class="module-pagination mt-14" aria-label="Field Guide entry navigation">
            <div class="grid gap-3 sm:grid-cols-2">
                <div>
                    @if ($previousEntry)
                        <a href="{{ route('field-guide.entry', ['entry' => $previousEntry['slug']]) }}" class="module-pagination-link">
                            <span class="module-pagination-eyebrow">Previous in {{ $category['title'] }}</span>
                            <span class="module-pagination-title">&larr; {{ $previousEntry['title'] }}</span>
                        </a>
                    @endif
                </div>

                <div>
                    @if ($nextEntry)
                        <a href="{{ route('field-guide.entry', ['entry' => $nextEntry['slug']]) }}" class="module-pagination-link text-right">
                            <span class="module-pagination-eyebrow">Next in {{ $category['title'] }}</span>
                            <span class="module-pagination-title">{{ $nextEntry['title'] }} &rarr;</span>
                        </a>
                    @endif
                </div>
            </div>
        </nav>
    @endif
</x-layouts.app>
