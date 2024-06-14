<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade');
            $table->foreignId('preset_id')->constrained('presets')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('date_start');
            $table->dateTime('date_finish');
            $table->json('prize');
            $table->json('filter');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};
