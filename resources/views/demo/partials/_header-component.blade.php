{{-- Header Component Demo --}}
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-indigo-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Header</h3>
    </div>
    <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
        Page headers with
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-navigation::header&gt;</code>.
        Style-free component with slots for leading, center, and trailing content.
    </p>

    <div class="space-y-6">
        {{-- Basic Header --}}
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Basic</span>
                Simple Header
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Basic header with title and actions.
            </p>

            <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                <x-navigation::header class="flex items-center gap-4 px-4 py-3 border-b border-[var(--docs-border)]">
                    <x-slot:leading>
                        <button class="p-2 rounded-lg hover:bg-indigo-500/10 transition-colors" style="color: var(--docs-text-muted);">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </x-slot:leading>

                    <h1 class="text-sm font-semibold" style="color: var(--docs-text);">Dashboard</h1>

                    <x-slot:trailing>
                        <div class="flex items-center gap-2">
                            <button class="p-2 rounded-lg hover:bg-indigo-500/10 transition-colors" style="color: var(--docs-text-muted);">
                                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>
                            <span class="size-8 rounded-full bg-indigo-500 flex items-center justify-center text-white text-xs font-semibold">
                                JD
                            </span>
                        </div>
                    </x-slot:trailing>
                </x-navigation::header>
                <div class="p-4">
                    <p class="text-sm" style="color: var(--docs-text-muted);">Page content goes here...</p>
                </div>
            </div>
        </div>

        {{-- Header with Breadcrumbs --}}
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Advanced</span>
                With Breadcrumbs
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Header featuring breadcrumb navigation.
            </p>

            <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                <x-navigation::header class="flex items-center gap-4 px-4 py-3 border-b border-[var(--docs-border)]">
                    <x-slot:leading>
                        <button class="p-2 rounded-lg hover:bg-indigo-500/10 transition-colors" style="color: var(--docs-text-muted);">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <div class="h-4 w-px bg-[var(--docs-border)] mx-2"></div>
                    </x-slot:leading>

                    <x-navigation::breadcrumb
                        :items="[
                            ['label' => 'Users', 'href' => '#'],
                            ['label' => 'John Doe'],
                        ]"
                        :show-home="true"
                        class="flex items-center gap-2 text-sm"
                        style="color: var(--docs-text-muted);"
                    />

                    <x-slot:trailing>
                        <div class="flex items-center gap-2">
                            <button class="px-3 py-1.5 text-sm rounded-lg bg-indigo-500 text-white hover:bg-indigo-600 transition-colors">
                                Save
                            </button>
                        </div>
                    </x-slot:trailing>
                </x-navigation::header>
                <div class="p-4">
                    <p class="text-sm" style="color: var(--docs-text-muted);">Edit user form goes here...</p>
                </div>
            </div>
        </div>

        {{-- Header with Search --}}
        <div class="rounded-xl p-4 border border-indigo-500/30" style="background: rgba(99, 102, 241, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-indigo-500/20 text-indigo-500 rounded">Search</span>
                With Global Search
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Header with a search input for global search.
            </p>

            <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                <x-navigation::header class="flex items-center gap-4 px-4 py-3 border-b border-[var(--docs-border)]">
                    <x-slot:leading>
                        <button class="p-2 rounded-lg hover:bg-indigo-500/10 transition-colors" style="color: var(--docs-text-muted);">
                            <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </x-slot:leading>

                    <x-slot:center>
                        <div class="relative max-w-md w-full">
                            <svg class="absolute left-3 top-1/2 -translate-y-1/2 size-4" style="color: var(--docs-text-muted);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input
                                type="search"
                                placeholder="Search..."
                                class="w-full pl-10 pr-4 py-2 text-sm rounded-lg border border-[var(--docs-border)] outline-none focus:ring-2 focus:ring-indigo-500/50 transition-shadow"
                                style="background: var(--docs-bg-alt); color: var(--docs-text);"
                            />
                            <kbd class="absolute right-3 top-1/2 -translate-y-1/2 px-1.5 py-0.5 text-[10px] rounded border border-[var(--docs-border)]" style="background: var(--docs-bg); color: var(--docs-text-muted);">
                                ⌘K
                            </kbd>
                        </div>
                    </x-slot:center>

                    <x-slot:trailing>
                        <span class="size-8 rounded-full bg-indigo-500 flex items-center justify-center text-white text-xs font-semibold">
                            JD
                        </span>
                    </x-slot:trailing>
                </x-navigation::header>
                <div class="p-4">
                    <p class="text-sm" style="color: var(--docs-text-muted);">Search results appear here...</p>
                </div>
            </div>
        </div>
    </div>
</section>
