<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
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
        // Validation de l'email
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->input('email');

        // Vérifie si l'utilisateur existe
        $user = DB::table('users')->where('email', $email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Utilisateur introuvable.']);
        }

        // Génère un token sécurisé
        $token = Str::random(64);
        $hashedToken = hash('sha256', $token);

        // Stocke le token dans la base
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            [
                'token' => $hashedToken,
                'created_at' => Carbon::now()
            ]
        );

        // Envoie le mail via PHPMailer
        $mailer = new PHPMailerService();
        $sent = $mailer->sendResetLink($email, $token);

        // Redirection vers page confirmation ou retour avec erreur
        if ($sent) {
            return redirect()->route('password.success');
        } else {
            return back()->withErrors(['email' => 'Échec de l’envoi du mail.']);
        }
    }

    /**
     * Page de confirmation après envoi du lien
     */
    public function success()
    {
        return view('auth.forgot_success');
    }
}



