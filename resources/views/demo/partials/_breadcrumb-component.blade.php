{{-- Breadcrumb Component Demo --}}
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-green-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Breadcrumb</h3>
    </div>
    <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
        Navigation breadcrumbs with
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-navigation::breadcrumb&gt;</code>.
        Supports dynamic items, custom separators, and home icon.
    </p>

    <div class="space-y-6">
        {{-- Basic Breadcrumb --}}
        <div class="rounded-xl p-4 border border-green-500/30" style="background: rgba(34, 197, 94, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-green-500/20 text-green-600 rounded">Basic</span>
                Simple Breadcrumb
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Basic breadcrumb with array of items.
            </p>

            <x-navigation::breadcrumb
                :items="[
                    ['label' => 'Dashboard', 'href' => '#'],
                    ['label' => 'Users', 'href' => '#'],
                    ['label' => 'Edit User'],
                ]"
                class="flex items-center gap-2 text-sm"
                style="color: var(--docs-text-muted);"
            />
        </div>

        {{-- With Home Icon --}}
        <div class="rounded-xl p-4 border border-green-500/30" style="background: rgba(34, 197, 94, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-green-500/20 text-green-600 rounded">Icons</span>
                With Home Icon
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Breadcrumb starting with a home icon.
            </p>

            @php
                $homeIcon = '<svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>';
            @endphp

            <x-navigation::breadcrumb
                :items="[
                    ['label' => 'Products', 'href' => '#'],
                    ['label' => 'Electronics', 'href' => '#'],
                    ['label' => 'Smartphones'],
                ]"
                :home-icon="$homeIcon"
                class="flex items-center gap-2 text-sm"
                style="color: var(--docs-text-muted);"
            />
        </div>

        {{-- Custom Separator --}}
        <div class="rounded-xl p-4 border border-green-500/30" style="background: rgba(34, 197, 94, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-green-500/20 text-green-600 rounded">Custom</span>
                Custom Separator
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Using a custom separator instead of the default chevron.
            </p>

            <x-navigation::breadcrumb
                :items="[
                    ['label' => 'Settings', 'href' => '#'],
                    ['label' => 'Account', 'href' => '#'],
                    ['label' => 'Security'],
                ]"
                separator="/"
                :show-home="false"
                class="flex items-center gap-2 text-sm"
                style="color: var(--docs-text-muted);"
            />
        </div>

        {{-- Manual Items --}}
        <div class="rounded-xl p-4 border border-green-500/30" style="background: rgba(34, 197, 94, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-green-500/20 text-green-600 rounded">Slot</span>
                Manual Items via Slot
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Build breadcrumbs manually using child components.
            </p>

            <nav class="flex items-center gap-2 text-sm" style="color: var(--docs-text-muted);">
                <ol class="flex items-center gap-2">
                    <x-navigation::breadcrumb-item href="#" class="hover:text-green-500 transition-colors">
                        Home
                    </x-navigation::breadcrumb-item>
                    <x-navigation::breadcrumb-separator class="text-[var(--docs-border)]">
                        <span>/</span>
                    </x-navigation::breadcrumb-separator>
                    <x-navigation::breadcrumb-item href="#" class="hover:text-green-500 transition-colors">
                        Blog
                    </x-navigation::breadcrumb-item>
                    <x-navigation::breadcrumb-separator class="text-[var(--docs-border)]">
                        <span>/</span>
                    </x-navigation::breadcrumb-separator>
                    <x-navigation::breadcrumb-item :current="true" class="font-medium" style="color: var(--docs-text);">
                        My Article
                    </x-navigation::breadcrumb-item>
                </ol>
            </nav>
        </div>
    </div>
</section>
