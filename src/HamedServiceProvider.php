<?php

namespace Jamshid\LaravelTransit;

use Illuminate\Support\ServiceProvider;

class HamedServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'courier');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/courier'),
            __DIR__ . '/../config/laravel-transit.php' => config_path('laravel-trnsit.php'),
        ],'laravel-transit');
    }
}
