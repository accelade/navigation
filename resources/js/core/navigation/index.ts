/**
 * Navigation Core Module
 *
 * Exports navigation management functionality.
 */

export { NavigationManager, initNavigation } from './NavigationManager';
export type {
    SidebarState,
    SidebarConfig,
    NavigationManagerOptions,
    NavigationKey,
    NavigationEvents,
    AcceladeStore,
    AcceladeGlobal,
} from './types';
export { defaultSidebarConfig, defaultNavigationOptions } from './types';
