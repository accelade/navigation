@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="navigation-nav-group" :documentation="$documentation" :hasDemo="$hasDemo">
    <!-- Demo: Nav Group Component -->
    <section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
        <div class="flex items-center gap-3 mb-2">
            <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
            <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Nav Group Component</h3>
        </div>
        <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
            The <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-navigation::nav-group&gt;</code> component creates collapsible navigation sections.
        </p>

        <div class="space-y-6">
            <!-- Collapsible Groups -->
            <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Collapsible</span>
                    Collapsible Groups
                </h4>
                <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                    Click to expand/collapse. Uses Alpine.js for smooth animations.
                </p>

                <div class="w-64 rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                    <x-navigation::nav class="p-2">
                        <x-navigation::nav-group label="Content" icon="heroicon-o-document-text">
                            <x-navigation::nav-item label="Posts" href="#" />
                            <x-navigation::nav-item label="Pages" href="#" />
                            <x-navigation::nav-item label="Media" href="#" />
                        </x-navigation::nav-group>

                        <x-navigation::nav-group label="Users" icon="heroicon-o-users">
                            <x-navigation::nav-item label="All Users" href="#" />
                            <x-navigation::nav-item label="Roles" href="#" />
                            <x-navigation::nav-item label="Permissions" href="#" />
                        </x-navigation::nav-group>
                    </x-navigation::nav>
                </div>
            </div>

            <!-- Initially Collapsed -->
            <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Collapsed</span>
                    Initially Collapsed
                </h4>
                <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                    Use <code class="px-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg);">:collapsed="true"</code> to start collapsed.
                </p>

                <div class="w-64 rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                    <x-navigation::nav class="p-2">
                        <x-navigation::nav-group label="Open by Default" icon="heroicon-o-folder-open">
                            <x-navigation::nav-item label="Item 1" href="#" />
                            <x-navigation::nav-item label="Item 2" href="#" />
                        </x-navigation::nav-group>

                        <x-navigation::nav-group label="Collapsed" icon="heroicon-o-folder" :collapsed="true">
                            <x-navigation::nav-item label="Hidden 1" href="#" />
                            <x-navigation::nav-item label="Hidden 2" href="#" />
                        </x-navigation::nav-group>
                    </x-navigation::nav>
                </div>
            </div>

            <!-- Non-Collapsible -->
            <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">Static</span>
                    Non-Collapsible Groups
                </h4>
                <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                    Use <code class="px-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg);">:collapsible="false"</code> for static groups.
                </p>

                <div class="w-64 rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                    <x-navigation::nav class="p-2">
                        <x-navigation::nav-group label="Quick Links" :collapsible="false">
                            <x-navigation::nav-item label="Dashboard" href="#" icon="heroicon-o-home" />
                            <x-navigation::nav-item label="Profile" href="#" icon="heroicon-o-user" />
                        </x-navigation::nav-group>

                        <x-navigation::nav-group label="Resources" :collapsible="false">
                            <x-navigation::nav-item label="Documentation" href="#" />
                            <x-navigation::nav-item label="Support" href="#" />
                        </x-navigation::nav-group>
                    </x-navigation::nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Props Table -->
    <div class="rounded-xl p-4 border border-[var(--docs-border)] mb-4" style="background: var(--docs-bg);">
        <h4 class="font-medium mb-4" style="color: var(--docs-text);">Component Props</h4>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-[var(--docs-border)]">
                        <th class="text-left py-2 px-3" style="color: var(--docs-text-muted);">Prop</th>
                        <th class="text-left py-2 px-3" style="color: var(--docs-text-muted);">Type</th>
                        <th class="text-left py-2 px-3" style="color: var(--docs-text-muted);">Default</th>
                        <th class="text-left py-2 px-3" style="color: var(--docs-text-muted);">Description</th>
                    </tr>
                </thead>
                <tbody style="color: var(--docs-text-muted);">
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">label</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">required</td>
                        <td class="py-2 px-3">Group header label</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">icon</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">Icon component name</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">collapsible</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">true</td>
                        <td class="py-2 px-3">Allow collapsing</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-indigo-500">collapsed</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Initial collapsed state</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="nav-group-example.blade.php">
{{-- Basic group --}}
&lt;x-navigation::nav-group label="Content" icon="heroicon-o-folder"&gt;
    &lt;x-navigation::nav-item label="Posts" href="/posts" /&gt;
    &lt;x-navigation::nav-item label="Pages" href="/pages" /&gt;
&lt;/x-navigation::nav-group&gt;

{{-- Initially collapsed --}}
&lt;x-navigation::nav-group label="Advanced" :collapsed="true"&gt;
    &lt;x-navigation::nav-item label="API Keys" href="/api-keys" /&gt;
    &lt;x-navigation::nav-item label="Webhooks" href="/webhooks" /&gt;
&lt;/x-navigation::nav-group&gt;

{{-- Non-collapsible (static header) --}}
&lt;x-navigation::nav-group label="Quick Links" :collapsible="false"&gt;
    &lt;x-navigation::nav-item label="Dashboard" href="/dashboard" /&gt;
    &lt;x-navigation::nav-item label="Support" href="/support" /&gt;
&lt;/x-navigation::nav-group&gt;
    </x-accelade::code-block>
</x-accelade::layouts.docs>
