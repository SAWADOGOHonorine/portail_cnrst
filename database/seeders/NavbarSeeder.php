<?php

namespace Database\Seeders;
use App\Models\Navbar;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavbarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Navbar::insert([
        ['name' => 'Accueil', 'route' => 'home', 'ordering' => 1],
        ['name' => 'Articles', 'route' => 'articles.index', 'ordering' => 2],
        ['name' => 'Contact', 'route' => 'contact', 'ordering' => 3],
        ['name' => 'Connexion', 'route' => 'login', 'ordering' => 4],

    ]);
    }
}
