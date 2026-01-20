/**
 * NavigationManager - Handles sidebar navigation functionality
 *
 * Provides interactive sidebar functionality including:
 * - Sidebar collapse/expand on desktop
 * - Mobile sidebar sheet with overlay
 * - Keyboard navigation support
 * - Focus management
 * - Tooltip support for collapsed items
 * - Accessibility (ARIA attributes)
 */

import type {
    SidebarState,
    SidebarConfig,
    NavigationManagerOptions,
    NavigationKey,
    AcceladeStore,
} from './types';

import { defaultSidebarConfig, defaultNavigationOptions } from './types';

/**
 * NavigationManager class
 * Singleton pattern for managing sidebar navigation
 */
export class NavigationManager {
    private static instance: NavigationManager | null = null;
    private initialized: boolean = false;
    private resizeTimeout: ReturnType<typeof setTimeout> | null = null;
    private lastWindowWidth: number = 0;
    private options: Required<NavigationManagerOptions>;
    private config: SidebarConfig;
    private previousState: SidebarState = { open: true, mobileOpen: false };

    private constructor(options: NavigationManagerOptions = {}) {
        this.options = { ...defaultNavigationOptions, ...options };
        this.config = { ...defaultSidebarConfig };
        this.lastWindowWidth = typeof window !== 'undefined' ? window.innerWidth : 0;

        if (this.options.autoInit) {
            this.init();
        }
    }

    /**
     * Get singleton instance
     */
    public static getInstance(options?: NavigationManagerOptions): NavigationManager {
        if (!NavigationManager.instance) {
            NavigationManager.instance = new NavigationManager(options);
        }
        return NavigationManager.instance;
    }

    /**
     * Reset the singleton instance (useful for testing)
     */
    public static resetInstance(): void {
        if (NavigationManager.instance) {
            NavigationManager.instance.destroy();
            NavigationManager.instance = null;
        }
    }

    /**
     * Initialize the navigation manager
     */
    public init(): void {
        if (this.initialized) {
            return;
        }

        this.bindEvents();
        this.setupAccessibility();
        this.handleResize();
        this.initialized = true;

        // Dispatch ready event
        this.dispatchEvent('navigation:ready', { manager: this });
    }

    /**
     * Destroy the navigation manager and clean up
     */
    public destroy(): void {
        if (this.resizeTimeout) {
            clearTimeout(this.resizeTimeout);
        }
        this.initialized = false;
    }

    /**
     * Check if the manager is initialized
     */
    public isInitialized(): boolean {
        return this.initialized;
    }

    /**
     * Bind event listeners
     */
    private bindEvents(): void {
        // Handle escape key to close mobile sidebar
        document.addEventListener('keydown', this.handleKeyDown.bind(this));

        // Handle window resize with debounce
        window.addEventListener('resize', this.handleResizeEvent.bind(this));

        // Setup keyboard navigation for menus
        this.setupMenuKeyboardNavigation();
    }

    /**
     * Handle keydown events
     */
    private handleKeyDown(event: KeyboardEvent): void {
        if (event.key === 'Escape') {
            this.closeMobileSidebar();
        }
    }

    /**
     * Handle resize events with debouncing
     */
    private handleResizeEvent(): void {
        if (this.resizeTimeout) {
            clearTimeout(this.resizeTimeout);
        }
        this.resizeTimeout = setTimeout(() => {
            this.handleResize();
        }, this.options.resizeDebounce);
    }

    /**
     * Setup accessibility attributes
     */
    public setupAccessibility(): void {
        // Add ARIA attributes to sidebar components
        document.querySelectorAll(this.options.sidebarSelector).forEach((sidebar) => {
            if (!sidebar.hasAttribute('role')) {
                sidebar.setAttribute('role', 'navigation');
            }
            if (!sidebar.hasAttribute('aria-label')) {
                sidebar.setAttribute('aria-label', 'Main navigation');
            }
        });

        // Add ARIA attributes to menus
        document.querySelectorAll(this.options.menuSelector).forEach((menu) => {
            if (!menu.hasAttribute('role')) {
                menu.setAttribute('role', 'menu');
            }
        });

        // Add ARIA attributes to menu items
        document.querySelectorAll(this.options.menuButtonSelector).forEach((button) => {
            if (!button.hasAttribute('role')) {
                button.setAttribute('role', 'menuitem');
            }
        });
    }

