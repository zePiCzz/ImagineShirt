@extends('layout')
@section('header-title', 'Utilizador')
@section('main')

<h2>{{$user->name}}</h2>
<div>
    <label for="inputName">Nome</label>
    <input type="text" name="name" id="inputName" value="{{$user->name}}" readonly>
</div>
<div>
    <label for="inputEmail">Email</label>
    <input type="text" name="email" id="inputEmail" value="{{$user->email}}" readonly>
</div>
<div>
    <label for="inputPhoto">Photo</label>
    <br>
    @if($user->photo_url)
        <img src="{{ asset('storage/' . $user->photo_url) }}" alt="User Photo" style="width: 200px; height: 200px;">
    @else
        <img src="{{ asset('img/default_photo.png') }}" alt="Default User Photo" style="width: 200px; height: 200px;">
    @endif
</div>
<div>
    <a href="{{route('users.index')}}">Voltar</a>
</div>
@endsection
