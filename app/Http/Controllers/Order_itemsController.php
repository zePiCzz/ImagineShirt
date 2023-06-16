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
        //dd($Order_items);
        return view('order_items.index')->with('order_items', $order_items);
    }
}
