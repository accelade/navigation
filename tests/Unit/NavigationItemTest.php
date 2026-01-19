<?php

declare(strict_types=1);

use Accelade\Navigation\NavigationItem;

it('can create a navigation item with make', function () {
    $item = NavigationItem::make('Dashboard');

    expect($item->getLabel())->toBe('Dashboard');
});

it('can set and get icon', function () {
    $item = NavigationItem::make('Dashboard')
        ->icon('heroicon-o-home');

    expect($item->getIcon())->toBe('heroicon-o-home');
});

it('can set and get active icon', function () {
    $item = NavigationItem::make('Dashboard')
        ->icon('heroicon-o-home')
        ->activeIcon('heroicon-s-home');

    expect($item->getActiveIcon())->toBe('heroicon-s-home');
});

it('uses regular icon when no active icon is set', function () {
    $item = NavigationItem::make('Dashboard')
        ->icon('heroicon-o-home');

    expect($item->getActiveIcon())->toBe('heroicon-o-home');
});

it('can set url', function () {
    $item = NavigationItem::make('Dashboard')
        ->url('/admin/dashboard');

    expect($item->getUrl())->toBe('/admin/dashboard');
});

it('can set badge with color', function () {
    $item = NavigationItem::make('Notifications')
        ->badge('5', 'danger');

    expect($item->getBadge())->toBe('5')
        ->and($item->getBadgeColor())->toBe('danger');
});

it('can set sort order', function () {
    $item = NavigationItem::make('Dashboard')
        ->sort(10);

    expect($item->getSort())->toBe(10);
});

it('can open in new tab', function () {
    $item = NavigationItem::make('External')
        ->url('https://example.com')
        ->openInNewTab();

    expect($item->shouldOpenInNewTab())->toBeTrue();
});

it('can set visibility', function () {
    $item = NavigationItem::make('Admin')
        ->visible(false);

    expect($item->isVisible())->toBeFalse();
});

it('can set visibility with closure', function () {
    $item = NavigationItem::make('Admin')
        ->visible(fn () => true);

    expect($item->isVisible())->toBeTrue();
});

it('can convert to array', function () {
    $item = NavigationItem::make('Dashboard')
        ->icon('heroicon-o-home')
        ->url('/admin/dashboard')
        ->badge('5', 'danger')
        ->sort(1);

    $array = $item->toArray();

    expect($array)->toHaveKeys([
        'label',
        'icon',
        'activeIcon',
        'url',
        'badge',
        'badgeColor',
        'sort',
        'isActive',
        'isVisible',
        'openInNewTab',
    ]);
});
