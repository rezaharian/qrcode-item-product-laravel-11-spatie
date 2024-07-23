@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>{{ __('You are logged in!') }}</p>
                        <p>This is your application dashboard.</p>

                        <div class="row">
                            @canany(['create-role', 'edit-role', 'delete-role'])
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body text-center">
                                            <a class="btn btn-primary w-100" href="{{ route('roles.index') }}">
                                                <i class="bi bi-person-fill-gear"></i>
                                                <p class="mt-2 mb-0">Manage Roles</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endcanany
                            @canany(['create-user', 'edit-user', 'delete-user'])
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body text-center">
                                            <a class="btn btn-success w-100" href="{{ route('users.index') }}">
                                                <i class="bi bi-people"></i>
                                                <p class="mt-2 mb-0">Manage Users</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endcanany
                            @canany(['create-product', 'edit-product', 'delete-product'])
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body text-center">
                                            <a class="btn btn-warning w-100" href="{{ route('products.index') }}">
                                                <i class="bi bi-bag"></i>
                                                <p class="mt-2 mb-0">Manage Products</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endcanany
                            @can(['view-product'])
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body text-center">
                                            <a class="btn btn-warning w-100" href="{{ route('products.index') }}">
                                                <i class="bi bi-bag"></i>
                                                <p class="mt-2 mb-0">View Products</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            @canany(['create-customer', 'edit-customer', 'delete-customer'])
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body text-center">
                                            <a class="btn btn-warning w-100" href="{{ route('customers.index') }}">
                                                <i class="bi bi-people-fill"></i>
                                                <p class="mt-2 mb-0">Manage Customers</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endcanany
                            @can(['view-customer'])
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body text-center">
                                            <a class="btn btn-warning w-100" href="{{ route('customers.index') }}">
                                                <i class="bi bi-people-fill"></i>
                                                <p class="mt-2 mb-0">View Customers</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                            @canany(['create-supplier', 'edit-supplier', 'delete-supplier'])
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body text-center">
                                            <a class="btn btn-warning w-100" href="{{ route('suppliers.index') }}">
                                                <i class="bi bi-truck"></i>
                                                <p class="mt-2 mb-0">Manage Suppliers</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endcanany
                            @can(['view-supplier'])
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100 shadow-sm">
                                        <div class="card-body text-center">
                                            <a class="btn btn-warning w-100" href="{{ route('suppliers.index') }}">
                                                <i class="bi bi-truck"></i>
                                                <p class="mt-2 mb-0">View Suppliers</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
