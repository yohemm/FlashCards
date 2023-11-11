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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->string('explication')->nullable();
            $table->float('ratio');
            $table->integer('nb_try');
            $table->foreignId('owner_id')->constrained('users');
        });
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->nullable();
        });

        Schema::create('users_themes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('themes_id')->constrained('themes');
            $table->foreignId('users_id')->constrained('users');
        });

        Schema::create('cards_themes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('cards_id')->constrained('cards');
            $table->foreignId('themes_id')->constrained('themes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
        Schema::dropIfExists('users');
        Schema::dropIfExists('themes');
        Schema::dropIfExists('users_themes');
        Schema::dropIfExists('cards_themes');
    }
};
