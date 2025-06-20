<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Sistema de Fertirrigación para cultivo de lechuga en Tiquipaya" />
    <meta name="author" content="" />
    <title>@yield('title', 'Fertirriego')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('startbootstrap-agency-gh-pages/assets/favicon.ico') }}" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('startbootstrap-agency-gh-pages/css/styles.css') }}" rel="stylesheet" />
    <!-- CSS personalizado -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top">
    <img src="{{ asset('assets/img/logo1.jpg') }}" alt="Fertirriego" />
</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cultivos') }}">Cultivos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('sensores') }}">Sensores</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('riego') }}">Riego</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('configuracion') }}">Configuración</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reportes') }}">Reportes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('usuarios') }}">Usuarios</a></li>
                
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt me-1"></i> Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

    <!-- Masthead/Header -->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Sistema de Fertirrigación</div>
            <div class="masthead-heading text-uppercase">Cultivo de Lechuga en Tiquipaya</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">Ver más</a>
        </div>
    </header>

   

    

    <!-- Contenido dinámico -->
    <main>
        @yield('contenido')
    </main>

    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Fertirriego Tiquipaya {{ date('Y') }}</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Política de Privacidad</a>
                    <a class="link-dark text-decoration-none" href="#!">Términos de Uso</a>
                </div>
            </div>
        </div>
    </footer>

   

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('startbootstrap-agency-gh-pages/js/scripts.js') }}"></script>
    <!-- SB Forms JS-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>