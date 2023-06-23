@extends('layout')
@section('header-title', 'Editar Perfil')
@section('main')

<h2>Editar {{ $user->name }}</h2>
<form method="POST" action="{{ route('users.update', $user) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        <label for="inputName">Nome</label>
        <input type="text" name="name" id="inputName" value="{{ $user->name }}">
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
        <input type="file" name="photo" id="inputPhoto">
    </div>
    <div>
        <button type="submit" name="ok">Guardar user</button>
    </div>
</form>
@endsection


