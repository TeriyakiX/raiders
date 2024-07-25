<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('faction_land_interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faction_id')->constrained('factions')->onDelete('cascade');
            $table->foreignId('land_id')->constrained('lands')->onDelete('cascade');
            $table->enum('effect', ['+', '-', '=']);
            $table->float('coefficient', 8, 2)->default(1); // Коэффициент F
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faction_land_interactions');
    }
};
