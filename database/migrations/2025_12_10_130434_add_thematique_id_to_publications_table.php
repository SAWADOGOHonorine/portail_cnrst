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
    Schema::table('publications', function (Blueprint $table) {
        if (!Schema::hasColumn('publications', 'thematique_id')) {
            $table->foreignId('thematique_id')->nullable()->constrained('thematiques')->onDelete('set null');
        }
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('publications', function (Blueprint $table) {
        $table->dropForeign(['thematique_id']);
        $table->dropColumn('thematique_id');
    });
}
};
