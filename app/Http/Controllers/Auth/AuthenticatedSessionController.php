<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Affiche le formulaire de connexion
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Traite la soumission du formulaire de connexion
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Vérification du rôle
            if ($user->role === 'admin') {
                Session::flash('success', 'Connexion réussie ! Bienvenue sur votre tableau de bord.');
                return redirect()->route('dashboard');
            }

            if ($user->role === 'visiteur') {
                Auth::logout();
                return redirect()->route('access.dashboard.refuse')->with('error', 'Vous ne pouvez pas accéder à cette section à cet intervalle.');
            }

            // Autres rôles éventuels
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Identifiants invalides. Veuillez réessayer.',
        ])->withInput();
    }
}







