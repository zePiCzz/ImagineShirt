<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_items;


class Order_itemsController extends Controller
{
    public function index()
    {
        $order_items = Order_items::paginate(10);

        foreach ($order_items as $order_item) {
            $url_imagem = $order_item->tshirtImage->image_url;
            $order_item->url_imagem = $url_imagem;
            $order = $order_item->orders;
            $order_item->order = $order;
        }

        //enviar o $url_imagem para a view
        return view('order_items.index')->with('order_items', $order_items);
    }
}
