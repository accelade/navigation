# Navigation Component

The Accelade Navigation package provides Blade components for building navigation menus, sidebars, and navigation groups.

## Installation

```bash
composer require accelade/navigation
```

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

## Next Steps

- [Nav Item](./nav-item.md) - Item props and features
- [Nav Group](./nav-group.md) - Collapsible groups
- [Examples](./examples.md) - Real-world examples
- [PHP Builder](./php-builder.md) - Fluent API
