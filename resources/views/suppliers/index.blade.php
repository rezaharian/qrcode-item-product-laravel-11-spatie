@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Suppliers</h1>
        @can('create-supplier')
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3">Add New Supplier</a>
        @endcan
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->contact_number }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>
                                @can('view-supplier')
                                    <a href="{{ route('suppliers.show', $supplier) }}" class="btn btn-info btn-sm">View</a>
                                @endcan
                                @can('edit-supplier')
                                    <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning btn-sm">Edit</a>
                                @endcan
                                @can('delete-supplier')
                                    <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
