@extends('layout')

@section('title', 'Inicio - Fertirriego')

@section('contenido')
<section class="page-section clearfix">
    <div class="container">
        <div class="intro">
            <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{ asset('startbootstrap-business-casual-gh-pages/assets/img/intro.jpg') }}" alt="lechuga" />
            <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                <h2 class="section-heading mb-4">
                    <span class="section-heading-upper">Sistema Automatizado</span>
                    <span class="section-heading-lower">Fertirriego de Lechuga</span>
                </h2>
                <p class="mb-3">Este sistema permite gestionar y monitorear el cultivo de lechuga en Tiquipaya con sensores y programación de riego.</p>
                <div class="intro-button mx-auto"><a class="btn btn-success btn-xl" href="#!">Comenzar ahora</a></div>
            </div>
        </div>
    </div>
</section>
@endsection
