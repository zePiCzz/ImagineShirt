@extends('layout')
@section('header-title','Customers')
@section('main')

<table class="table">
    <thead>
        <tr>
            <th>NIF</th>
            <th>Endereço</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{$customer->nif}}</td>
                <td>{{$customer->address}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $customers->withQueryString()->links() }}
@endsection
