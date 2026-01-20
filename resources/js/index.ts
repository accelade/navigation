/**
 * Accelade Navigation
 *
 * Sidebar navigation components for Accelade.
 * Provides interactive sidebar functionality with keyboard navigation,
 * accessibility support, and responsive mobile handling.
 */

import { NavigationManager, initNavigation } from './core/navigation';
import type {
    SidebarState,
    SidebarConfig,
    NavigationManagerOptions,
    NavigationEvents,
} from './core/navigation';

// Extend window type for TypeScript
declare global {
    interface Window {
        Accelade?: {
            store?: (name: string) => {
                $get: <T = unknown>(key: string) => T;
                $set: <T = unknown>(key: string, value: T) => void;
                $subscribe: (callback: () => void) => () => void;
            };
            notify?: {
                success: (title: string, message?: string, options?: { duration?: number }) => void;
                danger: (title: string, message?: string, options?: { duration?: number }) => void;
                warning: (title: string, message?: string, options?: { duration?: number }) => void;
                info: (title: string, message?: string, options?: { duration?: number }) => void;
            };
        };
        AcceladeNavigation?: {
            manager: NavigationManager;
            toggle: () => void;
            expand: () => void;
            collapse: () => void;
            getState: () => SidebarState;
            isCollapsed: () => boolean;
            isMobile: () => boolean;
            version: string;
        };
    }
}

/**
 * Initialize Navigation when DOM is ready
 * Uses a flag to prevent multiple initializations on SPA navigation
 */
function init(): void {
    // Prevent multiple initializations (important for SPA navigation)
    if (window.AcceladeNavigation) {
        return;
    }

    const initializeNavigation = (): void => {
        const manager = initNavigation();

        // Expose global API
        window.AcceladeNavigation = {
            manager,
            toggle: () => manager.toggleSidebar(),
            expand: () => manager.expandSidebar(),
            collapse: () => manager.collapseSidebar(),
            getState: () => manager.getState(),
            isCollapsed: () => manager.isCollapsed(),
            isMobile: () => manager.isMobile(),
            version: '0.1.0',
        };

        // Dispatch ready event
        document.dispatchEvent(
            new CustomEvent('navigation:ready', {
                detail: { manager },
            })
        );
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeNavigation);
    } else {
        initializeNavigation();
    }
}

// Re-initialize accessibility after Accelade navigation
document.addEventListener('accelade:navigated', () => {
    if (window.AcceladeNavigation?.manager) {
        window.AcceladeNavigation.manager.setupAccessibility();
    }
});

// Auto-initialize
init();

// Export for module usage
export { NavigationManager, initNavigation };
export type { SidebarState, SidebarConfig, NavigationManagerOptions, NavigationEvents };
