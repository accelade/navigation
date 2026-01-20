@props([])

{{-- Sidebar Rail - Style-free collapsed sidebar rail (for icon mode) --}}
<button
    data-slot="sidebar-rail"
    data-sidebar="rail"
    aria-label="Toggle Sidebar"
    tabindex="-1"
    @click="$set('sidebarOpen', !$get('sidebarOpen'))"
    {{ $attributes }}
>
    {{ $slot }}
</button>
