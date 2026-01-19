@props([
    'direction' => 'vertical',
    'collapsible' => false,
])

<nav
    {{ $attributes->class([
        'space-y-1' => $direction === 'vertical',
        'flex items-center gap-1' => $direction === 'horizontal',
    ]) }}
    @if($collapsible)
        x-data="{ collapsed: false }"
    @endif
>
    {{ $slot }}
</nav>
