@props([
    'as' => 'section',
])

@if ($as === 'article')
    <article {{ $attributes->merge(['class' => 'panel']) }}>
        {{ $slot }}
    </article>
@elseif ($as === 'div')
    <div {{ $attributes->merge(['class' => 'panel']) }}>
        {{ $slot }}
    </div>
@else
    <section {{ $attributes->merge(['class' => 'panel']) }}>
        {{ $slot }}
    </section>
@endif
