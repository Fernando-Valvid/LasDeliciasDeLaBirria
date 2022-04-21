@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section">
    <center><h2 class="title">Agregar toppings al grupo modificador</h2></center>
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
        <form style="margin-left: 13%;" method="POST" action="#">
          @csrf
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                <label for="name">Selecciona el grupo modificador</label>
                <select class="custom-select" id="product_id" name="product_id">
                  @forelse($productos  as $grup)
                    <option value="{{ $grup->id }}">{{ $grup->name }}</option>
                  @empty
                    <option value="0">No hay datos</option>
                  @endforelse
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="category">Selecciona un producto</label>
                <select class="custom-select" id="product_id" name="product_id">

                    <option value=""></option>

                    <option value="0">No hay datos</option>

                </select>
              </div>
              <button class="btn btn-primary">Crear</button>
              <a href="{{ url('/admin/grupo') }}" class="btn btn-default">Cancelar</a>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
@include('includes.footer')
@endsection