<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
@include('user.header')
<!-- End Sidebar -->
		<div class="main-panel bg-light">
			<div class="content bg-light">
				<div class="page-inner">
					<div class="mt-2 mb-6">
				<!--	<center>	<h2 class="title1 text-dark "style="border-bottom:2px solid blue">Choose Any Expert Trader</h3> </center>-->
					</div>
					<div>
    </div>					<div>
    </div>                                
                                <div class="row"><div class="col">  
                               
                                </div>
                                
                                <div class="col">  <a href="{{route('stock.history')}}" class="btn btn-primary btn-sm">
                                   Purchased History
                                </a> </div>
                                </div>
                                
                                  <center><h3 style="color:black"> Discover the most popular Stocks available on Lockestocks Market</h3></center>
                                
						<div class="row">
                            @foreach($stocks as $stock)
			<div class=" col-md-4 col-sm-4 col-lg-6">
															
	<div class="card-body" style="background-color:white;border-radius:20px;margin-bottom:10px;border:1px solid gray">


  <img src="{{asset('uploads/stock/'.$stock->picture)}}" alt="">
  
                                    <div style="width:100%;height:150px">
									@if($stock->stock_name === "AMAZON")
                                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
                                            {
                                                "symbols": [
                                                    [
                                                        "AMAZON",
                                                        "NASDAQ:AMZN|ALL"
                                                    ]
                                                ],
                                                "chartOnly": false,
                                                "width": "100%",
                                                "height": "100%",
                                                "locale": "en",
                                                "colorTheme": "light",
                                                "autosize": true,
                                                "showVolume": true,
                                                "hideDateRanges": false,
                                                "hideMarketStatus": false,
                                                "hideSymbolLogo": false,
                                                "scalePosition": "right",
                                                "scaleMode": "Normal",
                                                "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",
                                                "fontSize": "10",
                                                "noTimeScale": false,
                                                "valuesTracking": "1",
                                                "changeMode": "price-and-percent",
                                                "chartType": "line"
                                            }
                                        </script>
									@elseIf($stock->stock_name === "NETFLIX")
									<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "NETFLIX",       "NASDAQ:NFLX|1M"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": true,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>

									@elseIf($stock->stock_name === "Apple")
									<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "APPLE",       "NASDAQ:AAPL|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": true,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
									@elseIf($stock->stock_name === "Microsoft")
									<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "Microsoft",       "NASDAQ:MSFT|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": true,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>

									@elseIf($stock->stock_name === "Tesla")

									@elseIf($stock->stock_name === "Google")
									<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "google",       "NASDAQ:GOOGL|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": true,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>

									@elseIf($stock->stock_name === "META")
									<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "META",       "NASDAQ:META|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": false,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>

									@elseIf($stock->stock_name === "PayPal")
									<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "PAYPAL",       "NASDAQ:PYPL|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>

									@elseIf($stock->stock_name === "MCDONALD")
									<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "MCD",       "NYSE:MCD|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
									@elseIf($stock->stock_name === "COCA-COLA")
									<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "COCACOLA",       "NYSE:KO|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
									@elseIf($stock->stock_name === "Shopify")

									@elseIf($stock->stock_name === "GME")
									<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "GME",       "NYSE:GME|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": false,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>

									@else

									@endif
                                    </div>

  <span style="font-size:12pt;color:black">Share:<span style="color:green">{{$stock->performance}}</span>I&nbsp;volume:<span style="color:red">{{$stock->copier_roi}}</span> I&nbsp;ROI:<span style="color:orange">{{$stock->top_up_amount}} </span></span><br>
@if($stock->top_up_status==="closed")
  <a class="btn btn-sm w3-red">
@else
<a class="btn btn-sm w3-green">
@endif
{{$stock->top_up_status}}
</a>&nbsp;&nbsp;  <button data-bs-toggle="modal" data-bs-target="#myModal{{$stock->id}}" class="btn btn-sm w3-blue">Buy Stock</button>  
<!--<a class="btn btn-sm w3-orange">Min Amount $300</a> -->


<!-- The Modal -->
<div class="modal" id="myModal{{$stock->id}}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header w3-blue">
       <center> <h4 class="modal-title">Purchase Stock</h4></center>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <p  style="color:black"> You are about to purchase this stock  <br> {{$stock->stock_name}} <img src="{{asset('uploads/stock/'.$stock->picture)}}" alt=""> </p>
        
	                              <form method="post" action="{{route('buy.stocks')}}" >
											 {{ csrf_field()}}
									<label><h3 style="color:black"> Purchase Amount</h3></label>
										<input type="number" min="50" max="50000000000000" name="amount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
									
									<br>

                    <input type="hidden" name="stock_duration" value="{{$stock->investment_duration}}">
										<input type="hidden" name="stock_name" value="{{$stock->stock_name}}">
										<input type="hidden" name="stock_image" value="{{$stock->picture}}">
										<input type="hidden" name="roi" value="{{$stock->top_up_amount}}">
										<input type="hidden" name="top_up_type" value="{{$stock->top_up_type}}">
										<input type="hidden" name="top_up_interval" value="{{$stock->top_up_interval}}">
										<input type="hidden" name="email" value="{{Auth::user()->email}}">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Buy Now" >
									</form>
      </div>
     <center> <h4 style="color:black">Caprock Fx Trading</h4> </center>
  <div style="width:100%;height:300px">
    
</div>
    </div>
  </div>
</div>


																    
																    
				
				
															</div>
															
															
														
													</div>
				@endforeach	

					</div><br><br><br>
				</div>	
			</div>
    			

            @include('user.footer')

