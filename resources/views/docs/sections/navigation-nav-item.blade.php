@props(['framework' => 'vanilla', 'prefix' => 'a', 'documentation' => null, 'hasDemo' => true])

@php
    app('accelade')->setFramework($framework);
@endphp

<x-accelade::layouts.docs :framework="$framework" section="navigation-nav-item" :documentation="$documentation" :hasDemo="$hasDemo">
    <!-- Demo: Nav Item Component -->
    <section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
        <div class="flex items-center gap-3 mb-2">
            <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
            <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Nav Item Component</h3>
        </div>
        <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
            The <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-navigation::nav-item&gt;</code> component creates navigation links with icons, badges, and active states.
        </p>

        <div class="space-y-6">
            <!-- Icons -->
            <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Icons</span>
                    With Icons
                </h4>

                <div class="w-64 rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                    <x-navigation::nav class="p-2">
                        <x-navigation::nav-item label="Home" href="#" icon="heroicon-o-home" />
                        <x-navigation::nav-item label="Users" href="#" icon="heroicon-o-users" />
                        <x-navigation::nav-item label="Settings" href="#" icon="heroicon-o-cog-6-tooth" />
                        <x-navigation::nav-item label="Help" href="#" icon="heroicon-o-question-mark-circle" />
                    </x-navigation::nav>
                </div>
            </div>

            <!-- Active States -->
            <div class="rounded-xl p-4 border border-emerald-500/30" style="background: rgba(16, 185, 129, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-emerald-500/20 text-emerald-500 rounded">Active</span>
                    Active States
                </h4>
                <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                    Items can have different icons when active using <code class="px-1 rounded border border-[var(--docs-border)]" style="background: var(--docs-bg);">active-icon</code>.
                </p>

                <div class="w-64 rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                    <x-navigation::nav class="p-2">
                        <x-navigation::nav-item
                            label="Dashboard"
                            href="#"
                            icon="heroicon-o-home"
                            active-icon="heroicon-s-home"
                            :active="true"
                        />
                        <x-navigation::nav-item
                            label="Messages"
                            href="#"
                            icon="heroicon-o-envelope"
                            active-icon="heroicon-s-envelope"
                        />
                        <x-navigation::nav-item
                            label="Calendar"
                            href="#"
                            icon="heroicon-o-calendar"
                            active-icon="heroicon-s-calendar"
                        />
                    </x-navigation::nav>
                </div>
            </div>

            <!-- External Links -->
            <div class="rounded-xl p-4 border border-amber-500/30" style="background: rgba(245, 158, 11, 0.1);">
                <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                    <span class="text-xs px-2 py-1 bg-amber-500/20 text-amber-500 rounded">External</span>
                    External Links
                </h4>
                <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                    External links show an indicator and open in a new tab.
                </p>

                <div class="w-64 rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                    <x-navigation::nav class="p-2">
                        <x-navigation::nav-item
                            label="Documentation"
                            href="https://example.com"
                            icon="heroicon-o-book-open"
                            :external="true"
                        />
                        <x-navigation::nav-item
                            label="GitHub"
                            href="https://github.com"
                            icon="heroicon-o-code-bracket"
                            :external="true"
                        />
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
                        <td class="py-2 px-3">Text label for the item</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">href</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">URL to navigate to</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">icon</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">Icon component name</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">active-icon</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">Icon when active</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">badge</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">null</td>
                        <td class="py-2 px-3">Badge text</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">badge-color</code></td>
                        <td class="py-2 px-3">string</td>
                        <td class="py-2 px-3">'gray'</td>
                        <td class="py-2 px-3">Badge color: primary, success, warning, danger, info, gray</td>
                    </tr>
                    <tr class="border-b border-[var(--docs-border)]">
                        <td class="py-2 px-3"><code class="text-indigo-500">active</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Force active state</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-3"><code class="text-indigo-500">external</code></td>
                        <td class="py-2 px-3">bool</td>
                        <td class="py-2 px-3">false</td>
                        <td class="py-2 px-3">Open in new tab</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <x-accelade::code-block language="blade" filename="nav-item-example.blade.php">
{{-- Basic item --}}
&lt;x-navigation::nav-item label="Dashboard" href="/dashboard" /&gt;

{{-- With icon --}}
&lt;x-navigation::nav-item
    label="Users"
    href="/users"
    icon="heroicon-o-users"
/&gt;

{{-- With active icon --}}
&lt;x-navigation::nav-item
    label="Home"
    href="/"
    icon="heroicon-o-home"
    active-icon="heroicon-s-home"
    :active="request()->is('/')"
/&gt;

{{-- With badge --}}
&lt;x-navigation::nav-item
    label="Notifications"
    href="/notifications"
    icon="heroicon-o-bell"
    badge="5"
    badge-color="danger"
/&gt;

{{-- External link --}}
&lt;x-navigation::nav-item
    label="Docs"
    href="https://docs.example.com"
    :external="true"
/&gt;
    </x-accelade::code-block>
</x-accelade::layouts.docs>
