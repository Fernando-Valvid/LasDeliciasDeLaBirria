@extends('layouts.app')

@section('title', 'Las Delicias de la Birria | Dashboard')

@section('body-section', 'profile-page sidebar-collapse')

@section('content')

<div class="container">
  <div class="section">
    <center><h2 class="title" style="color: black; padding-top: 80px; ">Carrito</h2></center>
    @if (session('notification'))
        <div class="alert alert-success" role="alert">
            {{ session('notification') }}
        </div>
    @endif
    <div class="team">
      <div class="row">
        <ul class="nav nav-pills nav-pills-icons" role="tablist">
            <!--
                color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
            -->
            <li class="nav-item">
                <a class="active nav-link" style="background-color:red;" href="#dashboard-1" role="tab" data-toggle="tab">
                    <i class="material-icons">shopping_cart</i>
                    Carrito de compras
                </a>
            </li>

        </ul>
        <p class="text-right col-md-12">Tu carrito de compras presenta: {{ auth()->user()->cart->details->count() }} productos.</p>
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Topping</th>
              <th>Subtotal</th>
              <th class="text-right">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php $total=0;
              $texto="Pedido: ";
              $t="Total:$";
            ?>
            @foreach(auth()->user()->cart->details as $detail)
            <tr>
              <td class="text-center">
                <img src="{{ $detail->product->featured_image_url }}" height="80">
              </td>
              <td>{{ $productos=$detail->product->name }}</td>
              <td>${{ $precios=$detail->product->price }}</td>
              <td>{{ $cantidad=$detail->quantity }}</td>
              <td>{{ $salsa=$detail->topping }}</td>
              <td>${{ $sub= $detail->quantity * $detail->product->price }}</td>
              <td class="td-actions text-right">
                <form method="POST" action="{{ url('/cart') }}">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                  <a href="{{ url('products/'.$detail->product->id.'/show') }}" target="_blank"  rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs btn-info">
                    <i class="fa fa-info"></i>
                  </a>
                  <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-info btn-simple btn-xs btn-danger">
                  <i class="fa fa-times"></i>
                </button>
                </form>
              </td>
            </tr>
            <?php $total+=$sub;
              $texto=$texto." ".$productos.", ".$cantidad.", ".$salsa." || ";
            ?>
            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td class="text-right title">Total:</td>
              <td class="">${{ $total }}</td>
            </tr>
          </tbody>
        </table>
        <div class="text-center">

          <?php $t=$t."".$total; ?>
          <!--
          <form method="POST" action="/order">
            @csrf
          </form>-->
            <button class="btn btn-danger btn-round" data-toggle="modal" data-target="#modalDireccion">
              <i class="material-icons">done</i> Realizar pedido
            </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDireccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingresa la direccion de entrega</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="pedido">
        @csrf
        <div class="modal-body">
          <div class="input-group">
            <input id="cp" type="text" class="form-control @error('cp') is-invalid @enderror" name="cp" value="{{ old('cp') }}" required placeholder="Codigo Postal...">
            @error('cp')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div><br>
          <div class="input-group">
            <input id="colonia" type="text" class="form-control @error('colonia') is-invalid @enderror" name="colonia" value="{{ old('colonia') }}" required placeholder="Colonia...">
            @error('colonia')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div><br>
          <div class="input-group">
            <input id="calle" type="text" class="form-control @error('calle') is-invalid @enderror" name="calle" value="{{ old('calle') }}" required placeholder="Calle...">
            @error('calle')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div><br>
          <div class="input-group">
            <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required placeholder="Numero#...">
            @error('numero')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <input type="hidden" name="mensaje" id="mensaje" value="{{ $texto }}">
          <input type="hidden" name="t" id="t" value="{{ $t }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Confirmar</button>
        </div>
      </form>
    </div>
  </div>
</div>

@include('includes.footer')
@endsection

