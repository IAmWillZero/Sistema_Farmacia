@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Venta</h1>
    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="customer_name" class="form-label">Nombre del Cliente</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $sale->customer_name }}">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $sale->date }}">
        </div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" class="form-control" id="total" name="total" value="{{ $sale->total }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
