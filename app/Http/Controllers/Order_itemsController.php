<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_items;
use Illuminate\View\View;


class Order_itemsController extends Controller
{
    public function index(Request $request): View
    {
        $order_items = Order_items::with('tshirtImage')->with('orders')->with('colors')->paginate(10);

        foreach ($order_items as $order_item) {
            $url_imagem = $order_item->tshirtImage->image_url;
            $order_item->url_imagem = $url_imagem;
        }

        foreach ($order_items as $order_item) {

            $order = $order_item->orders->status;
            $order_item->order = $order;
        }

        foreach ($order_items as $order_item) {
            $color = $order_item->colors->name;
            $order_item->color = $color;
        }

        //enviar o $url_imagem para a view
        return view('order_items.index', ['order_items' => $order_items]);
    }
}
