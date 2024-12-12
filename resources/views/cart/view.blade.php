@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h2>Add Product to Customer Cart</h2>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="customer_id">Customer</label>
                                <select name="customer_id" id="customer_id" class="form-control" required>
                                    <option value="">Select Customer</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="product_id">Product</label>
                                <select name="product_id" id="product_id" class="form-control" required>
                                    <option value="">Select Product</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }} - ₱{{ $product->price }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="quantity">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required min="1" value="1">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h2>Shopping Cart</h2>

                        @if($carts->count() > 0)
                            <table class="table table-striped mt-3">
                                <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $cart)
                                    <tr>
                                        <td>{{ $cart->customer->name }}</td>
                                        <td>{{ $cart->product->name }}</td>
                                        <td>₱{{ $cart->product->price }}</td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>₱{{ $cart->product->price * $cart->quantity }}</td>
                                        <td>
                                            <form action="{{ route('cart.remove', $cart) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No items in the cart.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
