@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section text-center">
    <h2 class="title">Categorias</h2>
    <a href="{{ url('/admin/categoria/create') }}" class="btn btn-warning btn-round"><center>Crear nueva categoria</center></a>
    <br>
    <br>
    <br>
    <div class="team">
      <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">Nombre</th>
              <th class="text-center">Descripcion</th>
              <th class="text-right">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categoria as $category)
            <tr>
              <td class="text-center">{{ $category->id }}</td>
              <td>{{ $category->name }}</td>
              <td>{{ $category->description }}</td>
              <td class="td-actions text-right">
                <form method="POST" action="{{ url('/admin/categoria/'.$category->id) }}">
                  @csrf
                  @method('DELETE')
                  <a href="{{ url('/admin/categoria/'.$category->id.'/edit') }}"  rel="tooltip" title="Editar categoria" class="btn btn-info btn-simple btn-xs btn-success">
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
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
@endsection