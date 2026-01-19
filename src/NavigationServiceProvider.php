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

        // Register Blade components
        Blade::componentNamespace('Accelade\\Navigation\\Components', 'navigation');

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

            // Register commands
            $this->commands([
                Commands\InstallNavigationCommand::class,
            ]);
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

        // Components sub-group
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
}
