@extends('layout')
@section('header-title', 'Carrinho de Compras')
@section('main')

<div>
    <h3>Produtos no Carrinho</h3>
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
                        <th></th>

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
                            <td>
                                <form action="{{ route('carrinho.remover', $tshirtId) }}" method="POST">
                                    @csrf
                                    <button type="submit">Remover</button>
                                </form>
                                <form action="{{ route('carrinho.exibirFormularioInformacoesAdicionais') }}" method="GET">
                                    @csrf
                                    <button type="submit">Confirmar Compra</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>O carrinho está vazio.</p>
        @endif
    </div>
</div>

@endsection
