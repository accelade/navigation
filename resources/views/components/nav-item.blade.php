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

    $badgeColors = [
        'primary' => 'bg-primary-100 text-primary-700 dark:bg-primary-900 dark:text-primary-300',
        'success' => 'bg-green-100 text-green-700 dark:bg-green-900 dark:text-green-300',
        'warning' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900 dark:text-yellow-300',
        'danger' => 'bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300',
        'info' => 'bg-blue-100 text-blue-700 dark:bg-blue-900 dark:text-blue-300',
        'gray' => 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-300',
    ];

    $badgeClass = $badgeColors[$badgeColor ?? 'gray'] ?? $badgeColors['gray'];
@endphp

<a
    href="{{ $href }}"
    @if($external) target="_blank" rel="noopener noreferrer" @endif
    {{ $attributes->class([
        'group flex items-center gap-x-3 rounded-lg px-3 py-2 text-sm font-medium transition-colors',
        'bg-gray-100 text-gray-900 dark:bg-gray-800 dark:text-white' => $isActive,
        'text-gray-700 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white' => ! $isActive,
    ]) }}
>
    @if($displayIcon)
        <x-dynamic-component
            :component="$displayIcon"
            @class([
                'h-5 w-5 shrink-0',
                'text-gray-900 dark:text-white' => $isActive,
                'text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-400' => ! $isActive,
            ])
        />
    @endif

    <span class="truncate">{{ $label }}</span>

    @if($badge)
        <span class="ml-auto inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium {{ $badgeClass }}">
            {{ $badge }}
        </span>
    @endif

    @if($external)
        <x-heroicon-m-arrow-top-right-on-square class="ml-auto h-4 w-4 text-gray-400" />
    @endif
</a>
