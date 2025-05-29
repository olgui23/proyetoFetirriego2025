@extends('layout')

@section('title', 'Reportes')

@section('contenido')
<section class="page-section clearfix">
    <div class="container">
        <h2 class="text-center text-success">Reportes Generados</h2>
        <table class="table table-bordered bg-white">
            <thead><tr><th>Título</th><th>Descripción</th><th>Fecha</th></tr></thead>
            <tbody>
                @foreach($reportes as $r)
                <tr>
                    <td>{{ $r->titulo }}</td>
                    <td>{{ $r->descripcion }}</td>
                    <td>{{ $r->fecha }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
