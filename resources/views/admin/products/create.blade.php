@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section">
    <center><h2 class="title">Registrar nuevo producto</h2></center>
    <br><br>
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
        <form style="margin-left: 13%;" method="POST" action="{{ url('/admin/products')}}">
          @csrf
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                <label for="name">Nombre del producto</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Ingresa el nombre del producto" value="{{ old('name') }}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="price">Precio del producto</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Ingresa el precio del producto" value="{{ old('price') }}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="description">Descripcion corta del producto</label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Ingresa la descripcion del producto" value="{{ old('description') }}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="long_description">Descripcion larga del producto</label>
                <textarea class="form-control" name="long_description" id="long_description" rows="3">{{ old('long_description') }}</textarea>
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
              <button class="btn btn-primary">Crear</button>
              <a href="{{ url('/admin/products') }}" class="btn btn-default">Cancelar</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
@include('includes.footer')
@endsection