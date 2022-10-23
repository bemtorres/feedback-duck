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
    <div class="navbar navbar-dark shadow-sm">
      <div class="container">
        <a href="{{ route('main.sala',$s->url) }}" href="btn btn-primary">
          VOLVER
        </a>
        <a href="#" class="navbar-brand d-flex align-items-center">
          <img src="{{ asset('img/icono.svg') }}" width="30" height="30" class="me-2" alt="">
          <div class="fa fa-home"></div>
          <strong>Feedback Duck</strong>
        </a>
      </div>
    </div>
  </header>
  <main>
    <section class="pt-1 text-center container">
      <div class="row py-lg-5 py-3">
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
        <div class="px-5 pt-3">
          <h4 class="mb-3">Resultado de feedbacks
            <span class="badge bg-primary rounded-pill">
              {{ $m->feedbacks->count() }}
            </span>
          </h4>
          <ul class="list-group">
            @foreach ($m->feedbacks as $f)
              <li class="list-group-item d-flex justify-content-between align-items-center ">
                {{ $f->comentario }}
                {{-- <span class="badge bg-primary rounded-pill">14</span> --}}
              </li>
            @endforeach
          </ul>
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


  <script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/assets/js/main.js') }}"></script>
</body>
</html>
