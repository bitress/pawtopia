@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Manage Customers</h3>
                <a href="{{ route('customer.create') }}" class="btn btn-primary">Add New Customer</a>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Address</th>
                            <th scope="col">Customer Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->address }}</td>
                                <td><img src="{{ $customer->image }}" class="img-fluid w-25"></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $customer->id }})">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No customers available.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(customerId) {
            if (confirm('Are you sure you want to delete this customer?')) {
                window.location.href = '/customer/delete/' + customerId;
            }
        }
    </script>
@endsection
