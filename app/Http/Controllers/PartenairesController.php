<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartenairesController extends Controller
{
    /**
     * Affiche la liste des partenaires
     */
    public function index()
    {
        return view('pages.partenaires');
    }

    /**
     * Affiche les détails d’un partenaire spécifique
     */
    public function show($id)
    {
        // Exemple statique — à remplacer par une base de données
        $partenaires = [
            1 => [
                'titre' => "Université AbdelMalek ESSAÂDI",
                'etat' => "Signé",
                'type' => "Accords-cadres",
                'domaine' => "Enseignement, Recherche, Mobilité, Expertise",
                'date_signature' => "24-07-2024",
                'date_entree' => "23-07-2023",
                'duree' => "60 mois",
                'renouvelable' => true,
                'evaluation' => "12 mois",
                'porteur' => "Dr. Adama SANOU",
                'email' => "adama.sanou@ujkz.bf",
                'tel' => "704151757"
            ],
            2 => [
                'titre' => "Université Catholique de Louvain",
                'etat' => "Signé",
                'type' => "Accords-cadres",
                'domaine' => "Enseignement, Recherche, Mobilité",
                'date_signature' => "15-06-2024",
                'date_entree' => "01-07-2024",
                'duree' => "48 mois",
                'renouvelable' => false,
                'evaluation' => "24 mois",
                'porteur' => "Dr. Mariam OUEDRAOGO",
                'email' => "mariam.ouedraogo@ujkz.bf",
                'tel' => "702345678"
            ],
            // Tu peux ajouter d'autres partenaires ici
        ];

        $partenaire = $partenaires[$id] ?? null;

        if (!$partenaire) {
            abort(404);
        }

        return view('pages.partenaires.details', compact('partenaire'));
    }
}




