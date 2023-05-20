@extends('layouts.dashboard')

@section('title', 'Editar Producto')

@section('content')

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-12 col-md-6">
                <x-form.input label="Nombre" name="name" value="{{ $product->name }}" required />
            </div>
            <div class="col-12 col-md-6">
                <x-form.input label="Referencia" name="reference" value="{{ $product->reference }}" required />
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <x-form.select label="Categoría" name="category_id" value="{{ $product->category_id }}" icon="fa-plus" required>

                </x-form.select>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 col-sm-6 col-md-4">
                <x-form.input type="number" label="Precio" name="price" value="{{ $product->price }}" required />
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <x-form.input type="number" label="Peso" name="weight" value="{{ $product->weight }}" required />
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <x-form.input type="number" label="Stock" name="stock" value="{{ $product->stock }}" required />
            </div>
        </div>
        <div class="row mt-5">
            <div class="d-flex justify-content-end">
                <a href="{{ route('products.index') }}" class="btn btn-danger mx-3"><i class="fas fa-times"></i> Cancelar</a>
                <button class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
            </div>
        </div>
    </form>

    @include('panel.products.categories_modal')

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/products.js') }}"></script>
    <script>
        Category.init();
    </script>

@endsection
