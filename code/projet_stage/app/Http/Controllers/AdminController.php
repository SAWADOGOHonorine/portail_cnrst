<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Redirection vers une page dédiée pour les non-admins
        // return redirect()->route('connexion.reussie')->with('error', 'Accès réservé aux administrateurs.');
    }
}
