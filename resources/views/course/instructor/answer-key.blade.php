<x-layouts.app :title="'Instructor Answer Key - Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)">
    <div class="course-measure">
        <x-page-heading
            :label="'Instructor reference · Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)"
            :title="$module['title']"
            subtitle="Campus Study Space Finder answer key"
        />

        <div class="mt-8 space-y-6">
            <x-callout title="Instructor-only reference">
                This page is intentionally unlinked from the student course navigation. The route is hidden by convention, not protected by authentication.
            </x-callout>

            @foreach ($module['sample_experience']['answer_key'] ?? [] as $item)
                <article class="panel space-y-5">
                    <div>
                        <p class="meta-label">{{ $item['lens'] ?? 'Module 02' }}</p>
                        <h2 class="mt-2 text-xl font-semibold text-ink">{{ $item['issue'] }}</h2>
                    </div>

                    <dl class="grid gap-4 text-sm md:grid-cols-2">
                        <div>
                            <dt class="font-semibold text-ink">Where it appears</dt>
                            <dd class="mt-1 leading-7 text-ink-muted">{{ $item['where'] ?? $item['implemented'] ?? '' }}</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-ink">What students may notice</dt>
                            <dd class="mt-1 leading-7 text-ink-muted">{{ $item['initial_notice'] ?? $item['discovery'] ?? '' }}</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-ink">How to test it</dt>
                            <dd class="mt-1 leading-7 text-ink-muted">{{ $item['testing'] ?? '' }}</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-ink">WCAG concept</dt>
                            <dd class="mt-1 leading-7 text-ink-muted">{{ $item['likely_sc'] ?? $item['wcag_principle'] ?? '' }}</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-ink">WAVE may do</dt>
                            <dd class="mt-1 leading-7 text-ink-muted">{{ $item['wave'] ?? '' }}</dd>
                        </div>
                        <div>
                            <dt class="font-semibold text-ink">WAVE cannot establish</dt>
                            <dd class="mt-1 leading-7 text-ink-muted">{{ $item['wave_cannot'] ?? '' }}</dd>
                        </div>
                    </dl>

                    <div class="border-t border-subtle pt-4 text-sm leading-7 text-ink-muted">
                        <strong class="text-ink">Remediation direction:</strong>
                        {{ $item['remediation'] ?? '' }}
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-layouts.app>
