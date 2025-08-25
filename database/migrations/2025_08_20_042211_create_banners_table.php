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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('background')->nullable();
            $table->string('button_link')->nullable();
        });

        Schema::create('banner_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('banner_id')->constrained('banners')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('button_text')->nullable();
            $table->unique(['banner_id', 'locale'], 'banner_locale_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banner_translations');
        Schema::dropIfExists('banners');
    }
};
