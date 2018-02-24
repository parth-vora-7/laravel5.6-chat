<?php

namespace App\Http\Controllers\Chat;

use Lang;
use App\User;
use App\ChatRoom;
use App\RoomMessage;
use App\RoomReceiver;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeneralChatController extends Controller
{
	public function getChatForm() {
		$chatTitle = Lang::get('common.general_chat');
		$senderUser = auth()->user();
		$allUsers = User::pluck('name', 'id')->toArray();
		
		$receiverUsers = implode(array_keys($allUsers));

		$chatRoom = ChatRoom::where('room_type', 'general')->first();

		if(!$chatRoom) {
			$chatRoom = new ChatRoom;
			$chatRoom->creator_id = $senderUser->id;
			$chatRoom->room_members = $receiverUsers;
			$chatRoom->room_type = 'general';
			if(!$chatRoom->save()) {
				return ['status' => false, 'erorr' => 'Error'];
			}
		}
		$messages = $chatRoom->getMessages;
		
		return view('chat/chat-form', compact('senderUser', 'chatTitle', 'allUsers', 'messages', 'chatRoom'));
	}

	public function sendMessage(Request $request, ChatRoom $chatRoom) {
		$senderUser = auth()->user();
		$roomMessage = new RoomMessage;
		$roomMessage->sender_id = $senderUser->id;
		$roomMessage->room_id = $chatRoom->id;
		$roomMessage->message = $request->message;
		if($roomMessage->save()) {
			$receiverUsers = explode(',', $chatRoom->room_members);
			foreach ($receiverUsers as $receiverUser) {
				$roomReceiver = new RoomReceiver;
				$roomReceiver->room_id = $chatRoom->id;
				$roomReceiver->message_id = $roomMessage->id;
				$roomReceiver->receiver_id = $receiverUser;
				$roomReceiver->received_at = date('Y-m-d H:i:s');
				$roomReceiver->read_at = date('Y-m-d H:i:s');
				$roomReceiver->save();
			}
			return ['status' => true];
		} else {
			return ['status' => false, 'erorr' => 'Error'];
		}
	}
}
