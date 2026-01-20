@props([
    'user' => null,
    'avatarUrl' => null,
    'showEmail' => true,
    'showAvatar' => true,
    'showChevron' => true,
    'collapsedTooltip' => null,
    'animation' => 'scale',
])

@php
    $userName = $user?->name ?? 'Guest';
    $userEmail = $user?->email ?? '';
    $isAuthenticated = $user !== null;

    // Generate initials from user name
    $initials = $isAuthenticated
        ? collect(explode(' ', $userName))->map(fn($n) => strtoupper(substr($n, 0, 1)))->take(2)->join('')
        : 'G';

    // Get avatar URL - check for getFilamentAvatarUrl, getAvatarUrl methods, or avatar property
    $avatar = $avatarUrl;
    if (!$avatar && $user) {
        if (method_exists($user, 'getFilamentAvatarUrl')) {
            $avatar = $user->getFilamentAvatarUrl();
        } elseif (method_exists($user, 'getAvatarUrl')) {
            $avatar = $user->getAvatarUrl();
        } elseif (property_exists($user, 'avatar') || isset($user->avatar)) {
            $avatar = $user->avatar;
        }
    }

    // Tooltip for collapsed sidebar
    $tooltip = $collapsedTooltip ?? $userName;
    $tooltipConfig = json_encode([
        'content' => $tooltip,
        'position' => 'right',
        'onlyWhenCollapsed' => true,
    ]);
@endphp

{{-- Sidebar User Menu - Style-free sidebar footer user dropdown component --}}
<x-accelade::toggle :animation="$animation">
    <div
        data-slot="sidebar-user-menu"
        data-sidebar="user-menu"
        data-navigation="sidebar-user-menu"
        data-authenticated="{{ $isAuthenticated ? 'true' : 'false' }}"
        {{ $attributes->merge(['class' => 'relative']) }}
    >
        {{-- Trigger Button --}}
        <button
            type="button"
            @click.prevent="toggle()"
            data-slot="sidebar-user-menu-trigger"
            data-sidebar="user-menu-trigger"
            :data-state="toggled ? 'open' : 'closed'"
            a-tooltip="{{ $tooltipConfig }}"
        >
            @if($trigger ?? false)
                {{ $trigger }}
            @else
                {{-- Default trigger --}}
                {{-- Avatar --}}
                <span data-slot="sidebar-user-menu-avatar" data-sidebar="user-menu-avatar">
                    @if($showAvatar && $avatar)
                        <img src="{{ $avatar }}" alt="{{ $userName }}" />
                    @else
                        {{ $initials }}
                    @endif
                </span>

                {{-- User Info (hidden when collapsed) --}}
                <span data-slot="sidebar-user-menu-info" data-sidebar="user-menu-info" class="group-data-[collapsible=icon]:hidden">
                    <span data-slot="sidebar-user-menu-name">{{ $userName }}</span>
                    @if($showEmail && $userEmail)
                        <span data-slot="sidebar-user-menu-email">{{ $userEmail }}</span>
                    @endif
                </span>

                {{-- Chevron (hidden when collapsed) --}}
                @if($showChevron)
                    <span data-slot="sidebar-user-menu-chevron" class="group-data-[collapsible=icon]:hidden">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                        </svg>
                    </span>
                @endif
            @endif
        </button>

        {{-- Dropdown Panel (opens upward in sidebar footer) --}}
        <div
            a-show="toggled"
            @click.outside="setToggle(false)"
            data-slot="sidebar-user-menu-content"
            data-sidebar="user-menu-content"
            class="absolute bottom-full left-0 right-0 z-50 mb-2"
        >
            {{-- Slot content (user provides fully styled dropdown) --}}
            {{ $slot }}
        </div>
    </div>
</x-accelade::toggle>
