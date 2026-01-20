@props([])

{{-- Sidebar Header - Style-free, add classes via attributes --}}
<div
    data-slot="sidebar-header"
    data-sidebar="header"
    {{ $attributes }}
>
    {{ $slot }}
</div>
