@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section text-center">
    <h2 class="title">Horario</h2>
    <br>
    <br>
    <br>
    <div class="team">
      <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="col-md-2">Dia</th>
              <th class="col-md-3">Inicio</th>
              <th class="col-md-3">Fin</th>
              <th class="text-right">Opciones</th>
            </tr>
          </thead>
          <tbody>
            @foreach($hora as $h)
            <tr>
              <td class="text-center">{{ $h->id }}</td>
              <td>{{ $h->dia }}</td>
              <td>{{ $h->inicio }}</td>
              <td>{{ $h->fin }}</td>
              <td class="td-actions text-right">
                <form method="POST" action="{{ url('admin/horario/'.$h->id) }}">
                  @csrf
                  <a href="{{ url('admin/horario/'.$h->id.'/edit') }}"  rel="tooltip" title="Editar hora" class="btn btn-info btn-simple btn-xs btn-success">
                    <i class="fa fa-edit"></i>
                  </a>
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