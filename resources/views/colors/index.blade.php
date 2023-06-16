@extends('layout')
@section('header-title','Customers')
@section('main')

<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($colors as $color)
            <tr>
                <td>{{$color->code}}</td>
                <td>{{$color->name}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $colors->withQueryString()->links() }}
@endsection
