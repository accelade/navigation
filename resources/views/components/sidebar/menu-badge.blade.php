@props([])

{{-- Sidebar Menu Badge - Style-free badge for menu items --}}
<div
    data-slot="sidebar-menu-badge"
    data-sidebar="menu-badge"
    {{ $attributes }}
>
    {{ $slot }}
</div>
