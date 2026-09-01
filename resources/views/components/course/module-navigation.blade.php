@props([
    'module',
    'currentPage',
    'currentSessionNumber' => null,
    'sectionLinks' => [],
    'resourcesHref' => null,
    'classWorkHref' => null,
    'currentAnchor' => null,
])

@php
    $moduleNumber = (int) ($module['number'] ?? 0);
    $moduleTitle = $module['nav_title'] ?? $module['title'] ?? 'Module';
    $moduleNumberLabel = 'Module '.str_pad((string) $moduleNumber, 2, '0', STR_PAD_LEFT);

    $resourcesLink = $resourcesHref ?: route('modules.resources', ['module' => $moduleNumber]);
    $classWorkLink = $classWorkHref ?: route('modules.show', ['module' => $moduleNumber]).'#module-class-work';

    $items = [
        [
            'label' => 'Overview',
            'href' => route('modules.show', ['module' => $moduleNumber]),
            'active' => $currentPage === 'overview',
        ],
    ];

    foreach ($module['sessions'] ?? [] as $number => $session) {
        $items[] = [
            'label' => 'Session '.str_pad((string) $number, 2, '0', STR_PAD_LEFT),
            'href' => route('modules.session', ['module' => $moduleNumber, 'session' => $number]),
            'active' => $currentPage === 'session' && (int) $currentSessionNumber === (int) $number,
        ];
    }

    if (!empty($module['challenge'])) {
        $items[] = [
            'label' => 'Challenge '.str_pad((string) $moduleNumber, 2, '0', STR_PAD_LEFT),
            'href' => route('modules.challenge', ['module' => $moduleNumber]),
            'active' => $currentPage === 'challenge',
        ];
    }

    if (!empty($module['resource_collections']) || !empty($module['resources'])) {
        $items[] = [
            'label' => 'Resources',
            'href' => $resourcesLink,
            'active' => $currentPage === 'resources' || $currentAnchor === 'resources',
        ];
    }

@endphp

<aside class="module-nav-shell" aria-label="Module navigation">
    <div class="module-nav-mobile lg:hidden">
        <details class="module-nav-disclosure">
            <summary class="module-nav-summary">
                <span>
                    <span class="meta-label">{{ $moduleNumberLabel }} navigation</span>
                    <span class="mt-1 block text-sm font-medium text-ink">{{ $moduleTitle }}</span>
                </span>
                <span class="text-xs uppercase tracking-[0.14em] text-ink-muted">Open</span>
            </summary>

            <nav class="module-nav-list-wrap" aria-label="Module sections">
                <ul class="module-nav-list">
                    @foreach ($items as $item)
                        <li>
                            <a
                                href="{{ $item['href'] }}"
                                @if ($item['active']) aria-current="page" @endif
                                class="module-nav-link {{ $item['active'] ? 'is-active' : '' }}"
                            >
                                <span>{{ $item['label'] }}</span>
                                @if ($item['active'])
                                    <span class="module-nav-current-mark">Current</span>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>

                @if (!empty($sectionLinks))
                    <div class="mt-5 border-t border-subtle pt-4">
                        <p class="meta-label">This session</p>
                        <ul class="mt-3 space-y-1.5">
                            @foreach ($sectionLinks as $section)
                                <li>
                                    <a href="#{{ $section['id'] }}" data-session-nav-link class="module-nav-sublink">
                                        {{ $section['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </nav>
        </details>
    </div>

    <div class="module-nav-rail hidden lg:block">
        <div class="module-nav-rail-panel">
            <p class="meta-label">{{ $moduleNumberLabel }}</p>
            <p class="mt-2 text-base font-semibold text-ink">{{ $moduleTitle }}</p>

            <nav class="module-nav-list-wrap mt-5" aria-label="Module sections">
                <ul class="module-nav-list">
                    @foreach ($items as $item)
                        <li>
                            <a
                                href="{{ $item['href'] }}"
                                @if ($item['active']) aria-current="page" @endif
                                class="module-nav-link {{ $item['active'] ? 'is-active' : '' }}"
                            >
                                <span>{{ $item['label'] }}</span>
                                @if ($item['active'])
                                    <span class="module-nav-current-mark">Current</span>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>

                @if (!empty($sectionLinks))
                    <div class="mt-6 border-t border-subtle pt-4">
                        <p class="meta-label">This session</p>
                        <ul class="mt-3 space-y-1.5">
                            @foreach ($sectionLinks as $section)
                                <li>
                                    <a href="#{{ $section['id'] }}" data-session-nav-link class="module-nav-sublink">
                                        {{ $section['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </nav>
        </div>
    </div>
</aside>