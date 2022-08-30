<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->unsignedBigInteger('division_id')->comment('事業部ID');
            $table->unsignedBigInteger('usage_id')->comment('用途ID');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->foreign('usage_id')->references('id')->on('usages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};