@extends('layouts.app')

@section('body-section', 'login-page sidebar-collapse')

@section('content')
<div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="POST" action="{{ route('login') }}">
              @csrf
              <div class="card-header card-header-danger text-center">
                <h4 class="card-title">Inicio de sesion</h4>
              </div>
              <p class="description text-center">Ingresa tus datos</p>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">mail</i>
                    </span>
                  </div>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email...">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password...">
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        Recordar sesion
                        <span class="form-check-sign">
                            <span class="check">
                            </span>
                        </span>
                    </label>
                </div>
                <!--<a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}-->
                </a>
              </div>
              <div class="footer text-center">
                <button type="submit" class="btn btn-danger btn-link btn-wd btn-lg">
                {{ __('Ingresar') }}
            </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @include('includes.footer')
  </div>
@endsection
