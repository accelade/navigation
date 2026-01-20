# Sidebar Menu

Build navigation menus within the sidebar using the menu component family.

## Basic Usage

```blade
<x-navigation::sidebar.content>
    <x-navigation::sidebar.menu>
        <x-navigation::sidebar.menu-item>
            <x-navigation::sidebar.menu-button href="/dashboard" :is-active="true">
                <x-heroicon-o-home class="size-5" />
                <span>Dashboard</span>
            </x-navigation::sidebar.menu-button>
        </x-navigation::sidebar.menu-item>

        <x-navigation::sidebar.menu-item>
            <x-navigation::sidebar.menu-button href="/users">
                <x-heroicon-o-users class="size-5" />
                <span>Users</span>
                <x-navigation::sidebar.menu-badge>12</x-navigation::sidebar.menu-badge>
            </x-navigation::sidebar.menu-button>
        </x-navigation::sidebar.menu-item>
    </x-navigation::sidebar.menu>
</x-navigation::sidebar.content>
```

## Components

### Menu Container

The `sidebar.menu` wraps all menu items:

```blade
<x-navigation::sidebar.menu class="space-y-1">
    <!-- Menu items -->
</x-navigation::sidebar.menu>
```

### Menu Item

The `sidebar.menu-item` is a wrapper `<li>` element:

```blade
<x-navigation::sidebar.menu-item>
    <!-- Menu button inside -->
</x-navigation::sidebar.menu-item>
```

### Menu Button

The `sidebar.menu-button` is the clickable element:

```blade
<x-navigation::sidebar.menu-button
    href="/dashboard"
    :is-active="request()->is('dashboard')"
    size="default"
    tooltip="Dashboard"
>
    <x-heroicon-o-home class="size-5" />
    <span>Dashboard</span>
</x-navigation::sidebar.menu-button>
```

#### Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `as` | string | `'button'` | Element type when no href |
| `href` | string | `null` | Navigation URL |
| `is-active` | bool | `false` | Active state |
| `size` | string | `'default'` | Size: sm, default, lg |
| `tooltip` | string | `null` | Tooltip on hover |

### Menu Badge

Add badges to menu items:

```blade
<x-navigation::sidebar.menu-button href="/notifications">
    <x-heroicon-o-bell class="size-5" />
    <span>Notifications</span>
    <x-navigation::sidebar.menu-badge>5</x-navigation::sidebar.menu-badge>
</x-navigation::sidebar.menu-button>
```

## Submenus

Create nested navigation with submenus:

```blade
<x-navigation::sidebar.menu-item>
    <x-navigation::sidebar.menu-button as="button">
        <x-heroicon-o-folder class="size-5" />
        <span>Content</span>
        <x-heroicon-o-chevron-right class="size-4 ml-auto" />
    </x-navigation::sidebar.menu-button>

    <x-navigation::sidebar.menu-sub>
        <x-navigation::sidebar.menu-sub-item>
            <x-navigation::sidebar.menu-sub-button href="/posts">
                Posts
            </x-navigation::sidebar.menu-sub-button>
        </x-navigation::sidebar.menu-sub-item>

        <x-navigation::sidebar.menu-sub-item>
            <x-navigation::sidebar.menu-sub-button href="/pages">
                Pages
            </x-navigation::sidebar.menu-sub-button>
        </x-navigation::sidebar.menu-sub-item>
    </x-navigation::sidebar.menu-sub>
</x-navigation::sidebar.menu-item>
```

## Groups

Organize menu items into labeled groups:

```blade
<x-navigation::sidebar.group>
    <x-navigation::sidebar.group-label>Main</x-navigation::sidebar.group-label>
    <x-navigation::sidebar.group-content>
        <x-navigation::sidebar.menu>
            <!-- Menu items -->
        </x-navigation::sidebar.menu>
    </x-navigation::sidebar.group-content>
</x-navigation::sidebar.group>
```

## Separator

Add visual separation between menu sections:

```blade
<x-navigation::sidebar.menu-item>
    <x-navigation::sidebar.menu-button href="/dashboard">Dashboard</x-navigation::sidebar.menu-button>
</x-navigation::sidebar.menu-item>

<x-navigation::sidebar.separator />

<x-navigation::sidebar.menu-item>
    <x-navigation::sidebar.menu-button href="/settings">Settings</x-navigation::sidebar.menu-button>
</x-navigation::sidebar.menu-item>
```

## Collapsed State

When the sidebar is collapsed to icon mode, text content is hidden. Use the `group-data-[collapsible=icon]:hidden` class to hide elements:

```blade
<x-navigation::sidebar.menu-button href="/dashboard">
    <x-heroicon-o-home class="size-5 shrink-0" />
    <span class="group-data-[collapsible=icon]:hidden">Dashboard</span>
</x-navigation::sidebar.menu-button>
```

## Keyboard Navigation

The menu supports keyboard navigation:

- **Arrow Down**: Move to next item
- **Arrow Up**: Move to previous item
- **Home**: Move to first item
- **End**: Move to last item
- **Enter/Space**: Activate item
