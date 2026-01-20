@props([])

{{-- Sidebar Content - Style-free scrollable area for navigation --}}
<div
    data-slot="sidebar-content"
    data-sidebar="content"
    {{ $attributes }}
>
    {{ $slot }}
</div>
