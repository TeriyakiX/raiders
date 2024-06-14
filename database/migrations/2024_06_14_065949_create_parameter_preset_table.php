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
        Schema::create('parameter_preset', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('preset_id');
            $table->unsignedBigInteger('parameter_id');
            $table->timestamps();

            $table->foreign('preset_id')->references('id')->on('presets')->onDelete('cascade');
            $table->foreign('parameter_id')->references('id')->on('parameters')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('parameter_preset');
    }
};
