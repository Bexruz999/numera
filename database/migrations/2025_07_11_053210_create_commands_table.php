<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->json('social')->nullable();
            $table->timestamps();
        });

        Schema::create('command_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('command_id')
                ->constrained('commands')
                ->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name');
            $table->text('position')->nullable();
            $table->text('description')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commands');
    }
};
