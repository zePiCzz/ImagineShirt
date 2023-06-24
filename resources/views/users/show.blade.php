@extends('layout')

@section('titulo', 'Consultar User')

@section('subtitulo')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Consultar</li>
    </ol>
@endsection

@section('main')
    <div class="mb-3 form-floating">
        <img src="{{ asset('storage/' . $user->photo_url) }}" alt="User Photo" style="width: 200px; height: 200px;">
    </div>
    <div>
        @include('users.shared.fields', ['readonlyData' => true])
    </div>
    <div class="my-4 d-flex justify-content-end">
        <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-secondary ms-3">Alterar User</a>
    </div>
@endsection
