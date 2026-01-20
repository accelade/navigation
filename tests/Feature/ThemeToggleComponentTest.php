<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

beforeEach(function () {
    Blade::componentNamespace('Accelade\\Navigation\\Components', 'navigation');
});

it('renders theme toggle component', function () {
    $html = Blade::render('<x-navigation::theme-toggle />');

    expect($html)
        ->toContain('data-slot="theme-toggle"')
        ->toContain('data-navigation="theme-toggle"')
        ->toContain('data-accelade')
        ->toContain('@click.prevent="cycleTheme()"');
});

it('renders theme toggle with custom store', function () {
    $html = Blade::render('<x-navigation::theme-toggle store="custom-theme" />');

    expect($html)
        ->toContain('data-slot="theme-toggle"')
        ->toContain('store="custom-theme"');
});

it('renders theme toggle with system option', function () {
    $html = Blade::render('<x-navigation::theme-toggle :show-system="true" />');

    expect($html)
        ->toContain('data-slot="theme-toggle"')
        ->toContain('light')
        ->toContain('dark')
        ->toContain('system')
        ->toContain('data-theme-icon="system"');
});

it('renders theme toggle without system option by default', function () {
    $html = Blade::render('<x-navigation::theme-toggle />');

    expect($html)
        ->toContain('light')
        ->toContain('dark')
        ->not->toContain('data-theme-icon="system"');
});

it('renders theme toggle as button by default', function () {
    $html = Blade::render('<x-navigation::theme-toggle />');

    expect($html)
        ->toContain('<button')
        ->toContain('type="button"');
});

it('renders theme toggle as different element', function () {
    $html = Blade::render('<x-navigation::theme-toggle as="div" />');

    expect($html)
        ->toContain('<div')
        ->not->toContain('type="button"');
});

it('renders default light and dark icons', function () {
    $html = Blade::render('<x-navigation::theme-toggle />');

    expect($html)
        ->toContain('data-theme-icon="light"')
        ->toContain('data-theme-icon="dark"')
        ->toContain('a-show="theme === \'light\'"')
        ->toContain('a-show="theme === \'dark\'"');
});

it('accepts custom classes', function () {
    $html = Blade::render('<x-navigation::theme-toggle class="custom-class p-2" />');

    expect($html)
        ->toContain('custom-class')
        ->toContain('p-2');
});

it('persists theme by default', function () {
    $html = Blade::render('<x-navigation::theme-toggle />');

    expect($html)
        ->toContain('localStorage');
});

it('can disable persistence', function () {
    $html = Blade::render('<x-navigation::theme-toggle :persist="false" />');

    expect($html)
        ->toContain('data-slot="theme-toggle"');
});

it('uses data component for state', function () {
    $html = Blade::render('<x-navigation::theme-toggle />');

    expect($html)
        ->toContain('data-accelade')
        ->toContain('data-accelade-state');
});

it('stores theme in data component with localStorage', function () {
    $html = Blade::render('<x-navigation::theme-toggle />');

    expect($html)
        ->toContain('data-accelade-local-storage')
        ->toContain('data-accelade-store');
});
