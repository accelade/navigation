@props([
    'as' => 'a',
    'href' => null,
    'isActive' => false,
    'size' => 'sm', // sm, md
])

@php
    $tag = $href ? 'a' : $as;
@endphp

{{-- Sidebar Menu Sub Button - Style-free nested menu button --}}
<{{ $tag }}
    data-slot="sidebar-menu-sub-button"
    data-sidebar="menu-sub-button"
    data-size="{{ $size }}"
    data-active="{{ $isActive ? 'true' : 'false' }}"
    @if($href) href="{{ $href }}" @endif
    {{ $attributes }}
>
    {{ $slot }}
</{{ $tag }}>
