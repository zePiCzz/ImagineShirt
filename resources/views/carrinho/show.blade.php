@extends( 'layout' )
@section( 'header-title', 'Carrinho' )
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
                @foreach ($order_items as $order_item)
                    <tr>
                        <td> <img src="{{ $order_item->tshirt_image_url ? asset('storage/tshirt_images/' . $order_item->tshirt_image_url) : asset('img/default_img.png') }}"alt="Foto da TShirt" style="width:80px;height:80px"> </td>
                        <td>{{$order_item->color_code}}</td>
                        <td>{{$order_item->size}}</td>
                        <td>{{$order_item->qty}}</td>
                        <td>{{$order_item->unit_price}}</td>
                        <td>{{$order_item->sub_total}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $order_items->withQueryString()->links() }}
    </div>
