<x-layouts.app :title="'Challenge ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)">
    <div class="module-shell">
        <x-course.module-navigation
            :module="$module"
            currentPage="challenge"
            resourcesHref="#challenge-resources"
            classWorkHref="#challenge-class-work"
        />

        <div class="module-main">
            <x-page-heading
                :label="'Challenge ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)"
                :title="$challenge['title']"
                :subtitle="'Central question: ' . ($challenge['question'] ?? $module['central_question'] ?? '')"
            />

            <div class="course-measure mt-10">
                <div class="course-flow">
                    <section id="challenge-problem" class="course-section module-anchor">
                <h2 class="text-2xl font-semibold tracking-tight text-ink">The Problem</h2>
                <div class="course-copy">
                    <p>{{ $challenge['problem'] ?? $challenge['scenario'] }}</p>
                </div>
            </section>

            @if (!empty($challenge['experience_under_review']))
                <section id="challenge-experience-under-review" class="course-section module-anchor">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">{{ $challenge['experience_under_review']['title'] }}</h2>
                    <div class="course-copy">
                        <p>{{ $challenge['experience_under_review']['name'] }}</p>
                        <p>
                            <a href="{{ isset($challenge['experience_under_review']['link']['route']) ? route($challenge['experience_under_review']['link']['route']) : $challenge['experience_under_review']['link']['href'] }}" @if (!empty($challenge['experience_under_review']['link']['new_tab'])) target="_blank" rel="noopener noreferrer" @endif class="inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                                {{ $challenge['experience_under_review']['link']['label'] }}
                            </a>
                        </p>
                    </div>
                    </section>
            @endif
                </div>
            </div>

            <div class="mt-8 grid gap-6 lg:grid-cols-12">
                <section id="challenge-team" class="module-anchor lg:col-span-12">
                    <x-panel>
                        <x-section-heading title="Your Team" />
                        <div class="mt-5 grid gap-4 md:grid-cols-3">
                            @foreach ($challenge['teams'] as $team)
                                <article class="rounded-lg border border-subtle bg-surface-3 p-4">
                                    <x-team-identity :team="$team['team']" :shape="$team['shape']" :tone="$team['tone']" :showShapeLabel="false" />
                                    <p class="mt-3 text-sm text-ink-muted"><strong class="text-ink">{{ $team['lens'] }}:</strong> {{ $team['description'] }}</p>

                                    @if (!empty($team['questions']))
                                        <ul class="mt-3 list-disc space-y-1.5 pl-5 text-sm text-ink-muted marker:text-ink">
                                            @foreach ($team['questions'] as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </article>
                            @endforeach
                        </div>
                    </x-panel>
                </section>

                <section id="challenge-deliverable" class="module-anchor lg:col-span-12">
                    <x-panel>
                        <x-meta-label>Expected Deliverable</x-meta-label>
                        <div class="course-panel-copy mt-3">
                            @if (is_array($challenge['deliverable']))
                                <p>{{ $challenge['deliverable']['summary'] }}</p>

                                @if (!empty($challenge['deliverable']['items']))
                                    <ul>
                                        @foreach ($challenge['deliverable']['items'] as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                @if (!empty($challenge['deliverable']['note']))
                                    <p>{{ $challenge['deliverable']['note'] }}</p>
                                @endif
                            @else
                                <p>{{ $challenge['deliverable'] }}</p>
                            @endif
                        </div>
                    </x-panel>
                </section>

        @if (!empty($challenge['format_note']))
            <section id="challenge-format" class="module-anchor lg:col-span-12">
                <x-panel>
                    <x-section-heading title="Format" />
                    <div class="course-panel-copy mt-3">
                        <p>{{ $challenge['format_note'] }}</p>
                    </div>
                </x-panel>
            </section>
        @endif

                <section id="challenge-evaluation" class="module-anchor lg:col-span-6">
                    <x-panel>
                        <x-section-heading title="Evaluation" />
                        <div class="course-panel-copy mt-3">
                            @if (!empty($challenge['evaluation_total']))
                                <p class="course-emphasis">{{ $challenge['evaluation_total'] }} points</p>
                            @endif

                            <ul>
                                @foreach ($challenge['evaluation_criteria'] as $criterion)
                                    @if (is_array($criterion))
                                        <li>
                                            <strong class="text-ink">{{ $criterion['title'] }} - {{ $criterion['points'] }} points</strong>
                                            <p>{{ $criterion['description'] }}</p>
                                        </li>
                                    @else
                                        <li>{{ $criterion }}</li>
                                    @endif
                                @endforeach
                            </ul>

                            @if (!empty($challenge['due']))
                                <p class="course-emphasis">{{ $challenge['due'] }}</p>
                            @endif
                        </div>
                    </x-panel>
                </section>

                <section id="challenge-ai" class="module-anchor lg:col-span-6">
                    <x-panel>
                        <x-section-heading title="AI" />
                        <div class="course-panel-copy mt-3">
                            <p class="course-emphasis">{{ $challenge['ai_note']['title'] ?? 'AI output is not evidence.' }}</p>
                            <p>{{ $challenge['ai_note']['body'] ?? '' }}</p>
                        </div>
                    </x-panel>
                </section>
            </div>

            <div class="mt-10 space-y-12">
                <section id="challenge-resources" class="module-anchor space-y-5">
                    <x-section-heading title="Resources" description="Readings and references for this challenge" />

                    <div class="grid gap-3 md:grid-cols-2 xl:grid-cols-3">
                        @foreach ($challenge['resources'] as $resource)
                            <x-resource-link :href="isset($resource['route']) ? route($resource['route']) : $resource['href']" :meta="$resource['meta'] ?? null">
                                {{ $resource['label'] }}
                            </x-resource-link>
                        @endforeach
                    </div>
                </section>

                <x-course.class-work-section
                    id="challenge-class-work"
                    :submissions="$challenge['class_work']"
                    title="Class Work"
                    description="Permanent archive of team deliverables from the challenge cycle."
                    emptyMessage="Team deliverables will be archived here after Challenge 01."
                />
            </div>

            <x-course.module-pagination :module="$module" currentPage="challenge" />
        </div>
    </div>
</x-layouts.app>
