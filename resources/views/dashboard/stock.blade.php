@include('user.header')
<div class="sidebar sidebar-style-2 w3-black" >
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                 
                
                <div class="info">
                
                        <span>
                          Welcome   Blues Wayne
                           
                    </span>
                    <div class="clearfix"></div>
                    <p> Account :<i><b>Joint Account</b></i></p>
                    <p> Account holder<hr>:<i> - <b>Blues Wayne </b><BR>-
                     </i></p>
                    
                </div>
                <center>    
                    <a href="https://stockmarket-hq.com/account/logout"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"class="btn btn-sm btn-danger">
                 
                                  <i class="fas fa-user" aria-hidden="true"></i>  Logout
                                    </a>
                   <form id="logout-form" action="https://stockmarket-hq.com/account/logout" method="POST" style="display: none;">
                                    <input type="hidden" name="_token" value="FLnst9N62kqx0yuAmtXKVTi2MjpCTLjfkqm9Umsy">
                                </form> 
                    
               </center>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item ">
                    <a href="https://stockmarket-hq.com/account/dashboard">
                        <i class="fas fa-home"style="color:#FF0000"></i>
                        <p style="color:white">Dashboard</p>
                    </a>
                </li>
               <li class="nav-item ">
                    <a data-toggle="collapse" href="#mpackD">
                        <i class="fa fa-arrow-alt-circle-up"style="color:#FF0000"></i>
                        <p style="color:white">DEPOSIT FUND</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="mpackD">
                        <ul class="nav nav-collapse">
                              <li class="nav-item " >
                    <a href="https://stockmarket-hq.com/account/dashboard/deposits">
                        <i class="fa fa-download " ></i>
                        <p style="color:white">Make Deposit</p>
                    </a>
                </li>
                             <li class="nav-item d-md-none ">
                    <a href="https://stockmarket-hq.com/account/dashboard/accounthistoryd">
                        <i class="fa fa-briefcase " aria-hidden="true"></i>
                        <p style="color:white">Deposit History</p>
                    </a>
                </li>
                        </ul>
                    </div>
                </li>               
                
 <li class="nav-item ">
                    <a data-toggle="collapse" href="#mpackw">
                        <i class="fa fa-coins"style="color:#FF0000"></i>
                        <p style="color:white">WITHDRAW FUND</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="mpackw">
                        <ul class="nav nav-collapse">
                             <li class="nav-item ">
                    <a href="https://stockmarket-hq.com/account/dashboard/withdrawals">
                        <i class="fa fa-arrow-alt-circle-up " ></i>
                        <p style="color:white">Withdraw Funds</p>
                    </a>
                </li>
                             <li class="nav-item d-md-none ">
                    <a href="https://stockmarket-hq.com/account/dashboard/accounthistoryw">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                        <p style="color:white">Withdraw History</p>
                    </a>
                </li>
                        </ul>
                    </div>
                </li>  
                           
              
                
 <li class="nav-item ">
                    <a data-toggle="collapse" href="#mpack">
                        <i class="fas fa-cubes"style="color:#FF0000"></i>
                        <p style="color:white">STOCK MARKET</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="mpack">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="https://stockmarket-hq.com/account/dashboard/stock">
                                    <span class="sub-item"style="color:black">Buy Stock</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://stockmarket-hq.com/account/dashboard/stock-history">
                                    <span class="sub-item"style="color:black"> Purchase History</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>  
              
       <li class="nav-item">
                    <a data-toggle="collapse" href="#mpacks">
                        <i class="fas fa-exchange-alt" style="color:#FF0000"></i>
                        <p style="color:white">TRADE</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="mpacks">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="https://stockmarket-hq.com/account/dashboard/trade">
                                    <span class="sub-item"style="color:black">Copy a trader</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://stockmarket-hq.com/account/dashboard/trade-history">
                                    <span class="sub-item"style="color:black">Trade History</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>  
              
             
              <li class="nav-item">
                    <a data-toggle="collapse" href="#mpacksS">
                        <i class="fas fa-users" style="color:#FF0000"></i>
                        <p style="color:white">SETTINGS</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="mpacksS">
                        <ul class="nav nav-collapse">
                                            <li class="nav-item ">
                    <a href="https://stockmarket-hq.com/account/dashboard/account-settings">
                        <i class="fa fa-users " aria-hidden="true"></i>
                        <p style="color:white">Account Settings</p>
                    </a>
                </li>  
                             <li class="nav-item ">
                    <a href="https://stockmarket-hq.com/account/dashboard/verify-account">
                        <i class="fa fa-briefcase " aria-hidden="true"></i>
                        <p style="color:white">Verify Account</p>
                    </a>
                </li>
                
                        </ul>
                    </div>
                </li>  
              
             
             
             
              <li class="nav-item">
                    <a data-toggle="collapse" href="#mpacksSs">
                        <i class="fas fa-users" style="color:#FF0000"></i>
                        <p style="color:white">OTHERS</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="mpacksSs">
                        <ul class="nav nav-collapse">
                            
                            <li class="nav-item ">
                    <a href="https://stockmarket-hq.com/account/dashboard/tradinghistory">
                        <i class="fa fa-signal " aria-hidden="true"></i>
                        <p style="color:white">Transactions history</p>
                    </a>
                </li>
                                          <li class="nav-item ">
                    <a href="https://stockmarket-hq.com/account/dashboard/referuser">
                        <i class="fa fa-recycle "style="color:#FF0000" aria-hidden="true"></i>
                        <p style="color:white">Referer Downline</p>
                    </a>
                </li>
                           <li class="nav-item ">
                    <a href="https://stockmarket-hq.com/account/dashboard/support">
                        <i class="fa fa-life-ring"style="color:#FF0000" aria-hidden="true"></i>
                        <p style="color:white">Help/Support</p>
                    </a>
                </li>
                
                        </ul>
                    </div>
                </li>  
              
             
           
             
             <!-- TradingView Widget BEGIN -->
 <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
  {
  "interval": "1m",
  "width": 250,
  "isTransparent": false,
  "height": 300,
  "symbol": "NASDAQ:TSLA",
  "showIntervalTabs": true,
  "locale": "en",
  "colorTheme": "dark"
}
  </script>

