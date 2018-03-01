@extends('layouts.app')

@section('content')
    <h1>Conversacion con {{ $conversation->users->except($user->id)->implode('name', ', ') }}</h1>
    
    @foreach ($conversation->privateMessages as $message)
        <div class="card">
            <div class="card-header font-weight-bold">
                {{$message->user->name}} dijo...
            </div>
            <div class="card-block ml-1">
                    {{$message->message}}
            </div>
            <div class="card-footer text-muted">
                    {{$message->created_at}}
            </div>
        </div>
        <br>
    @endforeach
    
    

@endsection