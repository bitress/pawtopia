@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Your Shopping Cart</h2>

    <div id="cart-items" class="mt-4">
    </div>

    <div id="cart-total" class="mt-3">
        <h4>Total: $<span id="total-amount">0.00</span></h4>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Function to load cart items
        function loadCart() {
            $.get('/cart/all', function(response) {
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

        loadCart();
    });
</script>
@endsection