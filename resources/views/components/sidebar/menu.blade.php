@props([])

{{-- Sidebar Menu - Style-free container for menu items --}}
<ul
    data-slot="sidebar-menu"
    data-sidebar="menu"
    {{ $attributes }}
>
    {{ $slot }}
</ul>
