<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // AIR QUALITY MONITOR
            $table->string('etat')->nullable(); // Fonctionnel, Défectueux...
            $table->date('date_arrivee')->nullable(); // 31-12-2022
            $table->string('laboratoire')->nullable(); // LPCE
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('equipments');
    }
};

