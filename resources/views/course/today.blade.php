<x-layouts.app title="Today">
    <x-page-heading
        :label="'Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT)"
        :title="$module['title']"
        :subtitle="$module['central_question'] ?? null"
    />

    <div class="mt-10 grid gap-6 lg:grid-cols-12">
        <x-panel class="lg:col-span-8 space-y-6">
            <div class="space-y-3">
                <x-meta-label>Current Session</x-meta-label>
                @if ($session)
                    <h2 class="text-2xl font-semibold text-ink">Session {{ str_pad((string) $sessionNumber, 2, '0', STR_PAD_LEFT) }}: {{ $session['title'] }}</h2>
                    <p class="text-ink-muted">{{ $session['overview'] }}</p>
                @else
                    <h2 class="text-2xl font-semibold text-ink">Session content coming soon</h2>
                @endif
            </div>

            @if ($session)
                <a href="{{ route('modules.session', ['module' => $module['number'], 'session' => $sessionNumber]) }}" class="cta-link">
                    Enter current session
                    <span aria-hidden="true">→</span>
                </a>
            @endif
        </x-panel>

        <x-panel class="lg:col-span-4">
            <x-meta-label>Current Challenge</x-meta-label>
            @if ($challenge)
                <h2 class="mt-3 text-xl font-semibold text-ink">{{ $challenge['title'] }}</h2>
                <p class="mt-3 text-sm leading-7 text-ink-muted">{{ $challenge['deliverable'] }}</p>
                <a href="{{ route('modules.challenge', $module['number']) }}" class="mt-5 inline-flex text-sm font-medium text-accent-cyan hover:text-accent-cyan-strong focus-visible:focus-ring rounded-sm">
                    Open challenge brief
                </a>
            @else
                <p class="mt-3 text-sm text-ink-muted">No challenge assigned to the current module yet.</p>
            @endif
        </x-panel>

        <x-panel class="lg:col-span-12">
            <x-meta-label>Useful Resources</x-meta-label>
            <div class="mt-3 space-y-2">
                @forelse ($module['resources'] as $resource)
                    <x-resource-link :href="isset($resource['route']) ? route($resource['route']) : $resource['href']" :meta="$resource['meta'] ?? null">
                        {{ $resource['label'] }}
                    </x-resource-link>
                @empty
                    <x-resource-link href="{{ route('field-guide') }}" meta="Reference index">Field Guide</x-resource-link>
                @endforelse
            </div>
        </x-panel>

        <x-panel class="lg:col-span-12">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <x-meta-label>Recent Class Work</x-meta-label>
                    <h2 class="mt-2 text-xl font-semibold text-ink">Submission archive placeholder</h2>
                </div>
                <x-status-badge status="upcoming" />
            </div>
            <p class="mt-3 text-sm text-ink-muted">
                Team submissions from the current challenge will be archived here for study before quizzes.
            </p>
        </x-panel>
    </div>
</x-layouts.app>
