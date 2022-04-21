@extends('layouts.app')

@section('body-section', 'landing-page sidebar-collapse')

@section('content')
<div class="page-header" >
  <div class="container">
    <div class="row">
      <div class="" style="padding-left: 10px;">
        <h2 class="title" style="color: black;">Novedades</h2>
        <div style="margin-left:20px; margin-right:20px;" id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="../../../img/birria/Las delicias de la birria.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../../../img/birria/oferta especial.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="../../../img/birria/pedidos.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <h2 class="title" style="color: black; ">Productos mas vendidos</h2>
  <div class="team">
    <div class="row">
      @forelse($productos as $product)
        <div class="col-md-4">
          <div class="team-player">
            <a href="{{ url('/products/'.$product->id.'/show') }}">
              <div class="card card-plain bg-light">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded img-fluid" style="margin-top: 15px;" >
                </div>
                <h4 class="card-title" style="color:black; padding-bottom: all; padding-left: 15px;">
                  {{ $product->name }} ${{ $product->price }}
                  <br>
                  <small class="card-description text-muted">{{ $product->long_description }}</small>
                </h4>
                  <p class="card-description"></p>
              </div>
            </a>
          </div>
        </div>
      @empty
        no hay datos
      @endforelse
    </div>
  </div>
</div>
<br><br>
@include('includes.footer')
@endsection