@extends('layout')
@section('header-title', 'Carrinho de Compras')
@section('main')

<div>
    <h3>Produtos no Carrinho</h3>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Imagem da TShirt</th>
                    <th>Cor</th>
                    <th>Tamanho</th>
                    <th>Quantidade</th>
                    <th>Preço da Unidade</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carrinho as $row)
                    <tr>
                        <td> <img src="{{ $row['url_imagem'] ? asset('storage/tshirt_images/' . $row['url_imagem']) : asset('img/default_img.png') }}"alt="Foto da TShirt" style="width:80px;height:80px"> </td>
                        @if ($row['color'] == null)
                            <td>Cor não definida</td>
                            @else
                            <td>{{$row['color']}}</td>
                        @endif
                        <td>{{$row['size']}}</td>
                        <td>{{$row['qty']}}</td>
                        <td>{{$row['unit_price']}}</td>
                        <td>{{$row['sub_total']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
