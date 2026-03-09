<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('adwords', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('placement'); // header, sidebar, footer, in-content
            $table->text('ad_code');
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adwords');
    }
};
