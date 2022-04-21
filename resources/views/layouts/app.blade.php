<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title', 'Las Delicias de la Birria')
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('css/material-kit.css?v=2.0.7') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="@yield('body-section')">
  <nav class="navbar navbar-inverse fixed-top navbar-expand-lg bg-profile">
    <div class="container">
      <div class="navbar-translate" style="padding-bottom: 10px;">
        <a class="navbar-brand" href="{{ url('/') }}">
          <!--<img class="d-block w-100" src="../../img/birria/Logo.png" alt="Las Delicias de la Birria" style="width: 650px; height: 65px;"> </a>-->
          <img srcset="../../../img/birria/Logo.png 90w,
             ../../../img/birria/Logo.png 90w,
             ../../../img/birria/Logo.png 90w"
     sizes="(max-width: 14px) 14px,
            (max-width: 14px) 14px,
            14px"
      src="../../../img/birria/Logo.png" alt="Las Delicias de la Birria"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('birria') }}">{{ __('Birria') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tacos') }}">{{ __('Tacos') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('combos') }}">{{ __('Combos') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('plancha') }}">{{ __('A la plancha') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bebidas') }}">{{ __('Bebidas') }}</a>
            </li>
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Inicar sesion') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                    </li>
                @endif
                @else
                    <li>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/home') }}">Carrito</a>
                            @if(auth()->user()->admin)
                                <a class="dropdown-item" href="{{ url('/admin/products') }}">Gestionar productos</a>
                                <a class="dropdown-item" href="{{ url('/admin/horario') }}">Gestionar horario</a>
                                <a class="dropdown-item" href="{{ url('/admin/users') }}">Gestionar usuarios</a>
                                <a class="dropdown-item" href="{{ url('/admin/categoria') }}">Gestionar categorias</a>
                                <a class="dropdown-item" href="{{ url('/admin/grupo') }}">Gestionar grupos modificadores</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                {{ __('Cerrar sesion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
           @endguest
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

<style type="text/css">
    .float{
    position:fixed;
    width:60px;
    height:60px;
    bottom:40px;
    right:40px;
    background-color:#25d366;
    color:#FFF;
    border-radius:50px;
    text-align:center;
  font-size:30px;
    box-shadow: 2px 2px 3px #999;
  z-index:100;
}
.my-float{
    margin-top:16px;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=525561425090&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n." class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

<!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://www.facebook.com/Las-Delicias-de-la-Birria-106572671276761" class="float" target="_blank">
<i class="fa fa-facebook my-float"></i>
</a>
    -->

  <!--   Core JS Files   -->
  <script src="{{ asset('js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
  <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="{{ asset('js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/material-kit.js?v=2.0.7') }}" type="text/javascript"></script>
</body>

</html>