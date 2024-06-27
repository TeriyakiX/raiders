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
        Schema::table('events', function (Blueprint $table) {
            // Add new columns
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
        });

        // Copy data from old columns to new columns
        DB::statement('UPDATE events SET start_time = date_start, end_time = date_finish');

        // Drop old columns
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('date_start');
            $table->dropColumn('date_finish');
        });
    }

    public function down()
    {
        // In case of rollback, reverse the process
        Schema::table('events', function (Blueprint $table) {
            $table->dateTime('date_start')->nullable();
            $table->dateTime('date_finish')->nullable();
        });

        DB::statement('UPDATE events SET date_start = start_time, date_finish = end_time');

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
        });
    }
};
