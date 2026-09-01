<x-layouts.app :title="'Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)">
    <div class="module-shell">
        <x-course.module-navigation
            :module="$module"
            currentPage="overview"
            resourcesHref="#module-resources"
            classWorkHref="#module-class-work"
        />

        <div class="module-main">
            <x-page-heading
                :label="'Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)"
                :title="$module['title']"
                :subtitle="$module['central_question'] ?? null"
            />

            <div class="mt-10 grid gap-6 lg:grid-cols-12">
                @if (count($module['sessions']))
                    @foreach ($module['sessions'] as $number => $session)
                        <x-panel class="lg:col-span-6">
                            <div class="course-panel-copy">
                                <x-meta-label>Session {{ str_pad((string) $number, 2, '0', STR_PAD_LEFT) }}</x-meta-label>
                                <h2 class="text-xl font-semibold text-ink">{{ $session['title'] }}</h2>
                                <p>{{ $session['overview'] }}</p>
                                <a href="{{ route('modules.session', ['module' => $module['number'], 'session' => $number]) }}" class="inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                                    Open Session {{ str_pad((string) $number, 2, '0', STR_PAD_LEFT) }}
                                </a>
                            </div>
                        </x-panel>
                    @endforeach
                @else
                    <x-panel class="lg:col-span-12">
                        <x-meta-label>Sessions</x-meta-label>
                        <p class="mt-3 text-sm text-ink-muted">Session content for this module has not been written yet.</p>
                    </x-panel>
                @endif

                @if ($module['challenge'])
                    <x-panel class="lg:col-span-12">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <x-meta-label>Challenge {{ str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) }}</x-meta-label>
                                <h2 class="mt-2 text-2xl font-semibold text-ink">{{ $module['challenge']['title'] }}</h2>
                            </div>
                            <x-status-badge :status="$module['challenge']['status']" />
                        </div>
                        <div class="course-panel-copy mt-3 course-measure">
                            <p>{{ $module['challenge']['scenario'] }}</p>
                            <a href="{{ route('modules.challenge', $module['number']) }}" class="inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                                Open Challenge {{ str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) }} brief
                            </a>
                        </div>
                    </x-panel>
                @endif
            </div>

            <div class="mt-12 space-y-12">
                @if (!empty($module['resource_collections']))
                    <section id="module-resources" class="module-anchor space-y-5">
                        <x-section-heading title="Resources" description="Credible starting points for investigation" />

                        <div class="grid gap-6 xl:grid-cols-2">
                            @foreach ($module['resource_collections'] as $collection)
                                <section class="rounded-xl border border-subtle bg-surface-2 p-5 md:p-6">
                                    <div class="space-y-4">
                                        <div class="space-y-2">
                                            <h3 class="text-lg font-semibold text-ink">{{ $collection['title'] }}</h3>
                                            @if (!empty($collection['description']))
                                                <p class="text-sm leading-7 text-ink-muted">{{ $collection['description'] }}</p>
                                            @endif
                                        </div>

                                        <div class="space-y-2">
                                            @foreach ($collection['resources'] as $resource)
                                                <article @class([
                                                    'rounded-lg border bg-surface-3 p-4',
                                                    'border-accent-cyan/60' => !empty($resource['prominent']),
                                                    'border-accent-violet/50' => !empty($resource['authoritative']),
                                                    'border-subtle' => empty($resource['prominent']) && empty($resource['authoritative']),
                                                ])>
                                                    <p class="font-mono text-xs uppercase tracking-[0.14em] text-ink-muted">{{ $resource['source'] ?? 'Source' }}</p>
                                                    <a href="{{ isset($resource['route']) ? route($resource['route'], $resource['params'] ?? []) : $resource['href'] }}" class="mt-2 inline-flex items-start gap-2 text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                                                        <span>{{ $resource['label'] }}</span>
                                                        <span aria-hidden="true">↗</span>
                                                    </a>
                                                    @if (!empty($resource['description']))
                                                        <p class="mt-2 text-sm leading-7 text-ink-muted">{{ $resource['description'] }}</p>
                                                    @endif
                                                </article>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                            @endforeach
                        </div>
                    </section>
                @elseif (count($module['resources']))
                    <section id="module-resources" class="module-anchor space-y-5">
                        <x-section-heading title="Resources" description="Readings and references for this module" />

                        <div class="grid gap-3 md:grid-cols-2 xl:grid-cols-3">
                            @foreach ($module['resources'] as $resource)
                                <x-resource-link :href="isset($resource['route']) ? route($resource['route'], $resource['params'] ?? []) : $resource['href']" :meta="$resource['meta'] ?? null">
                                    {{ $resource['label'] }}
                                </x-resource-link>
                            @endforeach
                        </div>
                    </section>
                @endif

                @if ($module['challenge'])
                    <x-course.class-work-section
                        id="module-class-work"
                        :submissions="$module['challenge']['class_work']"
                        title="Class Work"
                        description="Permanent archive of team deliverables from the challenge cycle."
                        emptyMessage="Team deliverables will be archived here after Challenge 01."
                    />
                @endif
            </div>

            <x-course.module-pagination :module="$module" currentPage="overview" />
        </div>
    </div>
</x-layouts.app>
