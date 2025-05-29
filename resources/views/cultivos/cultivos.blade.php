@extends('layout')

@section('title', 'Cultivos')

@section('contenido')
<section class="page-section clearfix">
    <div class="container">
        <h2 class="text-center text-success">Listado de Cultivos</h2>

        <table class="table table-bordered table-striped bg-white">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Variedad</th>
                    <th>Fecha de Siembra</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cultivos as $cultivo)
                <tr>
                    <td>{{ $cultivo->nombre }}</td>
                    <td>{{ $cultivo->variedad }}</td>
                    <td>{{ $cultivo->fecha_siembra }}</td>
                    <td>{{ $cultivo->estado ? 'Activo' : 'Inactivo' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
