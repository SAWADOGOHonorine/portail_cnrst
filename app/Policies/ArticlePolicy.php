<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    /**
     * L'utilisateur peut voir la liste des articles.
     */
    public function viewAny(User $user): bool
    {
        return true; // tout utilisateur connecté peut voir ses articles
    }

    /**
     * L'utilisateur peut voir un article précis.
     */
    public function view(User $user, Article $article): bool
    {
        return $user->id === $article->user_id;
    }

    /**
     * L'utilisateur peut créer des articles.
     */
    public function create(User $user): bool
    {
        return true; // tout utilisateur connecté peut créer un article
    }

    /**
     * L'utilisateur peut mettre à jour l'article.
     */
    public function update(User $user, Article $article): bool
    {
        // seul le propriétaire peut modifier
        return $user->id === $article->user_id;
    }

    /**
     * L'utilisateur peut supprimer l'article.
     */
    public function delete(User $user, Article $article): bool
    {
        // seul le propriétaire peut supprimer
        return $user->id === $article->user_id;
    }

    /**
     * L'utilisateur peut restaurer un article supprimé.
     */
    public function restore(User $user, Article $article): bool
    {
        return $user->id === $article->user_id;
    }

    /**
     * L'utilisateur peut forcer la suppression d'un article.
     */
    public function forceDelete(User $user, Article $article): bool
    {
        return $user->id === $article->user_id;
    }
}