<!-- TradingView Widget END -->
             
             
             
             
             
               
                
                
                <!--
                                    <li class="nav-item ">
                        <a href="https://stockmarket-hq.com/account/dashboard/asset-balance">
                            <i class="fa fa-coins" aria-hidden="true"></i>
                            <p style="color:white">Coin Exchange</p>
                        </a>
                    </li>
                                <li class="nav-item ">
                    <a href="https://stockmarket-hq.com/account/dashboard/transfer-funds">
                        <i class="fas fa-exchange-alt" aria-hidden="true"></i>
                        <p style="color:white">Transfer funds</p>
                    </a>
                </li>
            
                  <li class="nav-item ">
                    <a href="https://stockmarket-hq.com/account/dashboard/accounthistory">
                        <i class="fa fa-briefcase " aria-hidden="true"></i>
                        <p style="color:white">Transfer history</p>
                    </a>
                </li>-->
               
               
                
                
             
             
                
               
            </ul>
            
        </div>
    </div>
</div>
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
                                
                                <div class="col">  <a href="https://stockmarket-hq.com/account/dashboard/stock-history" class="btn btn-primary btn-sm">
                                   Purchased History
                                </a> </div>
                                </div>
                                
                                  <center><h3 style="color:black"> Discover the most popular Stocks available on stockmarket-hq Market</h3></center>
                                
						<div class="row">
											<div class=" col-md-4 col-sm-4 col-lg-6">
															
																<div class="card-body" style="background-color:white;border-radius:20px;margin-bottom:10px;border:1px solid gray">


  <!--<img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677277737amazon.JPG" alt="">-->
  <div style="width:100%;height:150px">
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
</div>
  <span style="font-size:12pt;color:black">Share:<span style="color:green">+6543</span>I&nbsp;volume:<span style="color:red">6789</span> I&nbsp;ROI:<span style="color:orange">30% </span></span><br>
<a class="btn btn-sm w3-red">closed </a>			&nbsp;&nbsp;  <button data-bs-toggle="modal" data-bs-target="#myModal28" class="btn btn-sm w3-blue">Buy Stock</button>  
<!--<a class="btn btn-sm w3-orange">Min Amount $300</a> -->


<!-- The Modal -->
<div class="modal" id="myModal28">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header w3-blue">
       <center> <h4 class="modal-title">Purchase Stock</h4></center>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <p  style="color:black"> You are about to purchase this stock  <br> AMAZON <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677277737amazon.JPG" alt=""> </p>
        
        	<form method="post" action="https://stockmarket-hq.com/account/dashboard/joinplanx">
									<!--	<h5 class="text-dark">Amount to invest: ($300 default)</h5>-->
									<label><h3 style="color:black"> Purchase Amount</h3></label>
										<input type="number" min="300" max="500" name="iamount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
								<!--	<select class="form-control text-dark bg-light" name ="methodx" rquired>
									   <option value=""> select Wallet </option> 
									    <option value="1"> Bitcoin</option>
									      <option value="2">Ethereum</option>
									        <option value="3">USDT</option>
									          
									    
									</select> -->
									
									<br>
									
									
										<input type="hidden" name="duration" value="2 Weeks">
										<input type="hidden" name="id" value="28">
											<input type="hidden" name="type" value="stock">
										<input type="hidden" name="_token" value="FLnst9N62kqx0yuAmtXKVTi2MjpCTLjfkqm9Umsy">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Buy Now" >
									</form>
      </div>
     <center> <h4 style="color:black">Locke-Stock Market Index</h4> </center>
  <div style="width:100%;height:300px">
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
</div>
    </div>
  </div>
</div>

<!-- The Modal -->

																    
																  <!-- TradingView Widget BEGIN -->

<!-- TradingView Widget END -->  
																    
																    
				
				
															</div>
															
															
														
													</div>
													
						<div class=" col-md-4 col-sm-4 col-lg-6">
															
																<div class="card-body" style="background-color:white;border-radius:20px;margin-bottom:10px;border:1px solid gray">


  <!--<img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677282376netflix.JPG" alt="">-->
  <div style="width:100%;height:150px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "NETFLIX",       "NASDAQ:NFLX|1M"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": true,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
  <span style="font-size:12pt;color:black">Share:<span style="color:green">+5745</span>I&nbsp;volume:<span style="color:red">8764</span> I&nbsp;ROI:<span style="color:orange">50% </span></span><br>
<a class="btn btn-sm w3-green">open</a>			&nbsp;&nbsp;  <button data-bs-toggle="modal" data-bs-target="#myModal29" class="btn btn-sm w3-blue">Buy Stock</button>  
<!--<a class="btn btn-sm w3-orange">Min Amount $300</a> -->


