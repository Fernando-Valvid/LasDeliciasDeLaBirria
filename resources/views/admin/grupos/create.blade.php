@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section">
    <center><h2 class="title">Nuevo grupo modificador</h2></center>
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
        <form style="margin-left: 13%;" method="POST" action="{{ url('/admin/grupo')}}">
          @csrf
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                <label for="name">Nombre del grupo modificador</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Ingresa el nombre del grupo modificador" value="{{ old('name') }}">
              </div>
            </div>

            <div class="col-sm-6">
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