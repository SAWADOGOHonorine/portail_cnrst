<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('fiches', function (Blueprint $table) {
            $table->text('resume')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('fiches', function (Blueprint $table) {
            $table->text('resume')->nullable(false)->change();
        });
    }
};
