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
                $table->string('titre')->nullable()->after('id');
            }
            if (!Schema::hasColumn('fiches', 'resume')) {
                $table->text('resume')->nullable()->after('titre');
            }
            if (!Schema::hasColumn('fiches', 'auteurs')) {
                $table->string('auteurs')->nullable()->after('resume');
            }
            if (!Schema::hasColumn('fiches', 'discipline')) {
                $table->string('discipline')->nullable()->after('auteurs');
            }
            if (!Schema::hasColumn('fiches', 'responsible')) {
                $table->string('responsible')->nullable()->after('discipline');
            }
            if (!Schema::hasColumn('fiches', 'thematique')) {
                $table->string('thematique')->nullable()->after('responsible');
            }
            if (!Schema::hasColumn('fiches', 'creation_date')) {
                $table->date('creation_date')->nullable()->after('thematique');
            }
        });
    }

    public function down(): void
    {
        Schema::table('fiches', function (Blueprint $table) {
            $table->dropColumn([
                'titre', 'resume', 'auteurs', 'discipline', 'responsible', 'thematique', 'creation_date'
            ]);
        });
    }
};
