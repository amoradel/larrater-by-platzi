<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Conversation;
use App\PrivateMessage;

class UsersController extends Controller
{
    public function show($username){


        $user = User::where('username', $username)->firstOrFail();

        return view('users.show',
        [
            'user'  => $user,
        ]);
    }

    public function follows($username){
        $user = $this->findByUsername($username);

        return view('users.follows',
        [
            'user'  => $user,
        ]);
    }

    public function followers($username){
        $user = $this->findByUsername($username);
        
        return view('users.followers', [
            'user'      => $user,
            'followers'   => $user->followers,
        ]);
    }

    public function follow($username, Request $request){
        $user = $this->findByUsername($username);

        $me =$request->user();

        $me->follows()->attach($user);

        return redirect("/$username")->withSuccess('Usuario seguido!');
    }
   

    public function unfollow($username, Request $request){
        $user = $this->findByUsername($username);

        $me =$request->user();

        $me->follows()->detach($user);

        return redirect("/$username")->withSuccess('Usuario no seguido!');

    }

    public function sendPrivateMessage($username, Request $request){
        $user = $this->findByUsername($username);

        $me = $request->user(); //Como se obtiene este user?
        $message = $request->input('message');

        $conversation = Conversation::between($me,$user);
        
        $privateMessage = PrivateMessage::create([
            'user_id' => $me->id,
            'conversation_id' => $conversation->id,
            'message' => $message,
        ]);

        return redirect('/conversations/'.$conversation->id);
    }

    public function showConversation(Conversation $conversation){
        $conversation->load('users', 'privateMessages');

        $have_user= $conversation->haveUser(auth()->user());
            return view('users.conversation',[
                'conversation' => $conversation,
                'user' => auth()->user()
            ]);
    }

    private function findByUsername($username){
        return $user = User::where('username', $username)->firstOrFail();
    }
}
