@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

    <h5>Bienvenido {{ auth()->user()->name }}</h5>

    <div class="row mt-4">

        <div class="col-md-4">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header text-white bg-primary">Producto con más stock</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $max_stock_product->name ?? 'Sin registros' }}</h5>
                    <p class="card-text"><b>Stock máximo:</b> {{ $max_stock_product->stock ?? 0 }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3" style="max-width: 18rem;">
                <div class="card-header text-white bg-success">Producto más vendido</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $max_sales_product->name ?? 'Sin registros'}}</h5>
                    <p class="card-text"><b>Veces vendidas: </b>{{ $max_sales_product->count ?? 0 }}</p>
                </div>
            </div>
        </div>

    </div>
@endsection
