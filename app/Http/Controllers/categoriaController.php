<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoria=Category::paginate(10);
        return view('admin.categories.index')->with(compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            'name.required'=>'Es obligatorio un nombre para el producto',
            'description.required'=>'Es obligatoria una descripcion del producto',
            'description.max'=>'Exediste el numero de caracteres para la descripcion corta del producto'
        ];
        $rules=[
            'name'=>'required|min:5',
            'description'=>'required|max:100',
        ];
        $this->validate($request, $rules, $messages);
        $categoria = new Category();
        $categoria->name=$request->input('name');
        $categoria->description=$request->input('description');
        $categoria->save();

        return redirect('admin/categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria=Category::find($id);
        return view('admin.categories.edit')->with(compact('categoria'));
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
        $messages=[
            'name.required'=>'Es obligatorio un nombre para el producto',
            'description.required'=>'Es obligatoria una descripcion del producto',
            'description.max'=>'Exediste el numero de caracteres para la descripcion corta del producto'
        ];
        $rules=[
            'name'=>'required|min:5',
            'description'=>'required|max:100',
        ];
        $this->validate($request, $rules, $messages);
        $categoria =Category::find($id);
        $categoria->name=$request->input('name');
        $categoria->description=$request->input('description');
        $categoria->save();

        return redirect('admin/categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria=Category::find($id);
        $categoria->delete();

        return back();
    }
}
