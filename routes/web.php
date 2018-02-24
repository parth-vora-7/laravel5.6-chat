<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/general-chat', 'Chat\GeneralChatController@getChatForm')->name('general.chat');
Route::post('/general-message/{chatRoom}', 'Chat\GeneralChatController@sendMessage')->name('general.send.message');

Route::get('/group-chat', 'Chat\GroupChatController@getChatForm')->name('group.chat');
Route::get('/chat/{receiverUser}', 'Chat\PrivateChatController@getChatForm')->name('private.chat');

