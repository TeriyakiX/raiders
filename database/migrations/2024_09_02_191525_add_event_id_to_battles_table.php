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
        Schema::table('battles', function (Blueprint $table) {
            // Добавление колонки event_id только если она не существует
            if (!Schema::hasColumn('battles', 'event_id')) {
                $table->unsignedBigInteger('event_id')->after('defender_final_cups');
            }
        });
    }

    public function down()
    {
        Schema::table('battles', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
            $table->dropColumn('event_id');
        });
    }
};
