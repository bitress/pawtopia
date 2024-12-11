@extends('layouts.app')
@section('content')
<div class="container py-5">


    <div class="card">
        <div class="card-header">Manage Products
            <div class="d-flex float-end">
                <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Add New Product</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Description</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td><img src="{{ $product->product_image }}" class="w-25"></td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('product/edit', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                    <a href="#" class="btn btn-sm btn-warning" onclick="confirmDelete({{ $product->id }})">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No products available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<script>
    function confirmDelete(productId) {
        // Ask the user for confirmation before deleting
        if (confirm('Are you sure you want to delete this product?')) {
            // If confirmed, redirect to the delete route
            window.location.href = '/product/delete/' + productId;
        }
    }
</script>


@endsection
