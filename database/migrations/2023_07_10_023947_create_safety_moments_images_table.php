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
        Schema::create('safety_moments_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('safety_moment_id')->constrained('safety_moments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('image_id')->constrained('images')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('safety_moments_images');
    }
};
