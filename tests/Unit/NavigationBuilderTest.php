<?php

declare(strict_types=1);

use Accelade\Navigation\NavigationBuilder;
use Accelade\Navigation\NavigationGroup;
use Accelade\Navigation\NavigationItem;

it('can create a navigation builder', function () {
    $builder = new NavigationBuilder;

    expect($builder->getItems())->toBeArray()->toBeEmpty();
});

it('can add items using addItem method', function () {
    $builder = new NavigationBuilder;

    $builder->addItem(NavigationItem::make('Dashboard'));
    $builder->addItem(NavigationItem::make('Users'));

    expect($builder->getItems())->toHaveCount(2);
});

it('can build item using fluent builder', function () {
    $builder = new NavigationBuilder;

    $builder->item('Dashboard')
        ->icon('heroicon-o-home')
        ->url('/dashboard')
        ->register();

    expect($builder->getItems())->toHaveCount(1)
        ->and($builder->getItems()[0])->toBeInstanceOf(NavigationItem::class);
});

it('can build group using fluent builder', function () {
    $builder = new NavigationBuilder;

    $builder->group('Settings')
        ->icon('heroicon-o-cog')
        ->items([
            NavigationItem::make('General'),
            NavigationItem::make('Users'),
        ])
        ->register();

    expect($builder->getItems())->toHaveCount(1)
        ->and($builder->getItems()[0])->toBeInstanceOf(NavigationGroup::class);
});

it('can chain methods', function () {
    $builder = new NavigationBuilder;

    $builder
        ->item('Dashboard')
        ->icon('heroicon-o-home')
        ->url('/dashboard')
        ->register()
        ->group('Settings')
        ->icon('heroicon-o-cog')
        ->items([
            NavigationItem::make('General'),
        ])
        ->register()
        ->item('Help')
        ->url('/help')
        ->register();

    expect($builder->getItems())->toHaveCount(3);
});
