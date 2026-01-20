# Sidebar

Build interactive sidebars with the `<x-navigation::sidebar.*>` component family. Features collapsible modes, mobile support, keyboard shortcuts, and accessibility.

## Basic Usage

```blade
<x-navigation::sidebar.provider :default-open="true">
    <x-navigation::sidebar.sidebar collapsible="icon">
        <x-navigation::sidebar.header>
            <!-- Logo/Brand -->
        </x-navigation::sidebar.header>

        <x-navigation::sidebar.content>
            <!-- Navigation menu -->
        </x-navigation::sidebar.content>

        <x-navigation::sidebar.footer>
            <!-- User menu -->
        </x-navigation::sidebar.footer>
    </x-navigation::sidebar.sidebar>

    <x-navigation::sidebar.inset>
        <!-- Main content area -->
    </x-navigation::sidebar.inset>
</x-navigation::sidebar.provider>
```

## Components

| Component | Description |
|-----------|-------------|
| `sidebar.provider` | State provider with keyboard shortcut support |
| `sidebar.sidebar` | Main sidebar container with collapsible modes |
| `sidebar.header` | Sidebar header area (logo, brand) |
| `sidebar.content` | Scrollable content area |
| `sidebar.footer` | Sidebar footer area (user menu) |
| `sidebar.inset` | Main content area next to sidebar |
| `sidebar.trigger` | Toggle button for sidebar |
| `sidebar.menu` | Menu container |
| `sidebar.menu-item` | Menu item wrapper |
| `sidebar.menu-button` | Clickable menu button/link |
| `sidebar.menu-badge` | Badge indicator |
| `sidebar.menu-sub` | Submenu container |
| `sidebar.separator` | Visual separator |
| `sidebar.rail` | Resize handle |

## Provider Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `default-open` | bool | `true` | Initial open state |
| `store` | string | `'sidebar'` | State store name |
| `persist` | string | `'sidebarOpen'` | LocalStorage key |
| `keyboard-shortcut` | bool | `true` | Enable Ctrl/Cmd + B |

## Sidebar Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `side` | string | `'left'` | Position: left, right |
| `variant` | string | `'sidebar'` | Style: sidebar, floating, inset |
| `collapsible` | string | `'icon'` | Mode: offcanvas, icon, none |
| `mobile-class` | string | `''` | Mobile-specific classes |
| `desktop-class` | string | `''` | Desktop-specific classes |

## Collapsible Modes

### Icon Mode
Collapses to icons only on desktop:

```blade
<x-navigation::sidebar.sidebar collapsible="icon">
    <!-- Content -->
</x-navigation::sidebar.sidebar>
```

### Offcanvas Mode
Slides completely out of view:

```blade
<x-navigation::sidebar.sidebar collapsible="offcanvas">
    <!-- Content -->
</x-navigation::sidebar.sidebar>
```

### Non-Collapsible
Fixed width sidebar:

```blade
<x-navigation::sidebar.sidebar collapsible="none">
    <!-- Content -->
</x-navigation::sidebar.sidebar>
```

## Keyboard Shortcuts

The sidebar provider includes built-in keyboard shortcut support:

- **Ctrl/Cmd + B**: Toggle sidebar
- **Escape**: Close mobile sidebar

## CSS Custom Properties

Customize the sidebar appearance with CSS variables:

```css
:root {
    --nav-sidebar-width: 17rem;
    --nav-sidebar-width-icon: 4.5rem;
    --nav-sidebar-width-mobile: 18rem;
    --nav-sidebar-bg: #ffffff;
    --nav-sidebar-fg: #374151;
    --nav-sidebar-border: #e5e7eb;
    --nav-sidebar-hover-bg: #f3f4f6;
    --nav-sidebar-active-bg: #eff6ff;
    --nav-sidebar-active-fg: #1d4ed8;
}
```

## Accessibility

The sidebar components automatically include:

- ARIA attributes for navigation
- Keyboard navigation support
- Focus management
- Screen reader announcements
