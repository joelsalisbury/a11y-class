<x-layouts.app :title="'Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)">
    @php
        $classWorkSubmissions = collect($module['challenge']['class_work'] ?? [])->filter(function ($submission) {
            return filled(data_get($submission, 'title'))
                || filled(data_get($submission, 'description'))
                || filled(data_get($submission, 'artifact.url'))
                || filled(data_get($submission, 'artifact'))
                || filled(data_get($submission, 'artifact_url'));
        })->values();
    @endphp

    <div class="module-shell">
        <x-course.module-navigation
            :module="$module"
            currentPage="overview"
            classWorkHref="#module-class-work"
        />

        <div class="module-main">
            <x-page-heading
                :label="'Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)"
                :title="$module['title']"
                :subtitle="$module['central_question'] ?? null"
            />

            @if (!empty($module['overview']))
                <div class="mt-8 max-w-3xl course-copy">
                    <p>{{ $module['overview'] }}</p>
                </div>
            @endif

            <div class="mt-10 space-y-10">
                <section class="space-y-5">
                    <x-section-heading title="Sessions" />

                    @if (count($module['sessions']))
                        <div class="grid gap-6 lg:grid-cols-2">
                            @foreach ($module['sessions'] as $number => $session)
                                <x-panel>
                                    <div class="course-panel-copy">
                                        <x-meta-label>Session {{ str_pad((string) $number, 2, '0', STR_PAD_LEFT) }}</x-meta-label>
                                        <h2 class="mt-2 text-xl font-semibold text-ink">{{ $session['title'] }}</h2>
                                        <p>{{ $session['summary'] ?? $session['overview'] ?? null }}</p>
                                        <a href="{{ route('modules.session', ['module' => $module['number'], 'session' => $number]) }}" class="inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                                            Open Session {{ str_pad((string) $number, 2, '0', STR_PAD_LEFT) }} →
                                        </a>
                                    </div>
                                </x-panel>
                            @endforeach
                        </div>
                    @else
                        <x-panel>
                            <x-meta-label>Sessions</x-meta-label>
                            <p class="mt-3 text-sm text-ink-muted">Session content for this module has not been written yet.</p>
                        </x-panel>
                    @endif
                </section>

                @if (!empty($module['key_concepts']))
                    <section class="space-y-5">
                        <x-section-heading title="Key Concepts" description="Six short concepts to revisit while you work through Module 04." />

                        <div class="grid gap-3 md:grid-cols-2">
                            @foreach ($module['key_concepts'] as $concept)
                                <a href="{{ route('modules.key-concepts.show', ['module' => $module['number'], 'slug' => $concept['slug']]) }}" class="rounded-lg border border-subtle bg-surface-2 p-4 transition hover:border-accent-cyan/60 hover:bg-surface-3 focus-visible:focus-ring">
                                    <p class="text-sm font-semibold text-ink">{{ $concept['title'] }}</p>
                                    <span class="mt-2 inline-flex text-sm font-medium text-accent-cyan">Open concept →</span>
                                </a>
                            @endforeach
                        </div>
                    </section>
                @endif

                @if ($module['challenge'])
                    <section class="space-y-5">
                        <x-section-heading title="Challenge {{ str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) }} — {{ $module['challenge']['title'] }}" />

                        <x-panel>
                            <div class="course-panel-copy">
                                <p>{{ $module['challenge']['summary'] ?? $module['challenge']['scenario'] ?? null }}</p>
                                <a href="{{ route('modules.challenge', $module['number']) }}" class="inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                                    Open Challenge {{ str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) }} →
                                </a>
                            </div>
                        </x-panel>
                    </section>
                @endif

                @if ((int) $module['number'] === 3 && $classWorkSubmissions->isNotEmpty())
                    <section class="max-w-3xl space-y-3">
                        <x-section-heading title="Quiz 1 Study Guides" />

                        <p class="text-sm leading-7 text-ink-muted">Challenge 03 produced three study guides covering the first three modules.</p>

                        <div class="flex flex-col gap-2">
                            @foreach ($classWorkSubmissions as $submission)
                                @php
                                    $artifact = $submission['artifact'] ?? [];

                                    if (is_string($artifact)) {
                                        $artifact = ['url' => $artifact];
                                    }

                                    $artifactUrl = is_array($artifact) ? ($artifact['url'] ?? ($submission['artifact_url'] ?? null)) : null;
                                    $artifactNewTab = (bool) (($artifact['new_tab'] ?? $submission['artifact_new_tab'] ?? false));
                                    $linkLabel = ($submission['team'] ?? 'Team').' Study Guide';
                                @endphp

                                @if ($artifactUrl)
                                    <a href="{{ $artifactUrl }}" @if ($artifactNewTab) target="_blank" rel="noopener noreferrer" @endif class="inline-flex items-start gap-2 rounded-sm text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring">
                                        <span>{{ $linkLabel }}</span>
                                        @if ($artifactNewTab)
                                            <span aria-hidden="true">↗</span>
                                        @endif
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    </section>
                @endif

                @if ($module['challenge'])
                    <x-course.class-work-section
                        id="module-class-work"
                        :submissions="$module['challenge']['class_work']"
                        :title="$module['challenge']['class_work_section_title'] ?? 'Class Work'"
                        :description="$module['challenge']['class_work_section_description'] ?? 'The three Challenge '.str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT).' submissions will be archived here as review material.'"
                        :emptyMessage="$module['challenge']['class_work_empty_message'] ?? 'Team deliverables will appear here after the challenge cycle.'"
                    />
                @endif
            </div>

            <x-course.module-pagination :module="$module" currentPage="overview" />
        </div>
    </div>
</x-layouts.app>
