@props([])

{{-- Sidebar Menu Sub - Style-free container for nested menu items --}}
<ul
    data-slot="sidebar-menu-sub"
    data-sidebar="menu-sub"
    {{ $attributes }}
>
    {{ $slot }}
</ul>
