<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // vérifie le namespace de ton modèle User
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // Récupère les informations depuis .env ou utilise des valeurs par défaut
        $email = env('ADMIN_EMAIL', 'admin@example.com');
        $password = env('ADMIN_PASSWORD', 'MotDePasseTresSecurise123!');
        $role = env('ADMIN_ROLE', 'super_admin'); // ici super_admin

        // Crée l’utilisateur seulement s’il n’existe pas déjà
        User::firstOrCreate(
    ['email' => $email],
    [
        'first_name' => 'Super',    // si tu as first_name
        'last_name'  => 'Admin',    // important !
        'email'      => $email,
        'password'   => Hash::make($password),
        'role'       => $role,
        'status'     => 1,          // si tu as ce champ
        'is_active' => 1,          // si tu as ce champ
    ]
);

    }
}

