<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order_items;

class CarrinhoController extends Controller
{
    public function index()
    {
        return view('carrinho.index');
    }

    public function add(Request $request, Order_items $order_items)
    {
        $order_items->quantity++;
        $order_items->save();

        return redirect()->route('carrinho.index')
            ->with('alert-msg', 'Item adicionado ao carrinho!')
            ->with('alert-type', 'success');
    }
}
