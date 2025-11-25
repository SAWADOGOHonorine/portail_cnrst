<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles  Liste des rôles autorisés séparés par |
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        // Vérifie que l’utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Convertir les rôles en tableau : "admin|DG|DGA" → ["admin", "DG", "DGA"]
        $allowedRoles = explode('|', $roles);

        // Vérifier si le rôle de l'utilisateur est autorisé
        if (!in_array(Auth::user()->role, $allowedRoles)) {
            abort(403, 'Accès non autorisé');
        }

        return $next($request);
    }
}


