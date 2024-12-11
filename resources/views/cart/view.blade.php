
<div class="container mt-5">
    <h2>Your Shopping Cart</h2>

    <div id="cart-items" class="mt-4">
    </div>

    <div id="cart-total" class="mt-3">
        <h4>Total: $<span id="total-amount">0.00</span></h4>
    </div>
</div>




<script>
    $(document).ready(function() {
        // Set up CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Function to load cart items
        function loadCart() {
            const customerId = '{{ $customer_id }}'; // Assuming you pass customer_id to the view
            $.get(`/cart/view/${customerId}`, function(response) {
                let cartHtml = '';
                let total = 0;

                if (response.data.length === 0) {
                    cartHtml = '<p>Your cart is empty</p>';
                } else {
                    response.data.forEach(item => {
                        cartHtml += `
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="card-title">${item.product.name}</h5>
                                                <p class="card-text">Price: $${item.product.price}</p>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <button class="btn btn-outline-secondary update-quantity"
                                                            data-product-id="${item.product_id}"
                                                            data-action="decrease">-</button>
                                                    <input type="text" class="form-control text-center"
                                                           value="${item.quantity}" readonly>
                                                    <button class="btn btn-outline-secondary update-quantity"
                                                            data-product-id="${item.product_id}"
                                                            data-action="increase">+</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger remove-item"
                                                        data-product-id="${item.product_id}">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        total += item.product.price * item.quantity;
                    });
                }

                $('#cart-items').html(cartHtml);
                $('#total-amount').text(total.toFixed(2));
            });
        }

        // Load cart on page load
        loadCart();

        // Add to cart
        $(document).on('click', '.add-to-cart', function() {
            const productId = $(this).data('product-id');
            const customerId = '{{ $customer_id }}';

            $.post('/cart/add', {
                product_id: productId,
                customer_id: customerId,
                quantity: 1
            }, function(response) {
                loadCart();
            });
        });

        // Remove from cart
        $(document).on('click', '.remove-item', function() {
            const productId = $(this).data('product-id');
            const customerId = '{{ $customer_id }}';

            $.post('/cart/remove', {
                product_id: productId,
                customer_id: customerId
            }, function(response) {
                loadCart();
            });
        });

        // Update quantity
        $(document).on('click', '.update-quantity', function() {
            const productId = $(this).data('product-id');
            const action = $(this).data('action');
            const customerId = '{{ $customer_id }}';
            const currentQuantity = $(this).siblings('input').val();
            // Update quantity (continued)
            let newQuantity = action === 'increase' ?
                parseInt(currentQuantity) + 1 :
                Math.max(1, parseInt(currentQuantity) - 1);

            $.post('/cart/add', {
                product_id: productId,
                customer_id: customerId,
                quantity: newQuantity
            }, function(response) {
                loadCart();
            });
        });
    });
</script>
