<x-layouts.app :title="'Session ' . str_pad((string) $sessionNumber, 2, '0', STR_PAD_LEFT)">
    <x-page-heading
        :label="'Module ' . str_pad((string) $module['number'], 2, '0', STR_PAD_LEFT) . ' · Session ' . str_pad((string) $sessionNumber, 2, '0', STR_PAD_LEFT)"
        :title="$session['title']"
        :subtitle="$session['question'] ?? null"
    />

    <div class="mt-10 max-w-3xl space-y-8">
        <p class="text-sm leading-7 text-ink-muted">{{ $session['overview'] }}</p>

        @if (!empty($session['run_of_show']))
            <div class="space-y-3">
                <x-section-heading title="Run of Show" />
                <ol class="list-decimal space-y-2 pl-5 text-sm text-ink-muted marker:text-ink">
                    @foreach ($session['run_of_show'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ol>
            </div>
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
            <x-panel class="lg:col-span-12">
                <x-section-heading title="Resources" />
                <div class="mt-4 grid gap-3 md:grid-cols-2">
                    @foreach ($session['resources'] as $resource)
                        <x-resource-link :href="isset($resource['route']) ? route($resource['route']) : $resource['href']" :meta="$resource['meta'] ?? null">
                            {{ $resource['label'] }}
                        </x-resource-link>
                    @endforeach
                </div>
            </x-panel>
        @endif

        @foreach ($session['callouts'] ?? [] as $callout)
            <x-callout :title="$callout['title'] ?? 'Note'" class="lg:col-span-12">
                {{ $callout['body'] }}
            </x-callout>
        @endforeach
    </div>
</x-layouts.app>
