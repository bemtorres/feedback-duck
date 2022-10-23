@php
  $u=''; $p='';
  if (App::environment(['local'])) {
    $u = 'bej.mora@profesor.duoc.cl';
    $p = 'feebacks';
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
                  <div class="col-xxl-6 col-lg-12 col-md-6">
                    <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="button-group d-flex justify-content-center flex-wrap">
                      <button class="main-btn primary-btn btn-hover w-100 text-center">
                        Iniciar sesión
                      </button>
                    </div>
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
