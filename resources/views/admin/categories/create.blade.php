@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section">
    <center><h2 class="title">Registrar nueva categoria</h2></center>
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
        <form style="margin-left: 13%;" method="POST" action="{{ url('/admin/categoria')}}">
          @csrf
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="name">Nombre de la categoria</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Ingresa el nombre del producto" value="{{ old('name') }}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="description">Descripcion de la categoria</label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Ingresa la descripcion de la categoria" value="{{ old('description') }}">
              </div>
            </div>
            <div class="col-sm-12">
              <!--<div class="form-group">
                <label for="long_description">Descripcion larga del producto</label>
                <textarea class="form-control" name="long_description" id="long_description" rows="3"></textarea>
              </div>-->
              <div class="col-sm-6">
              <button class="btn btn-primary">Crear</button>
              <a href="{{ url('/admin/categoria') }}" class="btn btn-default">Cancelar</a>
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