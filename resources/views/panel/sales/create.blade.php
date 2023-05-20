@extends('layouts.dashboard')

@section('title', 'Nueva Venta de Producto')

@section('content')

    <form action="{{ route('sales.store', $product->id) }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-10">
                        <x-form.input label="Producto" value="{{ $product->name }}" disabled />
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-md-5">
                        <x-form.input label="Stock Disponible" value="{{ $product->stock }}" disabled />
                    </div>
                    <div class="col-12 col-md-5">
                        <x-form.input type="number" label="Cantidad" name="quantity" required />
                    </div>
                </div>
            </div>

            <div class="col-md-4">

                <a href="{{ route('products.index') }}" class="btn btn-danger d-block w-100 mt-4"><i class="fas fa-times"></i>
                    Cancelar</a>
                <button class="btn btn-success d-block w-100 mt-3"><i class="fas fa-save"></i> Guardar</button>

            </div>
        </div>
    </form>



@endsection
