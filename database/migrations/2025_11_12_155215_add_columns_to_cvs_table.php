<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cv', function (Blueprint $table) {
            $table->string('nom')->after('id');
            $table->string('prenom')->after('nom');
            $table->string('email')->after('prenom');
            $table->string('adresse')->nullable()->after('email');
            $table->string('ville')->nullable()->after('adresse');
            $table->string('telephone')->nullable()->after('ville');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('cv', function (Blueprint $table) {
            $table->dropColumn(['nom', 'prenom', 'email', 'adresse', 'ville', 'telephone']);
        });
    }
};