<!-- The Modal -->
<div class="modal" id="myModal29">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header w3-blue">
       <center> <h4 class="modal-title">Purchase Stock</h4></center>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <p  style="color:black"> You are about to purchase this stock  <br> NETFLIX <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677282376netflix.JPG" alt=""> </p>
        
        	<form method="post" action="https://stockmarket-hq.com/account/dashboard/joinplanx">
									<!--	<h5 class="text-dark">Amount to invest: ($300 default)</h5>-->
									<label><h3 style="color:black"> Purchase Amount</h3></label>
										<input type="number" min="300" max="5000" name="iamount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
								<!--	<select class="form-control text-dark bg-light" name ="methodx" rquired>
									   <option value=""> select Wallet </option> 
									    <option value="1"> Bitcoin</option>
									      <option value="2">Ethereum</option>
									        <option value="3">USDT</option>
									          
									    
									</select> -->
									
									<br>
									
									
										<input type="hidden" name="duration" value="1 Months">
										<input type="hidden" name="id" value="29">
											<input type="hidden" name="type" value="stock">
										<input type="hidden" name="_token" value="FLnst9N62kqx0yuAmtXKVTi2MjpCTLjfkqm9Umsy">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Buy Now" >
									</form>
      </div>
     <center> <h4 style="color:black">Locke-Stock Market Index</h4> </center>
  <div style="width:100%;height:300px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "NETFLIX",       "NASDAQ:NFLX|1M"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": true,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
    </div>
  </div>
</div>

<!-- The Modal -->

																    
																  <!-- TradingView Widget BEGIN -->

<!-- TradingView Widget END -->  
																    
																    
				
				
															</div>
															
															
														
													</div>
													
						<div class=" col-md-4 col-sm-4 col-lg-6">
															
																<div class="card-body" style="background-color:white;border-radius:20px;margin-bottom:10px;border:1px solid gray">


  <!--<img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677285277apple.JPG" alt="">-->
  <div style="width:100%;height:150px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "APPLE",       "NASDAQ:AAPL|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": true,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
  <span style="font-size:12pt;color:black">Share:<span style="color:green">+576</span>I&nbsp;volume:<span style="color:red">+623</span> I&nbsp;ROI:<span style="color:orange">20% </span></span><br>
<a class="btn btn-sm w3-green">open</a>			&nbsp;&nbsp;  <button data-bs-toggle="modal" data-bs-target="#myModal30" class="btn btn-sm w3-blue">Buy Stock</button>  
<!--<a class="btn btn-sm w3-orange">Min Amount $500</a> -->


<!-- The Modal -->
<div class="modal" id="myModal30">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header w3-blue">
       <center> <h4 class="modal-title">Purchase Stock</h4></center>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <p  style="color:black"> You are about to purchase this stock  <br> Apple <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677285277apple.JPG" alt=""> </p>
        
        	<form method="post" action="https://stockmarket-hq.com/account/dashboard/joinplanx">
									<!--	<h5 class="text-dark">Amount to invest: ($500 default)</h5>-->
									<label><h3 style="color:black"> Purchase Amount</h3></label>
										<input type="number" min="500" max="6000" name="iamount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
								<!--	<select class="form-control text-dark bg-light" name ="methodx" rquired>
									   <option value=""> select Wallet </option> 
									    <option value="1"> Bitcoin</option>
									      <option value="2">Ethereum</option>
									        <option value="3">USDT</option>
									          
									    
									</select> -->
									
									<br>
									
									
										<input type="hidden" name="duration" value="1 Months">
										<input type="hidden" name="id" value="30">
											<input type="hidden" name="type" value="stock">
										<input type="hidden" name="_token" value="FLnst9N62kqx0yuAmtXKVTi2MjpCTLjfkqm9Umsy">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Buy Now" >
									</form>
      </div>
     <center> <h4 style="color:black">Locke-Stock Market Index</h4> </center>
  <div style="width:100%;height:300px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "APPLE",       "NASDAQ:AAPL|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": true,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
    </div>
  </div>
</div>

<!-- The Modal -->

																    
																  <!-- TradingView Widget BEGIN -->

<!-- TradingView Widget END -->  
																    
																    
				
				
															</div>
															
															
														
													</div>
													
						<div class=" col-md-4 col-sm-4 col-lg-6">
															
																<div class="card-body" style="background-color:white;border-radius:20px;margin-bottom:10px;border:1px solid gray">


  <!--<img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677285556ms.JPG" alt="">-->
  <div style="width:100%;height:150px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "Microsoft",       "NASDAQ:MSFT|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": true,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
  <span style="font-size:12pt;color:black">Share:<span style="color:green">+127</span>I&nbsp;volume:<span style="color:red">+810</span> I&nbsp;ROI:<span style="color:orange">30% </span></span><br>
<a class="btn btn-sm w3-red">closed </a>			&nbsp;&nbsp;  <button data-bs-toggle="modal" data-bs-target="#myModal31" class="btn btn-sm w3-blue">Buy Stock</button>  
<!--<a class="btn btn-sm w3-orange">Min Amount $50</a> -->


<!-- The Modal -->
<div class="modal" id="myModal31">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header w3-blue">
       <center> <h4 class="modal-title">Purchase Stock</h4></center>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <p  style="color:black"> You are about to purchase this stock  <br> Microsoft <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677285556ms.JPG" alt=""> </p>
        
        	<form method="post" action="https://stockmarket-hq.com/account/dashboard/joinplanx">
									<!--	<h5 class="text-dark">Amount to invest: ($50 default)</h5>-->
									<label><h3 style="color:black"> Purchase Amount</h3></label>
										<input type="number" min="50" max="780" name="iamount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
								<!--	<select class="form-control text-dark bg-light" name ="methodx" rquired>
									   <option value=""> select Wallet </option> 
									    <option value="1"> Bitcoin</option>
									      <option value="2">Ethereum</option>
									        <option value="3">USDT</option>
									          
									    
									</select> -->
									
									<br>
									
									
										<input type="hidden" name="duration" value="1 Days">
										<input type="hidden" name="id" value="31">
											<input type="hidden" name="type" value="stock">
										<input type="hidden" name="_token" value="FLnst9N62kqx0yuAmtXKVTi2MjpCTLjfkqm9Umsy">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Buy Now" >
									</form>
      </div>
     <center> <h4 style="color:black">Locke-Stock Market Index</h4> </center>
  <div style="width:100%;height:300px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "Microsoft",       "NASDAQ:MSFT|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": true,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
    </div>
  </div>
