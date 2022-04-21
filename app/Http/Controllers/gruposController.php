<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\grupo;
use App\Models\Producto;
use App\Models\Category;
use App\Models\Combinacione;

class gruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos=Grupo::simplePaginate(10);
        return view('admin.grupos.index')->with(compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos=Producto::all();
        $cat=Category::all();
        $topping=Producto::join('categories', 'productos.category_id', '=', 'categories.id')-> select(array('productos.id', 'productos.name')) -> where('categories.name', '=', 'topping') ->simplePaginate();
        return view('admin.grupos.create')->with(compact('productos', 'topping'));
    }

    public function createTop()
    {
        $productos=Producto::all();
        $grupos=Grupo::all();
        $topping=Producto::join('categories', 'productos.category_id', '=', 'categories.id')-> select(array('productos.id', 'productos.name')) -> where('categories.name', '=', 'topping') ->simplePaginate();
        return view('admin.grupos.addTopping')->with(compact('productos', 'grupos', 'topping'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupo = new Grupo();
        $grupo->nombre=$request->input('name');
        $grupo->save();

        return redirect('/admin/grupo');
    }

    public function storeTop(Request $request)
    {
        $comb= new Combinacione();
        $comb->grupos_id=$request->input('grupo_id');
        $comb->nombre_topping=$request->input('nombreTopp');
        $comb->save();

        return redirect('/admin/grupo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grupo=Grupo::find($id);
        $comb=Combinacione::join('productos', 'productos.grupos_id', '=', 'combinaciones.grupos_id')-> select('combinaciones.nombre_topping') -> where('combinaciones.grupos_id','=', $id)->simplePaginate(1);
        $combo=Combinacione::join('productos', 'productos.grupos_id', '=', 'combinaciones.grupos_id')-> select(array('productos.name')) -> where('combinaciones.grupos_id','=', $id)->simplePaginate();
        return view('admin.grupos.show')->with(compact('grupo', 'comb', 'combo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comb=Combinacione::join('productos', 'productos.grupos_id', '=', 'combinaciones.grupos_id')-> select(array('productos.id', 'productos.name')) -> where('combinaciones.grupos_id', '=', $id) ->simplePaginate();
        $grupo=Grupo::find($id);

        return view('admin.grupos.edit')->with(compact('grupo', 'comb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grupo=Grupo::find($id);
        $grupo->nombre=$request->input('name');
        $grupo->save();

        return redirect('/admin/grupo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo=Grupo::find($id);
        $grupo->delete();

        return back();
    }
}
