<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class RoomMessage extends Model
{
	public function getSender() {
		return $this->belongsTo(User::class, 'sender_id', 'id');
	}
}