</div>

<!-- The Modal -->

																    
																  <!-- TradingView Widget BEGIN -->

<!-- TradingView Widget END -->  
																    
																    
				
				
															</div>
															
															
														
													</div>
													
						<div class=" col-md-4 col-sm-4 col-lg-6">
															
																<div class="card-body" style="background-color:white;border-radius:20px;margin-bottom:10px;border:1px solid gray">


  <!--<img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677285688telsa.JPG" alt="">-->
  <div style="width:100%;height:150px">
    
</div>
  <span style="font-size:12pt;color:black">Share:<span style="color:green">+321</span>I&nbsp;volume:<span style="color:red">+456</span> I&nbsp;ROI:<span style="color:orange">1% </span></span><br>
<a class="btn btn-sm w3-green">open</a>			&nbsp;&nbsp;  <button data-bs-toggle="modal" data-bs-target="#myModal32" class="btn btn-sm w3-blue">Buy Stock</button>  
<!--<a class="btn btn-sm w3-orange">Min Amount $100</a> -->


<!-- The Modal -->
<div class="modal" id="myModal32">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header w3-blue">
       <center> <h4 class="modal-title">Purchase Stock</h4></center>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <p  style="color:black"> You are about to purchase this stock  <br> Tesla <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677285688telsa.JPG" alt=""> </p>
        
        	<form method="post" action="https://stockmarket-hq.com/account/dashboard/joinplanx">
									<!--	<h5 class="text-dark">Amount to invest: ($50 default)</h5>-->
									<label><h3 style="color:black"> Purchase Amount</h3></label>
										<input type="number" min="100" max="10000000000000000000000000" name="iamount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
								<!--	<select class="form-control text-dark bg-light" name ="methodx" rquired>
									   <option value=""> select Wallet </option> 
									    <option value="1"> Bitcoin</option>
									      <option value="2">Ethereum</option>
									        <option value="3">USDT</option>
									          
									    
									</select> -->
									
									<br>
									
									
										<input type="hidden" name="duration" value="6 months">
										<input type="hidden" name="id" value="32">
											<input type="hidden" name="type" value="stock">
										<input type="hidden" name="_token" value="FLnst9N62kqx0yuAmtXKVTi2MjpCTLjfkqm9Umsy">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Buy Now" >
									</form>
      </div>
     <center> <h4 style="color:black">Locke-Stock Market Index</h4> </center>
  <div style="width:100%;height:300px">
    
</div>
    </div>
  </div>
</div>

<!-- The Modal -->

																    
																  <!-- TradingView Widget BEGIN -->

<!-- TradingView Widget END -->  
																    
																    
				
				
															</div>
															
															
														
													</div>
													
						<div class=" col-md-4 col-sm-4 col-lg-6">
															
																<div class="card-body" style="background-color:white;border-radius:20px;margin-bottom:10px;border:1px solid gray">


  <!--<img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677285845google.JPG" alt="">-->
  <div style="width:100%;height:150px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "google",       "NASDAQ:GOOGL|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": true,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
  <span style="font-size:12pt;color:black">Share:<span style="color:green">+632</span>I&nbsp;volume:<span style="color:red">+871</span> I&nbsp;ROI:<span style="color:orange">40% </span></span><br>
<a class="btn btn-sm w3-green">open</a>			&nbsp;&nbsp;  <button data-bs-toggle="modal" data-bs-target="#myModal33" class="btn btn-sm w3-blue">Buy Stock</button>  
<!--<a class="btn btn-sm w3-orange">Min Amount $60</a> -->


<!-- The Modal -->
<div class="modal" id="myModal33">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header w3-blue">
       <center> <h4 class="modal-title">Purchase Stock</h4></center>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <p  style="color:black"> You are about to purchase this stock  <br> Google <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677285845google.JPG" alt=""> </p>
        
        	<form method="post" action="https://stockmarket-hq.com/account/dashboard/joinplanx">
									<!--	<h5 class="text-dark">Amount to invest: ($60 default)</h5>-->
									<label><h3 style="color:black"> Purchase Amount</h3></label>
										<input type="number" min="60" max="500" name="iamount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
								<!--	<select class="form-control text-dark bg-light" name ="methodx" rquired>
									   <option value=""> select Wallet </option> 
									    <option value="1"> Bitcoin</option>
									      <option value="2">Ethereum</option>
									        <option value="3">USDT</option>
									          
									    
									</select> -->
									
									<br>
									
									
										<input type="hidden" name="duration" value="1 Months">
										<input type="hidden" name="id" value="33">
											<input type="hidden" name="type" value="stock">
										<input type="hidden" name="_token" value="FLnst9N62kqx0yuAmtXKVTi2MjpCTLjfkqm9Umsy">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Buy Now" >
									</form>
      </div>
     <center> <h4 style="color:black">Locke-Stock Market Index</h4> </center>
  <div style="width:100%;height:300px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "google",       "NASDAQ:GOOGL|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": true,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
    </div>
  </div>
</div>

<!-- The Modal -->

																    
																  <!-- TradingView Widget BEGIN -->

