@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section text-center">
    <h2 class="title">Grupos de Modificadores</h2>
    <a href="{{ url('/admin/grupo/create') }}" class="btn btn-warning btn-round"><center>Crear un nuevo grupo de modificadores</center></a><br>

    <br>
    <br>
    <br>
    <div class="team">
      <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center col-md-3">#</th>
              <th class="text-center">Nombre</th>
              <th class="text-right col-md-3">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($grupos as $grup)
            <tr>
              <td class="text-center">{{ $grup->id }}</td>
              <td>{{ $grup->nombre }}</td>
              <td class="td-actions text-right">
                <form method="POST" action="{{ url('/admin/grupo/'.$grup->id) }}">
                  @csrf
                  @method('DELETE')
                  <a href="{{ url('/admin/grupo/'.$grup->id.'/show') }}"  rel="tooltip" title="Detalles del grupo" class="btn btn-info btn-xs">
                    <i class="fa fa-info"></i>
                  </a>
                  <a href="{{ url('/admin/grupo/'.$grup->id.'/edit') }}"  rel="tooltip" title="Editar grupo" class="btn btn-info btn-simple btn-xs btn-success">
                    <i class="fa fa-edit"></i>
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
        {{ $grupos->links() }}
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
@endsection