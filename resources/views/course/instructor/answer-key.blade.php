<x-layouts.app :title="'Instructor Answer Key - Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)">
    <div class="course-measure">
        <x-page-heading
            :label="'Instructor reference · Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)"
            :title="$module['title']"
            :subtitle="!empty($module['challenge_answer_key']) ? 'Challenge ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) . ' research answer key' : (($module['sample_experience']['title'] ?? 'Instructor') . ' answer key')"
        />

        <div class="mt-8 space-y-6">
            <x-callout title="Instructor-only reference">
                This page is intentionally unlinked from the student course navigation. The route is hidden by convention, not protected by authentication.
            </x-callout>

            @if (!empty($module['challenge_answer_key']))
                <section class="space-y-5">
                    <x-section-heading title="Challenge {{ str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) }} answer key" description="Expected research direction for the assigned team lenses." />

                    @foreach ($module['challenge_answer_key'] as $team)
                        <article class="panel space-y-5">
                            <div>
                                <p class="meta-label">{{ $team['team'] }}</p>
                                <h2 class="mt-2 text-xl font-semibold text-ink">{{ $team['lens'] }}</h2>
                            </div>

                            <div class="grid gap-4 text-sm md:grid-cols-2">
                                <div>
                                    <h3 class="font-semibold text-ink">Expected findings</h3>
                                    <ul class="mt-2 list-disc space-y-2 pl-5 leading-7 text-ink-muted">
                                        @foreach ($team['expected_findings'] as $finding)
                                            <li>{{ $finding }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-ink">Authoritative sources</h3>
                                    <ul class="mt-2 list-disc space-y-2 pl-5 leading-7 text-ink-muted">
                                        @foreach ($team['authoritative_sources'] as $source)
                                            <li>{{ $source }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="grid gap-4 border-t border-subtle pt-4 text-sm md:grid-cols-2">
                                <p class="leading-7 text-ink-muted"><strong class="text-ink">Can conclude:</strong> {{ $team['can_conclude'] }}</p>
                                <p class="leading-7 text-ink-muted"><strong class="text-ink">Cannot conclude:</strong> {{ $team['cannot_conclude'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </section>
            @endif

            @if (empty($module['challenge_answer_key']) && !empty($module['sample_experience']['answer_key']))
                <section class="space-y-5">
                    <x-section-heading title="Sample experience defect key" description="Intentional findings in the Design Futures registration experience." />

                    @foreach ($module['sample_experience']['answer_key'] as $item)
                        <article class="panel space-y-5">
                            <div>
                                <p class="meta-label">{{ $item['lens'] ?? 'Sample experience' }}</p>
                                <h2 class="mt-2 text-xl font-semibold text-ink">{{ $item['issue'] }}</h2>
                            </div>

                            <dl class="grid gap-4 text-sm md:grid-cols-2">
                                <div>
                                    <dt class="font-semibold text-ink">Where it appears</dt>
                                    <dd class="mt-1 leading-7 text-ink-muted">{{ $item['where'] ?? $item['implemented'] ?? '' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold text-ink">How students may find it</dt>
                                    <dd class="mt-1 leading-7 text-ink-muted">{{ $item['discovery'] ?? '' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold text-ink">WCAG concept</dt>
                                    <dd class="mt-1 leading-7 text-ink-muted">{{ $item['likely_sc'] ?? $item['wcag_principle'] ?? '' }}</dd>
                                </div>
                                <div>
                                    <dt class="font-semibold text-ink">Automation / AI</dt>
                                    <dd class="mt-1 leading-7 text-ink-muted">Automation: {{ !empty($item['automation_likely']) ? 'likely' : 'not necessarily' }}. AI: {{ !empty($item['ai_likely']) ? 'likely to suggest' : 'not a substitute for testing' }}.</dd>
                                </div>
                            </dl>

                            <p class="border-t border-subtle pt-4 text-sm leading-7 text-ink-muted"><strong class="text-ink">Remediation direction:</strong> {{ $item['remediation'] ?? '' }}</p>
                        </article>
                    @endforeach
                </section>
            @endif

        </div>
    </div>
</x-layouts.app>
