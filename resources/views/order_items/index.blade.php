@extends('layout')
@section('header-title','Order Items')
@section('main')

    <table class="table">
        <thead>
            <tr>
                <th>ID do item</th>
                <th>ID da encomenda</th>
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
                    <td>{{$order_item->id}}</td>
                    <td>{{$order_item->order_id}}</td>
                    <td> <img src="{{ $order_item->tshirt_image_url ? asset('storage/tshirt_images/' . $order_item->tshirt_image_url) : asset('img/default_img.png') }}"alt="Foto da TShirt" style="width:80px;height:80px"> </td>
                    <td>{{$order_item->color_code}}</td>
                    <td>{{$order_item->size}}</td>
                    <td>{{$order_item->qty}}</td>
                    <td>{{$order_item->unit_price}}</td>
                    <td>{{$order_item->sub_total}}</td>
                    <td>
                        <div class="dropdown show">
                          </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $order_items->withQueryString()->links() }}
@endsection
