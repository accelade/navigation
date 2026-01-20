<?php

declare(strict_types=1);

namespace Accelade\Navigation;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Merge config
        $this->mergeConfigFrom(
            __DIR__.'/../config/accelade-navigation.php',
            'accelade-navigation'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Load translations
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'navigation');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'navigation');

        // Register Blade components (PHP class-based components)
        Blade::componentNamespace('Accelade\\Navigation\\Components', 'navigation');

        // Register anonymous Blade components for sidebar
        $this->registerSidebarComponents();

        // Register standalone components (theme-toggle, breadcrumb, etc.)
        $this->registerStandaloneComponents();

        // Register JS and CSS assets with Accelade
        $this->registerAssets();

        // Register documentation after all service providers are booted
        $this->app->booted(function () {
            $this->registerDocs();
        });

        if ($this->app->runningInConsole()) {
            // Publish config
            $this->publishes([
                __DIR__.'/../config/accelade-navigation.php' => config_path('accelade-navigation.php'),
            ], 'accelade-navigation-config');

            // Publish views
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/navigation'),
            ], 'accelade-navigation-views');

            // Publish assets (built TypeScript output and CSS)
            $this->publishes([
                __DIR__.'/../dist' => public_path('vendor/navigation'),
                __DIR__.'/../resources/css' => resource_path('css/vendor/navigation'),
            ], 'accelade-navigation-assets');

            // Register commands
            $this->commands([
                Commands\InstallNavigationCommand::class,
            ]);
        }
    }

    /**
     * Register navigation JS and CSS assets with Accelade.
     */
    protected function registerAssets(): void
    {
        if (! $this->app->bound('accelade')) {
            return;
        }

        $accelade = $this->app->make('accelade');

        // Register CSS styles
        $cssPath = __DIR__.'/../resources/css/navigation.css';
        if (file_exists($cssPath)) {
            $accelade->registerStyle('navigation', function () use ($cssPath) {
                $css = file_get_contents($cssPath);

                return "<style>\n/* Accelade Navigation Styles */\n{$css}\n</style>";
            });
        }

        // Register JavaScript - use built TypeScript output from dist/
        $jsPath = __DIR__.'/../dist/navigation.js';
        if (file_exists($jsPath)) {
            $accelade->registerScript('navigation', function () use ($jsPath) {
                $js = file_get_contents($jsPath);

                return "<script>\n/* Accelade Navigation Scripts */\n{$js}\n</script>";
            });
        }
    }

    /**
     * Register documentation with Accelade docs system.
     */
    protected function registerDocs(): void
    {
        if (! $this->app->bound('accelade.docs')) {
            return;
        }

        $docs = $this->app->make('accelade.docs');

        // Register package path
        $docs->registerPackage('navigation', __DIR__.'/../docs');

        // Register navigation group
        $docs->registerGroup('navigation', 'Navigation', 'bars-3', 50);

        // Register sub-groups
        $docs->registerSubgroup('navigation', 'components', '🧩 Components', '', 10);
        $docs->registerSubgroup('navigation', 'usage', '📖 Usage', '', 20);

        // Overview (at group level)
        $docs->section('navigation-overview')
            ->label('Overview')
            ->icon('🧭')
            ->markdown('getting-started.md')
            ->package('navigation')
            ->inGroup('navigation')
            ->demo()
            ->register();

        // Register sub-groups for sidebar
        $docs->registerSubgroup('navigation', 'sidebar', '📦 Sidebar', '', 5);

        // Sidebar Components sub-group
        $docs->section('navigation-sidebar')
            ->label('Sidebar')
            ->icon('📐')
            ->markdown('sidebar.md')
            ->package('navigation')
            ->inGroup('navigation')
            ->inSubgroup('sidebar')
            ->demo()
            ->register();

        $docs->section('navigation-sidebar-menu')
            ->label('Sidebar Menu')
            ->icon('📋')
            ->markdown('sidebar-menu.md')
            ->package('navigation')
            ->inGroup('navigation')
            ->inSubgroup('sidebar')
            ->demo()
            ->register();

        $docs->section('navigation-sidebar-trigger')
            ->label('Sidebar Trigger')
            ->icon('🔘')
            ->markdown('sidebar-trigger.md')
            ->package('navigation')
            ->inGroup('navigation')
            ->inSubgroup('sidebar')
            ->demo()
            ->register();

        // Nav Components sub-group
        $docs->section('navigation-nav-item')
            ->label('Nav Item')
            ->icon('🔗')
            ->markdown('nav-item.md')
            ->package('navigation')
            ->inGroup('navigation')
            ->inSubgroup('components')
            ->demo()
            ->register();

        $docs->section('navigation-nav-group')
            ->label('Nav Group')
            ->icon('📁')
            ->markdown('nav-group.md')
            ->package('navigation')
            ->inGroup('navigation')
            ->inSubgroup('components')
            ->demo()
            ->register();

        $docs->section('navigation-theme-toggle')
            ->label('Theme Toggle')
            ->icon('🌓')
            ->markdown('theme-toggle.md')
            ->package('navigation')
            ->inGroup('navigation')
            ->inSubgroup('components')
            ->demo()
            ->register();

        $docs->section('navigation-user-menu')
            ->label('User Menu')
            ->icon('👤')
            ->markdown('user-menu.md')
            ->package('navigation')
            ->inGroup('navigation')
            ->inSubgroup('components')
            ->demo()
            ->register();

        $docs->section('navigation-breadcrumb')
            ->label('Breadcrumb')
            ->icon('🍞')
            ->markdown('breadcrumb.md')
            ->package('navigation')
            ->inGroup('navigation')
            ->inSubgroup('components')
            ->demo()
            ->register();

        $docs->section('navigation-header')
            ->label('Header')
            ->icon('📌')
            ->markdown('header.md')
            ->package('navigation')
            ->inGroup('navigation')
            ->inSubgroup('components')
            ->demo()
            ->register();

        $docs->section('navigation-footer')
            ->label('Footer')
            ->icon('📎')
            ->markdown('footer.md')
            ->package('navigation')
            ->inGroup('navigation')
            ->inSubgroup('components')
            ->demo()
            ->register();

        // Usage sub-group
        $docs->section('navigation-examples')
            ->label('Examples')
            ->icon('💡')
            ->markdown('examples.md')
            ->package('navigation')
            ->inGroup('navigation')
            ->inSubgroup('usage')
            ->register();

        $docs->section('navigation-php-builder')
            ->label('PHP Builder')
            ->icon('⚙️')
            ->markdown('php-builder.md')
            ->package('navigation')
            ->inGroup('navigation')
            ->inSubgroup('usage')
            ->register();
    }

    /**
     * Register standalone navigation components.
     */
    protected function registerStandaloneComponents(): void
    {
        $components = [
            'theme-toggle',
            'user-menu',
            'user-menu-item',
            'breadcrumb',
            'breadcrumb-item',
            'breadcrumb-separator',
            'header',
            'footer',
        ];

        foreach ($components as $component) {
            Blade::component("navigation::components.{$component}", "navigation::{$component}");
        }
    }

    /**
     * Register anonymous Blade components for the sidebar system.
     */
    protected function registerSidebarComponents(): void
    {
        // Sidebar components - Style-free base components
        // Usage: <x-navigation::sidebar.provider>, <x-navigation::sidebar.sidebar>, etc.
        $sidebarComponents = [
            'sidebar.provider',
            'sidebar.sidebar',
            'sidebar.header',
            'sidebar.content',
            'sidebar.footer',
            'sidebar.menu',
            'sidebar.menu-item',
            'sidebar.menu-button',
            'sidebar.menu-badge',
            'sidebar.menu-sub',
            'sidebar.menu-sub-item',
            'sidebar.menu-sub-button',
            'sidebar.group',
            'sidebar.group-label',
            'sidebar.group-content',
            'sidebar.trigger',
            'sidebar.inset',
            'sidebar.separator',
            'sidebar.rail',
            'sidebar.user-menu',
        ];

        foreach ($sidebarComponents as $component) {
            // Convert sidebar.menu-item to sidebar/menu-item for view path
            $viewPath = str_replace('.', '/', $component);
            Blade::component("navigation::components.{$viewPath}", "navigation::{$component}");
        }
    }
}
