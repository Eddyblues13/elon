@include('layouts.header')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">{{ $house->name }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- content-wraper start -->
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1">
                        <div class="lg-image">
                            <a class="popup-img venobox vbox-item" href="{{ asset($house->image) }}"
                                data-gall="myGallery">
                                <img src="{{ asset($house->image) }}" alt="{{ $house->name }}">
                            </a>
                        </div>
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2>{{ $house->category->name ?? 'N/A' }}</h2>
                        <span class="product-details-ref">Category: {{ $house->name }}</span>
                        <div class="rating-box pt-20">
                            <ul class="rating rating-with-review-item">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                            </ul>
                        </div>
                        <div class="price-box pt-20">
                            <span class="new-price new-price-2">${{ number_format($house->price, 2) }}</span>
                        </div>
                        <div class="product-desc">
                            <p>
                                <span>
                                    {{ $house->description }}
                                </span>
                            </p>

                        </div>
                        <div class="single-add-to-cart">
                            <form action="#" class="cart-quantity">
                                <div class="quantity">
                                    <label>Quantity</label>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text">
                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>

                                <a href="javascript:void(0);" class="add-to-cart"
                                    onclick="addToCart({{ $house->id }})">Add to
                                    cart</a>
                            </form>
                        </div>
                        <div class="product-additional-info pt-25">
                            <div class="product-social-sharing pt-25">
                                <ul>
                                    <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                    <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                    <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a>
                                    </li>
                                    <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="block-reassurance">
                            <ul>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-check-square-o"></i>
                                        </div>
                                        <p>Security policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-truck"></i>
                                        </div>
                                        <p>Delivery policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="reassurance-item">
                                        <div class="reassurance-icon">
                                            <i class="fa fa-exchange"></i>
                                        </div>
                                        <p> Return policy (edit with Customer reassurance module)</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wraper end -->

<!-- Begin Product Area -->
<!-- Begin Product Area -->
<div class="product-area pt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a></li>
                        <li><a data-toggle="tab" href="#product-details"><span>Product Details</span></a></li>
                        <li><a data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="description" class="tab-pane active show" role="tabpanel">
                <div class="product-description">
                    <span>{{ $house->description }}</span>
                </div>
            </div>
            <div id="product-details" class="tab-pane" role="tabpanel">
                <div class="product-details-manufacturer">
                    <p><strong>Category:</strong> {{ $house->category->name ?? 'N/A' }}</p>
                    <p><strong>Brand:</strong> {{ $house->brand }}</p>
                    <p><strong>Year:</strong> {{ $house->year }}</p>
                    <p><strong>Model:</strong> {{ $house->model }}</p>
                </div>
            </div>
            <div id="reviews" class="tab-pane" role="tabpanel">
                <div class="product-reviews">
                    <div class="product-details-comment-block">
                        <div class="comment-review">
                            <span>Grade</span>
                            <ul class="rating">
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                                <li class="no-star"><i class="fa fa-star-o"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->

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