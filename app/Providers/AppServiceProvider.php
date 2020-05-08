<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//esta clase se importa para pasar informacion a travez de las vistas
use Illuminate\Support\Facades\View;

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
        /*con este comando se crea una variable llamada 'theme'
        que contendra toda la vista de la carpeta 'lte'*/
        View::share('theme', 'lte');
    }
}
