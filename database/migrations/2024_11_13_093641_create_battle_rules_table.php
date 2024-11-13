<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('battle_rules', function (Blueprint $table) {
            $table->id();
            $table->integer('level_difference');
            $table->integer('victim_frozen_duration');
            $table->integer('attacker_frozen_duration');
            $table->integer('attacker_win_cups');
            $table->integer('attacker_lose_cups');
            $table->integer('victim_win_cups');
            $table->integer('victim_lose_cups');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('battle_rules');
    }
};
