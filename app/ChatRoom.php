<?php

namespace App;

use App\RoomMessage;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
	public function getMessages() {
		return $this->hasMany(RoomMessage::class, 'room_id', 'id');
	}
}
