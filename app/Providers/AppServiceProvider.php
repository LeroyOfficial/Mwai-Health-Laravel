<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
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
        //if (!file_exists(storage_path('app/initialized'))) {
            //Artisan::call('initialize-app');
        //    file_put_contents(storage_path('app/initialized'), '');
        //}
    }
}
