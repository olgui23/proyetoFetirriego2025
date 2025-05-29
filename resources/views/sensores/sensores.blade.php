@extends('layout')

@section('title', 'Sensores')

@section('contenido')
<section class="page-section clearfix">
    <div class="container">
        <h2 class="text-center text-success">Listado de Sensores</h2>

        <table class="table table-bordered table-striped bg-white">
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Ubicación</th>
                    <th>Unidad de Medida</th>
                    <th>Valor</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sensores as $sensor)
                <tr>
                    <td>{{ $sensor->tipo }}</td>
                    <td>{{ $sensor->ubicacion }}</td>
                    <td>{{ $sensor->unidad_medida }}</td>
                    <td>{{ $sensor->valor ?? 'N/A' }}</td>
                    <td>{{ $sensor->activo ? 'Activo' : 'Inactivo' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