<!-- TradingView Widget END -->  
																    
																    
				
				
															</div>
															
															
														
													</div>
													
						<div class=" col-md-4 col-sm-4 col-lg-6">
															
																<div class="card-body" style="background-color:white;border-radius:20px;margin-bottom:10px;border:1px solid gray">


  <!--<img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677319532meta.JPG" alt="">-->
  <div style="width:100%;height:150px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "META",       "NASDAQ:META|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": false,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
  <span style="font-size:12pt;color:black">Share:<span style="color:green">+798</span>I&nbsp;volume:<span style="color:red">+456</span> I&nbsp;ROI:<span style="color:orange">50% </span></span><br>
<a class="btn btn-sm w3-green">open</a>			&nbsp;&nbsp;  <button data-bs-toggle="modal" data-bs-target="#myModal34" class="btn btn-sm w3-blue">Buy Stock</button>  
<!--<a class="btn btn-sm w3-orange">Min Amount $60</a> -->


<!-- The Modal -->
<div class="modal" id="myModal34">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header w3-blue">
       <center> <h4 class="modal-title">Purchase Stock</h4></center>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <p  style="color:black"> You are about to purchase this stock  <br> META <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677319532meta.JPG" alt=""> </p>
        
        	<form method="post" action="https://stockmarket-hq.com/account/dashboard/joinplanx">
									<!--	<h5 class="text-dark">Amount to invest: ($60 default)</h5>-->
									<label><h3 style="color:black"> Purchase Amount</h3></label>
										<input type="number" min="60" max="500000" name="iamount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
								<!--	<select class="form-control text-dark bg-light" name ="methodx" rquired>
									   <option value=""> select Wallet </option> 
									    <option value="1"> Bitcoin</option>
									      <option value="2">Ethereum</option>
									        <option value="3">USDT</option>
									          
									    
									</select> -->
									
									<br>
									
									
										<input type="hidden" name="duration" value="1 Days">
										<input type="hidden" name="id" value="34">
											<input type="hidden" name="type" value="stock">
										<input type="hidden" name="_token" value="FLnst9N62kqx0yuAmtXKVTi2MjpCTLjfkqm9Umsy">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Buy Now" >
									</form>
      </div>
     <center> <h4 style="color:black">Locke-Stock Market Index</h4> </center>
  <div style="width:100%;height:300px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "META",       "NASDAQ:META|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": false,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
    </div>
  </div>
</div>

<!-- The Modal -->

																    
																  <!-- TradingView Widget BEGIN -->

<!-- TradingView Widget END -->  
																    
																    
				
				
															</div>
															
															
														
													</div>
													
						<div class=" col-md-4 col-sm-4 col-lg-6">
															
																<div class="card-body" style="background-color:white;border-radius:20px;margin-bottom:10px;border:1px solid gray">


  <!--<img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677321106paypal.JPG" alt="">-->
  <div style="width:100%;height:150px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "PAYPAL",       "NASDAQ:PYPL|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
  <span style="font-size:12pt;color:black">Share:<span style="color:green">+790</span>I&nbsp;volume:<span style="color:red">+910</span> I&nbsp;ROI:<span style="color:orange">40% </span></span><br>
<a class="btn btn-sm w3-red">closed </a>			&nbsp;&nbsp;  <button data-bs-toggle="modal" data-bs-target="#myModal35" class="btn btn-sm w3-blue">Buy Stock</button>  
<!--<a class="btn btn-sm w3-orange">Min Amount $30</a> -->


<!-- The Modal -->
<div class="modal" id="myModal35">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header w3-blue">
       <center> <h4 class="modal-title">Purchase Stock</h4></center>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <p  style="color:black"> You are about to purchase this stock  <br> PayPal <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677321106paypal.JPG" alt=""> </p>
        
        	<form method="post" action="https://stockmarket-hq.com/account/dashboard/joinplanx">
									<!--	<h5 class="text-dark">Amount to invest: ($30 default)</h5>-->
									<label><h3 style="color:black"> Purchase Amount</h3></label>
										<input type="number" min="30" max="400000" name="iamount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
								<!--	<select class="form-control text-dark bg-light" name ="methodx" rquired>
									   <option value=""> select Wallet </option> 
									    <option value="1"> Bitcoin</option>
									      <option value="2">Ethereum</option>
									        <option value="3">USDT</option>
									          
									    
									</select> -->
									
									<br>
									
									
										<input type="hidden" name="duration" value="2 Months">
										<input type="hidden" name="id" value="35">
											<input type="hidden" name="type" value="stock">
										<input type="hidden" name="_token" value="FLnst9N62kqx0yuAmtXKVTi2MjpCTLjfkqm9Umsy">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Buy Now" >
									</form>
      </div>
     <center> <h4 style="color:black">Locke-Stock Market Index</h4> </center>
  <div style="width:100%;height:300px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "PAYPAL",       "NASDAQ:PYPL|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
    </div>
  </div>
</div>

<!-- The Modal -->

																    
																  <!-- TradingView Widget BEGIN -->

<!-- TradingView Widget END -->  
																    
																    
				
				
															</div>
															
															
														
													</div>
													
						<div class=" col-md-4 col-sm-4 col-lg-6">
															
																<div class="card-body" style="background-color:white;border-radius:20px;margin-bottom:10px;border:1px solid gray">


  <!--<img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677320016PCM.JPG" alt="">-->
  <div style="width:100%;height:150px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "MCD",       "NYSE:MCD|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
  <span style="font-size:12pt;color:black">Share:<span style="color:green">+345</span>I&nbsp;volume:<span style="color:red">+890</span> I&nbsp;ROI:<span style="color:orange">50% </span></span><br>
