@props([
    'label',
    'href' => null,
    'icon' => null,
    'activeIcon' => null,
    'badge' => null,
    'badgeColor' => null,
    'active' => false,
    'external' => false,
])

@php
    $isActive = $active || ($href && request()->fullUrlIs($href . '*'));
    $displayIcon = $isActive && $activeIcon ? $activeIcon : $icon;
@endphp

{{-- Navigation Item - Style-free, add classes via attributes --}}
<x-accelade::link
    href="{{ $href }}"
    :external="$external"
    data-slot="nav-item"
    data-active="{{ $isActive ? 'true' : 'false' }}"
    {{ $attributes }}
>
    @if($displayIcon)
        <x-dynamic-component
            :component="$displayIcon"
            data-slot="nav-item-icon"
        />
    @endif

    <span data-slot="nav-item-label">{{ $label }}</span>

    @if($badge)
        <span data-slot="nav-item-badge" data-color="{{ $badgeColor ?? 'gray' }}">
            {{ $badge }}
        </span>
    @endif

    @if($external)
        <svg data-slot="nav-item-external-icon" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
        </svg>
    @endif
</x-accelade::link>
