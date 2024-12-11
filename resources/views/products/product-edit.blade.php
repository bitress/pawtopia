@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Edit Product</h2>

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

        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')  <!-- Indicates that this is a PUT request for updating the resource -->

            <!-- Product Name -->
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            <!-- Product Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Product Price -->
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}" step="0.01" required>
            </div>

            <!-- Product Image URL -->
            <div class="form-group">
                <label for="product_image">Product Image URL</label>
                <input type="text" id="product_image" name="product_image" class="form-control" value="{{ old('product_image', $product->product_image) }}">
                <small class="form-text text-muted">Enter the full URL for the product image (e.g., https://example.com/images/product.jpg).</small>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection
