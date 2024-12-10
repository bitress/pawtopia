@extends('layouts.app')
@section('content')
<div class="container py-5">


    <div class="card">
        <div class="card-header">Manage Products
            <div class="d-flex float-end">
                <button class="btn btn-primary">Add Product</button>
            </div>
        </div>
        <div class="card-body">
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
                                    <button class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-sm btn-warning"><i class="fa fa-trash"></i></button>
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

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" required>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Product Description</label>
                        <textarea class="form-control" id="productDescription" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="productImage" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="productPrice" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Product Modal -->
<div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProductModalLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this product?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="deleteProductBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Edit product
    document.querySelectorAll('.btn-primary').forEach(button => {
        button.addEventListener('click', function() {
            let productRow = this.closest('tr');
            let productId = productRow.querySelector('td:first-child').innerText;
            let productName = productRow.querySelector('td:nth-child(2)').innerText;
            let productDescription = productRow.querySelector('td:nth-child(3)').innerText;
            let productPrice = productRow.querySelector('td:nth-child(5)').innerText;
            
            // Set modal data
            document.getElementById('productName').value = productName;
            document.getElementById('productDescription').value = productDescription;
            document.getElementById('productPrice').value = productPrice;
            
            // Show the modal
            new bootstrap.Modal(document.getElementById('editProductModal')).show();
        });
    });

    // Delete product
    document.querySelectorAll('.btn-warning').forEach(button => {
        button.addEventListener('click', function() {
            let productId = this.closest('tr').querySelector('td:first-child').innerText;

            // Set delete action
            document.getElementById('deleteProductBtn').addEventListener('click', function() {
                // Here you can send a delete request, for now just log the product ID
                console.log(`Product with ID ${productId} deleted.`);
                new bootstrap.Modal(document.getElementById('deleteProductModal')).hide();
            });

            // Show the delete modal
            new bootstrap.Modal(document.getElementById('deleteProductModal')).show();
        });
    });
</script>

@endsection