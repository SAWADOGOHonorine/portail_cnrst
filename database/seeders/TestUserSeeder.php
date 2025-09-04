<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'email' => 'ouredraogofati@gmail.com',
            'password' => bcrypt('Ouedraogo@21'),
            'last_name' => 'Ouedraogo', 
            'first_name' => 'Fati',
            
        ]);

        User::create([
            'email' => 'honorinesawadogo07@gmail.com',
            'password' => bcrypt('Etudiant@2022'),
            'last_name' => 'SAWADOGO', 
            'first_name' => 'Honorine',
            
        ]);

        User::create([
            'email' => 'florakafando@gmail.com',
            'password' => bcrypt('Kafando@21'),
            'last_name' => 'KAFANDO', 
            'first_name' => 'Flora',
            
        ]);

        User::create([
            'email' => 'constantinsawadogo@gmail.com',
            'password' => bcrypt('Constantin@22'),
            'last_name' => 'SAWADOGO', 
            'first_name' => 'Constantin',
            
        ]);
    }
}
