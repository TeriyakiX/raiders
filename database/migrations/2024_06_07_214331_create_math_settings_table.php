<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('math_settings', function (Blueprint $table) {
            $table->id();
            $table->string('formula_name');
            $table->text('formula');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('math_settings');
    }
};
