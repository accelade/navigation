@props([])

{{-- Sidebar Menu Sub Item - Style-free wrapper for nested menu buttons --}}
<li
    data-slot="sidebar-menu-sub-item"
    data-sidebar="menu-sub-item"
    {{ $attributes }}
>
    {{ $slot }}
</li>
