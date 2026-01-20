{{-- Footer Component Demo --}}
<section class="rounded-xl p-6 mb-6 border border-[var(--docs-border)]" style="background: var(--docs-bg-alt);">
    <div class="flex items-center gap-3 mb-2">
        <span class="w-2.5 h-2.5 bg-pink-500 rounded-full"></span>
        <h3 class="text-lg font-semibold" style="color: var(--docs-text);">Footer</h3>
    </div>
    <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
        Page footers with
        <code class="px-1.5 py-0.5 rounded text-sm border border-[var(--docs-border)]" style="background: var(--docs-bg);">&lt;x-navigation::footer&gt;</code>.
        Style-free component with automatic copyright and customizable slots.
    </p>

    <div class="space-y-6">
        {{-- Basic Footer --}}
        <div class="rounded-xl p-4 border border-pink-500/30" style="background: rgba(236, 72, 153, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-pink-500/20 text-pink-500 rounded">Basic</span>
                Simple Footer
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Basic footer with automatic copyright.
            </p>

            <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                <div class="p-4 min-h-[100px]">
                    <p class="text-sm text-center" style="color: var(--docs-text-muted);">Page content...</p>
                </div>
                <x-navigation::footer
                    brand="Accelade"
                    class="flex items-center justify-between px-4 py-3 text-sm border-t border-[var(--docs-border)]"
                    style="color: var(--docs-text-muted);"
                />
            </div>
        </div>

        {{-- Footer with Links --}}
        <div class="rounded-xl p-4 border border-pink-500/30" style="background: rgba(236, 72, 153, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-pink-500/20 text-pink-500 rounded">Links</span>
                With Navigation Links
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Footer with additional navigation links.
            </p>

            <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                <div class="p-4 min-h-[100px]">
                    <p class="text-sm text-center" style="color: var(--docs-text-muted);">Page content...</p>
                </div>
                <x-navigation::footer
                    brand="My App"
                    class="flex items-center justify-between px-4 py-3 text-sm border-t border-[var(--docs-border)]"
                    style="color: var(--docs-text-muted);"
                >
                    <div class="flex items-center gap-4">
                        <a href="#" class="hover:text-pink-500 transition-colors">Privacy</a>
                        <a href="#" class="hover:text-pink-500 transition-colors">Terms</a>
                        <a href="#" class="hover:text-pink-500 transition-colors">Contact</a>
                    </div>
                </x-navigation::footer>
            </div>
        </div>

        {{-- Footer with Social Icons --}}
        <div class="rounded-xl p-4 border border-pink-500/30" style="background: rgba(236, 72, 153, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-pink-500/20 text-pink-500 rounded">Social</span>
                With Social Icons
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Footer with social media icons using trailing slot.
            </p>

            <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                <div class="p-4 min-h-[100px]">
                    <p class="text-sm text-center" style="color: var(--docs-text-muted);">Page content...</p>
                </div>
                <x-navigation::footer
                    brand="Accelade"
                    class="flex items-center justify-between px-4 py-3 text-sm border-t border-[var(--docs-border)]"
                    style="color: var(--docs-text-muted);"
                >
                    <x-slot:trailing>
                        <div class="flex items-center gap-3">
                            <a href="#" class="hover:text-pink-500 transition-colors">
                                <svg class="size-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                            <a href="#" class="hover:text-pink-500 transition-colors">
                                <svg class="size-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="#" class="hover:text-pink-500 transition-colors">
                                <svg class="size-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </a>
                        </div>
                    </x-slot:trailing>
                </x-navigation::footer>
            </div>
        </div>

        {{-- Centered Footer --}}
        <div class="rounded-xl p-4 border border-pink-500/30" style="background: rgba(236, 72, 153, 0.1);">
            <h4 class="font-medium mb-3 flex items-center gap-2" style="color: var(--docs-text);">
                <span class="text-xs px-2 py-1 bg-pink-500/20 text-pink-500 rounded">Centered</span>
                Centered Layout
            </h4>
            <p class="text-sm mb-4" style="color: var(--docs-text-muted);">
                Footer with all content centered using the center slot.
            </p>

            <div class="rounded-lg border border-[var(--docs-border)] overflow-hidden" style="background: var(--docs-bg);">
                <div class="p-4 min-h-[100px]">
                    <p class="text-sm text-center" style="color: var(--docs-text-muted);">Page content...</p>
                </div>
                <x-navigation::footer
                    class="flex flex-col items-center gap-2 px-4 py-4 text-sm border-t border-[var(--docs-border)]"
                    style="color: var(--docs-text-muted);"
                >
                    <x-slot:leading>
                        <div class="flex items-center gap-4">
                            <a href="#" class="hover:text-pink-500 transition-colors">About</a>
                            <a href="#" class="hover:text-pink-500 transition-colors">Blog</a>
                            <a href="#" class="hover:text-pink-500 transition-colors">Careers</a>
                            <a href="#" class="hover:text-pink-500 transition-colors">Press</a>
                        </div>
                    </x-slot:leading>
                    <x-slot:center>
                        <p class="text-xs">&copy; {{ date('Y') }} Accelade. Built with Laravel.</p>
                    </x-slot:center>
                </x-navigation::footer>
            </div>
        </div>
    </div>
</section>
