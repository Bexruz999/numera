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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('articular')->nullable();
            $table->integer('price', )->default(0);
            $table->integer('stock')->default(0);
            $table->integer('guarantee')->default(0);
            $table->integer('code')->default(0);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->text('img')->nullable();
            $table->text('docs')->nullable();
            $table->text('certificates')->nullable();
            $table->text('drivers')->nullable();
            $table->text('delivery')->nullable();
            $table->integer('category_id')->nullable();
            $table->timestamps();
        });


        Schema::create('product_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name');
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->unique(['product_id', 'locale'], 'product_locale_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_translations', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropUnique(['product_locale_unique']);
        });
        Schema::dropIfExists('product_translations');

        Schema::dropIfExists('products');
    }
};
