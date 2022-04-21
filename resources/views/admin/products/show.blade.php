@extends('layouts.app')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section">
    <center><h2 class="title">Detalles del producto</h2></center>
    @if (session('notification'))
        <div class="alert alert-success" role="alert">
            {{ session('notification') }}
        </div>
    @endif
    <div class="team">
      <div class="row">
        <form style="margin-left: 13%;" method="POST" action="#">
          @csrf
          <div class="row">
            <div class="col-sm-8">
              <div class="form-group">
                <label for="name">Nombre del producto</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $product->name) }}" readonly>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="price">Precio del producto</label>
                <input type="number" step="0.01" name="price" class="form-control" id="price" value="{{ old('price', $product->price) }}" readonly>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="description">Descripcion corta del producto</label>
                <input type="text" name="description" class="form-control" id="description" value="{{ old('description', $product->description) }}" readonly>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="long_description">Descripcion larga del producto</label>
                <textarea class="form-control" name="long_description" id="long_description" rows="3" readonly>{{ old('long_description', $product->long_description) }}</textarea>
              </div>
            </div>
              <div class="col-sm-6">
              <div class="form-group">
                <label for="category">Categoria del producto</label>
                <input type="text" name="category_id" class="form-control" id="category_id" value="{{ old('description', $product->category->name) }}" readonly>
              </div>
            </div>
            <div class="col-sm-12">
              <h4>Imagen del producto</h4>
              <div class="row">
              @foreach($images as $image)
                <div class="container col-md-4">
                  <div class="row gx-5">
                    <div class="col">
                     <div class="p-3 border bg-light">
                      <center>
                        <img src="{{ $image->url }}" width="250" height="250">
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
        </form>
        @auth
          <div  class="text-center">
            <button class="btn btn-danger btn-round" data-toggle="modal" data-target="#modalAddToCart">
              <i class="material-icons">add</i> Añadir al carrito
            </button>
          </div>
        @endauth
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalAddToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seleccionar cantidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ url('/cart') }}">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="modal-body">
          <input type="number" name="quantity" value="1" class="form-control">
        </div>

        <div class="modal-body">
          @if($product->category->name != "Bebidas")
            <h5>Toppings</h5>
            @foreach($comb as $c)
              <div class="form-check form-check-radio">
                <label class="form-check-label">
                  <input class="form-check-input" type="radio" name="topping_name" id="topping_name" value="{{ $c->nombre_topping }}">
                  {{ $c->nombre_topping }}
                  <span class="circle">
                    <span class="check"></span>
                  </span>
                </label>
              </div>
            @endforeach
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Añadir al carrito</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
@include('includes.footer')
@endsection