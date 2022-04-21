@extends('layouts.app')

@section('body-section', 'landing-page sidebar-collapse')

@section('content')

<div class="container">
    <h2 class="title" style="color: black; padding-top: 80px; ">Productos disponibles</h2>
      <div class="team">
      <div class="row">
        @forelse($productos as $product)
          <div class="col-md-4">
            <div class="team-player">
              <div class="card card-plain bg-light">
                <div class="col-md-6 ml-auto mr-auto">
                  <img src="{{ $product->featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded img-fluid" style="margin-top: 15px;">
                </div>
                <h4 class="card-title" style="padding-bottom: all; padding-left: 15px;">
                  <a style="color:black;" href="{{ url('/products/'.$product->id.'/show') }}">{{ $product->name }} ${{ $product->price }}</a>
                  <br>
                  <small class="card-description text-muted">{{ $product->long_description }}</small>
                </h4>
                  <p class="card-description"></p>
              </div>
            </div>
          </div>
          @empty
          no hay datos
        @endforelse
      </div>
        {{ $productos->links() }}
    </div>

</div>
</body>
<br>
@include('includes.footer')
</html>
@endsection