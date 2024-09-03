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
        Schema::table('squads', function (Blueprint $table) {
            // Добавляем колонку event_id
            $table->unsignedBigInteger('event_id')->nullable();

            // Добавляем внешний ключ на таблицу events
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('squads', function (Blueprint $table) {
            // Удаляем внешний ключ и колонку event_id
            $table->dropForeign(['event_id']);
            $table->dropColumn('event_id');
        });
    }
};
