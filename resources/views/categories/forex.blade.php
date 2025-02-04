@include('layouts.header')
<section class="forex-trading-area pt-60 pb-45">
    <div class="container">
        <div class="row">
            <!-- Forex Trading Content -->
            <div class="col-lg-12">
                <!-- Forex Trading Heading -->
                <div class="section-title">
                    <h2>Forex Trading</h2>
                </div>

                <!-- Forex Trading Information -->
                <div class="forex-info">
                    <div class="row">
                        <!-- Forex Trading Write-Up -->
                        <div class="col-lg-6">
                            <div class="forex-description">
                                <h3>What is Forex Trading?</h3>
                                <p>
                                    Forex trading, also known as foreign exchange trading, involves the buying and
                                    selling of currencies. It is the largest and most liquid financial market in the
                                    world. Forex trading is conducted through brokers and involves speculating on the
                                    fluctuations in currency values. Traders can access the market 24 hours a day, five
                                    days a week, making it an attractive option for those interested in financial
                                    markets.
                                </p>
                                <p>
                                    Effective Forex trading requires a thorough understanding of market analysis,
                                    including technical and fundamental analysis. Traders use various tools and
                                    strategies to predict market movements and make informed decisions. Risk management
                                    is also crucial to successful trading.
                                </p>
                            </div>
                        </div>

                        <!-- Forex Trading Video -->
                        <div class="col-lg-6">
                            <div class="forex-video">
                                <h3>Learn More About Forex Trading</h3>
                                <iframe width="100%" height="315" src="https://www.youtube.com/embed/YOUR_VIDEO_ID"
                                    title="Forex Trading Introduction" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Live Trading Chart -->
                <div class="live-trading-chart mt-5">
                    <h3>Live Forex Trading Chart</h3>
                    <div class="tradingview-widget-container">
                        <div id="tradingview_1"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.widget({
                                "width": "100%",
                                "height": "500",
                                "symbol": "FX:EURUSD",
                                "interval": "D",
                                "timezone": "Etc/UTC",
                                "theme": "light",
                                "style": "1",
                                "locale": "en",
                                "toolbar_bg": "#f1f3f6",
                                "enable_publishing": false,
                                "allow_symbol_change": true,
                                "container_id": "tradingview_1"
                            });
                        </script>
                    </div>
                </div>

                <!-- Real-Time Forex Trading Features -->
                <div class="real-time-features mt-5">
                    <h3>Real-Time Forex Trading Features</h3>
                    <ul>
                        <li>Live Market Updates: Stay informed with up-to-the-minute currency exchange rates.</li>
                        <li>Automated Alerts: Receive notifications on significant market movements and trading
                            opportunities.</li>
                        <li>Interactive Charts: Customize your trading charts with various technical indicators and
                            drawing tools.</li>
                        <li>Secure Transactions: Ensure all your trading activities are protected with advanced security
                            measures.</li>
                    </ul>
                </div>

                <!-- Call to Action for Forex Trading -->
                <div class="forex-cta text-center mt-4">
                    <h3>Ready to Start Trading?</h3>
                    <p>
                        Click the button below to create your trading account and start real-time trading. Join the
                        world of Forex trading and take control of your financial future.
                    </p>
                    <a href="{{route('register')}}" class="btn btn-primary">Start Trading Now</a>
                </div>

                <!-- Divider -->
                <hr class="my-5">

                <!-- Bitcoin Purchase Section -->
                <div class="bitcoin-purchase mt-5">
                    <div class="section-title">
                        <h2>Where to Buy Bitcoin</h2>
                    </div>
                    <div class="bitcoin-info">
                        <p>
                            Interested in buying Bitcoin? You can easily purchase Bitcoin from any country using
                            reliable crypto apps.
                            We recommend installing the <strong>CHANGELLY</strong> or <strong>REMITANO</strong> apps for
                            a seamless buying experience.
                        </p>
                        <div class="crypto-apps">
                            <h3>Recommended Crypto Apps</h3>
                            <ul>
                                <li>
                                    <strong>Changelly</strong>: A user-friendly platform to buy Bitcoin and other
                                    cryptocurrencies with ease.
                                    <a href="https://changelly.com/download" target="_blank"
                                        class="btn btn-secondary btn-sm">Download Changelly</a>
                                </li>
                                <li>
                                    <strong>Remitano</strong>: A trusted platform offering secure and convenient Bitcoin
                                    purchases with local payment options.
                                    <a href="https://remitano.com" target="_blank"
                                        class="btn btn-secondary btn-sm">Visit Remitano</a>
                                </li>
                                <!-- Future Crypto Apps can be added here -->
                                {{--
                                <li>
                                    <strong>App Name</strong>: Description of the app.
                                    <a href="app-download-link" target="_blank"
                                        class="btn btn-secondary btn-sm">Download App</a>
                                </li>
                                --}}
                            </ul>
                        </div>
                        <p>
                            Stay tuned as we update our list of recommended crypto apps to provide you with the best
                            options tailored to your needs.
                        </p>
                    </div>
                </div>

                <!-- Call to Action for Bitcoin Purchase -->
                <div class="bitcoin-cta text-center mt-4">
                    <h3>Start Buying Bitcoin Today</h3>
                    <p>
                        Install the recommended crypto app and begin your journey into the world of cryptocurrencies.
                        Secure, fast, and accessible from anywhere.
                    </p>
                    <a href="https://changelly.com/download" class="btn btn-success">Download Changelly</a>
                    <a href="https://remitano.com" class="btn btn-success">Visit Remitano</a>
                </div>


                <!-- Divider -->
                <hr class="my-5">

                <!-- Testimonies Section -->
                <div class="testimonies-section mt-5">
                    <div class="section-title">
                        <h2>Success Stories</h2>
                    </div>
                    <div id="testimoniesCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="testimony text-center">
                                    <img src="path_to_user_image1.png" alt="John Doe" class="rounded-circle mb-3"
                                        width="100" height="100">
                                    <h5>John Doe</h5>
                                    <p>"Thanks to this platform, I was able to successfully trade Forex and withdraw my
                                        profits seamlessly. Highly recommended!"</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="testimony text-center">
                                    <img src="path_to_user_image2.png" alt="Jane Smith" class="rounded-circle mb-3"
                                        width="100" height="100">
                                    <h5>Jane Smith</h5>
                                    <p>"The real-time trading features are top-notch. I made my first successful
                                        withdrawal within a week of trading."</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="testimony text-center">
                                    <img src="path_to_user_image3.jpg" alt="Mike Johnson" class="rounded-circle mb-3"
                                        width="100" height="100">
                                    <h5>Mike Johnson</h5>
                                    <p>"Exceptional service and support! My Forex trades were profitable, and the
                                        withdrawal process was quick and easy."</p>
                                </div>
                            </div>
                            <!-- Add more carousel items as needed -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#testimoniesCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#testimoniesCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <!-- Call to Action for Testimonials -->
                <div class="testimonies-cta text-center mt-4">
                    <h3>Join Our Successful Traders</h3>
                    <p>
                        Start your Forex trading journey today and be featured in our success stories. Trade smart,
                        withdraw successfully, and achieve your financial goals.
                    </p>
                    <a href="{{route('register')}}" class="btn btn-warning"> Get Started Now</a>
                </div>

            </div>
        </div>
    </div>
</section>
@include('layouts.footer')