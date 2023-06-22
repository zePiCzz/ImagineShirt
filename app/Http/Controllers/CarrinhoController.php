<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_items;
use App\Models\Colors;

class CarrinhoController extends Controller
{
    public function index(){
        $carrinho = session('carrinho', []);
        return view('carrinho.index', compact('carrinho'));
    }

    public function adicionar(Request $request)
    {
        $tshirt_image_id = $request->input('tshirt_id');
        $size = $request->input('size');
        $color_code = $request->input('color_code');
        $qty = $request->input('qty');

        $cores = Colors::All();

        return view('carrinho.adicionar', [
            'tshirtId' => $tshirt_image_id,
            'tamanho' => $size,
            'cor' => $color_code,
            'quantidade' => $qty,
            'cores' => $cores,
        ]);
    }

    public function update_carrinho(Request $request, Order_items $order_items){
        $carrinho = $request->session()->get('carrinho', []);
        $qty = ($carrinho[$order_items->id]['qty'] ?? 0);
        $qty += $request->input('qty');
        if ($request -> input('qty') <= 0){
            unset($carrinho[$order_items->id]);
            $msg = 'Item removido do carrinho!';
        } elseif ($request -> input('qty') > 0){
            $carrinho[$order_items->id] = [
                'qty' => $qty,
                'nome' => $order_items->name,
                'preco' => $order_items->unit_price,
                'tamanho' => $order_items->size,
                'cor' => $order_items->color_code,
                'imagem' => $order_items->tshirt_image_id,
            ];
        }
        $request->session()->put('carrinho', $carrinho);
        return back()
            ->with('alert-msg', $msg ?? 'Item atualizado no carrinho!')
            ->with('alert-type', 'success');
    }



}
