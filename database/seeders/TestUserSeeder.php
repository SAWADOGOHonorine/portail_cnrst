<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Fati',
            'last_name' => 'Ouedraogo',
            'email' => 'ouredraogofati@gmail.com',
            'password' => bcrypt('Ouedraogo@21'),
            'role' => 'user',
            'status' => 1,
            'is_active' => 1,
            'adresse' => 'Ouagadougou',
            'phone' => '0000000000',
            'photo' => null,
            'activation_token' => null,
            'remember_token' => null,
        ]);

        

        User::create([
            'first_name' => 'Flora',
            'last_name' => 'KAFANDO',
            'email' => 'florakafando@gmail.com',
            'password' => bcrypt('Kafando@21'),
            'role' => 'user',
            'status' => 1,
            'is_active' => 1,
            'adresse' => 'Ouagadougou',
            'phone' => '0000000000',
            'photo' => null,
            'activation_token' => null,
            'remember_token' => null,
        ]);

        User::create([
            'first_name' => 'Constantin',
            'last_name' => 'SAWADOGO',
            'email' => 'constantinsawadogo@gmail.com',
            'password' => bcrypt('Constantin@22'),
            'role' => 'user',
            'status' => 1,
            'is_active' => 1,
            'adresse' => 'Ouagadougou',
            'phone' => '0000000000',
            'photo' => null,
            'activation_token' => null,
            'remember_token' => null,
        ]);
    }
}
