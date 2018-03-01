<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMessageRequest;

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

    public function create(CreateMessageRequest $request){

        $user = $request->user();
        $image = $request->file('image');


        $message = Message::create([
            'user_id' => $user->id,
            'content'   => $request->input('message'),
            'image'     => $image->store('messages', 'public'),
        ]);
        // dd($message);
        return redirect('/messages/'.$message->id);
    }
}
