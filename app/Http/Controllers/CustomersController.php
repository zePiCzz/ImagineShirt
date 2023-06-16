<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customers::paginate(10);
        //dd($customers);
        return view('customers.index')->with('customers', $customers);
    }
}
