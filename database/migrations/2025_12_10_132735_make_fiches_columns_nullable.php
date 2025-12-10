<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fiches', function (Blueprint $table) {
            // Rendre toutes les colonnes existantes nullable
            if (Schema::hasColumn('fiches', 'record_type')) {
                $table->string('record_type')->nullable()->change();
            }
            if (Schema::hasColumn('fiches', 'titre')) {
                $table->string('titre')->nullable()->change();
            }
            if (Schema::hasColumn('fiches', 'resume')) {
                $table->text('resume')->nullable()->change();
            }
            if (Schema::hasColumn('fiches', 'auteurs')) {
                $table->string('auteurs')->nullable()->change();
            }
            if (Schema::hasColumn('fiches', 'annee')) {
                $table->string('annee')->nullable()->change();
            }
            if (Schema::hasColumn('fiches', 'discipline')) {
                $table->string('discipline')->nullable()->change();
            }
            if (Schema::hasColumn('fiches', 'thematique')) {
                $table->string('thematique')->nullable()->change();
            }
            if (Schema::hasColumn('fiches', 'mots_cles')) {
                $table->string('mots_cles')->nullable()->change();
            }
            if (Schema::hasColumn('fiches', 'source')) {
                $table->string('source')->nullable()->change();
            }
            if (Schema::hasColumn('fiches', 'url')) {
                $table->string('url')->nullable()->change();
            }
            if (Schema::hasColumn('fiches', 'content')) {
                $table->text('content')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('fiches', function (Blueprint $table) {
            // Remettre les colonnes non nullable si besoin
            if (Schema::hasColumn('fiches', 'record_type')) {
                $table->string('record_type')->nullable(false)->change();
            }
            if (Schema::hasColumn('fiches', 'titre')) {
                $table->string('titre')->nullable(false)->change();
            }
            if (Schema::hasColumn('fiches', 'resume')) {
                $table->text('resume')->nullable(false)->change();
            }
            if (Schema::hasColumn('fiches', 'auteurs')) {
                $table->string('auteurs')->nullable(false)->change();
            }
            if (Schema::hasColumn('fiches', 'annee')) {
                $table->string('annee')->nullable(false)->change();
            }
            if (Schema::hasColumn('fiches', 'discipline')) {
                $table->string('discipline')->nullable(false)->change();
            }
            if (Schema::hasColumn('fiches', 'thematique')) {
                $table->string('thematique')->nullable(false)->change();
            }
            if (Schema::hasColumn('fiches', 'mots_cles')) {
                $table->string('mots_cles')->nullable(false)->change();
            }
            if (Schema::hasColumn('fiches', 'source')) {
                $table->string('source')->nullable(false)->change();
            }
            if (Schema::hasColumn('fiches', 'url')) {
                $table->string('url')->nullable(false)->change();
            }
            if (Schema::hasColumn('fiches', 'content')) {
                $table->text('content')->nullable(false)->change();
            }
        });
    }
};
