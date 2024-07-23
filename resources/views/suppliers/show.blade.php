@extends('layouts.app')

@section('content')
    <h1>Supplier Details</h1>
    <p><strong>Name:</strong> {{ $supplier->name }}</p>
    <p><strong>Contact Number:</strong> {{ $supplier->contact_number }}</p>
    <p><strong>Address:</strong> {{ $supplier->address }}</p>
    <a href="{{ route('suppliers.edit', $supplier) }}">Edit</a>
    <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('suppliers.index') }}">Back to List</a>
@endsection
