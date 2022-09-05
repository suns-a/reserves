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
            $table->unsignedBigInteger('users_id')->comment('ユーザーID');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('divisions_id')->comment('事業部ID');
            $table->foreign('divisions_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->unsignedBigInteger('usages_id')->comment('用途ID');
            $table->foreign('usages_id')->references('id')->on('usages')->onDelete('cascade');
            $table->date('date')->comment('日付');
            $table->time('starts_at')->comment('開始時間');
            $table->time('ends_at')->comment('終了時間');
            $table->timestamps();
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
