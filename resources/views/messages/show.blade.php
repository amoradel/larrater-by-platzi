@extends('layouts.app')

@section('title')
Messages || Laratter
@endsection


@section('content')
    <h1 class="h3"> Message id: {{$message->id}} </h1>
    @include('messages.message')

<responses :message="{{ $message->id }}"></responses>

@endsection