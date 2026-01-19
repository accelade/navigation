@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="navigation-overview" :documentation="$documentation" :hasDemo="$hasDemo">
    <!-- Demo: Navigation Overview -->
    <section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
        <div class="flex items-center gap-3 mb-2">
            <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
            <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Navigation Components</h3>
        </div>
        <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
            Build navigation menus with <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-navigation::nav&gt;</code>,
            <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-navigation::nav-item&gt;</code>, and
            <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-navigation::nav-group&gt;</code>.
        </p>

        <div class="space-y-6">
            <!-- Basic Navigation -->
            <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Basic</span>
                    Vertical Navigation
                </h4>
                <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                    Simple vertical navigation with icons and badges.
                </p>

                <div class="w-64 rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                    <x-navigation::nav class="p-2">
                        <x-navigation::nav-item
                            label="Dashboard"
                            href="#"
                            icon="heroicon-o-home"
                            :active="true"
                        />
                        <x-navigation::nav-item
                            label="Users"
                            href="#"
                            icon="heroicon-o-users"
                            badge="12"
                            badge-color="primary"
                        />
                        <x-navigation::nav-item
                            label="Settings"
                            href="#"
                            icon="heroicon-o-cog-6-tooth"
                        />
                    </x-navigation::nav>
                </div>
            </div>

            <!-- Navigation Groups -->
            <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Groups</span>
                    Collapsible Groups
                </h4>
                <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                    Organize items into collapsible groups.
                </p>

                <div class="w-64 rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                    <x-navigation::nav class="p-2">
                        <x-navigation::nav-item
                            label="Dashboard"
                            href="#"
                            icon="heroicon-o-home"
                        />

                        <x-navigation::nav-group label="Content" icon="heroicon-o-folder">
                            <x-navigation::nav-item label="Posts" href="#" badge="24" />
                            <x-navigation::nav-item label="Pages" href="#" />
                            <x-navigation::nav-item label="Media" href="#" />
                        </x-navigation::nav-group>

                        <x-navigation::nav-group label="Settings" icon="heroicon-o-cog-6-tooth" :collapsed="true">
                            <x-navigation::nav-item label="General" href="#" />
                            <x-navigation::nav-item label="Security" href="#" />
                        </x-navigation::nav-group>
                    </x-navigation::nav>
                </div>
            </div>

            <!-- Badge Colors -->
            <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Badges</span>
                    Badge Colors
                </h4>
                <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                    Indicate counts or status with colored badges.
                </p>

                <div class="w-64 rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                    <x-navigation::nav class="p-2">
                        <x-navigation::nav-item label="Primary" href="#" badge="5" badge-color="primary" />
                        <x-navigation::nav-item label="Success" href="#" badge="New" badge-color="success" />
                        <x-navigation::nav-item label="Warning" href="#" badge="3" badge-color="warning" />
                        <x-navigation::nav-item label="Danger" href="#" badge="!" badge-color="danger" />
                        <x-navigation::nav-item label="Info" href="#" badge="i" badge-color="info" />
                    </x-navigation::nav>
                </div>
            </div>

            <!-- Horizontal Navigation -->
            <div class="rounded-xl p-4 border border-sky-500/30" style="background: rgba(14, 165, 233, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-sky-500/20 text-sky-500 rounded">Horizontal</span>
                    Header Navigation
                </h4>
                <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                    Horizontal navigation for headers.
                </p>

                <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                    <x-navigation::nav direction="horizontal" class="p-2 flex-wrap">
                        <x-navigation::nav-item label="Home" href="#" :active="true" />
                        <x-navigation::nav-item label="Features" href="#" />
                        <x-navigation::nav-item label="Pricing" href="#" />
                        <x-navigation::nav-item label="Docs" href="#" :external="true" />
                    </x-navigation::nav>
                </div>
            </div>
        </div>
    </section>

    <x-accelade::code-block language="blade" filename="navigation-example.blade.php">
{{-- Basic navigation --}}
&lt;x-navigation::nav&gt;
    &lt;x-navigation::nav-item label="Dashboard" href="/dashboard" icon="heroicon-o-home" /&gt;
    &lt;x-navigation::nav-item label="Users" href="/users" icon="heroicon-o-users" badge="12" /&gt;
&lt;/x-navigation::nav&gt;

{{-- With groups --}}
&lt;x-navigation::nav&gt;
    &lt;x-navigation::nav-group label="Content" icon="heroicon-o-folder"&gt;
        &lt;x-navigation::nav-item label="Posts" href="/posts" /&gt;
        &lt;x-navigation::nav-item label="Pages" href="/pages" /&gt;
    &lt;/x-navigation::nav-group&gt;
&lt;/x-navigation::nav&gt;

{{-- Horizontal --}}
&lt;x-navigation::nav direction="horizontal"&gt;
    &lt;x-navigation::nav-item label="Home" href="/" /&gt;
    &lt;x-navigation::nav-item label="About" href="/about" /&gt;
&lt;/x-navigation::nav&gt;
    </x-accelade::code-block>
</x-accelade::layouts.docs>
