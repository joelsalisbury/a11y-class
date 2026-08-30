@props(['href', 'active' => false])

@php
    $baseClasses = 'nav-link';
    $activeClasses = $active ? ' is-active' : '';
@endphp

<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => $baseClasses . $activeClasses]) }}
    @if ($active) aria-current="page" @endif
>
    {{ $slot }}
</a>
