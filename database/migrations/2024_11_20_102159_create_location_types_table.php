<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('location_types', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name', 50)->unique();
            $table->timestamps();
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->nullable()->after('type');
            $table->foreign('type_id')
                ->references('id')
                ->on('location_types')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropForeign(['type_id']);
            $table->dropColumn('type_id');
        });

        Schema::dropIfExists('location_types');
    }
};
