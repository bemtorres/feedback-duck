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
    @stack('javascript')
</body>
</html>
