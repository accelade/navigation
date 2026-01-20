@props([])

{{-- Sidebar Group Content - Style-free container for group items --}}
<div
    data-slot="sidebar-group-content"
    data-sidebar="group-content"
    {{ $attributes }}
>
    {{ $slot }}
</div>
