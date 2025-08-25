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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('button_link')->nullable();
            $table->string('background')->nullable();
        });

        Schema::create('slider_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('slider_id')->constrained('sliders')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->string('button_name')->nullable();
            $table->unique(['slider_id', 'locale'], 'slider_locale_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider_translations');
        Schema::dropIfExists('sliders');
    }
};
