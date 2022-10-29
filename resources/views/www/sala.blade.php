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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="/" class="navbar-brand d-flex align-items-center">
          <img src="{{ asset('img/icono.svg') }}" width="30" height="30" class="me-2" alt="">
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
          <p>
            {{ $s->descripcion }}
          </p>
        </div>
      </div>
    </section>

    <div class="album pt-2 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach ($s->muros as $m)
            @continue(!$m->getConfigActive())
            <div class="col">
              <div class="card shadow-sm">
                {{-- <svg  xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: IMG TEST" preserveAspectRatio="xMidYMid slice" focusable="false"><title>TEST</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}

                <img class="bd-placeholder-img card-img-top" src="{{ asset($m->getImage()) }}" width="100%" height="225"alt="">

                <div class="card-body">
                  <h4 class="card-title text-center mb-3">
                    {{ $m->titulo }}
                  </h4>
                  <p class="card-text mb-3">
                    {{ $m->descripcion }}
                  </p>
                  <div class="d-flex justify-content-center align-items-center">
                    <div class="btn-group">
                      <a href="{{ route('main.sala.muro', [$s->url, $m->id]) }}" id="btn-go-to-muro-{{ $m->id }}" class="btn btn-sm btn-primary">
                        <strong>CUACK!</strong>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  @include('layouts._toast')

</body>
</html>
