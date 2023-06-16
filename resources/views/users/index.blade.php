@extends('layout')
@section('header-title', 'Utilizadores')
@section('main')

    <a href="{{ route('users.create', $users) }}">Criar user</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <td>
                </td>
                <td>
                    <a href="{{ route('users.edit', $users) }}">Editar user</a>
                    <form method="POST" action="{{ route('users.destroy', $users) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="ok">Apagar user</button>
                    </form>
                </td>
            @endforeach
        </tbody>
    </table>
    {{ $users->withQueryString()->links() }}
@endsection
