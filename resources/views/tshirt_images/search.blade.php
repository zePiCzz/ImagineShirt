@extends('layout')
@section('header-title', 'Imagens das TShirts')
@section('main')

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Imagem</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tshirt_images as $tshirt_image)
                <tr>
                    <td>{{ $tshirt_image->name }}</td>
                    <td>{{ $tshirt_image->description }}</td>
                    <td> <img src="{{ $tshirt_image->image_url ? asset('storage/tshirt_images/' . $tshirt_image->image_url) : asset('img/default_img.png') }}" alt="Foto da TShirt" style="width:80px;height:80px"> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $tshirt_images->links() }}
@endsection
