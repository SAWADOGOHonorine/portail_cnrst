<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Notifications\AccountCreated;
use App\Notifications\NewUserRegistered;
use Illuminate\Support\Facades\Notification;

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
        // Validation des champs
        $request->validate([
            'last_name'  => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'adresse'    => 'required|string|max:255',
            'password'   => 'required|string|min:6|confirmed',
        ]);

        // Création de l'utilisateur comme "user" normal
        $user = User::create([
            'last_name'  => $request->last_name,
            'first_name' => $request->first_name,
            'email'      => $request->email,
            'adresse'    => $request->adresse,
            'password'   => Hash::make($request->password),
            'role'       => 'user',    
            'is_admin'   => 0,         
        ]);

        // Email de bienvenue à l'utilisateur
        $user->notify(new AccountCreated());

        //  Notification aux administrateurs existants
        $admins = User::where('is_admin', 1)->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewUserRegistered($user));
        }

        // Redirection avec message de succès
        return redirect()->route('login')
            ->with('success', 'Votre compte a été créé avec succès ! Vous pouvez maintenant vous connecter.');
    }

    // 🔹 Marquer toutes les notifications de l'utilisateur connecté comme lues
    public function markNotificationsAsRead()
    {
        if (auth()->check()) {
            auth()->user()->unreadNotifications->markAsRead();
        }
        return redirect()->back();
    }
}

