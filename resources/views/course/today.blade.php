<x-layouts.app title="Today">
    @php
        $visibleClassWork = collect($module['challenge']['class_work'] ?? [])->filter(function ($submission) {
            return filled(data_get($submission, 'title'))
                || filled(data_get($submission, 'description'))
                || filled(data_get($submission, 'artifact.url'))
                || filled(data_get($submission, 'artifact'))
                || filled(data_get($submission, 'artifact_url'));
        })->values();
    @endphp

    <div class="max-w-4xl space-y-6">
        <x-page-heading
            label="Course Home"
            title="Accessibility & Inclusion in Interactive Media"
            subtitle="A studio course about designing, evaluating, and improving digital experiences for people with different abilities, technologies, and circumstances. We'll work through real accessibility problems using design, standards, testing, assistive technology, code, policy, and AI."
        />

    </div>

    <div class="mt-10 space-y-10">
        <section>
            <x-section-heading title="Right Now" />

            <div class="mt-6 grid gap-6 lg:grid-cols-3">
                <x-panel>
                    <x-meta-label>Current Module</x-meta-label>
                    <h2 class="mt-3 text-xl font-semibold text-ink">Module {{ str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) }} — {{ $module['title'] }}</h2>
                    @if (!empty($module['central_question']))
                        <p class="mt-3 text-sm font-medium text-ink">{{ $module['central_question'] }}</p>
                    @endif
                    <a href="{{ route('modules.show', ['module' => $module['number']]) }}" class="mt-5 inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                        Open Module {{ str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) }} →
                    </a>
                </x-panel>

                @if ($session)
                    <x-panel>
                        <x-meta-label>Current Session</x-meta-label>
                        <h2 class="mt-3 text-xl font-semibold text-ink">Session {{ str_pad((string) $sessionNumber, 2, '0', STR_PAD_LEFT) }} — {{ $session['title'] }}</h2>
                        <p class="mt-3 text-sm leading-7 text-ink-muted">{{ $session['summary'] ?? $session['overview'] ?? '' }}</p>
                        <a href="{{ route('modules.session', ['module' => $module['number'], 'session' => $sessionNumber]) }}" class="mt-5 inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                            Open Session {{ str_pad((string) $sessionNumber, 2, '0', STR_PAD_LEFT) }} →
                        </a>
                    </x-panel>
                @endif

                @if ($challenge)
                    <x-panel>
                        <x-meta-label>Current Challenge</x-meta-label>
                        <h2 class="mt-3 text-xl font-semibold text-ink">Challenge {{ str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) }} — {{ $challenge['title'] }}</h2>
                        <p class="mt-3 text-sm leading-7 text-ink-muted">{{ $challenge['summary'] ?? $challenge['scenario'] ?? '' }}</p>
                        <a href="{{ route('modules.challenge', $module['number']) }}" class="mt-5 inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                            Open Challenge {{ str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) }} →
                        </a>
                    </x-panel>
                @endif
            </div>
        </section>

        <section>
            <x-section-heading title="Course" />

            <div class="mt-6 grid gap-5 md:grid-cols-2 xl:grid-cols-4">
                <x-panel>
                    <a href="{{ route('modules.index') }}" class="text-lg font-semibold text-ink hover:text-accent-cyan">Modules</a>
                    <p class="mt-3 text-sm leading-7 text-ink-muted">See the course roadmap, current module, and upcoming investigations.</p>
                </x-panel>

                <x-panel>
                    <a href="{{ route('field-guide') }}" class="text-lg font-semibold text-ink hover:text-accent-cyan">Field Guide</a>
                    <p class="mt-3 text-sm leading-7 text-ink-muted">Reference material for accessibility concepts, standards, and terminology.</p>
                </x-panel>

                <x-panel>
                    <a href="{{ route('field-guide.entry', ['entry' => 'toolkit']) }}" class="text-lg font-semibold text-ink hover:text-accent-cyan">Toolkit</a>
                    <p class="mt-3 text-sm leading-7 text-ink-muted">Accessibility testing tools and methods used throughout the course.</p>
                </x-panel>

                <x-panel>
                    <a href="{{ route('syllabus') }}" class="text-lg font-semibold text-ink hover:text-accent-cyan">Syllabus</a>
                    <p class="mt-3 text-sm leading-7 text-ink-muted">Course structure, grading, expectations, policies, and module roadmap.</p>
                </x-panel>
            </div>
        </section>

        @if ($visibleClassWork->isNotEmpty())
            <section>
                <x-section-heading title="Recent Class Work" />

                <div class="mt-6 grid gap-5 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($visibleClassWork->take(3) as $submission)
                        <x-class-work-card :submission="$submission" />
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</x-layouts.app>
