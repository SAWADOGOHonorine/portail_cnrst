<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        $name     = env('ADMIN_NAME', 'SuperAdmin');
        $email    = env('ADMIN_EMAIL', 'honorinesawadogo07@gmail.com');
        $password = env('ADMIN_PASSWORD', 'Etudiant@2022');
        $role     = env('ADMIN_ROLE', 'super_admin');

        $nameParts = explode(' ', $name);
        $firstName = $nameParts[0];
        $lastName  = $nameParts[1] ?? '';

        // updateOrCreate : met à jour si trouvé, sinon crée
        User::updateOrCreate(
            ['role' => $role], // critère pour identifier le super admin
            [
                'first_name' => $firstName,
                'last_name'  => $lastName,
                'email'      => $email,
                'password'   => Hash::make($password),
                'role'       => $role,
                'status'     => Schema::hasColumn('users', 'status') ? 1 : null,
                'is_active'  => Schema::hasColumn('users', 'is_active') ? 1 : null,
            ]
        );
    }
}

