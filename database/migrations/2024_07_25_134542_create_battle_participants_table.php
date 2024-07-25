<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('battle_participants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('battle_id')->constrained('battles')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->json('cards'); // Список карт в формате JSON
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('battle_participants');
    }
};
