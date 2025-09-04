<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Log;

class PHPMailerService
{
    public function sendResetLink($toEmail, $token)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ton.email@gmail.com';
            $mail->Password   = 'mot_de_passe_application';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('ton.email@gmail.com', 'Portail CNRST');
            $mail->addAddress($toEmail);

            $mail->isHTML(true);
            $mail->Subject = 'Réinitialisation de mot de passe';
            $resetLink = url("/reset-password/{$token}?email={$toEmail}");
            $mail->Body = "Bonjour,<br><br>Cliquez sur le lien suivant pour réinitialiser votre mot de passe :<br><a href='{$resetLink}'>{$resetLink}</a><br><br>Ce lien expire dans 60 minutes.";

            $mail->send();
            return true;
        } catch (Exception $e) {
            Log::error("Erreur PHPMailer : " . $mail->ErrorInfo);
            return false;
        }
    }
}
