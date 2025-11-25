<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class UserMiddleware
// {
//     public function handle(Request $request, Closure $next)
//     {
//         if (Auth::check() && Auth::user()->role === 'user') {
//             return $next($request);
//         }

        // Si l'utilisateur n'est pas un user, rediriger selon son rôle
//         if (Auth::user()->role === 'admin') {
//             return redirect()->route('admin.dashboard');
//         }

//         abort(403, 'Accès refusé');
//     }
// }
