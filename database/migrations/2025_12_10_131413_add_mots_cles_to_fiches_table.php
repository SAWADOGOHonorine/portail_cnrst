<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fiches', function (Blueprint $table) {
            if (!Schema::hasColumn('fiches', 'mots_cles')) {
                $table->string('mots_cles')->nullable()->after('thematique');
            }
        });
    }

    public function down(): void
    {
        Schema::table('fiches', function (Blueprint $table) {
            $table->dropColumn('mots_cles');
        });
    }
};
