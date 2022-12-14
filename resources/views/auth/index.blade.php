@php
  $u=''; $p='';
  if (App::environment(['local'])) {
    $u = 'benja.mora.torres@gmail.com';
    $p = 'bemtorres';
  }
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="/favicon.svg" type="image/x-icon" />
  <title>Administrador</title>
  <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('template/assets/css/lineicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('template/assets/css/materialdesignicons.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('template/assets/css/main.css') }}" />
</head>
<body>
  <section class="signin-section">
    <div class="container-fluid">
      <div class="row g-0 auth-row">
        <div class="col-lg-6">
          <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
              <div class="title text-center">
                {{-- <h1 class="text-primary mb-10">Edugestion</h1> --}}
                <h1 class="title text-center">
                  <img src="{{ asset('img/icono.svg') }}" width="30" height="30" class="me-2" alt="">
                  <strong>Feedback Duck</strong>
                </h1>

                <h1 class="fw-light duck mb-3">
                  📢 HACE CUACK!!
                  <img src="{{ asset('img/icono.svg') }}" width="30" height="30" alt="">

                </h1>
                <p class="lead text-muted mb-3">
                  Envía tu feedback de forma rápida y sencilla, nos importa tu comentario,
                  lo leeremos con mucho gusto
                </p>
                <img src="{{ asset('img/patobailando.gif') }}" width="200" alt="">
                <p class="lead text-muted my-3">
                  Porque tu opinión también vale y hace <strong>CUAK!</strong>
                </p>
              </div>
              <div class="shape-image">
                <img src="{{ asset('template/assets/images/auth/shape.svg') }}" alt="" />
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="signin-wrapper">
            <div class="form-wrapper">
              <h6 class="mb-15">Bienvenidos</h6>

              <p class="text-sm mb-25">
                {{-- Bienvenidos a  --}}
              </p>
              <form action="{{ route('auth.login') }}" method="POST">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="input-style-1">
                      <label>Correo Electrónico</label>
                      <input type="email" name="cname" value="{{ $u }}" placeholder="" required/>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="input-style-1">
                      <label>Contraseña</label>
                      <input type="password" name="cpass" value="{{ $p }}" placeholder="" required/>
                    </div>
                  </div>
                  {{-- <div class="col-xxl-6 col-lg-12 col-md-6">
                    <div class="form-check checkbox-style mb-30">
                      <input class="form-check-input" type="checkbox" value="" id="checkbox-remember" />
                      <label class="form-check-label" for="checkbox-remember">
                        Remember me next time</label>
                    </div>
                  </div> --}}
                  <div class="col-12">
                    <div class="text-start mb-30">

                      @if (session('danger'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        {{ session('danger') }}
                      </div>
                      @endif

                    </div>
                  </div>
                  <div class="col-12">
                    <div class="button-group d-flex justify-content-center flex-wrap">
                      <button class="main-btn primary-btn btn-hover w-100 text-center">
                        Iniciar sesión
                      </button>
                    </div>
                    {{-- @if ($sistema->googleEnabled()) --}}
                    <hr>

                    <script>
                      var alertList = document.querySelectorAll('.alert');
                      alertList.forEach(function (alert) {
                        new bootstrap.Alert(alert)
                      })
                    </script>

                    <div class="social-auth-links text-center mb-3">
                      <a href="{{ url('auth/google') }}" class="btn btn-block btn-light btn-lg">
                        <span aria-hidden="true" class="NA_Img dkWypw"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M20.64 12.2c0-.63-.06-1.25-.16-1.84H12v3.49h4.84a4.14 4.14 0 0 1-1.8 2.71v2.26h2.92a8.78 8.78 0 0 0 2.68-6.62z" fill="#4285F4"></path><path d="M12 21a8.6 8.6 0 0 0 5.96-2.18l-2.91-2.26a5.4 5.4 0 0 1-8.09-2.85h-3v2.33A9 9 0 0 0 12 21z" fill="#34A853"></path><path d="M6.96 13.71a5.41 5.41 0 0 1 0-3.42V7.96h-3a9 9 0 0 0 0 8.08l3-2.33z" fill="#FBBC05"></path><path d="M12 6.58c1.32 0 2.5.45 3.44 1.35l2.58-2.59A9 9 0 0 0 3.96 7.95l3 2.34A5.36 5.36 0 0 1 12 6.58z" fill="#EA4335"></path></g></svg></span>
                        Inicia sesión con Google
                      </a>
                    </div>
                    {{-- @endif --}}
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>
  <script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/assets/js/main.js') }}"></script>
</body>

</html>
