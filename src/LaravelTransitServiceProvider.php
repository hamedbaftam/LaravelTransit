<?php

namespace Jamshid\LaravelTransit;

use Illuminate\Support\ServiceProvider;
use Jamshid\LaravelTransit\Console\Commands\MakeConsumer;

class LaravelTransitServiceProvider extends ServiceProvider
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

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeConsumer::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'courier');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/courier'),
            __DIR__ . '/../config/laravel-transit.php' => config_path('laravel-transit.php'),
        ],'laravel-transit');
    }
}
