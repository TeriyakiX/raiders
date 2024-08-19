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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();

            // Дополнительные поля для данных из внешнего API
            $table->string('external_id')->unique();
            $table->string('address')->nullable();
            $table->integer('role')->default(0);
            $table->string('display_role')->nullable();
            $table->string('clan')->nullable();
            $table->string('avatar')->nullable();
            $table->json('referrals')->nullable();
            $table->integer('total_invitation')->default(0);
            $table->boolean('verified')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
