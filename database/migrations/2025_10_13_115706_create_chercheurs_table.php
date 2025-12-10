<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chercheurs', function (Blueprint $table) {
            $table->id(); // identifiant unique
            $table->string('nom'); // nom du chercheur
            $table->string('prenom'); // prénom
            $table->string('email')->unique(); // email unique
            $table->string('fonction')->nullable(); // fonction ou poste
            $table->timestamps(); // created_at et updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chercheurs');
    }
};
