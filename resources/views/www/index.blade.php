<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="/img/icono.svg" type="image/x-icon" />
  <title>Tu opinión también vale y hace cuack! - FEEDBACK DUCK</title>
  <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('template/assets/css/main.css') }}" />
  <script src="https://kit.fontawesome.com/843e61752f.js" crossorigin="anonymous"></script>


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


  <script src="https://code.createjs.com/1.0.0/soundjs.min.js"></script>

  <script>

    function playSound () {
      createjs.Sound.play('/img/cuak.mp3');
    }
  </script>
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
        <a href="#" class="navbar-brand d-flex align-items-center">
          <img src="{{ asset('img/icono.svg') }}" width="30" height="30" class="me-2" alt="">
          <strong>Feedback Duck</strong>
        </a>
        <a href="/login" class="btn bg-dark ">
          <i class="fa-solid fa-user text-white"></i>
        </a>

      </div>
    </div>
  </header>

  <main>

    <section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light duck mb-3">
            📢 HACE CUACK!!
            <img src="{{ asset('img/icono.svg') }}" width="30" height="30" alt="">
          </h1>
          <p class="lead text-muted mb-3">
            Envía tu feedback de forma rápida y sencilla, nos importa tu comentario,
            lo leeremos con mucho gusto
          </p>
          <img src="{{ asset('img/patobailando.gif') }}" width="100" alt="">
          <p class="lead text-muted my-3">
            Porque tu opinión también vale y hace <strong>CUACK!</strong>
          </p>
          <p>
            <button onclick="playSound();" id="btn-play-sound" class="btn btn-primary my-2">CUACK CUACK!</button>
            <button type="button" class="btn btn-warning" id="btn-kenay" data-bs-toggle="modal" data-bs-target="#exampleModal">
              KENAY
            </button>
          </p>
        </div>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach ($salas as $s)
            @continue(!$s->getConfigActive())
            <div class="col">
              <div class="card shadow-sm">
                <img class="bd-placeholder-img card-img-top" src="{{ $s->getImage() }}" width="100%" height="225"alt="">

                <div class="card-body">
                  <h4 class="card-title text-center mb-3">
                    {{ $s->nombre }}
                  </h4>
                  <div class="d-flex justify-content-center align-items-center">
                    <div class="btn-group">
                      <a href="{{ route('main.sala',$s->url) }}" id="btn-go-to-sala-{{ $s->id }}" class="btn btn-sm btn-primary">
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


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">KENAY</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="{{ asset('img/kenay.jpg') }}" class="img-fluid" alt="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CUACK! CUACK!</button>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/assets/js/main.js') }}"></script>

</body>
</html>
