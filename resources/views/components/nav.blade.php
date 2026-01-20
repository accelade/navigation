@props([
    'direction' => 'vertical',
])

{{-- Navigation Container - Style-free, add classes via attributes --}}
<nav
    data-slot="nav"
    data-direction="{{ $direction }}"
    {{ $attributes }}
>
    {{ $slot }}
</nav>
