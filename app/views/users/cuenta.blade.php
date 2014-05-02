@extends('layouts.master')

@section('title')
    Estado de mi cuenta
@stop

@section('contenido')
    <section class="container">
        <h1>Mi cuenta</h1>
        <ul class="list-group">
            <li class="list-group-item">
                Cédula: {{ Auth::user()->id }}
            </li>
            <li class="list-group-item">
                Nombre: {{ Auth::user()->nombre }}
            </li>
            <li class="list-group-item">
                Fecha de corte: {{ FechaCorte::first()->fecha }}
            </li>
        </ul>

        <h2>Estado</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Concepto</th>
                    <th class="derecha">Vencido</th>
                    <th class="derecha">No vencido</th>
                </tr>
            </thead>
            <tbody>
                @foreach(Auth::user()->estados as $estado)
                <tr>
                    <td>{{ $estado->nombreconcepto->nombre }}</td>
                    <td class="derecha">{{ is_numeric($estado->vencido) ? number_format($estado->vencido, 0, ',', '.') : 0 }}</td>
                    <td class="derecha">{{ is_numeric($estado->novencido) ? number_format($estado->novencido, 0, ',', '.') : 0 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Pagos</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Forma de pago</th>
                    <th class="derecha">Seguro</th>
                    <th class="derecha">Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach(Auth::user()->pagos as $pago)
                <tr>
                    <td>{{ $pago->fecha_pago }}</td>
                    <td>{{ $pago->formaPago->nombre }}</td>
                    <td class="derecha">{{ is_numeric($pago->seguro) ? number_format($pago->seguro, 0, ',', '.') : 0 }}</td>
                    <td class="derecha">{{ is_numeric($pago->valor) ? number_format($pago->valor, 0, ',', '.') : 0 }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@stop