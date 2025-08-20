<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Services\PHPMailerService;

class ForgotPasswordController extends Controller
{
    /**
     * Affiche le formulaire de demande de réinitialisation
     */
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Traite l'envoi du lien de réinitialisation
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $email = $request->input('email');

        // Vérifie si l'utilisateur existe
        $user = DB::table('users')->where('email', $email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Utilisateur introuvable.']);
        }

        // Génère et stocke le token
        $token = Str::random(64);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            ['token' => $token, 'created_at' => Carbon::now()]
        );

        // Envoie le mail via PHPMailer
        $mailer = new PHPMailerService();
        $sent = $mailer->sendResetLink($email, $token);

        return $sent
            ? back()->with(['status' => 'Lien envoyé avec succès.'])
            : back()->withErrors(['email' => 'Échec de l’envoi du mail.']);
    }
}


