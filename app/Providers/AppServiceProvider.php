<?php

namespace App\Providers;

use Illuminate\Support\Facades\Layanan;
use Illuminate\Support\ServiceProvider;

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
        // view()->composer('layout.index',function($view){
        //     $view->with('Layanans',Layanan::get());
        // });
    }
}
