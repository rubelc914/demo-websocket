<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function chatbox(){
        return view("chat");
    }

    public function boardcastMsg(Request $request){
        event(new \App\Events\ChantEvent($request->username, $request->message));
    }
}
