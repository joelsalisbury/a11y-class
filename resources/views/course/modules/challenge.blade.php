<x-layouts.app :title="'Challenge ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)">
    <x-page-heading
        :label="'Challenge ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)"
        :title="$challenge['title']"
        :subtitle="'Central question: ' . ($challenge['question'] ?? $module['central_question'] ?? '')"
    />

    <div class="course-measure mt-10">
        <div class="course-flow">
            <section class="course-section">
                <h2 class="text-2xl font-semibold tracking-tight text-ink">Shared Scenario</h2>
                <div class="course-copy">
                    <p>{{ $challenge['scenario'] }}</p>
                </div>
            </section>

            @if (!empty($challenge['shared_requirements']))
                <section class="course-section">
                    <h2 class="text-2xl font-semibold tracking-tight text-ink">Shared Requirements</h2>
                    <div class="course-copy">
                        <ol>
                            @foreach ($challenge['shared_requirements'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ol>
                        @if (!empty($challenge['shared_requirements_note']))
                            <x-callout title="Reminder">
                                {{ $challenge['shared_requirements_note'] }}
                            </x-callout>
                        @endif
                    </div>
                </section>
            @endif
        </div>
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-12">
        <x-panel class="lg:col-span-12">
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

        <x-panel class="lg:col-span-12">
            <x-section-heading title="Team Assignments" description="Color and shape are paired to ensure identity is never communicated by color alone." />
            <div class="mt-5 grid gap-4 md:grid-cols-3">
                @foreach ($challenge['teams'] as $team)
                    <article class="rounded-lg border border-subtle bg-surface-3 p-4">
                        <x-team-identity :team="$team['team']" :shape="$team['shape']" :tone="$team['tone']" />
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

        <x-panel class="lg:col-span-6">
            <x-section-heading title="Evaluation Criteria" />
            <div class="course-panel-copy mt-3">
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

        <x-panel class="lg:col-span-6">
            <x-section-heading title="Resources" />
            <div class="mt-4 space-y-2">
                @foreach ($challenge['resources'] as $resource)
                    <x-resource-link :href="isset($resource['route']) ? route($resource['route']) : $resource['href']" :meta="$resource['meta'] ?? null">
                        {{ $resource['label'] }}
                    </x-resource-link>
                @endforeach
            </div>
        </x-panel>

        <x-panel class="lg:col-span-12">
            <div class="flex items-center justify-between gap-4">
                <x-section-heading title="Class Work" description="Team submissions appear here after the challenge cycle. Public standings are intentionally not part of this course site." />
                <x-status-badge status="upcoming" />
            </div>
            <div class="mt-5 grid gap-3 md:grid-cols-3">
                @foreach ($challenge['class_work'] as $work)
                    <x-class-work-card
                        :team="$work['team']"
                        :shape="$work['shape']"
                        :tone="$work['tone']"
                        :title="$work['title'] ?? null"
                        :artifact="$work['artifact'] ?? null"
                        :description="$work['description'] ?? null"
                        :instructorNote="$work['instructor_note'] ?? null"
                        :date="$work['date'] ?? null"
                    />
                @endforeach
            </div>
        </x-panel>
    </div>
</x-layouts.app>
