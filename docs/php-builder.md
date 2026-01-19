# PHP Fluent Builder

Build navigation programmatically using the fluent API.

## NavigationBuilder

```php
use Accelade\Navigation\NavigationBuilder;
use Accelade\Navigation\NavigationItem;
use Accelade\Navigation\NavigationGroup;

$navigation = new NavigationBuilder();

$navigation->item('Dashboard')
    ->icon('heroicon-o-home')
    ->url('/dashboard')
    ->register();

$navigation->item('Users')
    ->icon('heroicon-o-users')
    ->url('/users')
    ->badge('12')
    ->register();

$items = $navigation->getItems();
```

## NavigationItem

```php
NavigationItem::make('Dashboard')
    ->icon('heroicon-o-home')
    ->activeIcon('heroicon-s-home')
    ->url('/dashboard')
    ->badge('New')
    ->badgeColor('success')
    ->isExternal();
```

## NavigationGroup

```php
$navigation->group('Settings')
    ->icon('heroicon-o-cog')
    ->items([
        NavigationItem::make('General')->url('/settings'),
        NavigationItem::make('Security')->url('/settings/security'),
    ])
    ->register();
```

## In Panel Provider

```php
use Accelade\Panel\Panel;
use Accelade\Navigation\NavigationItem;
use Accelade\Navigation\NavigationGroup;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->navigation([
                NavigationItem::make('Dashboard')
                    ->icon('heroicon-o-home')
                    ->url('/admin/dashboard'),

                NavigationGroup::make('Content')
                    ->icon('heroicon-o-document-text')
                    ->items([
                        NavigationItem::make('Posts')->url('/admin/posts'),
                        NavigationItem::make('Pages')->url('/admin/pages'),
                    ]),
            ]);
    }
}
```
