<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('character_parameters', function (Blueprint $table) {
            $table->id();
            $table->string('character_id');
            $table->string('rarity');
            $table->string('gender');
            $table->string('clan');
            $table->string('name');
            $table->string('role');
            $table->integer('initiative_numeric');
            $table->integer('movement_speed_numeric');
            $table->integer('search_diameter_numeric');
            $table->integer('laziness_numeric');
            $table->integer('search_numeric');
            $table->integer('gather_numeric');
            $table->integer('combat_diameter_numeric');
            $table->integer('damage_numeric');
            $table->integer('shield_numeric');
            $table->integer('health_numeric');
            $table->integer('cooldown_numeric');
            $table->string('initiative');
            $table->string('movement_speed');
            $table->string('search_diameter');
            $table->string('laziness');
            $table->string('search');
            $table->string('gather');
            $table->string('combat_diameter');
            $table->string('damage');
            $table->string('shield');
            $table->string('health');
            $table->string('cooldown');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_parameters');
    }
};
