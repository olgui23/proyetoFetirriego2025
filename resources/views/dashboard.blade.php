@extends('layout')

@section('title', 'Inicio - Fertirriego')

@section('contenido')
<!-- Services Section - Adaptado para tu aplicación -->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nuestro Sistema</h2>
                <h3 class="section-subheading text-muted">Características principales del sistema de fertirrigación</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-leaf fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Monitoreo de Cultivos</h4>
                    <p class="text-muted">Seguimiento en tiempo real del crecimiento y salud de tus cultivos de lechuga.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-tint fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Control de Riego</h4>
                    <p class="text-muted">Sistema automatizado de riego con ajuste preciso de nutrientes y frecuencia.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-chart-line fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Reportes Detallados</h4>
                    <p class="text-muted">Generación de informes y análisis para optimizar tu producción.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid - Ejemplo con tus cultivos -->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nuestros Cultivos</h2>
                <h3 class="section-subheading text-muted">Variedades de lechuga en producción</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('startbootstrap-agency-gh-pages/assets/img/portfolio/1.jpg') }}" alt="Lechuga Romana" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Romana</div>
                            <div class="portfolio-caption-subheading text-muted">Variedad tradicional</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('startbootstrap-agency-gh-pages/assets/img/portfolio/2.jpg') }}" alt="Lechuga Iceberg" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Iceberg</div>
                            <div class="portfolio-caption-subheading text-muted">Variedad crujiente</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('startbootstrap-agency-gh-pages/assets/img/portfolio/3.jpg') }}" alt="Lechuga Butterhead" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Butterhead</div>
                            <div class="portfolio-caption-subheading text-muted">Variedad mantecosa</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section - Historia del proyecto -->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nuestra Historia</h2>
                <h3 class="section-subheading text-muted">El camino de nuestro proyecto de fertirrigación.</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image">
                        <img class="rounded-circle img-fluid" src="{{ asset('startbootstrap-agency-gh-pages/assets/img/about/1.jpg') }}" alt="Inicio del proyecto" />
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>2020-2021</h4>
                            <h4 class="subheading">Nuestros inicios</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Comienzo del proyecto de investigación para optimizar el cultivo de lechuga en Tiquipaya mediante fertirrigación controlada.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <img class="rounded-circle img-fluid" src="{{ asset('startbootstrap-agency-gh-pages/assets/img/about/2.jpg') }}" alt="Primera cosecha" />
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Marzo 2022</h4>
                            <h4 class="subheading">Primera cosecha exitosa</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Implementación del primer prototipo del sistema con resultados prometedores en calidad y rendimiento.</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image">
                        <img class="rounded-circle img-fluid" src="{{ asset('startbootstrap-agency-gh-pages/assets/img/about/3.jpg') }}" alt="Expansión" />
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Diciembre 2022</h4>
                            <h4 class="subheading">Expansión del sistema</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Ampliación de la superficie cultivada e integración de sensores IoT para monitoreo avanzado.</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <img class="rounded-circle img-fluid" src="{{ asset('startbootstrap-agency-gh-pages/assets/img/about/4.jpg') }}" alt="Sistema actual" />
                    </div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>2023-Presente</h4>
                            <h4 class="subheading">Sistema completo</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Implementación del sistema completo con control automatizado, reportes y gestión integral.</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>


    <!-- Portfolio Modals -->
    @include('partials/portfolio_modals') 


@endsection
