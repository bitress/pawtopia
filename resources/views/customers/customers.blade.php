@extends('layouts.app')
@section('content')
    <div class="container py-5">


        <div class="card">
            <div class="card-header">Manage Customers
                <div class="d-flex float-end">
                    <a href="{{ route('customer.create') }}" class="btn btn-primary mb-3">Add New Customer</a>
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
                                <td><img src="{{ $customer->image }}" class="w-25"></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('customer/edit', $customer->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="btn btn-sm btn-warning" onclick="confirmDelete({{ $customer->id }})">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No customers available.</td>
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
            // Ask the user for confirmation before deleting
            if (confirm('Are you sure you want to delete this customer?')) {
                // If confirmed, redirect to the delete route
                window.location.href = '/customer/delete/' + customerId;
            }
        }
    </script>


@endsection
