<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faction_location', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('faction_id');
            $table->unsignedBigInteger('location_id');

            $table->timestamps();

            // Внешние ключи
            $table->foreign('faction_id')
                ->references('id')
                ->on('factions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();


            $table->unique(['faction_id', 'location_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faction_location');
    }
};
