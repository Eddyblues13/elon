@include('layouts.header')
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Shop 4 Column</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Banner Area -->
                <div class="single-banner shop-page-banner">
                    <a href="#">
                        <img src="{{asset('images/bg-banner/2.png') }}" alt="Li's Static Banner">
                    </a>
                </div>
                <!-- Li's Banner Area End Here -->
                <!-- shop-top-bar start -->
                <div class="shop-top-bar mt-30">
                    <div class="shop-bar-inner">
                        <div class="product-view-mode">
                            <ul class="nav shop-item-filter-list" role="tablist">
                                <li class="active" role="presentation"><a aria-selected="true" class="active show"
                                        data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i
                                            class="fa fa-th"></i></a></li>
                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view"
                                        href="#list-view"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                        </div>
                        <div class="toolbar-amount">
                            <span>Showing {{ $houses->firstItem() }} to {{ $houses->lastItem() }} of {{ $houses->total()
                                }}
                                cars</span>
                        </div>
                    </div>

                    <div class="product-select-box">
                        <div class="product-short">
                            <p>Sort By:</p>
                            <form method="GET" action="{{ route('shop.houses.houses') }}">
                                <select name="sort" class="nice-select" onchange="this.form.submit()">
                                    <option value="relevance" {{ $sort==='relevance' ? 'selected' : '' }}>Relevance
                                    </option>
                                    <option value="name_asc" {{ $sort==='name_asc' ? 'selected' : '' }}>Name (A - Z)
                                    </option>
                                    <option value="name_desc" {{ $sort==='name_desc' ? 'selected' : '' }}>Name (Z - A)
                                    </option>
                                    <option value="price_asc" {{ $sort==='price_asc' ? 'selected' : '' }}>Price (Low
                                        &gt; High)</option>
                                    <option value="price_desc" {{ $sort==='price_desc' ? 'selected' : '' }}>Price (High
                                        &gt; Low)</option>
                                    <option value="model_asc" {{ $sort==='model_asc' ? 'selected' : '' }}>Model (A - Z)
                                    </option>
                                    <option value="model_desc" {{ $sort==='model_desc' ? 'selected' : '' }}>Model (Z -
                                        A)</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="car-list mt-4">
                    <div class="row">
                        @foreach ($houses as $house)
                        <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{route('shop.cars.show', $house->id) }}">
                                        <img src="{{ asset($house->image) }}" alt="{{ $house->name }}">
                                    </a>
                                    <span class="sticker">New</span>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="{{ route('shop.cars.show', $house->id) }}">{{ $house->name
                                                    }}</a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="{{ route('shop.cars.show', $house->id) }}">{{
                                                $house->description
                                                }}</a></h4>
                                        <div class="price-box">
                                            <p>Model: {{ $house->model }} | Year: {{ $house->year }}</p>
                                            <span class="new-price">${{ number_format($house->price, 2) }}</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active">
                                                <a href="javascript:void(0);"
                                                    onclick="addToCart({{ $house->id }}, 'car')">Add to cart</a>
                                            </li>
                                            <li><a href="#" title="quick view" class="quick-view-btn"
                                                    data-toggle="modal" data-target="#exampleModalCenter"><i
                                                        class="fa fa-eye"></i></a></li>
                                            <li><a class="links-details" href="wishlist.html"><i
                                                        class="fa fa-heart-o"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-wrap end -->
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="pagination mt-4">
                    {{ $houses->appends(request()->query())->links() }}
                </div>
                <!-- shop-top-bar end -->

            </div>
        </div>
    </div>
</div>
<!-- Content Wraper Area End Here -->


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

{{-- <script>
    function addToCart(carId) {
    $.ajax({
        url: '{{ route('shop.cart.add') }}',
        method: 'POST',
        data: {
            car_id: carId,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.status === 'success') {
                alert(response.message);
                // Update cart item count and total
                $('.cart-item-count').text(response.cartItemCount);
                $('.cart-total-amount').text('$' + response.cartTotal.toFixed(2));
            }
        },
        error: function(xhr) {
            alert('Error adding car to cart');
        }
    });
}


function removeFromCart(index, productId) {
    $.ajax({
        url: '{{ route('cars.cart.remove') }}',
        method: 'POST',
        data: {
            product_id: productId,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.status === 'success') {
                // Remove the product item from the UI
                $('li').eq(index).remove();

                // Update the cart item count and total
                $('.cart-item-count').text(response.cartItemCount);
                $('.cart-total-amount').text('$' + response.cartTotal.toFixed(2));

                alert(response.message);
            }
        },
        error: function(xhr) {
            alert('Error removing product from cart');
        }
    });
}





</script> --}}


@include('layouts.footer')