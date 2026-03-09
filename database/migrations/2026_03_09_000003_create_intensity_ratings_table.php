<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('intensity_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('review_id')->constrained()->onDelete('cascade');
            $table->string('category');
            $table->tinyInteger('rating')->unsigned(); // 1-10
            $table->timestamps();

            $table->unique(['review_id', 'category']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('intensity_ratings');
    }
};
