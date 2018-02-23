@extends('layouts.app')

@section('content')
    <form action="/auth/facebook.register" method="POST">
        {{ csrf_field() }}
        <div class="card">
            <div class="card-block">
                <img src="{{$user->avatar}} " alt="user-avatar" class="img-thumbail">
            </div>
            <div class="card-block">
                <div class="form-group">
                    <label for="name" class="form-control-label"> Nombre </label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}} " readonly>
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label"> Email </label>
                    <input type="text" class="form-control" name="email" value="{{$user->email}} " readonly>
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label"> Nombre de Usuario </label>
                    <input type="text" class="form-control" name="username" value="{{old('username')}} ">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </div>
    </form>
@endsection