    /**
     * Handle window resize events
     */
    private handleResize(): void {
        const currentWidth = window.innerWidth;
        const breakpoint = this.config.mobileBreakpoint;

        // Detect crossing the mobile/desktop breakpoint
        if (
            (this.lastWindowWidth < breakpoint && currentWidth >= breakpoint) ||
            (this.lastWindowWidth >= breakpoint && currentWidth < breakpoint)
        ) {
            // Close mobile sidebar when switching to desktop
            if (currentWidth >= breakpoint) {
                this.closeMobileSidebar();
            }
        }

        this.lastWindowWidth = currentWidth;

        // Update CSS custom properties for sidebar dimensions
        this.updateSidebarDimensions();
    }

    /**
     * Update sidebar dimension CSS custom properties
     */
    private updateSidebarDimensions(): void {
        const wrapper = document.querySelector('[data-slot="sidebar-wrapper"]') as HTMLElement;
        if (!wrapper) {
            return;
        }

        // Get computed values or defaults
        const styles = getComputedStyle(wrapper);
        const sidebarWidth = styles.getPropertyValue('--sidebar-width') || this.config.width;
        const sidebarWidthIcon = styles.getPropertyValue('--sidebar-width-icon') || this.config.widthIcon;
        const sidebarWidthMobile = styles.getPropertyValue('--sidebar-width-mobile') || this.config.widthMobile;

        // Ensure CSS custom properties are available
        if (!wrapper.style.getPropertyValue('--sidebar-width')) {
            wrapper.style.setProperty('--sidebar-width', sidebarWidth);
        }
        if (!wrapper.style.getPropertyValue('--sidebar-width-icon')) {
            wrapper.style.setProperty('--sidebar-width-icon', sidebarWidthIcon);
        }
        if (!wrapper.style.getPropertyValue('--sidebar-width-mobile')) {
            wrapper.style.setProperty('--sidebar-width-mobile', sidebarWidthMobile);
        }
    }

    /**
     * Get the Accelade store for sidebar state
     */
    private getStore(): AcceladeStore | undefined {
        const accelade = (window as { Accelade?: { store?: (name: string) => AcceladeStore } }).Accelade;
        if (accelade?.store) {
            return accelade.store('sidebar');
        }
        return undefined;
    }

    /**
     * Close mobile sidebar
     */
    public closeMobileSidebar(): void {
        const store = this.getStore();
        if (store) {
            const previousState = this.getState();
            store.$set('sidebarMobileOpen', false);

            this.dispatchEvent('navigation:toggled', {
                open: false,
                mobile: true,
            });

            this.dispatchEvent('navigation:state-changed', {
                state: { ...previousState, mobileOpen: false },
                previousState,
            });
        }
    }

    /**
     * Open mobile sidebar
     */
    public openMobileSidebar(): void {
        const store = this.getStore();
        if (store) {
            const previousState = this.getState();
            store.$set('sidebarMobileOpen', true);

            this.dispatchEvent('navigation:toggled', {
                open: true,
                mobile: true,
            });

            this.dispatchEvent('navigation:state-changed', {
                state: { ...previousState, mobileOpen: true },
                previousState,
            });
        }
    }

    /**
     * Toggle sidebar collapse state
     */
    public toggleSidebar(): void {
        const isMobile = window.innerWidth < this.config.mobileBreakpoint;
        const store = this.getStore();

        if (store) {
            const previousState = this.getState();

            if (isMobile) {
                const newMobileOpen = !store.$get<boolean>('sidebarMobileOpen');
                store.$set('sidebarMobileOpen', newMobileOpen);

                this.dispatchEvent('navigation:toggled', {
                    open: newMobileOpen,
                    mobile: true,
                });
            } else {
                const newOpen = !store.$get<boolean>('sidebarOpen');
                store.$set('sidebarOpen', newOpen);

                this.dispatchEvent('navigation:toggled', {
                    open: newOpen,
                    mobile: false,
                });
            }

            this.dispatchEvent('navigation:state-changed', {
                state: this.getState(),
                previousState,
            });
        }
    }

    /**
     * Expand sidebar (desktop)
     */
    public expandSidebar(): void {
        const store = this.getStore();
        if (store) {
            const previousState = this.getState();
            store.$set('sidebarOpen', true);

            this.dispatchEvent('navigation:toggled', {
                open: true,
                mobile: false,
            });

            this.dispatchEvent('navigation:state-changed', {
                state: { ...previousState, open: true },
                previousState,
            });
        }
    }

