@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section">
    <center><h2 class="title">Editar horario del dia {{ $hora->dia }}</h2></center>
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
        <form style="margin-left: 13%;" method="POST" action="{{ url('admin/horario/'.$hora->id.'/edit')}}">
          @csrf
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                <label for="inicio">Apertura</label>
                <input type="text" name="inicio" class="form-control" id="inicio" value="{{ old('inicio', $hora->inicio) }}">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="fin">Cierre</label>
                <input type="text" name="fin" class="form-control" id="fin" value="{{ old('fin', $hora->fin) }}">
              </div>
            </div>

              </div>
              <button class="btn btn-primary">Guardar cambios</button>
              <a href="{{ url('/admin/horario') }}" class="btn btn-default">Cancelar</a>
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