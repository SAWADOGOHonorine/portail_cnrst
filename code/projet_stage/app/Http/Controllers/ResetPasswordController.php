<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /**
     * Affiche le formulaire de réinitialisation avec le token
     */
    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token, 'email' => request()->email]);
    }

    /**
     * Traite la réinitialisation du mot de passe
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', 'Mot de passe réinitialisé avec succès.')
            : back()->withErrors(['email' => [__($status)]]);
    }
}


