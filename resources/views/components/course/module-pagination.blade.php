@props([
    'module',
    'currentPage',
    'currentSessionNumber' => null,
])

@php
    $moduleNumber = (int) $module['number'];

    $sequence = [
        [
            'key' => 'overview',
            'label' => 'Module Overview',
            'href' => route('modules.show', ['module' => $moduleNumber]),
        ],
    ];

    foreach ($module['sessions'] ?? [] as $number => $session) {
        $sequence[] = [
            'key' => 'session-'.$number,
            'label' => 'Session '.str_pad((string) $number, 2, '0', STR_PAD_LEFT),
            'href' => route('modules.session', ['module' => $moduleNumber, 'session' => $number]),
        ];
    }

    if (!empty($module['challenge'])) {
        $sequence[] = [
            'key' => 'challenge',
            'label' => 'Challenge '.str_pad((string) $moduleNumber, 2, '0', STR_PAD_LEFT),
            'href' => route('modules.challenge', ['module' => $moduleNumber]),
        ];
    }

    if (!empty($module['resource_collections']) || !empty($module['resources'])) {
        $sequence[] = [
            'key' => 'resources',
            'label' => 'Resources',
            'href' => route('modules.resources', ['module' => $moduleNumber]),
        ];
    }

    $currentKey = match ($currentPage) {
        'session' => 'session-'.(int) $currentSessionNumber,
        'challenge' => 'challenge',
        'resources' => 'resources',
        default => 'overview',
    };

    $currentIndex = 0;

    foreach ($sequence as $index => $item) {
        if ($item['key'] === $currentKey) {
            $currentIndex = $index;
            break;
        }
    }

    $previous = $sequence[$currentIndex - 1] ?? null;
    $next = $sequence[$currentIndex + 1] ?? null;
@endphp

@if ($previous || $next)
    <nav class="module-pagination mt-14" aria-label="Previous and next module content">
        <div class="grid gap-3 sm:grid-cols-2">
            <div>
                @if ($previous)
                    <a href="{{ $previous['href'] }}" class="module-pagination-link">
                        <span class="module-pagination-eyebrow">Previous</span>
                        <span class="module-pagination-title">&larr; {{ $previous['label'] }}</span>
                    </a>
                @endif
            </div>

            <div>
                @if ($next)
                    <a href="{{ $next['href'] }}" class="module-pagination-link text-right">
                        <span class="module-pagination-eyebrow">Next</span>
                        <span class="module-pagination-title">{{ $next['label'] }} &rarr;</span>
                    </a>
                @endif
            </div>
        </div>
    </nav>
@endif