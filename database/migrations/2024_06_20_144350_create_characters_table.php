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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('initiative');
            $table->string('movement_speed');
            $table->string('search_diameter');
            $table->string('laziness');
            $table->string('gather');
            $table->string('combat_diameter');
            $table->string('damage');
            $table->string('shield');
            $table->string('health');
            $table->string('cooldown');
            $table->string('gender');
            $table->string('faction');
            $table->string('class');
            $table->string('rarity');
            $table->integer('level')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
