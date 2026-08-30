<x-layouts.app :title="'Challenge ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)">
    <div class="module-shell">
        <x-course.module-navigation
            :module="$module"
            currentPage="challenge"
            resourcesHref="#challenge-resources"
        />

        <div class="module-main">
            <x-page-heading
                :label="'Challenge ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)"
                :title="$challenge['title']"
                :subtitle="'Central question: ' . ($challenge['question'] ?? $module['central_question'] ?? '')"
            />

            <div class="course-flow mt-10">
                <section id="challenge-problem" class="course-section module-anchor">
                    <x-section-heading title="The Problem" />
                    <div class="course-copy">
                        <p>A client asks:</p>
                        <p class="course-emphasis">“Is our digital experience accessible?”</p>
                        <p>That question cannot be answered responsibly without understanding what accessible means and whose requirements or standards are being applied.</p>
                        <p>Each team will investigate one source of authority and contribute one part of the class's eventual answer.</p>
                    </div>
                </section>

                @if (!empty($challenge['experience_under_review']))
                    <section id="challenge-experience-under-review" class="course-section module-anchor">
                        <x-section-heading title="Experience Under Review" />
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

                <section id="challenge-team-assignments" class="course-section module-anchor">
                    <x-section-heading title="Team Assignments" description="All three team assignments are visible below so you can see the full challenge structure." />

                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
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
                </section>

                <section id="challenge-deliverable" class="course-section module-anchor">
                    <x-section-heading title="Deliverable" description="Create one concise team brief, roughly 1-2 pages or equivalent, designed so your classmates can use it later as study material." />

                    <p class="course-emphasis">No slide deck or formal presentation is required.</p>

                    <div class="grid gap-4 lg:grid-cols-2">
                        <section class="rounded-lg border border-subtle bg-surface-3 p-4">
                            <h3 class="text-lg font-semibold text-ink">Explain the Lens</h3>
                            <p class="mt-2 text-sm leading-7 text-ink-muted">Explain your assigned perspective in plain English for someone encountering it for the first time.</p>
                        </section>

                        <section class="rounded-lg border border-subtle bg-surface-3 p-4">
                            <h3 class="text-lg font-semibold text-ink">3-5 Key Findings</h3>
                            <p class="mt-2 text-sm leading-7 text-ink-muted">Identify the most important things the rest of the class should understand.</p>
                        </section>

                        <section class="rounded-lg border border-subtle bg-surface-3 p-4">
                            <h3 class="text-lg font-semibold text-ink">Evidence</h3>
                            <p class="mt-2 text-sm leading-7 text-ink-muted">Link directly to authoritative sources supporting important claims.</p>
                        </section>

                        <section class="rounded-lg border border-subtle bg-surface-3 p-4">
                            <h3 class="text-lg font-semibold text-ink">Apply It</h3>
                            <p class="mt-2 text-sm leading-7 text-ink-muted">Explain how your findings affect the evaluation of the Design Futures registration experience.</p>
                        </section>

                        <section class="rounded-lg border border-subtle bg-surface-3 p-4">
                            <h3 class="text-lg font-semibold text-ink">What We Still Don't Know</h3>
                            <p class="mt-2 text-sm leading-7 text-ink-muted">Identify something your assigned lens cannot establish by itself.</p>
                        </section>

                        <section class="rounded-lg border border-subtle bg-surface-3 p-4">
                            <h3 class="text-lg font-semibold text-ink">AI Use Note</h3>
                            <p class="mt-2 text-sm leading-7 text-ink-muted">Identify any generative AI tools used and briefly explain how they contributed.</p>
                        </section>
                    </div>
                </section>

                <section id="challenge-resources" class="course-section module-anchor">
                    <x-section-heading title="Starting Resources" description="These sources are intended to help you begin. They are not a complete reading list and they do not contain every answer your team may need." />

                    <div class="space-y-8">
                        @foreach (($challenge['starting_resources'] ?? []) as $group)
                            <section class="space-y-4">
                                <div class="space-y-2">
                                    <h3 class="text-lg font-semibold text-ink">{{ $group['title'] }}</h3>
                                    @if (!empty($group['description']))
                                        <p class="text-sm leading-7 text-ink-muted">{{ $group['description'] }}</p>
                                    @endif
                                </div>

                                <div class="grid gap-3 md:grid-cols-2 xl:grid-cols-3">
                                    @foreach ($group['resources'] as $resource)
                                        <x-resource-link :href="isset($resource['route']) ? route($resource['route']) : $resource['href']" :meta="$resource['source'] ?? $resource['meta'] ?? null">
                                            {{ $resource['label'] }}
                                        </x-resource-link>
                                    @endforeach
                                </div>
                            </section>
                        @endforeach
                    </div>
                </section>

                <section id="challenge-ai" class="course-section module-anchor">
                    <x-section-heading title="AI Use" />
                    <div class="course-copy">
                        <p class="course-emphasis">AI output is not evidence.</p>
                        <p>AI may help your team get oriented, interpret difficult material, organize ideas, or test possible answers. Important claims must still be verified against authoritative sources or direct testing.</p>
                    </div>
                </section>

                <section id="challenge-evaluation" class="course-section module-anchor">
                    <x-section-heading title="Evaluation" description="The challenge is worth 10 points." />

                    <div class="course-copy">
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
                    </div>
                </section>

                <section id="challenge-due" class="course-section module-anchor">
                    <x-section-heading title="Due" />

                    <div class="course-copy">
                        @if (!empty($challenge['due']))
                            <p class="course-emphasis">{{ $challenge['due'] }}</p>
                        @endif

                        <p>The official submission deadline and assignment submission are in HuskyCT/Blackboard.</p>
                    </div>
                </section>
            </div>

            <x-course.module-pagination :module="$module" currentPage="challenge" />
        </div>
    </div>
</x-layouts.app>
