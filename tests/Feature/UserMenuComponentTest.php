<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

beforeEach(function () {
    Blade::componentNamespace('Accelade\\Navigation\\Components', 'navigation');
});

it('renders user menu component', function () {
    $html = Blade::render('<x-navigation::user-menu>Menu Content</x-navigation::user-menu>');

    expect($html)
        ->toContain('data-slot="user-menu"')
        ->toContain('data-navigation="user-menu"')
        ->toContain('Menu Content');
});

it('renders user menu with user data', function () {
    $user = new class
    {
        public string $name = 'John Doe';

        public string $email = 'john@example.com';
    };

    $html = Blade::render('<x-navigation::user-menu :user="$user">Content</x-navigation::user-menu>', [
        'user' => $user,
    ]);

    expect($html)
        ->toContain('data-authenticated="true"')
        ->toContain('JD'); // Initials
});

it('renders user menu without user as guest', function () {
    $html = Blade::render('<x-navigation::user-menu :user="null">Content</x-navigation::user-menu>');

    expect($html)
        ->toContain('data-authenticated="false"');
});

it('renders user menu with default position', function () {
    $html = Blade::render('<x-navigation::user-menu>Content</x-navigation::user-menu>');

    expect($html)
        ->toContain('top-full right-0 mt-2'); // bottom-end default
});

it('renders user menu with custom position', function () {
    $html = Blade::render('<x-navigation::user-menu position="bottom-start">Content</x-navigation::user-menu>');

    expect($html)
        ->toContain('top-full left-0 mt-2');
});

it('renders user menu item component', function () {
    $html = Blade::render('<x-navigation::user-menu-item>Item Text</x-navigation::user-menu-item>');

    expect($html)
        ->toContain('data-slot="user-menu-item"')
        ->toContain('data-navigation="user-menu-item"')
        ->toContain('Item Text');
});

it('renders user menu item as button by default', function () {
    $html = Blade::render('<x-navigation::user-menu-item>Click Me</x-navigation::user-menu-item>');

    expect($html)
        ->toContain('<button')
        ->toContain('type="button"');
});

it('renders user menu item as link when href provided', function () {
    $html = Blade::render('<x-navigation::user-menu-item href="/profile">Profile</x-navigation::user-menu-item>');

    expect($html)
        ->toContain('<a')
        ->toContain('href="/profile"')
        ->toContain('Profile');
});

it('renders user menu item with danger attribute', function () {
    $html = Blade::render('<x-navigation::user-menu-item :danger="true">Delete</x-navigation::user-menu-item>');

    expect($html)
        ->toContain('data-danger="true"');
});

it('renders sidebar user menu component', function () {
    $html = Blade::render('<x-navigation::sidebar.user-menu>Content</x-navigation::sidebar.user-menu>');

    expect($html)
        ->toContain('data-slot="sidebar-user-menu"')
        ->toContain('data-sidebar="user-menu"')
        ->toContain('Content');
});

it('renders sidebar user menu with user data', function () {
    $user = new class
    {
        public string $name = 'Jane Smith';

        public string $email = 'jane@example.com';
    };

    $html = Blade::render('<x-navigation::sidebar.user-menu :user="$user">Content</x-navigation::sidebar.user-menu>', [
        'user' => $user,
    ]);

    expect($html)
        ->toContain('data-authenticated="true"')
        ->toContain('JS'); // Initials
});

it('renders sidebar user menu with collapsed tooltip config', function () {
    $html = Blade::render('<x-navigation::sidebar.user-menu collapsed-tooltip="User Menu">Content</x-navigation::sidebar.user-menu>');

    expect($html)
        ->toContain('a-tooltip')
        ->toContain('onlyWhenCollapsed');
});

it('renders sidebar user menu dropdown opens upward', function () {
    $html = Blade::render('<x-navigation::sidebar.user-menu>Content</x-navigation::sidebar.user-menu>');

    expect($html)
        ->toContain('bottom-full'); // Opens upward
});
