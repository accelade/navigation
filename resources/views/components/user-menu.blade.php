@props([
    'user' => null,
    'avatarUrl' => null,
    'position' => 'bottom-end', // bottom-start, bottom-end, top-start, top-end
    'showEmail' => true,
    'showAvatar' => true,
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

    // Position classes for dropdown
    $positionClasses = match($position) {
        'bottom-start' => 'top-full left-0 mt-2',
        'bottom-end' => 'top-full right-0 mt-2',
        'top-start' => 'bottom-full left-0 mb-2',
        'top-end' => 'bottom-full right-0 mb-2',
        default => 'top-full right-0 mt-2',
    };
@endphp

{{-- User Menu - Style-free header/navbar user dropdown component --}}
<x-accelade::toggle :animation="$animation">
    <div
        data-slot="user-menu"
        data-navigation="user-menu"
        data-authenticated="{{ $isAuthenticated ? 'true' : 'false' }}"
        {{ $attributes->merge(['class' => 'relative']) }}
    >
        {{-- Trigger Button --}}
        <button
            type="button"
            @click.prevent="toggle()"
            data-slot="user-menu-trigger"
            data-navigation="user-menu-trigger"
            :data-state="toggled ? 'open' : 'closed'"
        >
            @if($trigger ?? false)
                {{ $trigger }}
            @else
                {{-- Default trigger: Avatar or Initials --}}
                <span data-slot="user-menu-avatar" data-navigation="user-menu-avatar">
                    @if($showAvatar && $avatar)
                        <img src="{{ $avatar }}" alt="{{ $userName }}" />
                    @else
                        {{ $initials }}
                    @endif
                </span>
            @endif
        </button>

        {{-- Dropdown Panel --}}
        <div
            a-show="toggled"
            @click.outside="setToggle(false)"
            data-slot="user-menu-content"
            data-navigation="user-menu-content"
            class="absolute z-50 {{ $positionClasses }}"
        >
            {{-- Slot content (user provides fully styled dropdown) --}}
            {{ $slot }}
        </div>
    </div>
</x-accelade::toggle>
