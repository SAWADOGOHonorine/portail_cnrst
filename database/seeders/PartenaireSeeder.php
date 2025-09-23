<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partenaire;

class PartenaireSeeder extends Seeder
{
    public function run()
    {
        Partenaire::create([
            'titre' => "Accord cadre de coopération entre l'Université Joseph KI-ZERBO et l'Université ABDELMALEK ESSAÂDI de Tétouan",
            'domaine' => "Enseignement, Recherche, Mobilité, Expertise"
        ]);

        Partenaire::create([
            'titre' => "Accord cadre de coopération entre l'Université Joseph KI-ZERBO et l'Ecole Nationale d'Administration et de Magistrature",
            'domaine' => "Enseignement, Mobilité, Renforcement de capacité, Expertise"
        ]);
    }
}

