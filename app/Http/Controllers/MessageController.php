<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;

class MessageController extends Controller
{
    public function store(Request $request, User $user)
    {
        Message::query()->create([
            'sender'=>$request->get('sender'),
            'receiver'=>$user->id,
            'message'=>$request->get('message'),
            'fee'=>$request->get('fee')
        ]);
        return back();
    }
    public function destroy(Message $message)
    {
        $message->delete();
        return back();
    }
}
