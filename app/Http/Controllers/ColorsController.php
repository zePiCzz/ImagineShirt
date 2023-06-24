<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Colors;

class ColorsController extends Controller
{
    public function index()
    {
        $colors = Colors::paginate(10);
        return view('colors.index')->with('colors', $colors);
    }
}
