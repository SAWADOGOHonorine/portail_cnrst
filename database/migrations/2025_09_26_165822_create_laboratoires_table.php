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
        Schema::create('laboratoires', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // Nom du laboratoire
            $table->string('sigle')->nullable(); // Acronyme (ex: LAHAT)
            $table->string('responsable')->nullable(); // Nom du responsable
            $table->string('email')->nullable(); // Email institutionnel
            $table->string('telephone')->nullable(); // Contact
            $table->string('etablissement')->nullable(); // Université ou centre affilié
            $table->string('discipline')->nullable(); // Domaine (ex: Archéologie, Histoire de l'art)
            $table->text('description')->nullable(); // Présentation du labo
            $table->string('site_web')->nullable(); // Lien vers le site
            $table->string('logo')->nullable(); // Fichier image/logo
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratoires');
    }
};
