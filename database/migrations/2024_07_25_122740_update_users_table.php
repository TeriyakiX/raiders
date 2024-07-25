<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('league_id')->nullable()->after('id');

            // Создание внешнего ключа
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('set null');
        });
    }

    /**
     * Откатить миграцию.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['league_id']);
            $table->dropColumn('league_id');
        });
    }
};
