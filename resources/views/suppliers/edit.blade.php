@extends('layouts.app')

@section('content')
    <h1>Edit Supplier</h1>
    <form action="{{ route('suppliers.update', $supplier) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $supplier->name }}" required>
        </div>
        <div>
            <label for="contact_number">Contact Number</label>
            <input type="text" name="contact_number" id="contact_number" value="{{ $supplier->contact_number }}">
        </div>
        <div>
            <label for="address">Address</label>
            <textarea name="address" id="address">{{ $supplier->address }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
