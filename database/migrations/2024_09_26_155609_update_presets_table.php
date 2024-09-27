<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('presets', function (Blueprint $table) {
            $table->dropColumn('title'); // Удаляем поле title
            $table->string('name', 20)->after('id'); // Добавляем название
            $table->string('parameter_combination')->after('description'); // Добавляем комбинацию параметров
        });
    }

    public function down()
    {
        Schema::table('presets', function (Blueprint $table) {
            $table->dropColumn('name'); // Удаляем название
            $table->dropColumn('parameter_combination'); // Удаляем комбинацию параметров
        });
    }
};
