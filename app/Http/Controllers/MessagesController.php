<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function show(Message $id){
        // $message = Message::find($id);
        $no_more=true;

        return view ('messages.show', [
            'message'   => $id,
            'no_more' => $no_more,
        ]);
    }

    public function create(\App\Http\Requests\CreateMessageRequest $data){

        $user = $data->user();

        $message = Message::create([
            'user_id' => $user->id,
            'content'   => $data->input('message'),
            'image'     => 'http://lorempixel.com/600/338?'.mt_rand(0,1000),
        ]);
        // dd($message);
        return redirect('/messages/'.$message->id);
    }
}
