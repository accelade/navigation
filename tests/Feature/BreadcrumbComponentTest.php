<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

beforeEach(function () {
    Blade::componentNamespace('Accelade\\Navigation\\Components', 'navigation');
});

it('renders breadcrumb component', function () {
    $html = Blade::render('<x-navigation::breadcrumb :items="[]" />');

    expect($html)
        ->toContain('data-slot="breadcrumb"')
        ->toContain('data-navigation="breadcrumb"')
        ->toContain('aria-label="Breadcrumb"')
        ->toContain('<nav');
});

it('renders breadcrumb with items', function () {
    $items = [
        ['label' => 'Dashboard', 'href' => '/dashboard'],
        ['label' => 'Users', 'href' => '/users'],
        ['label' => 'Edit'],
    ];

    $html = Blade::render('<x-navigation::breadcrumb :items="$items" />', [
        'items' => $items,
    ]);

    expect($html)
        ->toContain('Dashboard')
        ->toContain('Users')
        ->toContain('Edit')
        ->toContain('data-slot="breadcrumb-link"')
        ->toContain('data-slot="breadcrumb-page"');
});

it('renders breadcrumb with home link by default', function () {
    $html = Blade::render('<x-navigation::breadcrumb :items="[]" />');

    expect($html)
        ->toContain('href="/"')
        ->toContain('Home');
});

it('renders breadcrumb without home when disabled', function () {
    $html = Blade::render('<x-navigation::breadcrumb :items="[]" :show-home="false" />');

    expect($html)
        ->not->toContain('Home');
});

it('renders breadcrumb with custom home label', function () {
    $html = Blade::render('<x-navigation::breadcrumb :items="[]" home-label="Start" />');

    expect($html)
        ->toContain('Start');
});

it('renders breadcrumb with custom home href', function () {
    $html = Blade::render('<x-navigation::breadcrumb :items="[]" home-href="/home" />');

    expect($html)
        ->toContain('href="/home"');
});

it('renders breadcrumb separators', function () {
    $items = [
        ['label' => 'First', 'href' => '/first'],
        ['label' => 'Second'],
    ];

    $html = Blade::render('<x-navigation::breadcrumb :items="$items" />', [
        'items' => $items,
    ]);

    expect($html)
        ->toContain('data-slot="breadcrumb-separator"')
        ->toContain('aria-hidden="true"');
});

it('renders breadcrumb with custom separator', function () {
    $items = [
        ['label' => 'First', 'href' => '/first'],
        ['label' => 'Second'],
    ];

    $html = Blade::render('<x-navigation::breadcrumb :items="$items" separator="/" />', [
        'items' => $items,
    ]);

    expect($html)
        ->toContain('/');
});

it('marks last item as current page', function () {
    $items = [
        ['label' => 'First', 'href' => '/first'],
        ['label' => 'Current'],
    ];

    $html = Blade::render('<x-navigation::breadcrumb :items="$items" />', [
        'items' => $items,
    ]);

    expect($html)
        ->toContain('aria-current="page"')
        ->toContain('data-current="true"');
});

it('renders breadcrumb item component', function () {
    $html = Blade::render('<x-navigation::breadcrumb-item>Item</x-navigation::breadcrumb-item>');

    expect($html)
        ->toContain('data-slot="breadcrumb-item"')
        ->toContain('data-navigation="breadcrumb-item"')
        ->toContain('Item');
});

it('renders breadcrumb item as link when href provided', function () {
    $html = Blade::render('<x-navigation::breadcrumb-item href="/page">Page</x-navigation::breadcrumb-item>');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/page"')
        ->toContain('data-slot="breadcrumb-link"');
});

it('renders breadcrumb item as span when current', function () {
    $html = Blade::render('<x-navigation::breadcrumb-item :current="true">Current</x-navigation::breadcrumb-item>');

    expect($html)
        ->toContain('aria-current="page"')
        ->toContain('data-current="true"')
        ->toContain('data-slot="breadcrumb-page"');
});

it('renders breadcrumb separator component', function () {
    $html = Blade::render('<x-navigation::breadcrumb-separator />');

    expect($html)
        ->toContain('data-slot="breadcrumb-separator"')
        ->toContain('data-navigation="breadcrumb-separator"')
        ->toContain('aria-hidden="true"');
});

it('renders breadcrumb separator with custom content', function () {
    $html = Blade::render('<x-navigation::breadcrumb-separator>|</x-navigation::breadcrumb-separator>');

    expect($html)
        ->toContain('|');
});

it('renders breadcrumb with ordered list', function () {
    $html = Blade::render('<x-navigation::breadcrumb :items="[]" />');

    expect($html)
        ->toContain('<ol')
        ->toContain('data-slot="breadcrumb-list"');
});
