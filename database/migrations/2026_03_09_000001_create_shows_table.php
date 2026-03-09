<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->enum('type', ['movie', 'tv_show']);
            $table->text('description')->nullable();
            $table->string('poster_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('genre')->nullable();
            $table->string('director')->nullable();
            $table->string('cast')->nullable();
            $table->year('release_year')->nullable();
            $table->string('network_or_studio')->nullable();
            $table->string('mpaa_rating')->nullable(); // G, PG, PG-13, R, NC-17
            $table->string('tv_rating')->nullable();   // TV-Y, TV-Y7, TV-G, TV-PG, TV-14, TV-MA
            $table->integer('seasons')->nullable();
            $table->integer('episodes')->nullable();
            $table->integer('runtime_minutes')->nullable();
            $table->string('trailer_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shows');
    }
};
