<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Services\PHPMailerService;

class ForgotPasswordController extends Controller
{
    protected $mailer;

    public function __construct(PHPMailerService $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Validation de l'email
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->input('email');

        // Vérification de l'existence de l'utilisateur
        $user = DB::table('users')->where('email', $email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Utilisateur introuvable.']);
        }

        // Génération et hachage du token
        $token = Str::random(64);
        $hashedToken = hash('sha256', $token);

        // Stockage du token dans la base
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $email],
            [
                'token' => $hashedToken,
                'created_at' => Carbon::now()
            ]
        );

        // Envoi du mail via le service personnalisé
        $sent = $this->mailer->sendResetLink($email, $token);

        // Retour UX
        return $sent
            ? back()->with(['status' => 'Lien de réinitialisation envoyé avec succès.'])
            : back()->withErrors(['email' => 'Échec de l’envoi du mail.']);
    }
}




