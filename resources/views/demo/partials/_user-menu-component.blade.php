{{-- User Menu Component Demo --}}
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-blue-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">User Menu</h3>
    </div>
    <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
        User dropdown menus for headers with
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-navigation::user-menu&gt;</code>.
        Includes avatar, user info, and customizable menu items.
    </p>

    <div class="space-y-6">
        {{-- Header User Menu --}}
        <div class="rounded-xl p-4 border border-blue-500/30" style="background: rgba(59, 130, 246, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-blue-500/20 text-blue-500 rounded">Header</span>
                Header User Menu
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Typical header dropdown with avatar trigger. Click to open.
            </p>

            <div class="flex items-center justify-end p-4 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                @php
                    $demoUser = new class {
                        public string $name = 'John Doe';
                        public string $email = 'john@example.com';
                    };
                @endphp

                <x-navigation::user-menu :user="$demoUser" position="bottom-end">
                    <x-slot:trigger>
                        <span class="flex items-center justify-center size-9 rounded-full bg-blue-500 text-white text-sm font-semibold cursor-pointer hover:ring-2 hover:ring-blue-500/50 transition-all">
                            JD
                        </span>
                    </x-slot:trigger>

                    {{-- Dropdown content --}}
                    <div class="min-w-[12rem] rounded-lg border border-[var(--docs-border)] shadow-lg overflow-hidden" style="background: var(--docs-bg);">
                        <div class="px-3 py-2 border-b border-[var(--docs-border)]">
                            <p class="text-sm font-medium" style="color: var(--docs-text);">John Doe</p>
                            <p class="text-xs" style="color: var(--docs-text-muted);">john@example.com</p>
                        </div>
                        <div class="p-1">
                            <x-navigation::user-menu-item
                                href="#"
                                class="flex items-center gap-2 w-full px-3 py-2 text-sm rounded-md transition-colors hover:bg-blue-500/10"
                                style="color: var(--docs-text);"
                            >
                                <svg class="size-4" style="color: var(--docs-text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Profile
                            </x-navigation::user-menu-item>
                            <x-navigation::user-menu-item
                                href="#"
                                class="flex items-center gap-2 w-full px-3 py-2 text-sm rounded-md transition-colors hover:bg-blue-500/10"
                                style="color: var(--docs-text);"
                            >
                                <svg class="size-4" style="color: var(--docs-text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Settings
                            </x-navigation::user-menu-item>
                        </div>
                        <div class="border-t border-[var(--docs-border)] p-1">
                            <x-navigation::user-menu-item
                                :danger="true"
                                class="flex items-center gap-2 w-full px-3 py-2 text-sm rounded-md transition-colors hover:bg-red-500/10 text-red-500"
                            >
                                <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Sign out
                            </x-navigation::user-menu-item>
                        </div>
                    </div>
                </x-navigation::user-menu>
            </div>
        </div>

        {{-- Sidebar User Menu --}}
        <div class="rounded-xl p-4 border border-blue-500/30" style="background: rgba(59, 130, 246, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-blue-500/20 text-blue-500 rounded">Sidebar</span>
                Sidebar User Menu
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Full-width user menu for sidebar footers. Opens upward.
            </p>

            <div class="w-64 rounded-lg border border-[var(--docs-border)]" style="background: var(--docs-bg);">
                <div class="p-2">
                    <x-navigation::sidebar.user-menu :user="$demoUser">
                        <x-slot:trigger>
                            <div class="flex w-full items-center gap-3 rounded-lg px-3 py-2 cursor-pointer transition-colors hover:bg-blue-500/10">
                                <span class="flex items-center justify-center size-8 rounded-lg bg-blue-500/20 text-blue-500 text-sm font-semibold shrink-0">
                                    JD
                                </span>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium truncate" style="color: var(--docs-text);">John Doe</p>
                                    <p class="text-xs truncate" style="color: var(--docs-text-muted);">john@example.com</p>
                                </div>
                                <svg class="size-4" style="color: var(--docs-text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                </svg>
                            </div>
                        </x-slot:trigger>

                        {{-- Dropdown content --}}
                        <div class="rounded-lg border border-[var(--docs-border)] shadow-lg overflow-hidden" style="background: var(--docs-bg);">
                            <div class="px-3 py-2 border-b border-[var(--docs-border)]">
                                <p class="text-sm font-medium" style="color: var(--docs-text);">John Doe</p>
                                <p class="text-xs" style="color: var(--docs-text-muted);">john@example.com</p>
                            </div>
                            <div class="p-1">
                                <button class="flex items-center gap-2 w-full px-3 py-2 text-sm rounded-md transition-colors hover:bg-blue-500/10" style="color: var(--docs-text);">
                                    <svg class="size-4" style="color: var(--docs-text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Profile
                                </button>
                                <button class="flex items-center gap-2 w-full px-3 py-2 text-sm rounded-md transition-colors hover:bg-red-500/10 text-red-500">
                                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Sign out
                                </button>
                            </div>
                        </div>
                    </x-navigation::sidebar.user-menu>
                </div>
            </div>
        </div>
    </div>
</section>
