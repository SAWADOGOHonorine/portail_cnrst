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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('journal')->nullable();
            $table->year('publication_year')->nullable();
            $table->string('url')->nullable();
            $table->text('summary')->nullable();
            $table->string('author')->nullable();
            $table->string('co_authors')->nullable();
            $table->date('publication_date')->nullable();
            $table->enum('status', ['submitted', 'accepted', 'published'])->default('submitted');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
