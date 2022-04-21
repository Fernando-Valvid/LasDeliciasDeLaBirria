<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Category;
use App\Models\grupo;
use App\Models\Combinacione;

class ProductController extends Controller
{
    public function index(){
        $products=Producto::simplePaginate(10);
        return view('admin.products.index')->with(compact('products')); // Listado de productos
    }

    public function create(){
        $cat=Category::all();
        $grupos=Grupo::all();
        return view('admin.products.create')->with(compact('cat', 'grupos')); //Formulario de registro
    }

    public function store(Request $request){
        $messages=[
            'name.required'=>'Es obligatorio un nombre para el producto',
            'name.min'=>'El nombre del producto debe tener al menos 5 caracteres',
            'description.required'=>'Es obligatoria una descripcion del producto',
            'description.max'=>'Exediste el numero de caracteres para la descripcion corta del producto',
            'price.required'=>'Es obligatorio un precio para el producto',
            'price.numeric'=>'Ingrese un precio valido',
            'price.min'=>'No se admiten valores negativos'
        ];
        $rules=[
            'name'=>'required|min:5',
            'description'=>'required|max:100',
            'price'=>'required|numeric|min:0',
        ];
        $this->validate($request, $rules, $messages);
        $product = new Producto();
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->long_description=$request->input('long_description');
        $product->price=$request->input('price');
        $product->category_id=$request->input('category_id');
        $product->grupos_id=$request->input('grupos_id');
        $product->save();

        return redirect('/admin/products');
    }

    public function show($id){
        $cat=Category::all();
        $comb=Combinacione::join('productos', 'productos.grupos_id', '=', 'combinaciones.grupos_id')-> select(array('combinaciones.nombre_topping')) -> where('productos.id','=', $id)->simplePaginate();
        $product=Producto::find($id);
        $images=$product->images()->orderBy('featured', 'desc')->get();
        return view('admin.products.show')->with(compact('product', 'cat', 'images', 'comb'));
    }

    public function edit($id){
        $cat=Category::all();
        $product=Producto::find($id);
        $grupos=Grupo::all();
        return view('admin.products.edit')->with(compact('product', 'cat', 'grupos')); //Formulario de edicion
    }

    public function update(Request $request, $id){
        $messages=[
            'name.required'=>'Es obligatorio un nombre para el producto',
            'name.min'=>'El nombre del producto debe tener al menos 5 caracteres',
            'description.required'=>'Es obligatoria una descripcion del producto',
            'description.max'=>'Exediste el numero de caracteres para la descripcion corta del producto',
            'price.required'=>'Es obligatorio un precio para el producto',
            'price.numeric'=>'Ingrese un precio valido',
            'price.min'=>'No se admiten valores negativos'
        ];
        $rules=[
            'name'=>'required|min:5',
            'description'=>'required|max:100',
            'price'=>'required|numeric|min:0',
        ];
        $this->validate($request, $rules, $messages);
        $product=Producto::find($id);
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        $product->long_description=$request->input('long_description');
        $product->price=$request->input('price');
        $product->category_id=$request->input('category_id');
        $product->grupos_id=$request->input('grupos_id');
        $product->save();

        return redirect('/admin/products');
    }

    public function destroy($id){
        $product=Producto::find($id);
        $product->delete();

        return back();
    }
}
