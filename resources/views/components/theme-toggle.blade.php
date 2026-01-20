@props([
    'as' => 'button',
    'store' => 'theme',
    'persist' => true,
    'showSystem' => false,
    'animation' => 'fade',
])

@php
    $storageKey = $persist ? 'accelade:' . $store : null;
    $themes = $showSystem ? ['light', 'dark', 'system'] : ['light', 'dark'];
    $defaultTheme = $showSystem ? 'system' : 'light';
@endphp

{{-- Theme Toggle - Style-free component for switching between light/dark/system themes --}}
<x-accelade::data
    :default="['theme' => $defaultTheme]"
    :store="$store"
    :localStorage="$storageKey"
>
    <x-accelade::script>
        // Apply theme function
        function applyTheme(theme) {
            const root = document.documentElement;

            if (theme === 'system') {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                root.classList.toggle('dark', prefersDark);
                root.setAttribute('data-theme', prefersDark ? 'dark' : 'light');
            } else {
                root.classList.toggle('dark', theme === 'dark');
                root.setAttribute('data-theme', theme);
            }
        }

        // Initialize theme on load
        (function() {
            const storageKey = '{{ $storageKey }}';
            let theme = '{{ $defaultTheme }}';

            if (storageKey) {
                const stored = localStorage.getItem(storageKey);
                if (stored) {
                    try {
                        const data = JSON.parse(stored);
                        theme = data.theme || '{{ $defaultTheme }}';
                    } catch (e) {}
                }
            }

            applyTheme(theme);
        })();

        // Watch for theme changes
        $watch('theme', (value) => {
            applyTheme(value);
        });

        // Watch for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
            const currentTheme = $get('theme');
            if (currentTheme === 'system') {
                applyTheme('system');
            }
        });

        // Cycle through themes
        function cycleTheme() {
            const current = $get('theme');
            const themes = {!! json_encode($themes) !!};
            const currentIndex = themes.indexOf(current);
            const nextIndex = (currentIndex + 1) % themes.length;
            $set('theme', themes[nextIndex]);
        }
    </x-accelade::script>

    <{{ $as }}
        data-slot="theme-toggle"
        data-navigation="theme-toggle"
        :data-theme="theme"
        @click.prevent="cycleTheme()"
        {{ $attributes->merge(['type' => $as === 'button' ? 'button' : null]) }}
    >
        @if($slot->isEmpty())
            {{-- Default icons - Light --}}
            <span a-show="theme === 'light'" data-theme-icon="light">
                @if($lightIcon ?? false)
                    {{ $lightIcon }}
                @else
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
                    </svg>
                @endif
            </span>
            {{-- Default icons - Dark --}}
            <span a-show="theme === 'dark'" data-theme-icon="dark">
                @if($darkIcon ?? false)
                    {{ $darkIcon }}
                @else
                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
                    </svg>
                @endif
            </span>
            @if($showSystem)
                {{-- Default icons - System --}}
                <span a-show="theme === 'system'" data-theme-icon="system">
                    @if($systemIcon ?? false)
                        {{ $systemIcon }}
                    @else
                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                        </svg>
                    @endif
                </span>
            @endif
        @else
            {{ $slot }}
        @endif
    </{{ $as }}>
</x-accelade::data>
