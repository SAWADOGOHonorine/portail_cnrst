<?php

namespace App\Providers;
use App\Models\Navbar;
use Illuminate\Support\Facades\View;
use App\Models\Projet;
use App\Models\Laboratoire;
use App\Models\Fiche;
use App\Models\Article;
use App\Models\Chercheur;
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

    // Pagination Bootstrap
    Paginator::useBootstrapFive();
    Paginator::useBootstrap();

    // Partage des données globales avec toutes les vues
    View::composer('*', function ($view) {
        $view->with('navbars', Navbar::orderBy('ordering')->get());

        $nbPublications = Fiche::count() + Article::count();

        $view->with([
            'nbPublications' => $nbPublications,
            'nbEnseignants' => Chercheur::count(),
            'nbLaboratoires' => Laboratoire::count(),
            'nbProjets' => Projet::count(),
        ]);
    });
}


    
}
