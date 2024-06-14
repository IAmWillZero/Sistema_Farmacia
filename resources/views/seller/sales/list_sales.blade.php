@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Ventas</h1>
    <a href="{{ route('sales.create') }}" class="btn btn-primary mb-3">Nueva Venta</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->customer_name }}</td>
                    <td>{{ $sale->date }}</td>
                    <td>{{ $sale->total }}</td>
                    <td>
                        <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-info">Detalles</a>
                        <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
