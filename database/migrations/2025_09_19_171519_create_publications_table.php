<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();

            $table->string('type')->nullable(); 
            $table->string('titre');
            $table->text('auteurs')->nullable();
            $table->year('annee')->nullable();
            $table->string('theme')->nullable();
            $table->text('resume')->nullable();
            $table->string('mots_cles')->nullable(); 
            $table->string('source')->nullable();
            $table->string('lien_externe')->nullable(); 
            $table->string('fichier')->nullable(); 

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('publications');
    }
};

