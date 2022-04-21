@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section">
    <center><h2 class="title">Editar usuario existente</h2></center>
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
        <form style="margin-left: 13%;" method="POST" action="{{ url('/admin/users/'.$user->id.'/edit')}}">
          @csrf
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="name">Nombre del usuario</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $user->name) }}">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="email">Email del usuario</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email', $user->email) }}">
              </div>
            </div>
            <button class="btn btn-primary">Guardar cambios</button>
            <a href="{{ url('/admin/users') }}" class="btn btn-default">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
@endsection