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
        Schema::table('cv', function (Blueprint $table) {
            $table->string('detaille_scientifique', 25)->nullable();
            $table->text('projet_recherche')->nullable();
            $table->string('genre')->nullable();
            $table->string('thematique_recherche')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cv', function (Blueprint $table) {
            $table->dropColumn([
                'detaille_scientifique',
                'projet_recherche',
                'genre',
                'thematique_recherche'
            ]);
        });
    }
};
