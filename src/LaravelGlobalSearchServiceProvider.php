<?php

namespace Dipesh79\LaravelGlobalSearch;

use Illuminate\Support\ServiceProvider;

class LaravelGlobalSearchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/config/laravel-global-search.php' => config_path('laravel-global-search.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__ . '/config/laravel-global-search.php', 'laravel-global-search');
    }
}
