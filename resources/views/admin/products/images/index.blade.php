@extends('layouts.app')

@section('title', 'Imagenes del producto')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section">
    <h2 class="title" style="margin-top: 52px;"><center>Imagenes del producto "{{ $product->name }}"</center></h2>
    <form enctype="multipart/form-data" method="POST" action="">
      @csrf
      <input type="file" name="photo" required>
      <button type="submit" class="btn btn-warning btn-round">Subir nueva imagen</button>
      <a href="{{ url('/admin/products') }}" class="btn btn-default btn-round">Regresar</a>
    </form>
    <hr>
    <div class="row">
      @foreach($images as $image)
      <div class="container col-md-4">
        <div class="row gx-5">
          <div class="col">
           <div class="p-3 border bg-light">
            <center>
              <img src="{{ $image->url }}" width="250" height="250">
              <form method="POST" action="">
                @csrf
                @method('DELETE')
                <input type="hidden" name="image_id" value="{{ $image->id }}">
                <button type="submit" class="btn btn-danger btn-round">Eliminar imagen</button>
                @if($image->featured)
                  <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada actualmente">
                    <i class="material-icons">favorite</i>
                  </button>
                @else
                  <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id) }}" class="btn btn-warning btn-fab btn-fab-mini btn-round">
                    <i class="material-icons">favorite</i>
                  </a>
                @endif
              </form>
            </center>
           </div>
          </div>
        </div>
        <br>
      </div>
      @endforeach
    </div>
  </div>
</div>
@include('includes.footer')
@endsection