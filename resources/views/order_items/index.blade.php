@extends('layout')
@section('header-title','Order Items')
@section('main')

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
            @foreach ($order_items as $order_item)
                <tr>
                    <td> <img src="{{ $order_item->url_imagem ? asset('storage/tshirt_images/' . $order_item->url_imagem) : asset('img/default_img.png') }}"alt="Foto da TShirt" style="width:80px;height:80px"> </td>
                    @if ($order_item->color == null)
                        <td>Cor não definida</td>
                        @else
                        <td>{{$order_item->color}}</td>
                    @endif

                    <td>{{$order_item->size}}</td>
                    <td>{{$order_item->qty}}</td>
                    <td>{{$order_item->unit_price}}</td>
                    <td>{{$order_item->sub_total}}</td>
                    <td>{{$order_item->order}}</td>
                </tr>

            @endforeach
        </tbody>
    </table>
    {{ $order_items->withQueryString()->links() }}
@endsection
