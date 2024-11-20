<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['rarity', 'gender', 'faction_id', 'class']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('rarity')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedBigInteger('faction_id')->nullable();
            $table->string('class')->nullable();

            // Восстанавливаем внешний ключ
            $table->foreign('faction_id')->references('id')->on('factions')->onDelete('set null');
        });
    }
};
