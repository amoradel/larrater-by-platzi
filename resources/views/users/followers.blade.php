@extends('layouts.app')

@section('content')
    <h1>{{$user->name}}</h1>
    <ul class="list-unstyled">
        @foreach ($followers as $follower)
            <li> <a href="/{{$follower->username}}">{{$follower->username}}</a> </li>
        @endforeach
    </ul>
    
@endsection