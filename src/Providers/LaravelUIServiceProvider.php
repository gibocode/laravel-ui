<?php

namespace Gibocode\LaravelUI\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelUIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //

        include __DIR__ . '/routes/test.php';
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

    }
}
