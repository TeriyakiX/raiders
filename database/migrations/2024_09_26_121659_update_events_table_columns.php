<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('prize')->change();

        });

        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('filter');
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->json('prize')->change();
        });
        Schema::table('events', function (Blueprint $table) {
            $table->json('filter')->nullable();
        });
    }
};
