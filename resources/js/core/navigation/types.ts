/**
 * Navigation Types
 *
 * Type definitions for the Navigation package.
 */

/**
 * Sidebar state
 */
export interface SidebarState {
    /** Whether the sidebar is expanded (desktop) */
    open: boolean;

    /** Whether the mobile sidebar is open */
    mobileOpen: boolean;
}

/**
 * Sidebar configuration
 */
export interface SidebarConfig {
    /** Sidebar side (left or right) */
    side: 'left' | 'right';

    /** Collapsible mode */
    collapsible: 'offcanvas' | 'icon' | 'none';

    /** Sidebar variant */
    variant: 'sidebar' | 'floating' | 'inset';

    /** Mobile breakpoint in pixels */
    mobileBreakpoint: number;

    /** Sidebar width */
    width: string;

    /** Sidebar width when collapsed to icons */
    widthIcon: string;

    /** Sidebar width on mobile */
    widthMobile: string;
}

/**
 * Default sidebar configuration
 */
export const defaultSidebarConfig: SidebarConfig = {
    side: 'left',
    collapsible: 'offcanvas',
    variant: 'sidebar',
    mobileBreakpoint: 768,
    width: '17rem',
    widthIcon: '4.5rem',
    widthMobile: '18rem',
};

/**
 * Navigation manager options
 */
export interface NavigationManagerOptions {
    /** Auto-initialize on construction */
    autoInit?: boolean;

    /** Debounce timeout for resize events (ms) */
    resizeDebounce?: number;

    /** Custom selector for sidebar elements */
    sidebarSelector?: string;

    /** Custom selector for menu elements */
    menuSelector?: string;

    /** Custom selector for menu button elements */
    menuButtonSelector?: string;

    /** Custom selector for trigger buttons */
    triggerSelector?: string;
}

/**
 * Default navigation manager options
 */
export const defaultNavigationOptions: Required<NavigationManagerOptions> = {
    autoInit: true,
    resizeDebounce: 100,
    sidebarSelector: '[data-sidebar="sidebar"]',
    menuSelector: '[data-sidebar="menu"]',
    menuButtonSelector: '[data-sidebar="menu-button"]',
    triggerSelector: '[data-sidebar="trigger"]',
};

/**
 * Keyboard navigation key codes
 */
export type NavigationKey = 'ArrowDown' | 'ArrowUp' | 'Home' | 'End' | 'Escape' | 'Enter' | 'Space';

/**
 * Event types dispatched by the navigation system
 */
export interface NavigationEvents {
    /** Sidebar state changed */
    'navigation:state-changed': CustomEvent<{
        state: SidebarState;
        previousState: SidebarState;
    }>;

    /** Sidebar toggled */
    'navigation:toggled': CustomEvent<{
        open: boolean;
        mobile: boolean;
    }>;

    /** Navigation ready */
    'navigation:ready': CustomEvent<{
        manager: unknown;
    }>;
}

/**
 * Accelade store interface (subset for type safety)
 */
export interface AcceladeStore {
    $get: <T = unknown>(key: string) => T;
    $set: <T = unknown>(key: string, value: T) => void;
    $subscribe: (callback: () => void) => () => void;
}

/**
 * Global Accelade interface
 */
export interface AcceladeGlobal {
    store?: (name: string) => AcceladeStore | undefined;
    notify?: {
        success: (title: string, message?: string, options?: { duration?: number }) => void;
        danger: (title: string, message?: string, options?: { duration?: number }) => void;
        warning: (title: string, message?: string, options?: { duration?: number }) => void;
        info: (title: string, message?: string, options?: { duration?: number }) => void;
    };
}
