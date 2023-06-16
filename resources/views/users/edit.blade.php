@extends('layout')
@section('title', 'Alterar User')
@section('main')

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0,
 maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Utilizador</title>
</head>

<body>
    <h2>Editar {{ $user->name }}</h2>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="inputName">Nome</label>
            <input type="text" name="name" id="inputName value="{{ $user->name }}">
        </div>
        <div>
            <label for="inputEmail">Email</label>
            <input type="text" name="email" id="inputEmail" value="{{ $user->email }}">
        </div>
        <div>
            <label for="inputPassword">Password</label>
            <input type="password" name="password" id="inputPassword" value="{{ $user->password }}">
        </div>
        <div>
            <label for="inputPhoto">Photo</label>
            <input type="text" name="photo" id="inputPhoto" value="{{ $user->photo }}">
        </div>
        <div>
            <button type="submit" name="ok">Guardar user</button>
        </div>
    </form>
</body>

</html>
@endsection
