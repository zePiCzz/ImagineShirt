@extends('layout')

@section('titulo', 'Lista de Users')
@section('main')
    <p>
        <a class="btn btn-success" href="{{ route('users.create') }}"><i class="fas fa-plus"></i> &nbsp;Criar novo user</a>
    </p>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th></th>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td width="45"><img src="{{ asset('storage/' . $user->photo_url) }}" alt="Avatar"
                        class="bg-dark rounded-circle" width="45" height="45"></td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('users.show', ['user' => $user]) }}"></i>Consultar</a>
                    </td>
                    <td>
                        <a class="btn btn-dark" href="{{ route('users.edit', ['user' => $user]) }}"></i>Editar</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('users.destroy', ['user' => $user]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="delete" class="btn btn-danger">Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $users->links() }}
    </div>
@endsection

