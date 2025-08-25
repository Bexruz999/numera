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
        Schema::create('product_characteristics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('characteristic_id')->constrained('characteristics')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('product_characteristic_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_characteristic_id')->constrained('product_characteristics')->onDelete('cascade');
            $table->string('locale')->index();
            $table->text('value')->nullable();
            $table->unique(['product_characteristic_id', 'locale']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_characteristic_translations', function (Blueprint $table) {
            $table->dropForeign(['product_characteristic_id']);
        });
        Schema::table('product_characteristics', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['characteristic_id']);
        });
        Schema::dropIfExists('product_characteristics');
    }
};
