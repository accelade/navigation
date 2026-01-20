{{-- Sidebar Components Demo --}}
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-purple-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Sidebar Components</h3>
    </div>
    <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
        Build interactive sidebars with <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-navigation::sidebar.*&gt;</code> components.
        Includes collapsible modes, mobile support, and keyboard shortcuts.
    </p>

    <div class="space-y-6">
        <!-- Interactive Sidebar Demo -->
        <div class="rounded-xl p-4 border border-purple-500/30" style="background: rgba(168, 85, 247, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-purple-500/20 text-purple-500 rounded">Sidebar</span>
                Interactive Sidebar
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Click the toggle button to collapse/expand. Try <kbd class="px-1.5 py-0.5 rounded text-xs border border-[var(--docs-border)]" style="background: var(--docs-bg);">Ctrl/Cmd + B</kbd>.
            </p>

            {{-- Sidebar Demo Container --}}
            <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="height: 400px;">
                <x-navigation::sidebar.provider
                    :default-open="true"
                    store="demo-sidebar"
                    class="flex h-full w-full"
                    style="--sidebar-width: 14rem; --sidebar-width-icon: 3.5rem;"
                >
                    {{-- Demo Sidebar --}}
                    <x-navigation::sidebar.sidebar
                        collapsible="icon"
                        desktop-class="flex h-full w-full flex-col border-r"
                        style="background: var(--docs-bg); border-color: var(--docs-border);"
                    >
                        {{-- Header --}}
                        <x-navigation::sidebar.header class="flex items-center gap-2 px-3 py-3 border-b group-data-[collapsible=icon]:justify-center group-data-[collapsible=icon]:px-0" style="border-color: var(--docs-border);">
                            <div class="flex size-8 items-center justify-center rounded-lg bg-purple-500 text-white font-bold text-sm shrink-0">
                                A
                            </div>
                            <span class="font-semibold text-sm group-data-[collapsible=icon]:hidden" style="color: var(--docs-text);">Accelade</span>
                        </x-navigation::sidebar.header>

                        {{-- Content --}}
                        <x-navigation::sidebar.content class="flex-1 overflow-auto px-2 py-3">
                            <x-navigation::sidebar.menu class="space-y-1">
                                <x-navigation::sidebar.menu-item>
                                    <x-navigation::sidebar.menu-button
                                        href="#"
                                        :is-active="true"
                                        tooltip="Dashboard"
                                        class="flex w-full items-center gap-2 rounded-lg px-2.5 py-2 text-sm transition-colors group-data-[collapsible=icon]:justify-center group-data-[collapsible=icon]:px-0"
                                        style="background: rgba(168, 85, 247, 0.15); color: #a855f7;"
                                    >
                                        <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                        </svg>
                                        <span class="truncate group-data-[collapsible=icon]:hidden">Dashboard</span>
                                    </x-navigation::sidebar.menu-button>
                                </x-navigation::sidebar.menu-item>

                                <x-navigation::sidebar.menu-item>
                                    <x-navigation::sidebar.menu-button
                                        href="#"
                                        tooltip="Users"
                                        class="flex w-full items-center gap-2 rounded-lg px-2.5 py-2 text-sm transition-colors hover:bg-purple-500/10 group-data-[collapsible=icon]:justify-center group-data-[collapsible=icon]:px-0"
                                        style="color: var(--docs-text-muted);"
                                    >
                                        <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                        <span class="truncate group-data-[collapsible=icon]:hidden">Users</span>
                                    </x-navigation::sidebar.menu-button>
                                </x-navigation::sidebar.menu-item>

                                <x-navigation::sidebar.menu-item>
                                    <x-navigation::sidebar.menu-button
                                        href="#"
                                        tooltip="Settings"
                                        class="flex w-full items-center gap-2 rounded-lg px-2.5 py-2 text-sm transition-colors hover:bg-purple-500/10 group-data-[collapsible=icon]:justify-center group-data-[collapsible=icon]:px-0"
                                        style="color: var(--docs-text-muted);"
                                    >
                                        <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span class="truncate group-data-[collapsible=icon]:hidden">Settings</span>
                                    </x-navigation::sidebar.menu-button>
                                </x-navigation::sidebar.menu-item>
                            </x-navigation::sidebar.menu>
                        </x-navigation::sidebar.content>

                        {{-- Footer --}}
                        <x-navigation::sidebar.footer class="px-2 py-3 border-t group-data-[collapsible=icon]:px-0" style="border-color: var(--docs-border);">
                            <div class="flex items-center gap-2 px-2.5 py-2 rounded-lg group-data-[collapsible=icon]:justify-center group-data-[collapsible=icon]:px-0" style="background: var(--docs-bg-alt);">
                                <div class="size-7 rounded-full bg-purple-500/20 flex items-center justify-center shrink-0">
                                    <span class="text-xs font-semibold text-purple-500">JD</span>
                                </div>
                                <div class="group-data-[collapsible=icon]:hidden">
                                    <p class="text-xs font-medium" style="color: var(--docs-text);">John Doe</p>
                                    <p class="text-xs" style="color: var(--docs-text-muted);">Admin</p>
                                </div>
                            </div>
                        </x-navigation::sidebar.footer>
                    </x-navigation::sidebar.sidebar>

                    {{-- Main Content --}}
                    <x-navigation::sidebar.inset class="flex-1 flex flex-col" style="background: var(--docs-bg-alt);">
                        <header class="flex items-center gap-3 px-4 py-3 border-b" style="border-color: var(--docs-border); background: var(--docs-bg);">
                            <x-navigation::sidebar.trigger>
                                <button class="p-2 rounded-lg hover:bg-purple-500/10 transition-colors" style="color: var(--docs-text-muted);">
                                    <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                                    </svg>
                                </button>
                            </x-navigation::sidebar.trigger>
                            <span class="text-sm font-medium" style="color: var(--docs-text);">Dashboard</span>
                        </header>
                        <main class="flex-1 p-4">
                            <div class="rounded-lg border border-dashed p-4" style="border-color: var(--docs-border);">
                                <p class="text-sm text-center" style="color: var(--docs-text-muted);">
                                    Main content area. Click the hamburger menu to toggle the sidebar.
                                </p>
                            </div>
                        </main>
                    </x-navigation::sidebar.inset>
                </x-navigation::sidebar.provider>
            </div>
        </div>
    </div>
</section>
