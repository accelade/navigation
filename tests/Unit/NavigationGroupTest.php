<?php

declare(strict_types=1);

use Accelade\Navigation\NavigationGroup;
use Accelade\Navigation\NavigationItem;

it('can create a navigation group with make', function () {
    $group = NavigationGroup::make('Settings');

    expect($group->getLabel())->toBe('Settings');
});

it('can set and get icon', function () {
    $group = NavigationGroup::make('Settings')
        ->icon('heroicon-o-cog');

    expect($group->getIcon())->toBe('heroicon-o-cog');
});

it('can set and get items', function () {
    $items = [
        NavigationItem::make('General'),
        NavigationItem::make('Users'),
    ];

    $group = NavigationGroup::make('Settings')
        ->items($items);

    expect($group->getItems())->toHaveCount(2);
});

it('filters out invisible items', function () {
    $items = [
        NavigationItem::make('General'),
        NavigationItem::make('Hidden')->visible(false),
    ];

    $group = NavigationGroup::make('Settings')
        ->items($items);

    expect($group->getItems())->toHaveCount(1);
});

it('sorts items by sort order', function () {
    $items = [
        NavigationItem::make('Third')->sort(3),
        NavigationItem::make('First')->sort(1),
        NavigationItem::make('Second')->sort(2),
    ];

    $group = NavigationGroup::make('Settings')
        ->items($items);

    $sortedItems = $group->getItems();

    expect($sortedItems[0]->getLabel())->toBe('First')
        ->and($sortedItems[1]->getLabel())->toBe('Second')
        ->and($sortedItems[2]->getLabel())->toBe('Third');
});

it('can be collapsible', function () {
    $group = NavigationGroup::make('Settings')
        ->collapsible(true);

    expect($group->isCollapsible())->toBeTrue();
});

it('can be collapsed by default', function () {
    $group = NavigationGroup::make('Settings')
        ->collapsed(true);

    expect($group->isCollapsed())->toBeTrue();
});

it('can set sort order', function () {
    $group = NavigationGroup::make('Settings')
        ->sort(10);

    expect($group->getSort())->toBe(10);
});

it('can set visibility', function () {
    $group = NavigationGroup::make('Admin')
        ->visible(false);

    expect($group->isVisible())->toBeFalse();
});

it('can detect if it has an active item', function () {
    $items = [
        NavigationItem::make('General')
            ->url('/settings/general')
            ->isActiveWhen(fn () => true),
    ];

    $group = NavigationGroup::make('Settings')
        ->items($items);

    expect($group->hasActiveItem())->toBeTrue();
});

it('can convert to array', function () {
    $group = NavigationGroup::make('Settings')
        ->icon('heroicon-o-cog')
        ->items([
            NavigationItem::make('General'),
        ])
        ->sort(1);

    $array = $group->toArray();

    expect($array)->toHaveKeys([
        'label',
        'icon',
        'items',
        'sort',
        'collapsible',
        'collapsed',
        'isVisible',
        'hasActiveItem',
    ]);
});
