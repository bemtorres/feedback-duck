<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="/img/icono.svg" type="image/x-icon" />
  <title>Tu opinión también vale y hace cuack! - FEEDBACK DUCK</title>
  <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('template/assets/css/lineicons.css') }}" />
  <link rel="stylesheet" href="{{ asset('template/assets/css/materialdesignicons.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('template/assets/css/main.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.1/sweetalert2.css">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .duck:hover {
  animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
  transform: translate3d(0, 0, 0);
  backface-visibility: hidden;
  perspective: 1000px;
}

@keyframes shake {
  10%, 90% {
    transform: translate3d(-1px, 0, 0);
  }

  20%, 80% {
    transform: translate3d(2px, 0, 0);
  }

  30%, 50%, 70% {
    transform: translate3d(-4px, 0, 0);
  }

  40%, 60% {
    transform: translate3d(4px, 0, 0);
  }
}


  </style>
</head>
<body>
  <header>
    {{-- <div class="collapse bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4">
            <h4 class="text-white">Desarr</h4>
            <p class="text-muted">

            </p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Contacto</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-white"></a></li>
              <li><a href="#" class="text-white">Like on Facebook</a></li>
              <li><a href="#" class="text-white">Email me</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div> --}}
    <div class="navbar navbar-dark shadow-sm">
      <div class="container">
        <a href="{{ route('main.sala',$s->url) }}" href="btn btn-primary bg-primary">
          VOLVER
        </a>
        <a href="#" class="navbar-brand d-flex align-items-center">
          <img src="{{ asset('img/icono.svg') }}" width="30" height="30" class="me-2" alt="">
          <div class="fa fa-home"></div>
          <strong>Feedback Duck</strong>
        </a>

        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> --}}
      </div>
    </div>
  </header>

  <main>

    <section class="pt-1 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light duck">
            {{ $s->nombre }}
          </h1>
          <h1 class="fw-light duck">
            {{ $m->titulo }}
          </h1>
          <p>
            {{ $m->descripcion }}
          </p>
        </div>
      </div>
    </section>

    <div class="album py-3 bg-white">
      <div class="container">
        <div class="px-5 mt-3">
          <h4 class="mb-3">Realice su feedback</h4>
          <form class="form-submit" action="{{ route('main.sala.muro.store',[$s->url, $m->id]) }}" method="POST">
            @csrf
            <hr class="my-4">
            <div class="row gy-3">
              <div class="col-md-12">
                <label for="cc-name" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="cc-name" placeholder="" required="">
              </div>

              <div class="mb-3">
                <label for="" class="form-label">Feedback</label>
                <textarea class="form-control" name="feedback" id="" rows="3" required></textarea>
              </div>
            </div>

            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit">ENVIAR</button>
          </form>
        </div>

      </div>
    </div>

  </main>

  <footer class="text-muted py-5">
    <div class="container">
      <p class="mb-1">Feedback Duck fue creado para ayudar al desarrollo del aprendizaje colaborativo!</p>
      <p class="mb-0">
        Creado por <a href="http://www.bemtorres.win">Bemtorres</a>
      </p>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/assets/js/main.js') }}"></script>
  <script src="{{ asset('custom/double-request.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.1/sweetalert2.js"></script>

  @if (session('success'))
  <script>
    Swal.fire(
      '¡Recibido!',
      'Gracias por tu feedback!',
      'success'
    );
  </script>
  @endif
  @if (session('danger'))
  <script>
    Swal.fire(
      'Error',
      'Intente nuevamente',
      'error'
    );
  </script>
  @endif
</body>
</html>
