<x-layouts.app :title="'Session ' . str_pad((string) $sessionNumber, 2, '0', STR_PAD_LEFT)">
    @php
        $sessionSections = [];
        $sessionSectionLinks = [];
        $usedSectionIds = [];

        foreach (($session['sections'] ?? []) as $index => $section) {
            $baseId = $section['id'] ?? Illuminate\Support\Str::slug($section['title'] ?? 'section-'.($index + 1));

            if ($baseId === '') {
                $baseId = 'section-'.($index + 1);
            }

            $id = $baseId;
            $suffix = 2;

            while (in_array($id, $usedSectionIds, true)) {
                $id = $baseId.'-'.$suffix;
                $suffix++;
            }

            $usedSectionIds[] = $id;
            $section['id'] = $id;
            $sessionSections[] = $section;

            if (($section['nav'] ?? true) === true) {
                $sessionSectionLinks[] = [
                    'id' => $id,
                    'label' => $section['nav_label'] ?? $section['title'] ?? 'Section '.($index + 1),
                ];
            }
        }
    @endphp

    <div class="module-shell">
        <x-course.module-navigation
            :module="$module"
            currentPage="session"
            :currentSessionNumber="$sessionNumber"
            :sectionLinks="$sessionSectionLinks"
            resourcesHref="#session-resources"
            :classWorkHref="route('modules.show', ['module' => $module['number']]).'#module-class-work'"
        />

        <div class="module-main">
            <x-page-heading
                :label="'Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) . ' · Session ' . str_pad((string) $sessionNumber, 2, '0', STR_PAD_LEFT)"
                :title="$session['title']"
                :subtitle="$session['question'] ?? null"
            />

            <div class="course-measure mt-10">
                <p class="course-copy">{{ $session['overview'] }}</p>

                @if (!empty($sessionSections))
                    <div class="course-flow mt-10">
                        @foreach ($sessionSections as $section)
                            <section id="{{ $section['id'] }}" class="course-section module-anchor">
                                <x-section-heading :title="$section['title']" />

                                <div class="course-copy">
                                    @if (!empty($section['subheading']))
                                        <h3 class="text-lg font-semibold text-ink">{{ $section['subheading'] }}</h3>
                                    @endif

                                    @if (!empty($section['challenge_reference']))
                                        @php
                                            $challengeReference = is_array($section['challenge_reference']) ? $section['challenge_reference'] : [];
                                        @endphp

                                        <x-course.challenge-reference
                                            :intro="$challengeReference['intro'] ?? null"
                                            :title="$challengeReference['title'] ?? ($module['challenge']['title'] ?? null)"
                                            :description="$challengeReference['description'] ?? null"
                                            :href="route('modules.challenge', ['module' => $module['number']])"
                                            :linkLabel="$challengeReference['link_label'] ?? null"
                                        />
                                    @endif

                                    @if (!empty($section['emphasis']))
                                        <div>
                                            @foreach ($section['emphasis'] as $line)
                                                <p class="course-emphasis">{{ $line }}</p>
                                            @endforeach
                                        </div>
                                    @endif

                                    @foreach ($section['paragraphs'] ?? [] as $paragraph)
                                        <p>{{ $paragraph }}</p>
                                    @endforeach

                                    @if (!empty($section['actions']))
                                        <div>
                                            @foreach ($section['actions'] as $action)
                                                <a href="{{ isset($action['route']) ? route($action['route'], $action['params'] ?? []) : $action['href'] }}" @if (!empty($action['new_tab'])) target="_blank" rel="noopener noreferrer" @endif class="inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                                                    {{ $action['label'] }}
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if (!empty($section['placeholder']))
                                        <x-panel class="course-callout space-y-2.5" as="div">
                                            <x-meta-label>{{ $section['placeholder']['title'] }}</x-meta-label>
                                            <p>{{ $section['placeholder']['body'] }}</p>
                                            @if (!empty($section['placeholder']['cta']))
                                                <a href="{{ isset($section['placeholder']['cta']['route']) ? route($section['placeholder']['cta']['route']) : $section['placeholder']['cta']['href'] }}" @if (!empty($section['placeholder']['cta']['new_tab'])) target="_blank" rel="noopener noreferrer" @endif class="inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                                                    {{ $section['placeholder']['cta']['label'] }}
                                                </a>
                                            @endif
                                        </x-panel>
                                    @endif

                                    @if (!empty($section['bullets']))
                                        <ul>
                                            @foreach ($section['bullets'] as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    @foreach ($section['paragraphs_after'] ?? [] as $paragraph)
                                        <p>{{ $paragraph }}</p>
                                    @endforeach

                                    @if (!empty($section['task_title']))
                                        <h3>{{ $section['task_title'] }}</h3>
                                    @endif

                                    @if (!empty($section['ordered']))
                                        <ol>
                                            @foreach ($section['ordered'] as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ol>
                                    @endif

                                    @if (!empty($section['team_panels']))
                                        <div class="course-callout grid gap-4 md:grid-cols-3">
                                            @foreach ($section['team_panels'] as $team)
                                                <article class="rounded-lg border border-subtle bg-surface-3 p-4">
                                                    <x-team-identity :team="$team['team']" :shape="$team['shape']" :tone="$team['tone']" :showShapeLabel="false" />
                                                    <p class="mt-3 text-sm text-ink-muted"><strong class="text-ink">{{ $team['lens'] }}:</strong> {{ $team['description'] }}</p>

                                                    @if (!empty($team['questions']))
                                                        <ul class="mt-3 list-disc space-y-1.5 pl-5 text-sm text-ink-muted marker:text-ink">
                                                            @foreach ($team['questions'] as $question)
                                                                <li>{{ $question }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @endif

                                                    @if (!empty($team['resources']))
                                                        <div class="mt-4 space-y-2">
                                                            @foreach ($team['resources'] as $resource)
                                                                <x-resource-link :href="isset($resource['route']) ? route($resource['route'], $resource['params'] ?? []) : $resource['href']" :meta="$resource['meta'] ?? null">
                                                                    {{ $resource['label'] }}
                                                                </x-resource-link>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </article>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if (!empty($section['note']))
                                        <p class="course-emphasis">{{ $section['note'] }}</p>
                                    @endif

                                    @if (!empty($section['callout']))
                                        <x-callout :title="$section['callout']['title']">
                                            {{ $section['callout']['body'] }}
                                        </x-callout>
                                    @endif
                                </div>
                            </section>
                        @endforeach
                    </div>
                @elseif (!empty($session['run_of_show']))
                    <section id="session-run-of-show" class="course-section module-anchor mt-10">
                        <x-section-heading title="Run of Show" />
                        <div class="course-copy">
                            <ol>
                                @foreach ($session['run_of_show'] as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </section>
                @endif
            </div>

            <div class="mt-8 grid gap-6 lg:grid-cols-12">
                @if (!empty($session['activities']))
                    <x-panel class="lg:col-span-6">
                        <x-section-heading title="Activities" />
                        <ul class="mt-3 space-y-2 text-sm text-ink-muted">
                            @foreach ($session['activities'] as $activity)
                                <li>{{ $activity }}</li>
                            @endforeach
                        </ul>
                    </x-panel>
                @endif

                @if (!empty($session['team_task']))
                    <x-panel class="lg:col-span-6">
                        <x-section-heading title="Team Task" />
                        <p class="mt-3 text-sm leading-7 text-ink-muted">{{ $session['team_task'] }}</p>
                    </x-panel>
                @endif

                @if (!empty($session['resources']))
                    <section id="session-resources" class="module-anchor lg:col-span-12">
                        <x-panel>
                            <x-section-heading title="Resources" />
                            <div class="mt-4 grid gap-3 md:grid-cols-2">
                                @foreach ($session['resources'] as $resource)
                                    <x-resource-link :href="isset($resource['route']) ? route($resource['route']) : $resource['href']" :meta="$resource['meta'] ?? null">
                                        {{ $resource['label'] }}
                                    </x-resource-link>
                                @endforeach
                            </div>
                        </x-panel>
                    </section>
                @endif

                @foreach ($session['callouts'] ?? [] as $callout)
                    <x-callout :title="$callout['title'] ?? 'Note'" class="lg:col-span-12">
                        {{ $callout['body'] }}
                    </x-callout>
                @endforeach
            </div>

            <x-course.module-pagination :module="$module" currentPage="session" :currentSessionNumber="$sessionNumber" />
        </div>
    </div>
</x-layouts.app>
