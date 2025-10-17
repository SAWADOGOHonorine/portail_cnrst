<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class ResetPasswordController extends Controller
{
    // Affiche le formulaire avec le token
    public function showResetForm($token, Request $request)
    {
        $email = $request->query('email');
        return view('auth.reset-password', compact('token', 'email'));
    }

    // Traite le nouveau mot de passe
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $record = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->first();

        if (!$record || hash('sha256', $request->token) !== $record->token) {
            return back()->withErrors(['email' => 'Lien de réinitialisation invalide ou expiré.']);
        }

        // Met à jour le mot de passe
        DB::table('users')
            ->where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        // Supprime le token
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', 'Mot de passe réinitialisé avec succès.');
    }
}


