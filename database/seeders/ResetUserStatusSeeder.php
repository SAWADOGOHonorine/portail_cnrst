<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class ResetUserStatusSeeder extends Seeder
{
    public function run()
    {
        // Désactive tous les utilisateurs
        User::query()->update(['status' => 0]);
        $this->command->info('Tous les utilisateurs ont été désactivés.');
    }
}