<a class="btn btn-sm w3-red">closed </a>			&nbsp;&nbsp;  <button data-bs-toggle="modal" data-bs-target="#myModal36" class="btn btn-sm w3-blue">Buy Stock</button>  
<!--<a class="btn btn-sm w3-orange">Min Amount $60</a> -->


<!-- The Modal -->
<div class="modal" id="myModal36">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header w3-blue">
       <center> <h4 class="modal-title">Purchase Stock</h4></center>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <p  style="color:black"> You are about to purchase this stock  <br> MCDONALD <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677320016PCM.JPG" alt=""> </p>
        
        	<form method="post" action="https://stockmarket-hq.com/account/dashboard/joinplanx">
									<!--	<h5 class="text-dark">Amount to invest: ($60 default)</h5>-->
									<label><h3 style="color:black"> Purchase Amount</h3></label>
										<input type="number" min="60" max="50" name="iamount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
								<!--	<select class="form-control text-dark bg-light" name ="methodx" rquired>
									   <option value=""> select Wallet </option> 
									    <option value="1"> Bitcoin</option>
									      <option value="2">Ethereum</option>
									        <option value="3">USDT</option>
									          
									    
									</select> -->
									
									<br>
									
									
										<input type="hidden" name="duration" value="1 Days">
										<input type="hidden" name="id" value="36">
											<input type="hidden" name="type" value="stock">
										<input type="hidden" name="_token" value="FLnst9N62kqx0yuAmtXKVTi2MjpCTLjfkqm9Umsy">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Buy Now" >
									</form>
      </div>
     <center> <h4 style="color:black">Locke-Stock Market Index</h4> </center>
  <div style="width:100%;height:300px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "MCD",       "NYSE:MCD|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
    </div>
  </div>
</div>

<!-- The Modal -->

																    
																  <!-- TradingView Widget BEGIN -->

<!-- TradingView Widget END -->  
																    
																    
				
				
															</div>
															
															
														
													</div>
													
						<div class=" col-md-4 col-sm-4 col-lg-6">
															
																<div class="card-body" style="background-color:white;border-radius:20px;margin-bottom:10px;border:1px solid gray">


  <!--<img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677320213cocacola.JPG" alt="">-->
  <div style="width:100%;height:150px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "COCACOLA",       "NYSE:KO|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
  <span style="font-size:12pt;color:black">Share:<span style="color:green">+342</span>I&nbsp;volume:<span style="color:red">+564</span> I&nbsp;ROI:<span style="color:orange">40% </span></span><br>
<a class="btn btn-sm w3-green">open</a>			&nbsp;&nbsp;  <button data-bs-toggle="modal" data-bs-target="#myModal37" class="btn btn-sm w3-blue">Buy Stock</button>  
<!--<a class="btn btn-sm w3-orange">Min Amount $50</a> -->


<!-- The Modal -->
<div class="modal" id="myModal37">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header w3-blue">
       <center> <h4 class="modal-title">Purchase Stock</h4></center>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <p  style="color:black"> You are about to purchase this stock  <br> COCA-COLA <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677320213cocacola.JPG" alt=""> </p>
        
        	<form method="post" action="https://stockmarket-hq.com/account/dashboard/joinplanx">
									<!--	<h5 class="text-dark">Amount to invest: ($50 default)</h5>-->
									<label><h3 style="color:black"> Purchase Amount</h3></label>
										<input type="number" min="50" max="40000" name="iamount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
								<!--	<select class="form-control text-dark bg-light" name ="methodx" rquired>
									   <option value=""> select Wallet </option> 
									    <option value="1"> Bitcoin</option>
									      <option value="2">Ethereum</option>
									        <option value="3">USDT</option>
									          
									    
									</select> -->
									
									<br>
									
									
										<input type="hidden" name="duration" value="2 Weeks">
										<input type="hidden" name="id" value="37">
											<input type="hidden" name="type" value="stock">
										<input type="hidden" name="_token" value="FLnst9N62kqx0yuAmtXKVTi2MjpCTLjfkqm9Umsy">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Buy Now" >
									</form>
      </div>
     <center> <h4 style="color:black">Locke-Stock Market Index</h4> </center>
  <div style="width:100%;height:300px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "COCACOLA",       "NYSE:KO|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
    </div>
  </div>
</div>

<!-- The Modal -->

																    
																  <!-- TradingView Widget BEGIN -->

<!-- TradingView Widget END -->  
																    
																    
				
				
															</div>
															
															
														
													</div>
													
						<div class=" col-md-4 col-sm-4 col-lg-6">
															
																<div class="card-body" style="background-color:white;border-radius:20px;margin-bottom:10px;border:1px solid gray">


  <!--<img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677320793SHOP.JPG" alt="">-->
  <div style="width:100%;height:150px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "SHOPIFY",       "NYSE:SHOP|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
  <span style="font-size:12pt;color:black">Share:<span style="color:green">+653</span>I&nbsp;volume:<span style="color:red">+349</span> I&nbsp;ROI:<span style="color:orange">50% </span></span><br>
<a class="btn btn-sm w3-green">open</a>			&nbsp;&nbsp;  <button data-bs-toggle="modal" data-bs-target="#myModal39" class="btn btn-sm w3-blue">Buy Stock</button>  
<!--<a class="btn btn-sm w3-orange">Min Amount $20</a> -->


