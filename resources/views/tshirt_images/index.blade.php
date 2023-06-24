@extends('layout')
@section('titulo', 'Imagens das TShirts')
@section('main')

    <table class="table">
        <thead>
            <form action="{{ route('tshirt_images.search') }}" method="GET">
                <select name="category_id" id="category_id">
                    <option value="">Categories</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category_id') == $category->name ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                <input type="text" name="name" placeholder="Name" value="{{ request('name') }}">
                <input type="text" name="description" placeholder="Description" value="{{ request('description') }}">
                <button type="submit">Search</button>
            </form>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Imagem</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tshirt_images as $tshirt_image)
                <tr>
                    <td>{{ $tshirt_image->name }}</td>
                    <td>{{ $tshirt_image->description }}</td>
                    <td> <img name="image_url" value="{{ $tshirt_image->image_url }}"
                            src="{{ $tshirt_image->image_url ? asset('storage/tshirt_images/' . $tshirt_image->image_url) : asset('img/default_img.png') }}"alt="Foto da TShirt"
                            style="width:80px;height:80px"> </td>
                    <td>
                        <form action="{{ route('carrinho.adicionar') }}" method="POST">
                            @csrf
                            <input type="hidden" name="tshirt_id" value="{{ $tshirt_image->id }}">
                            <label for="tamanho">Tamanho:</label>
                            <select name="tamanho" id="tamanho">
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <select name="color_code" id="code">
                                @foreach ($cores as $cor)
                                    <option value="{{ $cor->code }}">{{ $cor->name }}</option>
                                @endforeach
                            </select>
                            <label for="quantidade">Quantidade: <input type="number" name="quantidade"
                                    id="quantidade"></label>
                            <button class="btn btn-success" type="submit"><i class="fa-solid fa-cart-plus"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tshirt_images->withQueryString()->links() }}
@endsection
