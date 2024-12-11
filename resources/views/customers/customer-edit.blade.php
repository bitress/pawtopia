@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Edit Customer</h2>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('customer.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Product Name -->
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $customer->name) }}" required>
            </div>

            <!-- Product Description -->
            <div class="form-group">
                <label for="description">Address</label>
                <textarea id="address" name="address" class="form-control" required>{{ old('address', $customer->address) }}</textarea>
            </div>


            <!-- Product Image URL -->
            <div class="form-group">
                <label for="product_image">Product Image URL</label>
                <input type="text" id="image" name="image" class="form-control" value="{{ old('image', $customer->image) }}">
                <small class="form-text text-muted">Enter the full URL for the product image (e.g., https://example.com/images/product.jpg).</small>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Customer</button>
        </form>
    </div>
@endsection
