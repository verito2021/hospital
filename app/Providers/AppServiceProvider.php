<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator as PaginationPaginator;
//configuracion de la fachada esquema y el paginador
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
        //en esta funcion llamamos a esquema y paginador
        Schema:: defaultStringLength(191);
        Paginator::useBootstrap();
    }
}
