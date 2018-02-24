<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateChatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('private_chat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id')->references('users')->on('id');
            $table->integer('receiver_id')->references('users')->on('id');
            $table->text('message');
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
        Schema::dropIfExists('private_chat');
    }
}
