@extends('layouts.auth')

@section('content')
<!-- Section: Design Block -->
<section class="background-radial-gradient overflow-hidden">
  <style>
    /* Estilos adicionales para el encabezado y la imagen de fondo */
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
      height: 90vh; /* Asegura que ocupe toda la altura de la pantalla */
      background-size: cover; /* Cubre toda la pantalla con la imagen de fondo */
      background-position: center; /* Centra la imagen de fondo */
      background-repeat: no-repeat;
      position: relative;
      overflow: hidden;
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }

    .header-content {
      z-index: 10;
      position: relative;
      padding-top: 80px;
      text-align: center;
      color: #fff;
    }

    .header-content h1 {
      font-size: 3rem;
      font-weight: bold;
      line-height: 1.2;
      letter-spacing: -0.05em;
    }

    .header-content p {
      font-size: 1.5rem;
      opacity: 0.85;
      max-width: 500px;
      margin: 0 auto;
    }
  </style>

  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5 ">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0 header-content">
        <h1 class="my-5 display-5 fw-bold ls-tight">
          Bienvenido a Farma Ortiz <br />
          <span>Inicia sesión para continuar</span>
        </h1>
        <p class="mb-4">
          Ingresa tus credenciales para acceder a tu cuenta.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="mb-3">
                <label for="email" class="form-label">{{ __('Correo Electrónico') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                  {{ __('Recuérdame') }}
                </label>
              </div>

              <button type="submit" class="btn btn-primary btn-block mb-4">
                {{ __('Iniciar sesión') }}
              </button>

              @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('¿Olvidaste tu contraseña?') }}
                </a>
              @endif

              <div class="text-center mt-4">
                <p>O inicia sesión con:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
@endsection
