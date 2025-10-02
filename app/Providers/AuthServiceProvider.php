<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Article;
use App\Policies\ArticlePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 🔑 On lie le modèle Article à sa Policy
        Article::class => ArticlePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // 👉 Si tu veux gérer d'autres autorisations globales via Gate, tu peux les ajouter ici.
        // Exemple :
        // Gate::define('admin-only', function ($user) {
        //     return $user->is_admin;
        // });
    }
}
