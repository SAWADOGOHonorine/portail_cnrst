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
            'last_name'  => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'adresse'    => 'required|string|max:255',
            'password'   => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'last_name'  => $request->last_name,
            'first_name' => $request->first_name,
            'email'      => $request->email,
            'adresse'    => $request->adresse,
            'password'   => Hash::make($request->password),
        ]);

        return redirect()->route('register.success');
    }
}
