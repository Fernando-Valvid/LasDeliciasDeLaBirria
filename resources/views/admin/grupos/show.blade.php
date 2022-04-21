@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section">
    <center><h2 class="title">Detalles del grupo modificador</h2></center>
    @if (session('notification'))
        <div class="alert alert-success" role="alert">
            {{ session('notification') }}
        </div>
    @endif
    <div class="team">
      <div class="row">
        <form style="margin-left: 13%;" method="POST" action="#">
          @csrf
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                <h3>Nombre del grupo</h3>
                <label  name="name" class="form-control" id="name" value="" readonly>
                  {{ old('name', $grupo->nombre) }}
                </label>
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <h3>Toppings que contiene el grupo</h3>
                @foreach($comb as $c)
                <ul>
                  <li>{{ $c->nombre_topping }}</li>
                </ul>
                @endforeach
              </div>

              <div class="form-group">
                <h3>Productos que tienen asigando este grupo</h3>
                @foreach($combo as $c)
                <ul>
                  <li>{{ $c->name }}</li>
                </ul>
                @endforeach
              </div>
              <a href="{{ url('/admin/combinaciones/create') }}" class="btn btn-warning btn-round"><center>Agregar topping a un grupo</center></a>
              <a href="{{ url('/admin/grupo') }}" class="btn btn-default">Cancelar</a>
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