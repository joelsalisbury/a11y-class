<x-layouts.app :title="'Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) . ' Resources'">
    <div class="module-shell">
        <x-course.module-navigation
            :module="$module"
            currentPage="resources"
        />

        <div class="module-main">
            <x-page-heading
                :label="'Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)"
                title="Resources"
                :subtitle="$module['central_question'] ?? null"
            />

            <div class="mt-10 space-y-10">
                @if (!empty($module['resource_collections']))
                    <section id="module-resources" class="course-section module-anchor">
                        <x-section-heading title="Resources" description="Credible starting points for investigation." />

                        <div class="space-y-8">
                            @foreach ($module['resource_collections'] as $collection)
                                <section class="space-y-4">
                                    <div class="space-y-2">
                                        <h3 class="text-lg font-semibold text-ink">{{ $collection['title'] }}</h3>
                                        @if (!empty($collection['description']))
                                            <p class="text-sm leading-7 text-ink-muted">{{ $collection['description'] }}</p>
                                        @endif
                                    </div>

                                    <div class="grid gap-3 md:grid-cols-2 xl:grid-cols-3">
                                        @foreach ($collection['resources'] as $resource)
                                            <x-resource-link :href="isset($resource['route']) ? route($resource['route'], $resource['params'] ?? []) : $resource['href']" :meta="$resource['source'] ?? $resource['meta'] ?? null">
                                                {{ $resource['label'] }}
                                            </x-resource-link>
                                        @endforeach
                                    </div>
                                </section>
                            @endforeach
                        </div>
                    </section>
                @elseif (!empty($module['resources']))
                    <section id="module-resources" class="course-section module-anchor">
                        <x-section-heading title="Resources" description="Readings and references for this module." />

                        <div class="grid gap-3 md:grid-cols-2 xl:grid-cols-3">
                            @foreach ($module['resources'] as $resource)
                                <x-resource-link :href="isset($resource['route']) ? route($resource['route'], $resource['params'] ?? []) : $resource['href']" :meta="$resource['meta'] ?? null">
                                    {{ $resource['label'] }}
                                </x-resource-link>
                            @endforeach
                        </div>
                    </section>
                @else
                    <x-panel>
                        <x-meta-label>Resources</x-meta-label>
                        <p class="mt-3 text-sm text-ink-muted">Resources for this module will be added here.</p>
                    </x-panel>
                @endif
            </div>

            <x-course.module-pagination :module="$module" currentPage="resources" />
        </div>
    </div>
</x-layouts.app>
