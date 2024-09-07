<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\SendMessageRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class ChatController extends Controller
{
    public function index()
    { 
        $messages = Message::with('user')->orderBy('created_at', 'asc')->get();
        return view('chat', compact('messages'));
    }

    public function sendMessage(SendMessageRequest $request)
    {

        $message = new Message();
        $message->user_id = auth()->user()->id;
        $message->message = $request->message;
        $message->save();

        return redirect()->back();
    }
}
