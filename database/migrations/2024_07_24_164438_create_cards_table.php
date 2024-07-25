<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('contract');
            $table->integer('card_id')->unique(); // Сделаем card_id уникальным
            $table->string('owner');
            $table->integer('balance');
            $table->json('metadata')->nullable(); // Добавляем новое поле для метаданных
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cards');
    }
};
