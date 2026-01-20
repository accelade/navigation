<?php

declare(strict_types=1);

use Accelade\Navigation\NavigationServiceProvider;
use Illuminate\Support\Facades\Blade;

it('registers the navigation service provider', function () {
    expect(app()->providerIsLoaded(NavigationServiceProvider::class))->toBeTrue();
});

it('registers navigation blade component namespace', function () {
    // Test that blade components are registered
    $components = Blade::getClassComponentAliases();

    // The component namespace should be registered
    expect(class_exists('Accelade\Navigation\Components\Nav'))->toBeTrue();
    expect(class_exists('Accelade\Navigation\Components\NavItem'))->toBeTrue();
    expect(class_exists('Accelade\Navigation\Components\NavGroup'))->toBeTrue();
});

it('registers navigation sidebar components', function () {
    // Test that sidebar blade components are available
    $html = Blade::render('<x-navigation::sidebar.provider>Test</x-navigation::sidebar.provider>');
    expect($html)->toContain('Test');
});

it('loads navigation views', function () {
    // Test that views are loadable
    expect(view()->exists('navigation::components.sidebar.provider'))->toBeTrue();
    expect(view()->exists('navigation::components.sidebar.sidebar'))->toBeTrue();
    expect(view()->exists('navigation::components.sidebar.header'))->toBeTrue();
    expect(view()->exists('navigation::components.sidebar.content'))->toBeTrue();
    expect(view()->exists('navigation::components.sidebar.footer'))->toBeTrue();
    expect(view()->exists('navigation::components.sidebar.menu'))->toBeTrue();
    expect(view()->exists('navigation::components.sidebar.menu-item'))->toBeTrue();
    expect(view()->exists('navigation::components.sidebar.menu-button'))->toBeTrue();
    expect(view()->exists('navigation::components.sidebar.trigger'))->toBeTrue();
    expect(view()->exists('navigation::components.sidebar.inset'))->toBeTrue();
});

it('registers navigation js assets with accelade', function () {
    // Skip if accelade is not bound (it may not be in test environment)
    if (! app()->bound('accelade')) {
        $this->markTestSkipped('Accelade not bound in test environment');
    }

    // Check that the built JS file exists in dist/
    $jsPath = __DIR__.'/../../dist/navigation.js';
    expect(file_exists($jsPath))->toBeTrue();
});

it('registers navigation css assets with accelade', function () {
    // Skip if accelade is not bound (it may not be in test environment)
    if (! app()->bound('accelade')) {
        $this->markTestSkipped('Accelade not bound in test environment');
    }

    // Check that the CSS file exists
    $cssPath = __DIR__.'/../../resources/css/navigation.css';
    expect(file_exists($cssPath))->toBeTrue();
});

it('has navigation js file with expected content', function () {
    $jsPath = __DIR__.'/../../dist/navigation.js';
    $content = file_get_contents($jsPath);

    // Check for key exports in the built TypeScript output
    expect($content)
        ->toContain('NavigationManager')
        ->toContain('AcceladeNavigation')
        ->toContain('toggleSidebar')
        ->toContain('collapseSidebar')
        ->toContain('expandSidebar');
});

it('has navigation css file with expected content', function () {
    $cssPath = __DIR__.'/../../resources/css/navigation.css';
    $content = file_get_contents($cssPath);

    expect($content)
        ->toContain('--nav-sidebar-width')
        ->toContain('--nav-sidebar-bg')
        ->toContain('[data-sidebar="sidebar"]')
        ->toContain('[data-sidebar="menu-button"]')
        ->toContain('[data-sidebar="trigger"]');
});

it('loads navigation config', function () {
    expect(config('accelade-navigation'))->toBeArray();
});
