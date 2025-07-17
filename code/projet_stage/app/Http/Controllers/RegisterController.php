<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Affiche la page d'inscription
    public function showForm()
    {
        return view('auth.register');
    }

    // Traite l'inscription
    public function register(Request $request)
    {
        $request->validate([
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('custom.login')->with('success', 'Compte créé avec succès !');
    }
}
