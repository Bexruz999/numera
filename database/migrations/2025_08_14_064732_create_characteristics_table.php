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
        Schema::create('characteristics', function (Blueprint $table) {
            $table->id();
            $table->integer('type')->nullable();
            $table->timestamps();
        });

        Schema::create('characteristic_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('characteristic_id')->constrained('characteristics')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name');
            $table->jsonb('options')->nullable();
            $table->unique(['characteristic_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('characteristic_translations', function (Blueprint $table) {
            $table->dropForeign(['characteristic_id']);
        });
        Schema::dropIfExists('characteristic_translations');
        Schema::dropIfExists('characteristics');
    }
};
