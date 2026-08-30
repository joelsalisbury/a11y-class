<x-layouts.app :title="'Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)">
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

        @if (count($module['resources']))
            <x-panel class="lg:col-span-6">
                <x-section-heading title="Resources" description="Readings and references for this module" />
                <div class="mt-4 space-y-2">
                    @foreach ($module['resources'] as $resource)
                        <x-resource-link :href="isset($resource['route']) ? route($resource['route']) : $resource['href']" :meta="$resource['meta'] ?? null">
                            {{ $resource['label'] }}
                        </x-resource-link>
                    @endforeach
                </div>
            </x-panel>
        @endif

        @if ($module['challenge'])
            <x-panel class="lg:col-span-6">
                <x-section-heading title="Class Work" description="Team submissions appear here after the challenge cycle" />
                <div class="mt-4 grid gap-3 sm:grid-cols-3">
                    @foreach ($module['challenge']['class_work'] as $work)
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
        @endif
    </div>
</x-layouts.app>
