<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;

class sucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hora=Horario::all();
        return view('sucursal.create')->with(compact('hora'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $hora=Horario::find($id);
        return view('sucursal.edit')->with(compact('hora'));
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
            'inicio.required'=>'Es obligatorio una hora de apertura, en dado caso que no se hay servicio colocar cerrado',
            'fin.required'=>'Es obligatorio una hora de cierre, en dado caso que no se hay servicio colocar cerrado'
        ];

        $this->validate($request, $messages);
        $hora=Horario::find($id);
        $hora->inicio=$request->input('inicio');
        $hora->fin=$request->input('fin');
        $hora->save();

        return redirect('/admin/horario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function indexSucursal()
    {
        $hora=Horario::all();
        return view('sucursal.index')->with(compact('hora'));
    }
}
