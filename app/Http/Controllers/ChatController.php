<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index()
    {
        $chat = Message::all();
        return view('chat', compact('chat'));
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token']);

        $data['user_id'] = Auth::id();

        $message = Message::create($data);

        $user = $message->user->name;

        event(new NewMessage($message, $user));

        return $message;

    }

}
