@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Laratter</h1>
        <nav>
            <ul class="nav nav-pills">
                <li class="nav-item"> <a class="nav-link" href="/">Home</a> </li>
            </ul>
        </nav>
    </div>

    @if (Auth::check())
    <div class="row">
        <form action="/messages/create" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group ml-3">
                <input type="text" name="message" class="form-control  @if (!$errors->isEmpty()) is-invalid @endif" placeholder="Qué estas pensando?">
                @if (!$errors->isEmpty())
                    @foreach ($errors->all() as $error)
                        <div class="ml-3 invalid-feedback">
                            <li>{{$error}}</li>  
                        </div>
                    @endforeach
                @endif
                <input type="file" name="image" class="form-control-file">
            </div>
        </form>
    </div>
    @endif

    <div class="row">
        @forelse ($messages as $message)
            <div class="col-6">
                @include('messages.message')
            </div>
        @empty
            <P>No hay mensajes destacados</P>
        @endforelse

        @if (count($messages))
            <div class="mt-2 mx-auto">
                {{$messages->links('pagination::bootstrap-4')}}            
            </div>
        @endif
    </div>
@endsection
    