@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Venta</h1>
    <p><strong>ID:</strong> {{ $sale->id }}</p>
    <p><strong>Cliente:</strong> {{ $sale->customer_name }}</p>
    <p><strong>Fecha:</strong> {{ $sale->date }}</p>
    <p><strong>Total:</strong> {{ $sale->total }}</p>
    <a href="{{ route('sales.index') }}" class="btn btn-primary">Volver al listado</a>
</div>
@endsection
