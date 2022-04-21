@extends('layouts.app')

@section('body-section', 'landing-page sidebar-collapse')

@section('content')
<div class="container">
  <h2 class="title" style="color: black; padding-top: 80px; ">Sucursal</h2>
  <div class="">
    <br>
    <h3 class="title float-right">Horarios</h3>
    <table class="ml-auto float-right navbar-nav col-md-5">
      <thead>
        <tr>
          <th class="col-md-2">Dia</th>
          <th class="col-md-2">Apertura</th>
          <th class="col-md-2">Cierre</th>
        </tr>
      </thead>
      <tbody>
        @foreach($hora as $h)
        <tr>
          <td class="col-md-2">{{ $h->dia }}</td>
          <td class="col-md-2 ">{{ $h->inicio }}</td>
          <td class="col-md-2">{{ $h->fin }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.8396670601423!2d-99.02987888501909!3d19.419332286891876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1fdf4ad401585%3A0x863a5f1c46ba0892!2sLas%20Delicias%20de%20la%20BIRRIA!5e0!3m2!1ses-419!2smx!4v1638828863582!5m2!1ses-419!2smx" width="540" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
  </div>
</div>
</body>
<br><br>
@include('includes.footer')
</html>
@endsection