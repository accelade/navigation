<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

beforeEach(function () {
    // Ensure the component namespace is registered
    Blade::componentNamespace('Accelade\\Navigation\\Components', 'navigation');
});

it('renders sidebar provider component', function () {
    $html = Blade::render('<x-navigation::sidebar.provider>Content</x-navigation::sidebar.provider>');

    expect($html)
        ->toContain('data-slot="sidebar-wrapper"')
        ->toContain('Content');
});

it('renders sidebar provider with custom store', function () {
    $html = Blade::render('<x-navigation::sidebar.provider store="custom-store">Content</x-navigation::sidebar.provider>');

    expect($html)
        ->toContain('data-slot="sidebar-wrapper"')
        ->toContain('store="custom-store"');
});

it('renders sidebar component', function () {
    $html = Blade::render('
        <x-navigation::sidebar.provider>
            <x-navigation::sidebar.sidebar collapsible="icon">
                Sidebar Content
            </x-navigation::sidebar.sidebar>
        </x-navigation::sidebar.provider>
    ');

    expect($html)
        ->toContain('data-sidebar="sidebar"')
        ->toContain('Sidebar Content');
});

it('renders sidebar header component', function () {
    $html = Blade::render('
        <x-navigation::sidebar.header class="px-4 py-3">
            Header Content
        </x-navigation::sidebar.header>
    ');

    expect($html)
        ->toContain('data-slot="sidebar-header"')
        ->toContain('data-sidebar="header"')
        ->toContain('Header Content')
        ->toContain('px-4 py-3');
});

it('renders sidebar content component', function () {
    $html = Blade::render('
        <x-navigation::sidebar.content class="overflow-auto">
            Content Area
        </x-navigation::sidebar.content>
    ');

    expect($html)
        ->toContain('data-slot="sidebar-content"')
        ->toContain('data-sidebar="content"')
        ->toContain('Content Area')
        ->toContain('overflow-auto');
});

it('renders sidebar footer component', function () {
    $html = Blade::render('
        <x-navigation::sidebar.footer class="border-t">
            Footer Content
        </x-navigation::sidebar.footer>
    ');

    expect($html)
        ->toContain('data-slot="sidebar-footer"')
        ->toContain('data-sidebar="footer"')
        ->toContain('Footer Content')
        ->toContain('border-t');
});

it('renders sidebar menu component', function () {
    $html = Blade::render('
        <x-navigation::sidebar.menu class="space-y-1">
            Menu Items
        </x-navigation::sidebar.menu>
    ');

    expect($html)
        ->toContain('data-slot="sidebar-menu"')
        ->toContain('data-sidebar="menu"')
        ->toContain('Menu Items')
        ->toContain('<ul');
});

it('renders sidebar menu item component', function () {
    $html = Blade::render('
        <x-navigation::sidebar.menu-item class="relative">
            Menu Item Content
        </x-navigation::sidebar.menu-item>
    ');

    expect($html)
        ->toContain('data-slot="sidebar-menu-item"')
        ->toContain('data-sidebar="menu-item"')
        ->toContain('Menu Item Content')
        ->toContain('<li');
});

it('renders sidebar menu button as link when href provided', function () {
    $html = Blade::render('
        <x-navigation::sidebar.menu-button href="/dashboard" :is-active="true">
            Dashboard
        </x-navigation::sidebar.menu-button>
    ');

    expect($html)
        ->toContain('data-slot="sidebar-menu-button"')
        ->toContain('data-sidebar="menu-button"')
        ->toContain('data-active="true"')
        ->toContain('Dashboard');
});

it('renders sidebar menu button as button when no href', function () {
    $html = Blade::render('
        <x-navigation::sidebar.menu-button :is-active="false">
            Button Text
        </x-navigation::sidebar.menu-button>
    ');

    expect($html)
        ->toContain('data-slot="sidebar-menu-button"')
        ->toContain('data-active="false"')
        ->toContain('type="button"')
        ->toContain('Button Text');
});

it('renders sidebar trigger component', function () {
    $html = Blade::render('
        <x-navigation::sidebar.trigger class="lg:hidden">
            Toggle Button
        </x-navigation::sidebar.trigger>
    ');

    expect($html)
        ->toContain('data-slot="sidebar-trigger"')
        ->toContain('data-sidebar="trigger"')
        ->toContain('@click')
        ->toContain('Toggle Button');
});

it('renders sidebar inset component', function () {
    $html = Blade::render('
        <x-navigation::sidebar.inset class="flex-1">
            Main Content
        </x-navigation::sidebar.inset>
    ');

    expect($html)
        ->toContain('data-slot="sidebar-inset"')
        ->toContain('data-sidebar="inset"')
        ->toContain('Main Content')
        ->toContain('<main');
});

it('renders sidebar separator component', function () {
    $html = Blade::render('<x-navigation::sidebar.separator class="my-2" />');

    expect($html)
        ->toContain('data-slot="sidebar-separator"')
        ->toContain('data-sidebar="separator"')
        ->toContain('<hr')
        ->toContain('my-2');
});

it('renders sidebar group component', function () {
    $html = Blade::render('
        <x-navigation::sidebar.group class="mb-4">
            Group Content
        </x-navigation::sidebar.group>
    ');

    expect($html)
        ->toContain('data-slot="sidebar-group"')
        ->toContain('data-sidebar="group"')
        ->toContain('Group Content')
        ->toContain('mb-4');
});

it('renders sidebar rail component', function () {
    $html = Blade::render('<x-navigation::sidebar.rail class="hover:bg-blue-500" />');

    expect($html)
        ->toContain('data-slot="sidebar-rail"')
        ->toContain('data-sidebar="rail"')
        ->toContain('aria-label="Toggle Sidebar"')
        ->toContain('@click');
});

it('renders complete sidebar structure', function () {
    $html = Blade::render('
        <x-navigation::sidebar.provider :default-open="true" store="main-sidebar">
            <x-navigation::sidebar.sidebar collapsible="icon">
                <x-navigation::sidebar.header>Logo</x-navigation::sidebar.header>
                <x-navigation::sidebar.content>
                    <x-navigation::sidebar.menu>
                        <x-navigation::sidebar.menu-item>
                            <x-navigation::sidebar.menu-button href="/dashboard" :is-active="true">
                                Dashboard
                            </x-navigation::sidebar.menu-button>
                        </x-navigation::sidebar.menu-item>
                    </x-navigation::sidebar.menu>
                </x-navigation::sidebar.content>
                <x-navigation::sidebar.footer>User</x-navigation::sidebar.footer>
            </x-navigation::sidebar.sidebar>
            <x-navigation::sidebar.inset>
                <x-navigation::sidebar.trigger>Toggle</x-navigation::sidebar.trigger>
                Main Content
            </x-navigation::sidebar.inset>
        </x-navigation::sidebar.provider>
    ');

    expect($html)
        ->toContain('data-slot="sidebar-wrapper"')
        ->toContain('data-slot="sidebar-header"')
        ->toContain('data-slot="sidebar-content"')
        ->toContain('data-slot="sidebar-footer"')
        ->toContain('data-slot="sidebar-menu"')
        ->toContain('data-slot="sidebar-menu-item"')
        ->toContain('data-slot="sidebar-menu-button"')
        ->toContain('data-slot="sidebar-trigger"')
        ->toContain('data-slot="sidebar-inset"')
        ->toContain('Logo')
        ->toContain('Dashboard')
        ->toContain('User')
        ->toContain('Toggle')
        ->toContain('Main Content');
});
