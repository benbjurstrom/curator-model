<?php

namespace BenBjurstrom\CuratorModel;

use App;
use Illuminate\Support\ServiceProvider;

class CuratorModelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadMigrationsFrom(__DIR__.'/path/to/migrations');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}