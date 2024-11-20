@include('layouts.header')
<!-- Header Area End Here -->
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Shopping Cart Area Strat-->
<div class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(count($cart) > 0)
                <form action="{{ route('shop.cart.update') }}" method="POST">
                    @csrf
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Remove</th>
                                    <th class="li-product-thumbnail">Images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $item)
                                <tr>
                                    <td class="li-product-remove">
                                        <button class="btn btn-danger btn-sm"
                                            onclick="removeFromCart({{ $loop->index }}, '{{ $item['id'] }}')">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                    <td class="li-product-thumbnail">
                                        <a href="#"><img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}"
                                                class="img-fluid" width="50"></a>
                                    </td>
                                    <td class="li-product-name"><a href="#">{{ $item['name'] }}</a></td>
                                    <td class="li-product-price"><span class="amount">${{ number_format($item['price'],
                                            2) }}</span></td>
                                    <td class="li-product-quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" name="quantity[]"
                                                value="{{ $item['quantity'] }}" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">${{ number_format($item['price'] * $item['quantity'], 2)
                                            }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code"
                                        placeholder="Coupon code" type="text">
                                    <button class="btn btn-primary" name="apply_coupon">Apply coupon</button>
                                </div>
                                <div class="coupon2">
                                    <button class="btn btn-secondary" name="update_cart">Update cart</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart Totals</h2>
                                <ul>
                                    <li>Subtotal <span>${{ number_format($cartTotal, 2) }}</span></li>
                                    <li>Total <span>${{ number_format($cartTotal, 2) }}</span></li>
                                </ul>
                                <a href="{{ route('shop.checkout.index') }}" class="btn btn-success">Proceed to
                                    checkout</a>
                            </div>
                        </div>
                    </div>
                </form>
                @else
                <p>Your cart is empty.</p>
                @endif
            </div>
        </div>
    </div>
</div>
<!--Shopping Cart Area End-->


<script>
    function addToCart(itemId, itemType) {
        $.ajax({
            url: '{{ route('shop.cart.add') }}', // Update route name to a generic one if needed
            method: 'POST',
            data: {
                id: itemId,
                type: itemType,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'success') {
                    toastr.success(response.message);

                    // Update cart item count and total dynamically
                    $('.cart-item-count').text(response.cartItemCount);
                    $('.cart-total-amount').text('$' + response.cartTotal.toFixed(2));
                } else {
                    toastr.warning(response.message || 'Something went wrong');
                }
            },
            error: function(xhr) {
                let errorMessage = 'Error adding item to cart';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                toastr.error(errorMessage);
            }
        });
    }

    function removeFromCart(cartKey, itemType) {
    $.ajax({
        url: '{{ route('shop.cart.remove') }}',
        method: 'POST',
        data: {
            key: cartKey, // Pass the unique cart key (e.g., "car_1", "bike_2")
            type: itemType, // Pass the item type to ensure the correct model is used
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.status === 'success') {
                // Remove the product item from the UI
                $(`[data-cart-key="${cartKey}"]`).remove();

                // Update the cart item count and total dynamically
                $('.cart-item-count').text(response.cartItemCount);
                $('.cart-total-amount').text('$' + response.cartTotal.toFixed(2));

                // Show success notification
                toastr.success(response.message);
            } else {
                // Show warning notification
                toastr.warning(response.message || 'Something went wrong');
            }
        },
        error: function(xhr) {
            let errorMessage = 'Error removing item from cart';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                errorMessage = xhr.responseJSON.message;
            }
            // Show error notification
            toastr.error(errorMessage);
        }
    });
}

</script>



@include('layouts.footer')