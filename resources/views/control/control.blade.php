@extends('layout')

@section('title', 'Control del Cultivo')

@section('contenido')
<div class="container mt-5">
    <h2 class="fw-bold text-success mb-4">🌱 Control del Cultivo</h2>

    @if(session('mensaje'))
        <div class="alert alert-success">{{ session('mensaje') }}</div>
    @endif

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-success">
                <div class="card-body text-center">
                    <h5 class="card-title">Humedad del Suelo</h5>
                    <p class="display-6">{{ $datos['humedad'] }}%</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-primary">
                <div class="card-body text-center">
                    <h5 class="card-title">pH del Suelo</h5>
                    <p class="display-6">{{ $datos['ph'] }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-warning">
                <div class="card-body text-center">
                    <h5 class="card-title">Temperatura Ambiente</h5>
                    <p class="display-6">{{ $datos['temperatura'] }} °C</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 text-center">
        <p class="fs-5">Estado del riego automático: <strong>{{ $datos['estadoRiego'] }}</strong></p>
        <form action="{{ route('control.activar') }}" method="POST">
            @csrf
            <button class="btn btn-outline-success btn-lg">Activar Riego Automático</button>
        </form>
    </div>
</div>
@endsection
