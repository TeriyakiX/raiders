<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('presets', function (Blueprint $table) {
            $table->dropColumn('parameter_combination');
        });
    }

    public function down()
    {
        Schema::table('presets', function (Blueprint $table) {
            $table->string('parameter_combination')->nullable();
        });
    }
};
