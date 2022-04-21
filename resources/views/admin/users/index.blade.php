@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section text-center">
    <h2 class="title">Listado de usuarios</h2>
    <a href="{{ url('/register') }}" class="btn btn-rose btn-round"><center>Crear nuevo usuario</center></a>
    <br>
    <br>
    <br>
    <div class="team">
      <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th>Nombre</th>
              <th class="col-md-4">Email</th>
              <th class="text-right">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td class="text-center">{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td class="td-actions text-right">
                <form method="POST" action="{{ url('/admin/users/'.$user->id) }}">
                  @csrf
                  @method('DELETE')
                  <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" type="button" rel="tooltip" title="Editar usuario" class="btn btn-info btn-simple btn-xs btn-success">
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
        {{ $users->links() }}
      </div>
    </div>
  </div>
</div>
@include('includes.footer')
@endsection