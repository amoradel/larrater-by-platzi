@extends('layouts.app')

@section('content')
    <h1>{{$user->name}}</h1>

    <a href="/{{$user->username}}/follows" class="btn btn-links"> 
        Sigo a 
        <span class="badge badge-warning"> 
            {{$user->follows->count()}}
        </span> 
    </a>

    <a href="/{{$user->username}}/followers" class="btn btn-links">
        Seguidores 
        <span class="badge badge-success"> 
            {{$user->followers->count()}}
        </span> 
    </a>

    @if (Auth::check())
        @if (Auth::user()->isFollowing($user))
            <form method="POST" action="/{{$user->username}}/unfollow">
                {{ csrf_field() }}
                @if (session('success'))
                    <span class="text-success">{{session('success')}}</span>
                @endif
                <button class="btn btn-danger">Dejar de Seguir</button>
            </form>             
        @else
            <form method="POST" action="/{{$user->username}}/follow">
                {{ csrf_field() }}
                @if (session('success'))
                    <span class="text-success">{{session('success')}}</span>
                @endif
                <button class="btn btn-primary">Seguir</button>
            </form>   
        @endif
         
    @endif

    
    <div class="row">
        @foreach ($user->messages as $message)
        <div class="col-6">
            @include('messages.message')
        </div>
        @endforeach
    </div>
    

@endsection