{{-- Theme Toggle Component Demo --}}
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-yellow-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Theme Toggle</h3>
    </div>
    <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
        Switch between light, dark, and system themes with
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-navigation::theme-toggle&gt;</code>.
        The selected theme persists in localStorage.
    </p>

    <div class="space-y-6">
        {{-- Basic Theme Toggle --}}
        <div class="rounded-xl p-4 border border-yellow-500/30" style="background: rgba(234, 179, 8, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-yellow-500/20 text-yellow-600 rounded">Basic</span>
                Light/Dark Toggle
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Simple toggle between light and dark mode. Click to cycle.
            </p>

            <div class="flex items-center gap-4">
                <x-navigation::theme-toggle
                    class="flex items-center justify-center size-10 rounded-lg border border-[var(--docs-border)] hover:bg-yellow-500/10 transition-colors"
                    style="color: var(--docs-text);"
                />
                <span class="text-sm" style="color: var(--docs-text-muted);">Click to toggle theme</span>
            </div>
        </div>

        {{-- With System Option --}}
        <div class="rounded-xl p-4 border border-yellow-500/30" style="background: rgba(234, 179, 8, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-yellow-500/20 text-yellow-600 rounded">Advanced</span>
                Light/Dark/System Toggle
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Includes system preference option. Cycles through all three modes.
            </p>

            <div class="flex items-center gap-4">
                <x-navigation::theme-toggle
                    :show-system="true"
                    store="theme-demo-2"
                    class="flex items-center justify-center size-10 rounded-lg border border-[var(--docs-border)] hover:bg-yellow-500/10 transition-colors"
                    style="color: var(--docs-text);"
                />
                <span class="text-sm" style="color: var(--docs-text-muted);">Light → Dark → System → Light...</span>
            </div>
        </div>

        {{-- Custom Slot Content --}}
        <div class="rounded-xl p-4 border border-yellow-500/30" style="background: rgba(234, 179, 8, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-yellow-500/20 text-yellow-600 rounded">Custom</span>
                Custom Slot Content
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Use the default slot with a-show to show different content per theme.
            </p>

            <div class="flex items-center gap-4">
                <x-navigation::theme-toggle
                    store="theme-demo-3"
                    class="flex items-center justify-center size-10 rounded-lg border border-[var(--docs-border)] hover:bg-yellow-500/10 transition-colors"
                    style="color: var(--docs-text);"
                >
                    <span a-show="theme === 'light'" class="text-yellow-500">☀️</span>
                    <span a-show="theme === 'dark'" class="text-indigo-500">🌙</span>
                </x-navigation::theme-toggle>
                <span class="text-sm" style="color: var(--docs-text-muted);">Custom emoji icons with a-show</span>
            </div>
        </div>
    </div>
</section>
