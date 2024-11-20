@include('layouts.header')
<!-- Header Area End Here -->
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!--Checkout Area Strat-->
<!--Checkout Area Start-->
<div class="checkout-area pt-60 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="coupon-accordion">
                    <!--Accordion Start-->
                    <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia.</p>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text" name="email">
                                </p>
                                <p class="form-row-last">
                                    <label>Password <span class="required">*</span></label>
                                    <input type="password" name="password">
                                </p>
                                <p class="form-row">
                                    <input value="Login" type="submit">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </p>
                                <p class="lost-password"><a href="{{ route('password.request') }}">Lost your
                                        password?</a></p>
                            </form>
                        </div>
                    </div>
                    <!--Accordion End-->

                    <!--Accordion Start-->
                    <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="" method="POST">
                                @csrf
                                <p class="checkout-coupon">
                                    <input placeholder="Coupon code" type="text" name="coupon_code">
                                    <input value="Apply Coupon" type="submit">
                                </p>
                            </form>
                        </div>
                    </div>
                    <!--Accordion End-->
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Billing Details -->
            <div class="col-lg-6 col-12">
                <form action="" method="POST">
                    @csrf
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <!-- Add form fields with appropriate names and placeholders -->
                            <!-- Example for country selection -->
                            <div class="col-md-12">
                                <div class="country-select clearfix">
                                    <label>Country <span class="required">*</span></label>
                                    <select class="nice-select wide" name="country">
                                        <option data-display="Select Country">Select Country</option>
                                        <option value="bd">Bangladesh</option>
                                        <option value="uk">London</option>
                                        <option value="rou">Romania</option>
                                        <option value="fr">France</option>
                                        <option value="de">Germany</option>
                                        <option value="aus">Australia</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Add other fields like First Name, Last Name, etc. -->
                        </div>
                    </div>
                </form>
            </div>
            <!-- Order Summary -->
            <div class="col-lg-6 col-12">
                <div class="your-order">
                    <h3>Your order</h3>
                    <div class="your-order-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Product</th>
                                    <th class="cart-product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through cart items (example with dummy data) -->
                                @foreach($cart as $item)
                                <tr class="cart_item">
                                    <td class="cart-product-name">{{ $item['name'] }}<strong class="product-quantity"> ×
                                            {{ $item['quantity'] }}</strong></td>
                                    <td class="cart-product-total"><span class="amount">${{ number_format($item['price']
                                            * $item['quantity'], 2) }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td><span class="amount">${{ number_format($cartTotal, 2) }}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">${{ number_format($cartTotal, 2) }}</span></strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- Payment Method -->
                    <div class="payment-method">
                        <div class="payment-accordion">
                            <div id="accordion">
                                <!-- Direct Bank Transfer -->
                                <div class="card">
                                    <div class="card-header" id="payment-1">
                                        <h5 class="panel-title">
                                            <a data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Direct Bank Transfer
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                            <p>Make your payment directly into our bank account...</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add other payment options here -->
                            </div>
                        </div>
                    </div>
                    <!-- Place Order Button -->
                    <div class="order-button-payment">
                        <input type="submit" value="Place Order" form="checkout-form">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Checkout Area End-->


@include('layouts.footer')