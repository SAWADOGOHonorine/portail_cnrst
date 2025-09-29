<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fiches', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->string('record_type'); 
            $table->text('content');
            $table->date('creation_date')->nullable();
            $table->string('url')->nullable();
            $table->string('responsible')->nullable(); 
            $table->enum('status', ['draft', 'validated', 'archived'])->default('draft'); 
            $table->string('fichier')->nullable(); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fiches');
    }
};

