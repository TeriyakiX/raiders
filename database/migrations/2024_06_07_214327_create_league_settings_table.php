<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('league_settings', function (Blueprint $table) {
            $table->id();
            $table->string('league_name');
            $table->json('settings');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('league_settings');
    }
};
