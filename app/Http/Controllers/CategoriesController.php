<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::paginate(10);
        //dd($categories);
        return view('categories.index')->with('categories', $categories);
    }
}
