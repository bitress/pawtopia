@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Add New Customer</h2>

        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif


                <form action="{{ route('customer.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Customer Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Address</label>
                        <textarea id="description" name="address" class="form-control" required>{{ old('address') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="product_image">Customer Image URL</label>
                        <input type="text" id="customer_image" name="customer_image" class="form-control" value="{{ old('customer_image') }}">
                        <small class="form-text text-muted">Enter the full URL for the product image (e.g., https://example.com/images/product.jpg).</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Customer</button>
                </form>
            </div>
        </div>

    </div>
@endsection
