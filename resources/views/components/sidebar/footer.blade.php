@props([])

{{-- Sidebar Footer - Style-free, add classes via attributes --}}
<div
    data-slot="sidebar-footer"
    data-sidebar="footer"
    {{ $attributes }}
>
    {{ $slot }}
</div>
