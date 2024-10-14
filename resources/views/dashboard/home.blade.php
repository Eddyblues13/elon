@include('dashboard.header')


<!-- End Sidebar -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="main-panel bg-light">
  <div class="content bg-light">

    <div>
    </div>
    <div>
    </div>
    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js"
      async>
      {
  "symbols": [
    {
      "proName": "FOREXCOM:SPXUSD",
      "title": "S&P 500"
    },
    {
      "description": "TSLA",
      "proName": "NASDAQ:TSLA"
    },
    {
      "description": "MSFT",
      "proName": "NASDAQ:MSFT"
    },
    {
      "description": "GOOGLE",
      "proName": "NASDAQ:GOOGL"
    },
    {
      "description": "TWITER",
      "proName": "NYSE:TWTR"
    },
    {
      "description": "AMZN",
      "proName": "NASDAQ:AMZN"
    }
  ],
  "showSymbolLogo": true,
  "colorTheme": "light",
  "isTransparent": false,
  "displayMode": "adaptive",
  "locale": "en"
}
    </script>
    <div class="container">

      <p style="color:black;font-size:12pt"> Balance: <b>$</b>
        &nbsp;
        Invested: <b></b>
        &nbsp;&nbsp;&nbsp;Equity : $<b></b>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Profit: <b>$</b> &nbsp;&nbsp;&nbsp;
        Active trade: <b> $</b>
        &nbsp;&nbsp;Active Stock: <b> $ </b>
      </p>
    </div>
    @if(session('message'))
    <div class="alert alert-success mb-2">{{session('message')}}</div>
    @endif

    @if (session('error'))
    <div class="alert alert-warning alert-dismissible" role="alert">
      <b>Error!</b>{{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session('status'))
    <div class="alert alert-success alert-dismissible" role="alert" style="color:red">
      <b>Success!</b> {{ session('status') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <b>Success!</b> {{ session('message') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container">
      <div class="w3-panel w3-blue">

        <p>you have an important task left ! Verify your account to use all Morgan Stanley Investment service
          <a href="" class="btn btn-sm btn-danger" style="color:white;border :4px solid white;align:right">Verify user
            account </a>
        </p>
      </div>
    </div>














    <center>

      <p><a href="" class="rounded btn  btn-sm w3-black">Deposit</a>&nbsp;
        <a href="" class="rounded btn btn-success btn-sm">Withdraw</a> &nbsp;
        <a href="" class="rounded btn btn-danger btn-sm">Buy Stock</a>

        <a href="" class="rounded btn btn-info btn-sm">CopyTrade</a>
      </p>
    </center>
    <div class="container ">
      <h2 styele="color:black;font-size:18pt;color:black">Top Trending Stocks</h2>
      <!-- TradingView Widget BEGIN -->
      <div class="tradingview-widget-container">

        <script type="text/javascript"
          src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js" async>
          {
  "symbols": [
    [
      "Apple",
      "AAPL|1D"
    ],
    [
      "Google",
      "GOOGL|1D"
    ],
    [
      "Microsoft",
      "MSFT|1D"
    ],
    [
      "NASDAQ:TSLA|12M"
    ],
    [
      "NETFLIX",
      "NASDAQ:NFLX|12M"
    ],
    [
      "AMAZON",
      "NASDAQ:AMZN|12M"
    ]
  ],
  "chartOnly": false,
  "width": "100%",
  "height": 250,
  "locale": "en",
  "colorTheme": "light",
  "autosize": false,
  "showVolume": false,
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
      </div><br>
      <!-- TradingView Widget END -->


      <center>

        <p style="color:black;font-family:15pt">
          Discover the most popular Stocks available on stockmarket-hq Market</p>
      </center>


      <div class="row" style="margin-bottom:70px">





        <div class="col-sm-6 col-lg-6 " style="background-color:white;border-right:1px solid gray">
          <div class="tradingview-widget-container w3-card">

            <script type="text/javascript"
              src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
              {
  "colorTheme": "light",
  "dateRange": "12M",
  "showChart": false,
  "locale": "en",
  "width": "100%",
  "height": "302",
  "largeChartUrl": "",
  "isTransparent": true,
  "showSymbolLogo": true,
  "showFloatingTooltip": false,
  "tabs": [
    {
      "title": "Stocks",
      "symbols": [
        {
          "s": "NASDAQ:TSLA"
        },
        {
          "s": "NYSE:GME"
        },
        {
          "s": "NASDAQ:NFLX"
        },
        {
          "s": "SIX:MCD"
        },
        {
          "s": "NASDAQ:GOOG"
        }
      ],
      "originalTitle": "Indices"
    }
  ]
}
            </script>
          </div>
        </div>



        <div class="col-sm-6 col-lg-6 " style="background-color:white">
          <div class="tradingview-widget-container w3-card">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript"
              src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
              {
  "colorTheme": "light",
  "dateRange": "12M",
  "showChart": false,
  "locale": "en",
  "largeChartUrl": "",
  "isTransparent": true,
  "showSymbolLogo": true,
  "showFloatingTooltip": false,
  "width": "100%",
  "height": "302",
  "tabs": [
    {
      "title": "Stocks",
      "symbols": [
        {
          "s": "NASDAQ:AMZN"
        },
        {
          "s": "NASDAQ:META"
        },
        {
          "s": "NASDAQ:AAPL"
        },
        {
          "s": "NYSE:KO"
        },
        {
          "s": "NASDAQ:INTC"
        }
      ],
      "originalTitle": "Indices"
    }
  ]
}
            </script>
          </div>
        </div>

      </div>
      <P align="center"> <a href="" class="btn btn-outline-primary">BUY STOCK<i class="fa fa-copy"></i></a>
        &nbsp;&nbsp;&nbsp;&nbsp; <a href="" class="btn btn-outline-primary">COPY TRADE<i class="fa fa-copy"></i></a></P>
      <center>
        <h3 style="color:black">Most Popular Stocks</h3>
      </center>

      <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-symbol-overview.js"
        async>
        {
  "symbols": [
    [
      "Apple",
      "AAPL|1D"
    ],
    [
      "Google",
      "GOOGL|1D"
    ],
    [
      "Microsoft",
      "MSFT|1D"
    ],
    [
      "Netflix",
      "NASDAQ:NFLX|1D"
    ],
    [
      "TELSA INC",
      "NASDAQ:TSLA|12M"
    ]
  ],
  "chartOnly": false,
  "width": "100%",
  "height": "500",
  "locale": "en",
  "colorTheme": "light",
  "autosize": false,
  "showVolume": false,
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

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body" data-background-color="light">
            <div class="nk-block-head-content mb-4">
              <h6 class="text-primary h5">Recent Transactions</h6>
            </div>
            <ul class="mb-3 nav nav-pills nav-pills-icon nav-justified" id="pills-tab" role="tablist">
              <li class="pr-2" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                  aria-controls="pills-home" aria-selected="true">
                  <span class="d-block text-sm">Deposit</span>
                </a>
              </li>
              <li class="px-2" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                  aria-controls="pills-profile" aria-selected="false">
                  <span class="d-block text-sm">Withdrawal</span>
                </a>
              </li>
              <li class="px-2" role="presentation">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profilex" role="tab"
                  aria-controls="pills-profile" aria-selected="false">
                  <span class="d-block text-sm">Profit</span>
                </a>
              </li>

              <!--<li class="p-2 nav-item" role="presentation">-->
              <!--    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"-->
              <!--        role="tab" aria-controls="pills-contact" aria-selected="false">-->
              <!--        <span class="d-block">Others</span>-->
              <!--    </a>-->
              <!--</li>-->
            </ul>
            {{-- <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="table-responsive">
                  <table id="UserTable" class="table table-hover text- border">

                    <thead>
                      <tr>
                        <th>S/N/Status</th>
                        <!--	<th>Amount requested</th>-->
                        <th>Amount + charges</th>
                        <th>Recieving method</th>

                        <th>Date created</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($deposit as $deposithistory)
                      <tr>
                        <td style="border-bottom:1px solid black">#SMHQ{{$deposithistory->id}} <br>
                          @if($deposithistory->status == '1')
                          <span class="badge badge-success">Processed</span>
                          @elseif($deposithistory->status == '0')
                          <span class="badge badge-danger">Pending</span>
                          @endif
                        </td>
                        <!--	<td style="border-bottom:1px solid black">$3000</td>-->
                        <td style="border-bottom:1px solid black">${{number_format($deposithistory->amount, 2, '.',
                          ',')}}</td>
                        <td style="border-bottom:1px solid black">{{$deposithistory->asset}}</td>

                        <td style="border-bottom:1px solid black">{{
                          \Carbon\Carbon::parse($deposithistory->created_at)->format('D, M j, Y g:i A') }}</td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>

              </div>

              {{--
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="table-responsive">
                  <table id="UserTable" class="table table-hover text- border">

                    <thead>
                      <tr>
                        <th>S/N/Status</th>
                        <th>Amount</th>
                        <th>Payment method</th>

                        <th>Date created</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($withdrawal as $withdrawal)
                      <tr>
                        <td style="border-bottom:1px solid black">#SMHQ{{$withdrawal->id}} <br>
                          @if($withdrawal->status == '1')
                          <span class="badge badge-success">Processed</span>
                          @elseif($withdrawal->status == '0')
                          <span class="badge badge-danger">Pending</span>
                          @endif
                        </td>
                        <!--	<td style="border-bottom:1px solid black">$3000</td>-->
                        <td style="border-bottom:1px solid black">${{number_format($withdrawal->amount, 2, '.', ',')}}
                        </td>
                        <td style="border-bottom:1px solid black">{{$withdrawal->method}}</td>

                        <td style="border-bottom:1px solid black">{{
                          \Carbon\Carbon::parse($withdrawal->created_at)->format('D, M j, Y g:i A') }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>
              </div>
              <div class="tab-pane fade" id="pills-profilex" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="table-responsive">
                  <table id="UserTable" class="table table-hover text- border">

                    <thead>
                      <tr>
                        <th>source / trade</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Date created</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>

                </div>
              </div> --}}
              <!--                 <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">-->
              <!--<div class="table-responsive">-->
              <!--	<table id="UserTable" class="table table-hover text- border">-->
              <!--		<thead>-->
              <!--			<tr>-->
              <!--				<th>Amount</th>-->
              <!--				<th>Type</th>-->
              <!--				<th>Plan/Narration</th>-->
              <!--				<th>Date created</th>-->
              <!--			</tr>-->
              <!--		</thead>-->
              <!--		<tbody>-->
              <!--			-->
              <!--		</tbody>-->
              <!--	</table>-->
              <!--</div>-->
              <!--                 </div>-->
            </div> --}}

          </div>
        </div>
      </div>
    </div>

  </div>
  <!--end of recent transactions-->

  <!-- end of chart -->
</div>



@include('dashboard.footer')