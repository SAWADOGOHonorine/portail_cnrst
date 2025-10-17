<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fiches', function (Blueprint $table) {
            $table->string('titre')->nullable();
            $table->string('auteurs')->nullable();
            $table->string('annee')->nullable();
            $table->string('discipline')->nullable();
            $table->string('thematique')->nullable();
            $table->string('mots_cles')->nullable();
            $table->text('resume')->nullable();
            $table->string('ouvrage')->nullable();
            $table->string('source')->nullable();
            $table->text('reference')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('fiches', function (Blueprint $table) {
            $table->dropColumn([
                'titre',
                'auteurs',
                'annee',
                'discipline',
                'thematique',
                'mots_cles',
                'resume',
                'ouvrage',
                'source',
                'reference',
            ]);
        });
    }
};
