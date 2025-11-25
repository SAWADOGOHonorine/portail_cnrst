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
        $table->string('pays')->after('ville'); 
    });
}

public function down()
{
    Schema::table('cv', function (Blueprint $table) {
        $table->dropColumn('pays');
    });
}

};
