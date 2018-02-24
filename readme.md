Features:
1) List all the user's of the site
2) Show online/offline status for each user
3) Create a group chat where users can chat together
4) Create a private chat where two user can chat with each other



private_chat:
id
sender_id
receiver_id
message
received_at
read_at
created_at
updated_at

chat_rooms:
id
creator_id
room_members
room_type: group, general
created_at
updated_at

room_messages
id
room_id
sender_id
message
created_at
updated_at

room_receivers
id
room_id
message_id
receiver_id
received_at
read_at
created_at
updated_at