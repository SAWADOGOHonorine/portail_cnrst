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
            $table->string('whatsapp')->nullable()->after('telephone');
            $table->string('specialite')->nullable()->after('departement');
            $table->string('domaine')->nullable()->after('specialite');
            $table->string('mot_cle')->nullable()->after('domaine');
            $table->date('date_naissance')->nullable()->after('mot_cle');
            $table->string('lieu_naissance')->nullable()->after('date_naissance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cv', function (Blueprint $table) {
            $table->dropColumn([
                'whatsapp',
                'specialite',
                'domaine',
                'mot_cle',
                'date_naissance',
                'lieu_naissance'
            ]);
        });
    }
};
