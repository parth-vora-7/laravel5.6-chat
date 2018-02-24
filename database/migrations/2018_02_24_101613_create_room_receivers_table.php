<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomReceiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_receivers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('room_id')->references('chat_rooms')->on('id');
            $table->integer('message_id')->references('room_messages')->on('id');
            $table->integer('receiver_id')->references('users')->on('id');
            $table->datetime('received_at');
            $table->datetime('read_at');
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
        Schema::dropIfExists('room_receivers');
    }
}
