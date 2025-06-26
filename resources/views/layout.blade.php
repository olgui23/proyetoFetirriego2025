<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Sistema de Fertirrigación para cultivo de lechuga en Tiquipaya" />
    <meta name="author" content="" />
    <title>@yield('title', 'Fertirriego')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('startbootstrap-agency-gh-pages/assets/favicon.ico') }}" />

    <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Merriweather:wght@700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Bootstrap & Theme CSS -->
    <link href="{{ asset('startbootstrap-agency-gh-pages/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
</head>
<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-white fw-bold text-uppercase fs-4" href="#page-top">
                <span style="color: #64A500;">Fertirrigación</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                Menú <i class="fas fa-bars ms-1"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#control">Control del Cultivo</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="cultivoDropdown" role="button" data-bs-toggle="dropdown">
                            Mi Cultivo
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('miCultivo.reportes') }}">Reportes</a></li>
                            <li><a class="dropdown-item" href="{{ route('miCultivo.calendario') }}">Calendario del Agricultor</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="guiaDropdown" role="button" data-bs-toggle="dropdown">
                            Tu Guía
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Tipos de lechuga</a></li>
                            <li><a class="dropdown-item" href="#">Plagas & Enfermedades</a></li>
                            <li><a class="dropdown-item" href="#">Salud vegetal</a></li>
                            <li><a class="dropdown-item" href="#">Buenas prácticas</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#">Asistente</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Administración</a></li>

                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
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

    <!-- Carrusel principal -->
    <header id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('{{ asset('images/slide1.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 bg-dark bg-opacity-50 rounded">
                    <h1 class="display-4 fw-bold text-white">Tecnología al servicio del campo</h1>
                    <p class="lead text-white">Soluciones sostenibles para agricultores de Tiquipaya</p>
                    <a class="btn btn-success btn-lg mt-3" href="#impacto">Conoce más</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('images/slide2.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 bg-dark bg-opacity-50 rounded">
                    <h1 class="display-4 fw-bold text-white">Riego automatizado</h1>
                    <p class="lead text-white">Ahorra agua, tiempo y fertilizantes</p>
                    <a class="btn btn-success btn-lg mt-3" href="#impacto">Descúbrelo</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('images/slide3.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
                <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 bg-dark bg-opacity-50 rounded">
                    <h1 class="display-4 fw-bold text-white">Agricultura con futuro</h1>
                    <p class="lead text-white">Conecta tu campo con tecnología accesible</p>
                    <a class="btn btn-success btn-lg mt-3" href="#impacto">Ver sistema</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </header>

    <!-- Contenido dinámico -->
    <main>
        @yield('contenido')
    </main>

    <!-- Footer -->
    <footer class="footer py-4 bg-dark text-white">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Fertirriego {{ date('Y') }}</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-outline-light btn-social mx-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-light text-decoration-none me-3" href="#">Política de Privacidad</a>
                    <a class="link-light text-decoration-none" href="#">Términos de Uso</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('startbootstrap-agency-gh-pages/js/scripts.js') }}"></script>
</body>
</html>
