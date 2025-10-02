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
        Schema::table('publications', function (Blueprint $table) {
            $table->unsignedBigInteger('thematique_id')->nullable()->after('user_id');
            $table->foreign('thematique_id')->references('id')->on('thematiques')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('publications', function (Blueprint $table) {
            $table->dropForeign(['thematique_id']);
            $table->dropColumn('thematique_id');
        });
    }
};
