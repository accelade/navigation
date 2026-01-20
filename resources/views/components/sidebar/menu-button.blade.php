@props([
    'as' => 'button',
    'href' => null,
    'isActive' => false,
    'size' => 'default',
    'tooltip' => null,
])

@php
    $tag = $href ? 'a' : $as;

    // Build tooltip configuration - position right for sidebar tooltips
    // Uses onlyWhenCollapsed to only show tooltip when sidebar is in icon mode
    $tooltipConfig = $tooltip ? json_encode([
        'content' => $tooltip,
        'position' => 'right',
        'onlyWhenCollapsed' => true,
    ]) : null;
@endphp

{{-- Sidebar Menu Button - Style-free, add classes via attributes --}}
<{{ $tag }}
    data-slot="sidebar-menu-button"
    data-sidebar="menu-button"
    data-size="{{ $size }}"
    data-active="{{ $isActive ? 'true' : 'false' }}"
    @if($href) href="{{ $href }}" @endif
    @if($tag === 'button') type="button" @endif
    @if($tooltip) data-sidebar-tooltip="{{ $tooltip }}" a-tooltip="{{ $tooltipConfig }}" @endif
    {{ $attributes }}
>
    {{ $slot }}
</{{ $tag }}>
