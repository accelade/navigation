@props([
    'as' => 'span',
])

{{-- Sidebar Trigger - Style-free toggle button for sidebar --}}
<{{ $as }}
    data-slot="sidebar-trigger"
    data-sidebar="trigger"
    @click="$toggle(window.innerWidth < 768 ? 'sidebarMobileOpen' : 'sidebarOpen')"
    {{ $attributes }}
>
    {{ $slot }}
</{{ $as }}>
