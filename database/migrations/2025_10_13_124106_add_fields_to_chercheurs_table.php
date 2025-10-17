<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chercheurs', function (Blueprint $table) {
            $table->id();

            // === Colonne 1 : Informations générales (photo + identité + fonction) ===
            $table->string('photo')->nullable(); // Photo du chercheur
            $table->string('nom');
            $table->string('prenom');
            $table->string('titre')->nullable(); // ex: Dr, Pr
            $table->string('grade')->nullable(); // ex: Professeur Titulaire, Maître de Conférences
            $table->string('specialite')->nullable(); // ex: Mathématiques
            $table->string('ufr')->nullable(); // ex: UFR Sciences Exactes et Appliquées
            $table->string('departement')->nullable(); // ex: Département Mathématiques

            // === Colonne 2 : Biographie + Parcours académique ===
            $table->string('genre')->nullable(); // Homme / Femme
            $table->string('nationalite')->nullable(); // Burkinabè
            $table->string('position')->nullable(); // En activité, Retraité, etc.
            $table->text('biographie')->nullable();

            // Parcours académique sous forme de texte ou JSON
            // Exemple : [{"poste":"Maître de Conférences","de":"2017","universite":"Université de Ouagadougou"}]
            $table->json('parcours_academique')->nullable();

            // === Colonne 3 : Diplômes universitaires ===
            // Exemple : [{"diplome":"Doctorat d'État","annee":"2002","universite":"Université de Ouagadougou"}]
            $table->json('diplomes')->nullable();

            // === Informations supplémentaires ===
            $table->string('laboratoire')->nullable(); // Nom du laboratoire
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chercheurs', function (Blueprint $table) {
            //
        });
    }
};
