<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('battles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attacker_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('defender_id')->constrained('users')->onDelete('cascade');
            $table->integer('attacker_initial_cups');
            $table->integer('defender_initial_cups');
            $table->integer('attacker_final_cups')->nullable();
            $table->integer('defender_final_cups')->nullable();
            $table->enum('status', ['in_progress', 'completed'])->default('in_progress');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('battles');
    }
};
