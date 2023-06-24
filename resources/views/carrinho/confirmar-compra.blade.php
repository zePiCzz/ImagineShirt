@extends('layout')
@section('titulo', 'Confirmar Compra')

@section('subtitulo')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('carrinho.index') }}">Carrinho</a></li>
        <li class="breadcrumb-item active">Confirmar Compra</li>
    </ol>
@endsection

@section('main')
<div>
    <h3>Confirmação de Compra</h3>
</div>
<div class="row">
    <div class="col-md-12">
        @if (count($carrinho) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Tamanho</th>
                        <th>Cor</th>
                        <th>Quantidade</th>
                        <th>Imagem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carrinho as $tshirtId => $item)
                        <tr>
                            <td>{{ $item['nome'] }}</td>
                            <td>{{ $item['preco'] }}</td>
                            <td>{{ $item['tamanho'] }}</td>
                            <td>{{ $item['cor'] }}</td>
                            <td>{{ $item['qty'] }}</td>
                            <td><img src="{{ $item['imagem'] }}" alt="Imagem" style="width:80px;height:80px"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <form action="{{ route('carrinho.confirmar-compra') }}" method="POST">
                @csrf
                <!-- Campos do formulário -->
                <label for="NIF">NIF:</label>
                <input type="text" name="nif" id="nif">

                <label for="Address">Address</label>
                <input type="text" name="address" id="address">
                <label for="Type">Payment Type</label>
                <select name="payment_type" id="payment_type">
                    <option value="VISA">VISA</option>
                    <option value="MC">MC</option>
                    <option value="PAYPAL">PAYPAL</option>
                </select>
                <label for="Ref">Payment Ref</label>
                <input type="text" name="payment_ref" id="payment_ref">

                <!-- Outros campos do formulário -->

                <button type="submit" class="btn btn-success">Confirmar Compra</button>
            </form>

        @else
            <p>O carrinho está vazio.</p>
        @endif
    </div>
</div>

@endsection
