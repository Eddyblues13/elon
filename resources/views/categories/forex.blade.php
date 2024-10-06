@include('home.header')
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

                <!-- Call to Action -->
                <div class="forex-cta text-center mt-4">
                    <h3>Ready to Start Trading?</h3>
                    <p>
                        Click the button below to create your trading account and start real-time trading. Join the
                        world of Forex trading and take control of your financial future.
                    </p>
                    <a href="" class="btn btn-primary">Start Trading Now</a>
                </div>


            </div>
        </div>
    </div>
</section>
@include('home.footer')