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
        Schema::table('articles', function (Blueprint $table) {
            $table->foreignId('thematique_id')
                  ->nullable()
                  ->constrained('thematiques')
                  ->onDelete('cascade')
                  ->after('id'); // place la colonne après id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->dropForeign(['thematique_id']);
            $table->dropColumn('thematique_id');
        });
    }
};
