@extends('layouts.app')

@section('maincontent')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>@yield('title')</div>

                            <div class="menu">
                                <a href="{{ route('home') }}" class="btn btn-sm {{ Request::is('/') ? 'btn-dark' : 'btn-outline-dark' }}"><i class="fas fa-home"></i> Inicio</a>
                                <a href="{{ route('products.index') }}" class="btn btn-sm {{ Request::is('products*') ? 'btn-dark' : 'btn-outline-dark' }}"><i class="fas fa-list"></i> Productos</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        @if(session()->has('success'))
                            <div class="alert alert-success alert-message" role="alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if(session()->has('error'))
                            <div class="alert alert-danger alert-message" role="alert">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
