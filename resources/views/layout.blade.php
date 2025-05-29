<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fertirriego')</title>

    <!-- Ícono -->
    <link rel="icon" href="{{ asset('startbootstrap-business-casual-gh-pages/favicon.ico') }}" type="image/x-icon">

    <!-- Fuentes Google -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />

    <!-- CSS del template -->
    <link href="{{ asset('startbootstrap-business-casual-gh-pages/css/styles.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Header -->
    <header>
        <h1 class="site-heading text-center text-faded d-none d-lg-block">
            <span class="site-heading-upper text-success mb-3">Sistema de Fertirrigación</span>
            <span class="site-heading-lower">Cultivo de Lechuga en Tiquipaya</span>
        </h1>
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="{{ route('dashboard') }}">Fertirriego</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('cultivos') }}">Cultivos</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('sensores') }}">Sensores</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('riego') }}">Riego</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('configuracion') }}">Configuración</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('reportes') }}">Reportes</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('usuarios') }}">Usuarios</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido dinámico -->
    <main>
        @yield('contenido')
    </main>

    <!-- Footer -->
    <footer class="footer text-faded text-center py-5">
        <div class="container">
            <p class="m-0 small">&copy; Fertirriego Tiquipaya {{ date('Y') }}</p>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('startbootstrap-business-casual-gh-pages/js/scripts.js') }}"></script>
</body>
</html>
