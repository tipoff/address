<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Tipoff\GoogleApi\Drivers\JsonDriver;
use Tipoff\GoogleApi\Drivers\KeyEloquentDriver;
use Tipoff\GoogleApi\Facades\GoogleOauth;

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
        GoogleOauth::useDriver(KeyEloquentDriver::class);
    }
}