<!-- The Modal -->
<div class="modal" id="myModal39">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header w3-blue">
       <center> <h4 class="modal-title">Purchase Stock</h4></center>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <p  style="color:black"> You are about to purchase this stock  <br> Shopify <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677320793SHOP.JPG" alt=""> </p>
        
        	<form method="post" action="https://stockmarket-hq.com/account/dashboard/joinplanx">
									<!--	<h5 class="text-dark">Amount to invest: ($20 default)</h5>-->
									<label><h3 style="color:black"> Purchase Amount</h3></label>
										<input type="number" min="20" max="500000" name="iamount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
								<!--	<select class="form-control text-dark bg-light" name ="methodx" rquired>
									   <option value=""> select Wallet </option> 
									    <option value="1"> Bitcoin</option>
									      <option value="2">Ethereum</option>
									        <option value="3">USDT</option>
									          
									    
									</select> -->
									
									<br>
									
									
										<input type="hidden" name="duration" value="1 Months">
										<input type="hidden" name="id" value="39">
											<input type="hidden" name="type" value="stock">
										<input type="hidden" name="_token" value="FLnst9N62kqx0yuAmtXKVTi2MjpCTLjfkqm9Umsy">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Buy Now" >
									</form>
      </div>
     <center> <h4 style="color:black">Locke-Stock Market Index</h4> </center>
  <div style="width:100%;height:300px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "SHOPIFY",       "NYSE:SHOP|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": true,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
    </div>
  </div>
</div>

<!-- The Modal -->

																    
																  <!-- TradingView Widget BEGIN -->

<!-- TradingView Widget END -->  
																    
																    
				
				
															</div>
															
															
														
													</div>
													
						<div class=" col-md-4 col-sm-4 col-lg-6">
															
																<div class="card-body" style="background-color:white;border-radius:20px;margin-bottom:10px;border:1px solid gray">


  <!--<img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677319661gme.JPG" alt="">-->
  <div style="width:100%;height:150px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "GME",       "NYSE:GME|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": false,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
  <span style="font-size:12pt;color:black">Share:<span style="color:green">+432</span>I&nbsp;volume:<span style="color:red">+138</span> I&nbsp;ROI:<span style="color:orange">50% </span></span><br>
<a class="btn btn-sm w3-green">open</a>			&nbsp;&nbsp;  <button data-bs-toggle="modal" data-bs-target="#myModal41" class="btn btn-sm w3-blue">Buy Stock</button>  
<!--<a class="btn btn-sm w3-orange">Min Amount $50</a> -->


<!-- The Modal -->
<div class="modal" id="myModal41">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header w3-blue">
       <center> <h4 class="modal-title">Purchase Stock</h4></center>
         <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <p  style="color:black"> You are about to purchase this stock  <br> GME <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677319661gme.JPG" alt=""> </p>
        
        	<form method="post" action="https://stockmarket-hq.com/account/dashboard/joinplanx">
									<!--	<h5 class="text-dark">Amount to invest: ($50 default)</h5>-->
									<label><h3 style="color:black"> Purchase Amount</h3></label>
										<input type="number" min="50" max="30000" name="iamount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
								<!--	<select class="form-control text-dark bg-light" name ="methodx" rquired>
									   <option value=""> select Wallet </option> 
									    <option value="1"> Bitcoin</option>
									      <option value="2">Ethereum</option>
									        <option value="3">USDT</option>
									          
									    
									</select> -->
									
									<br>
									
									
										<input type="hidden" name="duration" value="2 Weeks">
										<input type="hidden" name="id" value="41">
											<input type="hidden" name="type" value="stock">
										<input type="hidden" name="_token" value="FLnst9N62kqx0yuAmtXKVTi2MjpCTLjfkqm9Umsy">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Buy Now" >
									</form>
      </div>
     <center> <h4 style="color:black">Locke-Stock Market Index</h4> </center>
  <div style="width:100%;height:300px">
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>   {   "symbols": [     [       "GME",       "NYSE:GME|1D"     ]   ],   "chartOnly": false,   "width": "100%",   "height": "100%",   "locale": "en",   "colorTheme": "light",   "autosize": false,   "showVolume": false,   "hideDateRanges": false,   "hideMarketStatus": false,   "hideSymbolLogo": false,   "scalePosition": "right",   "scaleMode": "Normal",   "fontFamily": "-apple-system, BlinkMacSystemFont, Trebuchet MS, Roboto, Ubuntu, sans-serif",   "fontSize": "10",   "noTimeScale": false,   "valuesTracking": "1",   "changeMode": "price-and-percent",   "chartType": "line" }   </script>
</div>
    </div>
  </div>
</div>

<!-- The Modal -->

																    
																  <!-- TradingView Widget BEGIN -->

