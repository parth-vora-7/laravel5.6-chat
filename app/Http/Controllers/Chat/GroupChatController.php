<?php

namespace App\Http\Controllers\Chat;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupChatController extends Controller
{
    public function getChatForm() {
		$senderUser = auth()->user();

		return view('chat/chat-form', compact('senderUser'));
	}
}
