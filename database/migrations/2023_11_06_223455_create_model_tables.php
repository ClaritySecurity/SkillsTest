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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('swapi_id')->unique();
            $table->string('title', 255);
            $table->integer('episode_id');
            $table->text('opening_crawl');
            $table->string('director', 255);
            $table->string('producer', 255);
            $table->date('release_date');
            $table->json('characters');
            $table->json('planets');
            $table->json('starships');
            $table->json('vehicles');
            $table->json('species');
            $table->timestamps();
        });

        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('swapi_id')->unique();
            $table->string('name', 255);
            $table->string('height', 255);
            $table->string('mass', 255);
            $table->string('hair_color', 255);
            $table->string('skin_color', 255);
            $table->string('eye_color', 255);
            $table->string('birth_year', 255);
            $table->string('gender', 255);
            $table->string('homeworld', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
        Schema::dropIfExists('characters');
    }
};