<!-- TradingView Widget END -->  
																    
																    
				
				
															</div>
															
															
														
													</div>
													
		</div>
	
	 
				<!--	<div class="w3-card">
					  &nbsp;&nbsp;  
					    	     <table class="w3-table w3-bordered">
													    <tr>
								       <td><p style="">
								         <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677277737amazon.JPG" alt=""style="width:35px;height:35px"> 	&nbsp;AMAZON  </p>
									  <span style="font-size:10pt">+6543 %&nbsp;ROI</span><br>
								      <span style="color:black;font-size:10pt">    Risk Index</span>&nbsp; &nbsp; &nbsp; COPIERS 
								        </span>
								       </td> 
								        
								        
								        <td>
								            <br>
								            
							
								            
								        </td>
								     
								        
								    </tr>
					
					
													    <tr>
								       <td><p style="">
								         <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677282376netflix.JPG" alt=""style="width:35px;height:35px"> 	&nbsp;NETFLIX  </p>
									  <span style="font-size:10pt">+5745 %&nbsp;ROI</span><br>
								      <span style="color:black;font-size:10pt">    Risk Index</span>&nbsp; &nbsp; &nbsp; COPIERS 
								        </span>
								       </td> 
								        
								        
								        <td>
								            <br>
								            
							
								            
								        </td>
								     
								        
								    </tr>
					
					
													    <tr>
								       <td><p style="">
								         <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677285277apple.JPG" alt=""style="width:35px;height:35px"> 	&nbsp;Apple  </p>
									  <span style="font-size:10pt">+576 %&nbsp;ROI</span><br>
								      <span style="color:black;font-size:10pt">    Risk Index</span>&nbsp; &nbsp; &nbsp; COPIERS 
								        </span>
								       </td> 
								        
								        
								        <td>
								            <br>
								            
							
								            
								        </td>
								     
								        
								    </tr>
					
					
													    <tr>
								       <td><p style="">
								         <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677285556ms.JPG" alt=""style="width:35px;height:35px"> 	&nbsp;Microsoft  </p>
									  <span style="font-size:10pt">+127 %&nbsp;ROI</span><br>
								      <span style="color:black;font-size:10pt">    Risk Index</span>&nbsp; &nbsp; &nbsp; COPIERS 
								        </span>
								       </td> 
								        
								        
								        <td>
								            <br>
								            
							
								            
								        </td>
								     
								        
								    </tr>
					
					
													    <tr>
								       <td><p style="">
								         <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677285688telsa.JPG" alt=""style="width:35px;height:35px"> 	&nbsp;Tesla  </p>
									  <span style="font-size:10pt">+321 %&nbsp;ROI</span><br>
								      <span style="color:black;font-size:10pt">    Risk Index</span>&nbsp; &nbsp; &nbsp; COPIERS 
								        </span>
								       </td> 
								        
								        
								        <td>
								            <br>
								            
							
								            
								        </td>
								     
								        
								    </tr>
					
					
													    <tr>
								       <td><p style="">
								         <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677285845google.JPG" alt=""style="width:35px;height:35px"> 	&nbsp;Google  </p>
									  <span style="font-size:10pt">+632 %&nbsp;ROI</span><br>
								      <span style="color:black;font-size:10pt">    Risk Index</span>&nbsp; &nbsp; &nbsp; COPIERS 
								        </span>
								       </td> 
								        
								        
								        <td>
								            <br>
								            
							
								            
								        </td>
								     
								        
								    </tr>
					
					
													    <tr>
								       <td><p style="">
								         <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677319532meta.JPG" alt=""style="width:35px;height:35px"> 	&nbsp;META  </p>
									  <span style="font-size:10pt">+798 %&nbsp;ROI</span><br>
								      <span style="color:black;font-size:10pt">    Risk Index</span>&nbsp; &nbsp; &nbsp; COPIERS 
								        </span>
								       </td> 
								        
								        
								        <td>
								            <br>
								            
							
								            
								        </td>
								     
								        
								    </tr>
					
					
													    <tr>
								       <td><p style="">
								         <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677321106paypal.JPG" alt=""style="width:35px;height:35px"> 	&nbsp;PayPal  </p>
									  <span style="font-size:10pt">+790 %&nbsp;ROI</span><br>
								      <span style="color:black;font-size:10pt">    Risk Index</span>&nbsp; &nbsp; &nbsp; COPIERS 
								        </span>
								       </td> 
								        
								        
								        <td>
								            <br>
								            
							
								            
								        </td>
								     
								        
								    </tr>
					
					
													    <tr>
								       <td><p style="">
								         <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677320016PCM.JPG" alt=""style="width:35px;height:35px"> 	&nbsp;MCDONALD  </p>
									  <span style="font-size:10pt">+345 %&nbsp;ROI</span><br>
								      <span style="color:black;font-size:10pt">    Risk Index</span>&nbsp; &nbsp; &nbsp; COPIERS 
								        </span>
								       </td> 
								        
								        
								        <td>
								            <br>
								            
							
								            
								        </td>
								     
								        
								    </tr>
					
					
													    <tr>
								       <td><p style="">
								         <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677320213cocacola.JPG" alt=""style="width:35px;height:35px"> 	&nbsp;COCA-COLA  </p>
									  <span style="font-size:10pt">+342 %&nbsp;ROI</span><br>
								      <span style="color:black;font-size:10pt">    Risk Index</span>&nbsp; &nbsp; &nbsp; COPIERS 
								        </span>
								       </td> 
								        
								        
								        <td>
								            <br>
								            
							
								            
								        </td>
								     
								        
								    </tr>
					
					
													    <tr>
								       <td><p style="">
								         <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677320793SHOP.JPG" alt=""style="width:35px;height:35px"> 	&nbsp;Shopify  </p>
									  <span style="font-size:10pt">+653 %&nbsp;ROI</span><br>
								      <span style="color:black;font-size:10pt">    Risk Index</span>&nbsp; &nbsp; &nbsp; COPIERS 
								        </span>
								       </td> 
								        
								        
								        <td>
								            <br>
								            
							
								            
								        </td>
								     
								        
								    </tr>
					
					
													    <tr>
								       <td><p style="">
								         <img src="https://stockmarket-hq.com/account/storage/app/public/photos/1677319661gme.JPG" alt=""style="width:35px;height:35px"> 	&nbsp;GME  </p>
									  <span style="font-size:10pt">+432 %&nbsp;ROI</span><br>
								      <span style="color:black;font-size:10pt">    Risk Index</span>&nbsp; &nbsp; &nbsp; COPIERS 
								        </span>
								       </td> 
								        
								        
								        <td>
								            <br>
								            
							
								            
								        </td>
								     
								        
								    </tr>
					
					
													    
								    	</table></div>-->
					</div><br><br><br>
				</div>	
			</div>

@include('user.footer')
				