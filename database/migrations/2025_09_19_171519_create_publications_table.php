<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();

            // Champs principaux du formulaire
            $table->string('titre');                    // Titre de l'article
            $table->string('journal')->nullable();      // Journal ou revue
            $table->year('annee')->nullable();          // Année de publication
            $table->string('lien_externe')->nullable(); // Lien URL vers la publication
            $table->string('auteur');                   // Auteur principal
            $table->string('co_auteurs')->nullable();   // Co-auteurs
            $table->text('resume')->nullable();         // Résumé institutionnel

            // Statut de la publication
            $table->enum('statut', ['soumis', 'valide', 'archive'])->default('soumis');

            // Lien avec l'utilisateur
            $table->unsignedBigInteger('user_id')->nullable();

            // Fichier joint (PDF, DOC, etc.)
            $table->string('fichier')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('publications');
    }
};



