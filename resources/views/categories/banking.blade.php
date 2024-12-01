@include('layouts.header')

<!-- Hero Section -->
<section class="hero-section"
    style="background-image: url('asset/img/hero/hero-slide-1.png'); background-size: cover; background-position: center;">
    <div class="container text-center py-5" style="color: yellow;">
        <h1 class="hero-title">Welcome to Your Trusted Online Banking Platform</h1>
        <p class="hero-subtitle" style="color: yellow;">We provide secure, reliable, and innovative banking solutions to
            meet your personal and
            business needs.</p>

        <!-- Flex container for buttons -->
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('bank_user.register') }}" class="btn btn-lg btn-primary">Get Started</a>
            <a href="{{ route('bank_user.login') }}" class="btn btn-lg btn-primary">Login</a>
        </div>
    </div>
</section>


<!-- Online Banking Area -->
<section class="online-banking-area pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Online Banking Heading -->
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Welcome to Online Banking</h2>
                </div>

                <!-- Banking Features Section -->
                <section class="feature-wrap pt-100 pb-75">
                    <div class="container">
                        <div class="row justify-content-center">
                            <!-- Feature: Account -->
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="feature-card style3">
                                    <div class="feature-info">
                                        <div class="feature-title">
                                            <span><img src="asset/img/feature/feature-icon-1.png"
                                                    alt="Account Icon"></span>
                                            <h3>Account</h3>
                                        </div>
                                        <ul>
                                            <li>We offer a wide range of accounts to suit lifestyles & needs. Free and
                                                paid-for add-ons are available to give total control. Download, Fill &
                                                Submit at our Branch.</li>
                                            <li>Minimum account size of $5,000</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Feature: Customer Service -->
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="feature-card style3">
                                    <div class="feature-info">
                                        <div class="feature-title">
                                            <span><img src="asset/img/feature/feature-icon-2.png"
                                                    alt="Service Icon"></span>
                                            <h3>Reliable Customer Service</h3>
                                        </div>
                                        <ul>
                                            <li>We are synonymous with innovation, building excellence, superior
                                                financial performance, and creating role models for society.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Feature: Round the Clock Banking -->
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="feature-card style3">
                                    <div class="feature-info">
                                        <div class="feature-title">
                                            <span><img src="asset/img/feature/feature-icon-3.png"
                                                    alt="Banking Icon"></span>
                                            <h3>Round the Clock Banking</h3>
                                        </div>
                                        <ul>
                                            <li>Access your personal account information with ease, transfer funds
                                                securely whenever you want, wherever you want.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Why Choose Us Section -->
                <section class="why-choose-wrap style1 pb-100 bg-bunting">
                    <div class="container">
                        <div class="row gx-5 align-items-center">
                            <div class="col-lg-6">
                                <div class="wh-img-wrap">
                                    <img src="asset/img/why-choose-us/wh-img-1.png" alt="Why Choose Us">
                                    <img class="wh-shape-one bounce" src="asset/img/why-choose-us/wh-shape-1.png"
                                        alt="Shape One">
                                    <img class="wh-shape-two animationFramesTwo"
                                        src="asset/img/why-choose-us/wh-shape-2.png" alt="Shape Two">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="wh-content">
                                    <div class="content-title style1">
                                        <span>Why Choose Us</span>
                                        <h2>Our Innovative Banking Products</h2>
                                        <p>More than Just Business and finance.</p>
                                    </div>
                                    <div class="feature-item-wrap">
                                        <div class="feature-item">
                                            <span class="feature-icon">
                                                <i class="flaticon-graph"></i>
                                            </span>
                                            <div class="feature-text">
                                                <h3>More than Just Business and Finance</h3>
                                                <p>Our solutions cater to both personal and business financial needs,
                                                    ensuring tailored services for every customer.</p>
                                            </div>
                                        </div>
                                        <!-- Add more feature items if necessary -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Call to Action -->
                <div class="cta-section text-center mt-5">
                    <h3>Experience Convenient Banking</h3>
                    <p>Open an account today and enjoy seamless banking at your fingertips. Secure, fast, and reliable
                        banking made just for you.</p>
                    <a href="{{ route('bank_user.register') }}" class="btn btn-primary">Open an Account Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.footer')