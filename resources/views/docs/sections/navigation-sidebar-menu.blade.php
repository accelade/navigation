@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="navigation-sidebar-menu" :documentation="$documentation" :hasDemo="$hasDemo">
    <!-- Demo: Sidebar Menu -->
    <section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
        <div class="flex items-center gap-3 mb-2">
            <span class="w-2.5 h-2.5 bg-emerald-500 rounded-full"></span>
            <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Sidebar Menu Components</h3>
        </div>
        <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
            Build navigation menus with menu items, badges, and submenus.
        </p>

        <div class="space-y-6">
            <!-- Basic Menu -->
            <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Basic</span>
                    Menu Items
                </h4>

                <div class="w-64 rounded-lg border border-[var(--docs-border)] overflow-hidden p-2" style="background: var(--docs-bg);">
                    <x-navigation::sidebar.menu class="space-y-1">
                        <x-navigation::sidebar.menu-item>
                            <x-navigation::sidebar.menu-button href="#" :is-active="true" class="flex w-full items-center gap-2 rounded-lg px-2.5 py-2 text-sm" style="background: rgba(16, 185, 129, 0.15); color: #10b981;">
                                <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                <span>Dashboard</span>
                            </x-navigation::sidebar.menu-button>
                        </x-navigation::sidebar.menu-item>
                        <x-navigation::sidebar.menu-item>
                            <x-navigation::sidebar.menu-button href="#" class="flex w-full items-center gap-2 rounded-lg px-2.5 py-2 text-sm hover:bg-emerald-500/10" style="color: var(--docs-text-muted);">
                                <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                <span>Users</span>
                            </x-navigation::sidebar.menu-button>
                        </x-navigation::sidebar.menu-item>
                        <x-navigation::sidebar.menu-item>
                            <x-navigation::sidebar.menu-button href="#" class="flex w-full items-center gap-2 rounded-lg px-2.5 py-2 text-sm hover:bg-emerald-500/10" style="color: var(--docs-text-muted);">
                                <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span>Settings</span>
                            </x-navigation::sidebar.menu-button>
                        </x-navigation::sidebar.menu-item>
                    </x-navigation::sidebar.menu>
                </div>
            </div>

            <!-- With Badges -->
            <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Badges</span>
                    With Badges
                </h4>

                <div class="w-64 rounded-lg border border-[var(--docs-border)] overflow-hidden p-2" style="background: var(--docs-bg);">
                    <x-navigation::sidebar.menu class="space-y-1">
                        <x-navigation::sidebar.menu-item>
                            <x-navigation::sidebar.menu-button href="#" class="flex w-full items-center gap-2 rounded-lg px-2.5 py-2 text-sm hover:bg-amber-500/10" style="color: var(--docs-text-muted);">
                                <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                                <span class="flex-1">Inbox</span>
                                <x-navigation::sidebar.menu-badge class="bg-amber-500 text-white text-xs px-2 py-0.5 rounded-full">24</x-navigation::sidebar.menu-badge>
                            </x-navigation::sidebar.menu-button>
                        </x-navigation::sidebar.menu-item>
                        <x-navigation::sidebar.menu-item>
                            <x-navigation::sidebar.menu-button href="#" class="flex w-full items-center gap-2 rounded-lg px-2.5 py-2 text-sm hover:bg-amber-500/10" style="color: var(--docs-text-muted);">
                                <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                                <span class="flex-1">Notifications</span>
                                <x-navigation::sidebar.menu-badge class="bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">5</x-navigation::sidebar.menu-badge>
                            </x-navigation::sidebar.menu-button>
                        </x-navigation::sidebar.menu-item>
                        <x-navigation::sidebar.menu-item>
                            <x-navigation::sidebar.menu-button href="#" class="flex w-full items-center gap-2 rounded-lg px-2.5 py-2 text-sm hover:bg-amber-500/10" style="color: var(--docs-text-muted);">
                                <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                <span class="flex-1">Tasks</span>
                                <x-navigation::sidebar.menu-badge class="bg-emerald-500 text-white text-xs px-2 py-0.5 rounded-full">New</x-navigation::sidebar.menu-badge>
                            </x-navigation::sidebar.menu-button>
                        </x-navigation::sidebar.menu-item>
                    </x-navigation::sidebar.menu>
                </div>
            </div>

            <!-- Size Variants -->
            <div class="rounded-xl p-4 border border-sky-500/30" style="background: rgba(14, 165, 233, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-sky-500/20 text-sky-500 rounded">Sizes</span>
                    Size Variants
                </h4>

                <div class="flex gap-4 flex-wrap">
                    <div class="w-56 rounded-lg border border-[var(--docs-border)] overflow-hidden p-2" style="background: var(--docs-bg);">
                        <p class="text-xs font-medium mb-2 px-2" style="color: var(--docs-text-muted);">Small</p>
                        <x-navigation::sidebar.menu>
                            <x-navigation::sidebar.menu-item>
                                <x-navigation::sidebar.menu-button href="#" size="sm" class="flex w-full items-center gap-2 rounded px-2 py-1.5 text-xs hover:bg-sky-500/10" style="color: var(--docs-text-muted);">
                                    <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                    <span>Small Item</span>
                                </x-navigation::sidebar.menu-button>
                            </x-navigation::sidebar.menu-item>
                        </x-navigation::sidebar.menu>
                    </div>
                    <div class="w-56 rounded-lg border border-[var(--docs-border)] overflow-hidden p-2" style="background: var(--docs-bg);">
                        <p class="text-xs font-medium mb-2 px-2" style="color: var(--docs-text-muted);">Default</p>
                        <x-navigation::sidebar.menu>
                            <x-navigation::sidebar.menu-item>
                                <x-navigation::sidebar.menu-button href="#" class="flex w-full items-center gap-2 rounded-lg px-2.5 py-2 text-sm hover:bg-sky-500/10" style="color: var(--docs-text-muted);">
                                    <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                    <span>Default Item</span>
                                </x-navigation::sidebar.menu-button>
                            </x-navigation::sidebar.menu-item>
                        </x-navigation::sidebar.menu>
                    </div>
                    <div class="w-56 rounded-lg border border-[var(--docs-border)] overflow-hidden p-2" style="background: var(--docs-bg);">
                        <p class="text-xs font-medium mb-2 px-2" style="color: var(--docs-text-muted);">Large</p>
                        <x-navigation::sidebar.menu>
                            <x-navigation::sidebar.menu-item>
                                <x-navigation::sidebar.menu-button href="#" size="lg" class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-base hover:bg-sky-500/10" style="color: var(--docs-text-muted);">
                                    <svg class="size-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                    <span>Large Item</span>
                                </x-navigation::sidebar.menu-button>
                            </x-navigation::sidebar.menu-item>
                        </x-navigation::sidebar.menu>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-accelade::code-block language="blade" filename="sidebar-menu.blade.php">
