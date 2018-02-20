<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function show(Message $id){
        // $message = Message::find($id);

        return view ('messages.show', [
            'message' => $id,
        ]);
    }

    public function create(\App\Http\Requests\CreateMessageRequest $data){

        $message = Message::create([
            'content'   => $data->input('message'),
            'image'     => 'http://lorempixel.com/600/338?'.mt_rand(0,1000),
        ]);
        // dd($message);
        return redirect('/messages/'.$message->id);
    }
}
