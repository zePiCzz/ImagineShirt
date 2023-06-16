@extends('layout')
@section('header-title', 'Utilizadores')
@section('main')

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0,
     maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>User</title>
    </head>
    <body>
        <h2>Utilizador {{$user->name}}</h2>
        <div>
            <label for="inputName">Nome</label>
            <input type="text" name="name" id="inputName" value="{{$user->name}}" readonly>
        </div>
        <div>
            <label for="inputEmail">Email</label>
            <input type="text" name="email" id="inputEmail" value="{{$user->email}}" readonly>
        </div>
        <div>
            <label for="inputPassword">Password</label>
            <input type="password" name="password" id="inputPassword" value="{{$user->password}}" readonly>
        </div>
        <div>
            <label for="inputPhoto">Photo</label>
            <input type="text" name="photo" id="inputPhoto" value="{{$user->photo}}" readonly>
        </div>
        <div>
            <a href="{{route('users.index')}}">Voltar</a>
        </div>
    </body>
</html>
@endsection
