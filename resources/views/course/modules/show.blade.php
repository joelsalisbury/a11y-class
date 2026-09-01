<x-layouts.app :title="'Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)">
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

                @if ($module['challenge'])
                    <x-course.class-work-section
                        id="module-class-work"
                        :submissions="$module['challenge']['class_work']"
                        title="Class Work"
                        description="Team deliverables will be archived here after Challenge 01."
                        emptyMessage="Team deliverables will be archived here after Challenge 01."
                    />
                @endif
            </div>

            <x-course.module-pagination :module="$module" currentPage="overview" />
        </div>
    </div>
</x-layouts.app>
