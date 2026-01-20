@props([])

{{-- Sidebar Menu Item - Style-free wrapper for menu buttons --}}
<li
    data-slot="sidebar-menu-item"
    data-sidebar="menu-item"
    {{ $attributes }}
>
    {{ $slot }}
</li>
