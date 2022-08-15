<?php

namespace Grobles16\LaravelDocker;

use Illuminate\Support\ServiceProvider;

class LaravelDockerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/docker' => base_path()
        ], 'laravel-docker');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // register our controller
    }
}