@props([
    'status' => 'upcoming',
])

@php
    $styles = [
        'current' => 'badge badge-current',
        'completed' => 'badge badge-completed',
        'upcoming' => 'badge badge-upcoming',
    ];

    $className = $styles[$status] ?? $styles['upcoming'];
@endphp

<span {{ $attributes->merge(['class' => $className]) }}>
    <span class="badge-dot" aria-hidden="true"></span>
    <span class="sr-only">Status:</span>
    {{ ucfirst($status) }}
</span>
