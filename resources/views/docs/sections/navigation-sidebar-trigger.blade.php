@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="navigation-sidebar-trigger" :documentation="$documentation" :hasDemo="$hasDemo">
    <!-- Demo: Sidebar Trigger -->
    <section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
        <div class="flex items-center gap-3 mb-2">
            <span class="w-2.5 h-2.5 bg-rose-500 rounded-full"></span>
            <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Sidebar Trigger</h3>
        </div>
        <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
            Toggle buttons for controlling sidebar state on mobile and desktop.
        </p>

        <div class="space-y-6">
            <!-- Basic Trigger -->
            <div class="rounded-xl p-4 border border-rose-500/30" style="background: rgba(244, 63, 94, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-rose-500/20 text-rose-500 rounded">Basic</span>
                    Toggle Button
                </h4>

                <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="height: 280px;">
                    <x-navigation::sidebar.provider
                        :default-open="true"
                        store="trigger-demo"
                        class="flex h-full w-full"
                        style="--sidebar-width: 12rem; --sidebar-width-icon: 3rem;"
                    >
                        <x-navigation::sidebar.sidebar
                            collapsible="icon"
                            desktop-class="flex h-full w-full flex-col border-r"
                            style="background: var(--docs-bg); border-color: var(--docs-border);"
                        >
                            <x-navigation::sidebar.header class="flex items-center justify-between px-3 py-3 border-b" style="border-color: var(--docs-border);">
                                <span class="font-semibold text-sm group-data-[collapsible=icon]:hidden" style="color: var(--docs-text);">Menu</span>
                                <x-navigation::sidebar.trigger>
                                    <button class="p-1.5 rounded hover:bg-rose-500/10 transition-colors hidden md:block" style="color: var(--docs-text-muted);">
                                        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/></svg>
                                    </button>
                                </x-navigation::sidebar.trigger>
                            </x-navigation::sidebar.header>

                            <x-navigation::sidebar.content class="flex-1 overflow-auto px-2 py-3">
                                <x-navigation::sidebar.menu class="space-y-1">
                                    <x-navigation::sidebar.menu-item>
                                        <x-navigation::sidebar.menu-button href="#" class="flex w-full items-center gap-2 rounded-lg px-2.5 py-2 text-sm hover:bg-rose-500/10 group-data-[collapsible=icon]:justify-center" style="color: var(--docs-text-muted);">
                                            <svg class="size-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                            <span class="group-data-[collapsible=icon]:hidden">Home</span>
                                        </x-navigation::sidebar.menu-button>
                                    </x-navigation::sidebar.menu-item>
                                </x-navigation::sidebar.menu>
                            </x-navigation::sidebar.content>
                        </x-navigation::sidebar.sidebar>

                        <x-navigation::sidebar.inset class="flex-1 flex flex-col" style="background: var(--docs-bg-alt);">
                            <header class="flex items-center gap-3 px-4 py-3 border-b" style="border-color: var(--docs-border); background: var(--docs-bg);">
                                <x-navigation::sidebar.trigger>
                                    <button class="p-2 rounded-lg hover:bg-rose-500/10 transition-colors" style="color: var(--docs-text-muted);">
                                        <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                                    </button>
                                </x-navigation::sidebar.trigger>
                                <span class="text-sm font-medium" style="color: var(--docs-text);">Page Title</span>
                            </header>
                            <main class="flex-1 p-4">
                                <div class="rounded-lg border border-dashed p-4" style="border-color: var(--docs-border);">
                                    <p class="text-sm text-center" style="color: var(--docs-text-muted);">
                                        Click either trigger to toggle the sidebar.
                                    </p>
                                </div>
                            </main>
                        </x-navigation::sidebar.inset>
                    </x-navigation::sidebar.provider>
                </div>
            </div>

            <!-- Trigger Styles -->
            <div class="rounded-xl p-4 border border-violet-500/30" style="background: rgba(139, 92, 246, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-violet-500/20 text-violet-500 rounded">Styles</span>
                    Different Trigger Styles
                </h4>

                <div class="flex flex-wrap gap-4">
                    <div class="rounded-lg border border-[var(--docs-border)] p-4" style="background: var(--docs-bg);">
                        <p class="text-xs font-medium mb-3" style="color: var(--docs-text-muted);">Icon Button</p>
                        <button class="p-2 rounded-lg hover:bg-violet-500/10 transition-colors border border-[var(--docs-border)]" style="color: var(--docs-text-muted);">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </button>
                    </div>

                    <div class="rounded-lg border border-[var(--docs-border)] p-4" style="background: var(--docs-bg);">
                        <p class="text-xs font-medium mb-3" style="color: var(--docs-text-muted);">Text Button</p>
                        <button class="px-3 py-2 rounded-lg hover:bg-violet-500/10 transition-colors border border-[var(--docs-border)] text-sm font-medium" style="color: var(--docs-text-muted);">
                            Toggle Menu
                        </button>
                    </div>

                    <div class="rounded-lg border border-[var(--docs-border)] p-4" style="background: var(--docs-bg);">
                        <p class="text-xs font-medium mb-3" style="color: var(--docs-text-muted);">Icon + Text</p>
                        <button class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-violet-500/10 transition-colors border border-[var(--docs-border)] text-sm font-medium" style="color: var(--docs-text-muted);">
                            <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                            Menu
                        </button>
                    </div>

                    <div class="rounded-lg border border-[var(--docs-border)] p-4" style="background: var(--docs-bg);">
                        <p class="text-xs font-medium mb-3" style="color: var(--docs-text-muted);">Chevron</p>
                        <button class="p-2 rounded-lg hover:bg-violet-500/10 transition-colors border border-[var(--docs-border)]" style="color: var(--docs-text-muted);">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-accelade::code-block language="blade" filename="sidebar-trigger.blade.php">
{{-- In page header --}}
&lt;header class="flex items-center gap-4"&gt;
    &lt;x-navigation::sidebar.trigger&gt;
        &lt;button class="p-2 rounded-lg hover:bg-gray-100"&gt;
            &lt;x-heroicon-o-bars-3 class="size-5" /&gt;
        &lt;/button&gt;
    &lt;/x-navigation::sidebar.trigger&gt;

    &lt;h1&gt;Page Title&lt;/h1&gt;
&lt;/header&gt;

{{-- In sidebar header (desktop collapse) --}}
&lt;x-navigation::sidebar.header class="flex justify-between"&gt;
    &lt;span&gt;Logo&lt;/span&gt;
    &lt;x-navigation::sidebar.trigger&gt;
        &lt;button class="hidden md:block p-1 rounded hover:bg-gray-100"&gt;
            &lt;x-heroicon-o-chevron-double-left class="size-4" /&gt;
        &lt;/button&gt;
    &lt;/x-navigation::sidebar.trigger&gt;
&lt;/x-navigation::sidebar.header&gt;

{{-- Mobile only --}}
&lt;x-navigation::sidebar.trigger&gt;
    &lt;button class="md:hidden"&gt;Open Menu&lt;/button&gt;
&lt;/x-navigation::sidebar.trigger&gt;
    </x-accelade::code-block>
</x-accelade::layouts.docs>
