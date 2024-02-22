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
            $table->string('question');
            $table->string('answer');
            $table->string('explication')->nullable();
            $table->string('slug');
            $table->float('ratio')->default(0.5);
            $table->integer('nb_try')->default(0);
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('label')->nullable();
            $table->string('description')->nullable();
        });

        Schema::create('users_themes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('themes_id')->constrained('themes')->onDelete('cascade');
            $table->foreignId('users_id')->constrained('users')->onDelete('cascade');
        });

        Schema::create('cards_themes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('cards_id')->constrained('cards')->onDelete('cascade');
            $table->foreignId('themes_id')->constrained('themes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cards', function (Blueprint $table){
            $table->dropForeign(['owner_id']);
        });
        Schema::table('cards_themes', function (Blueprint $table){
            $table->dropForeign(['cards_id']);
            $table->dropForeign(['themes_id']);
        });
        Schema::table('users_themes', function (Blueprint $table){
            $table->dropForeign(['themes_id']);
            $table->dropForeign(['users_id']);
        });
        Schema::dropIfExists('cards');
        Schema::dropIfExists('users');
        Schema::dropIfExists('themes');
        Schema::dropIfExists('users_themes');
        Schema::dropIfExists('cards_themes');
    }
};
