<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function show($username){
        $user = $this->findByUsername($username);

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

    public function follow($username, Request $request){
        $user = $this->findByUsername($username);

        $me =$request->user();

        $me->follows()->attach($user);

        return redirect("/$username")->withSuccess('Usuario Seguido!');

    }

    public function followers($username){
        $user = $this->findByUsername($username);

    }

    private function findByUsername($username){
        return $user = User::where('username', $username)->first();
    }
}
