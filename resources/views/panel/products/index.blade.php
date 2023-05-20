@extends('layouts.dashboard')

@section('title', 'Productos')

@section('content')

    <a href="{{ route('products.create') }}" class="btn btn-success mb-2"><i class="fa fa-plus"></i> Nuevo</a>
    <div id="datatables"></div>

@endsection


@section('scripts')

    <script src="{{ asset('assets/js/products.js') }}"></script>
    <script>
        Product.datatable();
    </script>
@endsection
