@props([])

{{-- Sidebar Inset - Style-free main content area next to sidebar --}}
<main
    data-slot="sidebar-inset"
    data-sidebar="inset"
    {{ $attributes }}
>
    {{ $slot }}
</main>
