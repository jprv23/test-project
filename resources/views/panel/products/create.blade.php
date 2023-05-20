@extends('layouts.dashboard')

@section('title', 'Nuevo Producto')

@section('content')

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <x-form.input label="Nombre" name="name" required />
            </div>
            <div class="col-12 col-md-6">
                <x-form.input label="Referencia" name="reference" required />
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <x-form.select label="Categoría" name="category_id" icon="fa-plus" required>

                </x-form.select>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 col-sm-6 col-md-4">
                <x-form.input type="number" label="Precio" name="price" required />
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <x-form.input type="number" label="Peso" name="weight" required />
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <x-form.input type="number" label="Stock" name="stock" required />
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
