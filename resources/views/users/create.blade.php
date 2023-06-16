@extends('layout')
@section('title', 'Criar User')
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
    <h2>Novo User</h2>
    <form method="POST" action="{{route('cursos.store')}}">
        @csrf
        <div>
            <label for="inputNome">Nome</label>
            <input type="text" name="name" id="inputNome">
        </div>
        <div>
            <label for="inputEmail">Email</label>
            <input type="text" name="email" id="inputEmail">
        </div>
        <div>
            <label for="inputTipo">Password</label>
            <input type="password" name="password" id="inputPassword">
        </div>
        <div>
            <label for="inputPhoto">Photo</label>
            <input type="text" name="photo" id="inputPhoto">
        </div>
    </form>
</body>

</html>
@endsection
