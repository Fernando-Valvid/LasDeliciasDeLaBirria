@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section text-center">
    <h2 class="title">Listado de productos</h2>
    <a href="{{ url('/admin/products/create') }}" class="btn btn-warning btn-round"><center>Crear nuevo producto</center></a>
    <br>
    <br>
    <br>
    <div class="team">
      <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="col-md-2">Nombre</th>
              <th class="col-md-2">Descripcion</th>
              <th>Categoria</th>
              <th class="text-right">Precio</th>
              <th class="col-md-3 text-right">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td class="text-center">{{ $product->id }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ $product->description }}</td>
              <td>{{ $product->category->name }}</td>
              <td>${{ $product->price }}</td>
              <td class="td-actions text-right">
                <form method="POST" action="{{ url('/admin/products/'.$product->id) }}">
                  @csrf
                  @method('DELETE')
                  <a href="{{ url('/admin/products/'.$product->id.'/edit') }}"  rel="tooltip" title="Editar producto" class="btn btn-info btn-simple btn-xs btn-success">
                    <i class="fa fa-edit"></i>
                  </a>
                  <a href="{{ url('/admin/products/'.$product->id.'/images') }}"  rel="tooltip" title="Imagenes del producto" class="btn btn-warning btn-simple btn-xs">
                    <i class="fa fa-image"></i>
                  </a>
                  <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-info btn-simple btn-xs btn-danger">
                  <i class="fa fa-times"></i>
                </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $products->links() }}
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
@endsection