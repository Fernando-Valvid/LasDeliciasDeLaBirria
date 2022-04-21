@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section">
    <center><h2 class="title">Editar {{ $categoria->name }}</h2></center>
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
        <form style="margin-left: 13%;" method="POST" action="{{ url('/admin/categoria/'.$categoria->id.'/edit')}}">
          @csrf
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                <label for="name">Nombre del producto</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $categoria->name) }}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="description">Descripcion corta del producto</label>
                <input type="text" name="description" class="form-control" id="description" value="{{ old('description', $categoria->description) }}">
              </div>
            </div>
            <!--<div class="col-sm-12">
              <div class="form-group">
                <label for="long_description">Descripcion larga del producto</label>
                <textarea class="form-control" name="long_description" id="long_description" rows="3"></textarea>
              </div>-->
              <div class="col-sm-6">
              <button class="btn btn-primary">Guardar cambios</button>
              <a href="{{ url('/admin/categoria') }}" class="btn btn-default">Cancelar</a>
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