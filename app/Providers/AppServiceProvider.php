<?php

namespace App\Providers;
use App\Models\Navbar;
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator; // <- à ajouter

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
         View::composer('*', function ($view) {
        $view->with('navbars', Navbar::orderBy('ordering')->get());
        // Pagination Bootstrap
        Paginator::useBootstrapFive(); // <- ajouté pour pagination stylée Bootstrap
        Paginator::useBootstrap();


        
    });
    }
}
