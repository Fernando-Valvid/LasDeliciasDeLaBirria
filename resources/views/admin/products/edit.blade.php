@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section">
    <center><h2 class="title">Editar {{ $product->name }}</h2></center>
    <br>
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="team">
      <div class="row">
        <form style="margin-left: 13%;" method="POST" action="{{ url('/admin/products/'.$product->id.'/edit')}}">
          @csrf
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                <label for="name">Nombre del producto</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $product->name) }}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="price">Precio del producto</label>
                <input type="number" step="0.01" name="price" class="form-control" id="price" value="{{ old('price', $product->price) }}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="description">Descripcion corta del producto</label>
                <input type="text" name="description" class="form-control" id="description" value="{{ old('description', $product->description) }}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="long_description">Descripcion larga del producto</label>
                <textarea class="form-control" name="long_description" id="long_description" rows="3">{{ old('long_description', $product->long_description) }}</textarea>
              </div>
              <div class="col-sm-6">
              <div class="form-group">
                <label for="category">Categoria del producto</label>
                <select class="custom-select" id="category_id" name="category_id">
                @forelse($cat  as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                No hay datos
            @endforelse
        </select>
              </div>

              <div class="form-group">
                <label for="category">Grupos modificadores</label>
                <select class="custom-select" id="grupos_id" name="grupos_id">
                  <option value="0">Ninguno</option>
                  @forelse($grupos as $grup)
                    <option value="{{ $grup->id }}">{{ $grup->nombre }}</option>
                  @empty
                    No hay datos
                  @endforelse
                </select>
              </div>
              <button class="btn btn-primary">Guardar cambios</button>
              <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@include('includes.footer')
@endsection