<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                
                $user = Auth::user();

                // Si c'est un admin
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                }

                // Si c'est un utilisateur normal
                return redirect()->route('user.dashboard');
            }
        }

        return $next($request);
    }
}


// namespace App\Http\Middleware;
// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class RedirectIfAuthenticated
// {
    /**
     * Handle an incoming request.
     */
//     public function handle(Request $request, Closure $next, ...$guards)
//     {
//         $guards = empty($guards) ? [null] : $guards;

//         foreach ($guards as $guard) {
//             if (
//                 Auth::guard($guard)->check()
//                 && !$request->has('force')
//                 && !$request->is('forgot-password')
//                 && !$request->is('register')
//                 && !$request->is('reset-password*')
//                 && !$request->is('dashboard') // éviter boucle
//             ) {
//                 return redirect()->route('dashboard');
//             }
//         }

//         return $next($request);
//     }
// }


