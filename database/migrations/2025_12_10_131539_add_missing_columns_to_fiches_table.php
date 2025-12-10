<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fiches', function (Blueprint $table) {
            if (!Schema::hasColumn('fiches', 'titre')) {
                $table->string('titre')->nullable();
            }
            if (!Schema::hasColumn('fiches', 'resume')) {
                $table->text('resume')->nullable();
            }
            if (!Schema::hasColumn('fiches', 'auteurs')) {
                $table->string('auteurs')->nullable();
            }
            if (!Schema::hasColumn('fiches', 'annee')) {
                $table->string('annee')->nullable();
            }
            if (!Schema::hasColumn('fiches', 'discipline')) {
                $table->string('discipline')->nullable();
            }
            if (!Schema::hasColumn('fiches', 'responsible')) {
                $table->string('responsible')->nullable();
            }
            if (!Schema::hasColumn('fiches', 'thematique')) {
                $table->string('thematique')->nullable();
            }
            if (!Schema::hasColumn('fiches', 'mots_cles')) {
                $table->string('mots_cles')->nullable();
            }
            if (!Schema::hasColumn('fiches', 'source')) {
                $table->string('source')->nullable();
            }
            if (!Schema::hasColumn('fiches', 'url')) {
                $table->string('url')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('fiches', function (Blueprint $table) {
            $table->dropColumn([
                'titre', 'resume', 'auteurs', 'annee', 'discipline',
                'responsible', 'thematique', 'mots_cles', 'source', 'url'
            ]);
        });
    }
};
