<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/img/icono.svg" type="image/x-icon" />
    <title>Administrador</title>

    <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('template/assets/css/main.css') }}" />
    <script src="https://kit.fontawesome.com/843e61752f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha512-DIW4FkYTOxjCqRt7oS9BFO+nVOwDL4bzukDyDtMO7crjUZhwpyrWBFroq+IqRe6VnJkTpRAS6nhDvf0w+wHmxg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      .header {
        padding: 10px 0;
        background: #fff;
      }
    </style>

    {{-- @vite(['resources/js/app.js', 'resources/css/app.css']) --}}
    @stack('stylesheet')
</head>
<body>
    <div id="app">
        @yield('app')
    </div>
    <script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/polyfill.js') }}"></script>
    <script src="{{ asset('template/assets/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('custom/double-request.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('layouts._toast')
    @stack('javascript')
</body>
</html>
