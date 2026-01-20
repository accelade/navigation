<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

beforeEach(function () {
    Blade::componentNamespace('Accelade\\Navigation\\Components', 'navigation');
});

it('renders header component', function () {
    $html = Blade::render('<x-navigation::header>Content</x-navigation::header>');

    expect($html)
        ->toContain('data-slot="header"')
        ->toContain('data-navigation="header"')
        ->toContain('<header')
        ->toContain('Content');
});

it('renders header with sticky attribute by default', function () {
    $html = Blade::render('<x-navigation::header>Content</x-navigation::header>');

    expect($html)
        ->toContain('data-sticky="true"');
});

it('renders header without sticky when disabled', function () {
    $html = Blade::render('<x-navigation::header :sticky="false">Content</x-navigation::header>');

    expect($html)
        ->toContain('data-sticky="false"');
});

it('renders header with leading slot', function () {
    $html = Blade::render('
        <x-navigation::header>
            <x-slot:leading>Leading Content</x-slot:leading>
        </x-navigation::header>
    ');

    expect($html)
        ->toContain('data-slot="header-leading"')
        ->toContain('data-navigation="header-leading"')
        ->toContain('Leading Content');
});

it('renders header with center slot', function () {
    $html = Blade::render('
        <x-navigation::header>
            <x-slot:center>Center Content</x-slot:center>
        </x-navigation::header>
    ');

    expect($html)
        ->toContain('data-slot="header-center"')
        ->toContain('data-navigation="header-center"')
        ->toContain('Center Content');
});

it('renders header with trailing slot', function () {
    $html = Blade::render('
        <x-navigation::header>
            <x-slot:trailing>Trailing Content</x-slot:trailing>
        </x-navigation::header>
    ');

    expect($html)
        ->toContain('data-slot="header-trailing"')
        ->toContain('data-navigation="header-trailing"')
        ->toContain('Trailing Content');
});

it('renders header with default content', function () {
    $html = Blade::render('<x-navigation::header>Default Content</x-navigation::header>');

    expect($html)
        ->toContain('data-slot="header-content"')
        ->toContain('data-navigation="header-content"')
        ->toContain('Default Content');
});

it('renders header with spacer', function () {
    $html = Blade::render('<x-navigation::header>Content</x-navigation::header>');

    expect($html)
        ->toContain('data-slot="header-spacer"')
        ->toContain('data-navigation="header-spacer"');
});

it('renders header with all slots', function () {
    $html = Blade::render('
        <x-navigation::header>
            <x-slot:leading>Logo</x-slot:leading>
            <x-slot:center>Search</x-slot:center>
            <x-slot:trailing>User</x-slot:trailing>
        </x-navigation::header>
    ');

    expect($html)
        ->toContain('data-slot="header-leading"')
        ->toContain('data-slot="header-center"')
        ->toContain('data-slot="header-trailing"')
        ->toContain('data-slot="header-spacer"')
        ->toContain('Logo')
        ->toContain('Search')
        ->toContain('User');
});

it('accepts custom classes', function () {
    $html = Blade::render('<x-navigation::header class="px-4 py-3 border-b">Content</x-navigation::header>');

    expect($html)
        ->toContain('px-4')
        ->toContain('py-3')
        ->toContain('border-b');
});
