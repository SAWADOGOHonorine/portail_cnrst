<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Dashboard pour les utilisateurs simples
    public function dashboard()
    {
        $user = Auth::user(); // Récupère l'utilisateur connecté

        // Ici tu peux passer des données à la vue
        return view('user.dashboard', compact('user'));
    }
}