    /**
     * Collapse sidebar (desktop)
     */
    public collapseSidebar(): void {
        const store = this.getStore();
        if (store) {
            const previousState = this.getState();
            store.$set('sidebarOpen', false);

            this.dispatchEvent('navigation:toggled', {
                open: false,
                mobile: false,
            });

            this.dispatchEvent('navigation:state-changed', {
                state: { ...previousState, open: false },
                previousState,
            });
        }
    }

    /**
     * Check if sidebar is collapsed
     */
    public isCollapsed(): boolean {
        const store = this.getStore();
        if (store) {
            return !store.$get<boolean>('sidebarOpen');
        }
        return false;
    }

    /**
     * Check if mobile sidebar is open
     */
    public isMobileOpen(): boolean {
        const store = this.getStore();
        if (store) {
            return store.$get<boolean>('sidebarMobileOpen') || false;
        }
        return false;
    }

    /**
     * Check if currently in mobile viewport
     */
    public isMobile(): boolean {
        return window.innerWidth < this.config.mobileBreakpoint;
    }

    /**
     * Get current sidebar state
     */
    public getState(): SidebarState {
        const store = this.getStore();
        if (store) {
            return {
                open: store.$get<boolean>('sidebarOpen') ?? true,
                mobileOpen: store.$get<boolean>('sidebarMobileOpen') ?? false,
            };
        }
        return { open: true, mobileOpen: false };
    }

    /**
     * Set sidebar state
     */
    public setState(state: Partial<SidebarState>): void {
        const store = this.getStore();
        if (store) {
            const previousState = this.getState();

            if (state.open !== undefined) {
                store.$set('sidebarOpen', state.open);
            }
            if (state.mobileOpen !== undefined) {
                store.$set('sidebarMobileOpen', state.mobileOpen);
            }

            this.dispatchEvent('navigation:state-changed', {
                state: this.getState(),
                previousState,
            });
        }
    }

    /**
     * Get sidebar configuration
     */
    public getConfig(): SidebarConfig {
        return { ...this.config };
    }

    /**
     * Update sidebar configuration
     */
    public setConfig(config: Partial<SidebarConfig>): void {
        this.config = { ...this.config, ...config };
        this.updateSidebarDimensions();
    }

    /**
     * Setup keyboard navigation for menus
     */
    private setupMenuKeyboardNavigation(): void {
        document.addEventListener('keydown', (event: KeyboardEvent) => {
            const menuItem = (event.target as HTMLElement).closest(
                this.options.menuButtonSelector
            ) as HTMLElement | null;
            if (!menuItem) {
                return;
            }

            const menu = menuItem.closest(this.options.menuSelector);
            if (!menu) {
                return;
            }

            const items = Array.from(
                menu.querySelectorAll(this.options.menuButtonSelector)
            ) as HTMLElement[];
            const currentIndex = items.indexOf(menuItem);

            this.handleMenuKeyNavigation(event, items, currentIndex);
        });
    }

    /**
     * Handle menu keyboard navigation
     */
    private handleMenuKeyNavigation(
        event: KeyboardEvent,
        items: HTMLElement[],
        currentIndex: number
    ): void {
        const key = event.key as NavigationKey;

        switch (key) {
            case 'ArrowDown':
                event.preventDefault();
                this.focusMenuItem(items, currentIndex + 1, 0);
                break;

            case 'ArrowUp':
                event.preventDefault();
                this.focusMenuItem(items, currentIndex - 1, items.length - 1);
                break;

            case 'Home':
                event.preventDefault();
                items[0]?.focus();
                break;

            case 'End':
                event.preventDefault();
                items[items.length - 1]?.focus();
                break;
        }
    }

    /**
     * Focus a menu item with wraparound
     */
    private focusMenuItem(items: HTMLElement[], index: number, fallbackIndex: number): void {
        const targetItem = items[index] || items[fallbackIndex];
        targetItem?.focus();
    }

    /**
     * Dispatch a custom event
     */
    private dispatchEvent<T extends object>(name: string, detail: T): void {
        document.dispatchEvent(
            new CustomEvent(name, {
                detail,
                bubbles: true,
            })
        );
    }
}

/**
 * Initialize the navigation manager
 * Returns the singleton instance
 */
export function initNavigation(options?: NavigationManagerOptions): NavigationManager {
    return NavigationManager.getInstance(options);
}
