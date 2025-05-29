@extends('layout')

@section('title', 'Riego')

@section('contenido')
<section class="page-section clearfix">
    <div class="container">
        <h2 class="text-center text-success">Historial de Riegos</h2>
        <table class="table table-bordered bg-white">
            <thead>
                <tr><th>Fecha y Hora</th><th>Método</th><th>Cantidad (L)</th><th>Modo</th></tr>
            </thead>
            <tbody>
                @foreach($riegos as $r)
                <tr>
                    <td>{{ $r->fecha_hora }}</td>
                    <td>{{ $r->metodo }}</td>
                    <td>{{ $r->cantidad_litros }}</td>
                    <td>{{ $r->automatico ? 'Automático' : 'Manual' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
