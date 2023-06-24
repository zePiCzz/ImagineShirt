@extends('layout')
@section('titulo','Colors')
@section('main')

<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Código</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($colors as $color)
            <tr>
                <td>{{$color->name}}</td>
                <td>{{$color->code}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $colors->withQueryString()->links() }}
@endsection
