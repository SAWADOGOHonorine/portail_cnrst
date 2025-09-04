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
       Schema::create('navbars', function (Blueprint $table) {
        $table->id();
        $table->string('name');      // Nom du lien
        $table->string('route');     // Route Laravel
        $table->integer('ordering'); // Ordre d'affichage
        $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navbars');
    }
};
