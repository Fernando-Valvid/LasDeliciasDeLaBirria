<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Category;

class TestController extends Controller
{
    public function welcome()
    {
        $productos = Producto::simplePaginate(3);
        $cat=Category::all();
        return view('welcome')->with(compact('productos', 'cat'));
    }
}
