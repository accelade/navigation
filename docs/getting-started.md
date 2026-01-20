# Navigation Component

The Accelade Navigation package provides Blade components for building navigation menus, sidebars, and navigation groups with full interactivity.

## Installation

```bash
composer require accelade/navigation
```

The navigation package automatically registers its styles and scripts with Accelade. Make sure you have `@acceladeStyles` in your `<head>` and `@acceladeScripts` before `</body>`.

## Basic Usage

Create a simple navigation link:

```blade
<x-navigation::nav-item
    label="Dashboard"
    href="/dashboard"
    icon="heroicon-o-home"
/>
```

## Active State

Auto-detect active state based on URL:

```blade
<x-navigation::nav-item
    label="Dashboard"
    href="/dashboard"
    icon="heroicon-o-home"
    active-icon="heroicon-s-home"
/>
```

Manual active state:

```blade
<x-navigation::nav-item
    label="Dashboard"
    href="/dashboard"
    :active="request()->is('dashboard*')"
/>
```

## Navigation Container

```blade
<x-navigation::nav>
    <x-navigation::nav-item label="Home" href="/" icon="heroicon-o-home" />
    <x-navigation::nav-item label="About" href="/about" />
</x-navigation::nav>
```

## Sidebar Components

The navigation package includes a complete sidebar system with collapsible support:

```blade
<x-navigation::sidebar.provider>
    <x-navigation::sidebar.sidebar collapsible="icon">
        <x-navigation::sidebar.header>
            {{-- Logo/Brand --}}
        </x-navigation::sidebar.header>

        <x-navigation::sidebar.content>
            <x-navigation::sidebar.menu>
                <x-navigation::sidebar.menu-item>
                    <x-navigation::sidebar.menu-button href="/dashboard" :is-active="true">
                        <x-heroicon-o-home class="size-5" />
                        <span>Dashboard</span>
                    </x-navigation::sidebar.menu-button>
                </x-navigation::sidebar.menu-item>
            </x-navigation::sidebar.menu>
        </x-navigation::sidebar.content>

        <x-navigation::sidebar.footer>
            {{-- User menu --}}
        </x-navigation::sidebar.footer>
    </x-navigation::sidebar.sidebar>

    <x-navigation::sidebar.inset>
        {{-- Main content --}}
    </x-navigation::sidebar.inset>
</x-navigation::sidebar.provider>
```

### Sidebar Features

- **Collapsible modes**: `icon` (collapses to icons), `offcanvas` (slides away), `none` (always open)
- **Mobile responsive**: Automatic mobile sheet with backdrop
- **Keyboard shortcuts**: `Ctrl/Cmd + B` to toggle
- **State persistence**: Remembers open/closed state via localStorage
- **SPA support**: Works with Accelade SPA navigation

## CSS Custom Properties

Customize the sidebar appearance with CSS variables:

```css
:root {
    --nav-sidebar-width: 17rem;
    --nav-sidebar-width-icon: 4.5rem;
    --nav-sidebar-bg: #ffffff;
    --nav-sidebar-fg: #374151;
    --nav-sidebar-border: #e5e7eb;
    --nav-sidebar-hover-bg: #f3f4f6;
    --nav-sidebar-active-bg: #eff6ff;
    --nav-sidebar-active-fg: #1d4ed8;
}
```

## Next Steps

- [Nav Item](./nav-item.md) - Item props and features
- [Nav Group](./nav-group.md) - Collapsible groups
- [Examples](./examples.md) - Real-world examples
- [PHP Builder](./php-builder.md) - Fluent API
