<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('battle_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('battle_id')->constrained()->onDelete('cascade');
            $table->integer('round');
            $table->foreignId('attacker_card_id')->constrained('cards');
            $table->foreignId('defender_card_id')->constrained('cards');
            $table->string('result');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('battle_status');
        });
    }
};
