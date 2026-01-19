# Accelade Navigation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/accelade/navigation.svg?style=flat-square)](https://packagist.org/packages/accelade/navigation)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/accelade/navigation/tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/accelade/navigation/actions?query=workflow%3Atests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/accelade/navigation.svg?style=flat-square)](https://packagist.org/packages/accelade/navigation)

Build beautiful, accessible navigation menus for Laravel applications with Blade components. Part of the Accelade ecosystem.

## Features

- **Blade Components** - `<x-navigation::nav>`, `<x-navigation::nav-item>`, `<x-navigation::nav-group>`
- **Flexible Layouts** - Vertical sidebars, horizontal headers, or custom arrangements
- **Collapsible Groups** - Organize items into expandable/collapsible sections
- **Badges** - Display counts, status indicators, or labels with color variants
- **Icons** - Support for Heroicons and custom icon sets
- **Active State Detection** - Automatic or manual active state handling
- **PHP Builder API** - Build navigation programmatically with `NavigationItem` and `NavigationGroup` classes
- **Panel Integration** - Seamlessly integrates with `accelade/panel` for admin interfaces

## Installation

You can install the package via composer:

```bash
composer require accelade/navigation
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="navigation-config"
```

## Quick Start

### Basic Navigation

```blade
<x-navigation::nav>
    <x-navigation::nav-item
        label="Dashboard"
        href="/dashboard"
        icon="heroicon-o-home"
        :active="true"
    />
    <x-navigation::nav-item
        label="Users"
        href="/users"
        icon="heroicon-o-users"
        badge="12"
        badge-color="primary"
    />
    <x-navigation::nav-item
        label="Settings"
        href="/settings"
        icon="heroicon-o-cog-6-tooth"
    />
</x-navigation::nav>
```

### Navigation Groups

```blade
<x-navigation::nav>
    <x-navigation::nav-item label="Dashboard" href="/dashboard" icon="heroicon-o-home" />

    <x-navigation::nav-group label="Content" icon="heroicon-o-folder">
        <x-navigation::nav-item label="Posts" href="/posts" badge="24" />
        <x-navigation::nav-item label="Pages" href="/pages" />
        <x-navigation::nav-item label="Media" href="/media" />
    </x-navigation::nav-group>

    <x-navigation::nav-group label="Settings" icon="heroicon-o-cog-6-tooth" :collapsed="true">
        <x-navigation::nav-item label="General" href="/settings/general" />
        <x-navigation::nav-item label="Security" href="/settings/security" />
    </x-navigation::nav-group>
</x-navigation::nav>
```

### Horizontal Navigation

```blade
<x-navigation::nav direction="horizontal">
    <x-navigation::nav-item label="Home" href="/" :active="true" />
    <x-navigation::nav-item label="Features" href="/features" />
    <x-navigation::nav-item label="Pricing" href="/pricing" />
    <x-navigation::nav-item label="Docs" href="https://docs.example.com" :external="true" />
</x-navigation::nav>
```

### PHP Builder API

```php
use Accelade\Navigation\NavigationItem;
use Accelade\Navigation\NavigationGroup;

$navigation = [
    NavigationItem::make('Dashboard')
        ->icon('heroicon-o-home')
        ->url('/dashboard'),

    NavigationGroup::make('Content')
        ->icon('heroicon-o-folder')
        ->items([
            NavigationItem::make('Posts')
                ->icon('heroicon-o-newspaper')
                ->url('/posts')
                ->badge(fn () => Post::count()),
            NavigationItem::make('Pages')
                ->icon('heroicon-o-document')
                ->url('/pages'),
        ]),
];
```

## Documentation

The package includes comprehensive documentation available in the Accelade docs portal:

- [Getting Started](docs/getting-started.md) - Installation and basic usage
- [Nav Item](docs/nav-item.md) - Item configuration and options
- [Nav Group](docs/nav-group.md) - Collapsible groups and nesting

### Badge Colors

Available badge colors: `primary`, `success`, `warning`, `danger`, `info`, `gray`

```blade
<x-navigation::nav-item label="New" badge="5" badge-color="success" />
<x-navigation::nav-item label="Urgent" badge="!" badge-color="danger" />
```

## Testing

```bash
# Run tests
composer test

# Run tests with coverage
composer test:coverage

# Run code formatter
composer format

# Run mago linter
composer mago
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## Credits

- [Fady Mondy](https://github.com/3x1io)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
