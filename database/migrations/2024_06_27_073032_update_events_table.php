<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('date_start');
            $table->dropColumn('date_finish');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
        });
    }

    public function down()
    {
        // Откатываем изменения при необходимости
        Schema::table('events', function (Blueprint $table) {
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_finish')->nullable();
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
        });
    }
};
