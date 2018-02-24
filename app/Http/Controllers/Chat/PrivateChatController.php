<?php

namespace App\Http\Controllers\Chat;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivateChatController extends Controller
{
	public function getChatForm(User $receiverUser) {
		$senderUser = auth()->user();

		return view('chat/chat-form', compact('senderUser', 'receiverUser'));
	}
}