&lt;x-navigation::sidebar.menu class="space-y-1"&gt;
    &lt;x-navigation::sidebar.menu-item&gt;
        &lt;x-navigation::sidebar.menu-button href="/dashboard" :is-active="true"&gt;
            &lt;x-heroicon-o-home class="size-5" /&gt;
            &lt;span&gt;Dashboard&lt;/span&gt;
        &lt;/x-navigation::sidebar.menu-button&gt;
    &lt;/x-navigation::sidebar.menu-item&gt;

    &lt;x-navigation::sidebar.menu-item&gt;
        &lt;x-navigation::sidebar.menu-button href="/inbox"&gt;
            &lt;x-heroicon-o-inbox class="size-5" /&gt;
            &lt;span class="flex-1"&gt;Inbox&lt;/span&gt;
            &lt;x-navigation::sidebar.menu-badge&gt;12&lt;/x-navigation::sidebar.menu-badge&gt;
        &lt;/x-navigation::sidebar.menu-button&gt;
    &lt;/x-navigation::sidebar.menu-item&gt;

    &lt;x-navigation::sidebar.menu-item&gt;
        &lt;x-navigation::sidebar.menu-button href="/settings" size="sm"&gt;
            &lt;x-heroicon-o-cog class="size-4" /&gt;
            &lt;span&gt;Settings&lt;/span&gt;
        &lt;/x-navigation::sidebar.menu-button&gt;
    &lt;/x-navigation::sidebar.menu-item&gt;
&lt;/x-navigation::sidebar.menu&gt;
    </x-accelade::code-block>
</x-accelade::layouts.docs>
