@props([
    'as' => 'div',
])

{{-- Sidebar Group Label - Style-free label for navigation groups --}}
<{{ $as }}
    data-slot="sidebar-group-label"
    data-sidebar="group-label"
    {{ $attributes }}
>
    {{ $slot }}
</{{ $as }}>
