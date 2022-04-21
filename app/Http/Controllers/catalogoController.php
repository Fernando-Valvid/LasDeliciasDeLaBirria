<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class catalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Producto::join('categories', 'productos.category_id', '=', 'categories.id')-> select(array('productos.id', 'productos.name', 'productos.description', 'productos.long_description', 'productos.price')) -> where('categories.id', '=', 1) -> simplePaginate(9);
        return view('catalogo.index')->with(compact('productos'));
    }

    public function indexTacos()
    {
        $productos=Producto::join('categories', 'productos.category_id', '=', 'categories.id')-> select(array('productos.id', 'productos.name', 'productos.description', 'productos.long_description', 'productos.price')) -> where('categories.id', '=', 2) -> simplePaginate(9);
        //$productos=Producto::simplePaginate(6);
        return view('catalogo.index')->with(compact('productos'));

    }

    public function indexCombos()
    {
        $productos=Producto::join('categories', 'productos.category_id', '=', 'categories.id')-> select(array('productos.id', 'productos.name', 'productos.description', 'productos.long_description', 'productos.price')) -> where('categories.id', '=', 3) -> simplePaginate(9);
        //$productos=Producto::simplePaginate(6);
        return view('catalogo.index')->with(compact('productos'));

    }

    public function indexBebidas()
    {
        $productos=Producto::join('categories', 'productos.category_id', '=', 'categories.id')-> select(array('productos.id', 'productos.name', 'productos.description', 'productos.long_description', 'productos.price')) -> where('categories.id', '=', 5) -> simplePaginate(9);
        //$productos=Producto::simplePaginate(6);
        return view('catalogo.index')->with(compact('productos'));

    }

    public function indexPlancha()
    {
        $productos=Producto::join('categories', 'productos.category_id', '=', 'categories.id')-> select(array('productos.id', 'productos.name', 'productos.description', 'productos.long_description', 'productos.price')) -> where('categories.id', '=', 4) -> simplePaginate(9);
        //$productos=Producto::simplePaginate(6);
        return view('catalogo.index')->with(compact('productos'));

    }
}
