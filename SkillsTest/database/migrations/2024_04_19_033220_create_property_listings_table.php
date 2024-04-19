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
        Schema::create('property_listings', function (Blueprint $table) {
            $table->id();
            $table->string('property_id')->nullable();
            $table->string('listing_id')->nullable();
            $table->string('status')->nullable();
            $table->integer('price')->nullable();
            $table->string('street_view_url', 1000)->nullable();
            $table->tinyInteger('bedrooms')->nullable();
            $table->tinyInteger('bathrooms')->nullable();
            $table->mediumInteger('square_footage')->nullable();
            $table->integer('lot_size')->nullable();
            $table->string('address_street')->nullable();
            $table->string('address_city')->nullable();
            $table->string('address_state')->nullable();
            $table->string('address_zip')->nullable();
            $table->string('photo_count')->nullable();
            $table->timestamps();

            $table->index('property_id');
            $table->index('listing_id');
            $table->index('status');
            $table->index('price');
            $table->index('bedrooms');
            $table->index('bathrooms');
            $table->index('square_footage');
            $table->index('lot_size');
            $table->index('address_street');
            $table->index('address_city');
            $table->index('address_state');
            $table->index('address_zip');
            $table->index('photo_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_listings');
    }
};
