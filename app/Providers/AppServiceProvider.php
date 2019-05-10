<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// It is supossed to solve the problem:
// Specified key was too long; max key length is 1000 bytes
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        // It is supossed to solve the problem:
        // Specified key was too long; max key length is 1000 bytes
        Schema::defaultStringLength(191);

        /*$this->publishes(
            [
            __DIR__.'/path/to/assets' => public_path('vendor/courier'),
            ],
            'public'
        );*/
    }
}
