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
    Schema::table('users', function (Blueprint $table) {
        $table->string('adresse')->nullable(); // Tu peux retirer nullable si c’est obligatoire
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('adresse');
    });
}


    /**
     * Reverse the migrations.
     */
    
};
