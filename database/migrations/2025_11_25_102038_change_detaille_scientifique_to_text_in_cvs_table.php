<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cv', function (Blueprint $table) {
            $table->text('detaille_scientifique')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('cv', function (Blueprint $table) {
            $table->string('detaille_scientifique', 25)->nullable()->change();
        });
    }
};
