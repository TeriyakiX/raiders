<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            // Добавляем новые поля для фильтров
            $table->enum('rarity', ['common', 'rare', 'epic', 'legendary'])->nullable()->after('prize');
            $table->enum('gender', ['male', 'female', 'both'])->nullable()->after('rarity');
            $table->foreignId('faction_id')->nullable()->constrained('factions')->onDelete('set null')->after('gender');
            $table->string('class')->nullable()->after('faction_id');
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            // Удаляем поля, если миграция будет откатана
            $table->dropColumn(['rarity', 'gender', 'faction_id', 'class']);
        });
    }
};
