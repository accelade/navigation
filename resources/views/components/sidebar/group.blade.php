@props([])

{{-- Sidebar Group - Style-free container for grouping menu items --}}
<div
    data-slot="sidebar-group"
    data-sidebar="group"
    {{ $attributes }}
>
    {{ $slot }}
</div>
