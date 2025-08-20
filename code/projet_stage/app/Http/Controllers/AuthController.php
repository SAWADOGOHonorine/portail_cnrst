<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'last_name'  => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email'      => 'required|email|unique:users',
            'adresse'    => 'required|string|max:255',
            'password'   => 'required|string|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        User::create([
            'last_name'  => $request->last_name,
            'first_name' => $request->first_name,
            'email'      => $request->email,
            'adresse'    => $request->adresse,
            'role'       => 'user',
            'password'   => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Compte créé avec succès. Vous pouvez maintenant vous connecter.');
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

   public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); 
        return redirect()->intended('/dashboard'); 
    }

    return back()->withErrors([
        'email' => 'Identifiants incorrects.',
    ]);
}

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Déconnexion réussie.');
    }
}

