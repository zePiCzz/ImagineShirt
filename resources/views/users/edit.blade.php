@extends('layout')

@section('titulo', 'Alterar User')

@section('subtitulo')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Alterar</li>
    </ol>
@endsection

@section('main')
    <form method="POST" action="{{ route('users.update', ['user' => $user]) }}">
        @csrf
        @method('PUT')
        @include('users.shared.fields')
        <div class="mb-3 form-floating">
            <input type="file" class="form-control" name="photo_url" id="inputPhoto"
                value="{{ old('photo_url', $user->photo_url) }}">
            <label for="inputPhoto" class="form-label">Foto</label>
            @error('photo_url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
    </div>
        <div class="my-4 d-flex justify-content-end">
            <button type="submit" class="btn btn-success" name="ok">Guardar Alterações</button>
            <a href="{{ route('users.edit', ['user' => $user]) }}" class="btn btn-secondary ms-3">Cancelar</a>
        </div>
    </form>
@endsection


