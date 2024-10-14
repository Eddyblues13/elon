<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <!-- CSRF Token -->

    <title>Morgan Stanley Investment | User Dashboard</title>
    <link rel="icon" href="{{asset('user/account/storage/app/public/photos/uPYDzhfavicon.png1677339254 ')}}"
        type="image/png" />

    <!-- Fonts and icons -->
    <script src="{{asset('user/account/dash/js/plugin/webfont/webfont.min.js')}}"></script>
    <!-- Sweet Alert -->
    <script src="{{asset('user/account/dash/js/plugin/sweetalert/sweetalert.min.js ')}}"></script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('user/account/dash/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/account/dash/css/fonts.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/account/dash/css/atlantis.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/account/dash/css/customs.css')}}">
    <link rel="stylesheet" href="{{asset('user/account/dash/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('user/account/dash/css/atlantis.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Bootstrap Notify -->

    <script src="{{asset('user/account/dash/js/plugin/bootstrap-notify/bootstrap-notify.min.js ')}}"></script>
    <script src="{{asset('user/account/dash/js/plugin/sweetalert/sweetalert.min.js ')}}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.2.1/dist/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Livewire Styles -->
    <link rel="stylesheet" href="{{asset('user/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <style>
        [wire\:loading],
        [wire\:loading\.delay],
        [wire\:loading\.inline-block],
        [wire\:loading\.inline],
        [wire\:loading\.block],
        [wire\:loading\.flex],
        [wire\:loading\.table],
        [wire\:loading\.grid] {
            display: none;
        }

        [wire\:offline] {
            display: none;
        }

        [wire\:dirty]:not(textarea):not(input):not(select) {
            display: none;
        }

        input:-webkit-autofill,
        select:-webkit-autofill,
        textarea:-webkit-autofill {
            animation-duration: 50000s;
            animation-name: livewireautofill;
        }

        @keyframes livewireautofill {
            from {}
        }
    </style>


    <!--PayPal-->
    <script>
        // Add your client ID and secret
            var PAYPAL_CLIENT = 'iidjdjdj';
            var PAYPAL_SECRET = 'jijdjkdkdk';
            
            // Point your server to the PayPal API
            var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';
    </script>
    <script src="https://www.paypal.com/sdk/js?client-id=iidjdjdj"></script>
    <style type="text/css">
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;

            color: white;
            text-align: center;
        }
    </style>
</head>

<body data-background-color="light">
    <div id="app">

        <!--/PayPal-->

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            {tawk to codess}
        </script>
        <!--End of Tawk.to Script-->
        <div class="wrapper">
            <div class="main-header">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="light">
                    <a href="/dashboard" class="logo" style="font-size: 27px; ">
                        <img src="{{asset('assets/img/logo1.png')}}" style="width: 150px; margin-right: 10px;">
                    </a>
                    <button class="ml-auto navbar-toggler sidenav-toggler" type="button" data-toggle="collapse"
                        data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fa fa-bars" style="color:red"></i>
                        </span>
                    </button>
                    <button class="topbar-toggler more"><i class="fa-solid fa-ellipsis-vertical"
                            style="color:red"></i></button>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="fa fa-bars" style="color:red"></i>
                        </button>
                    </div>
                </div>
                <!-- End Logo Header -->

                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-expand-lg" data-background-color="light">

                    <div class="container-fluid">
                        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

                            <li class="nav-item hidden-caret">
                                <form action="javascript:void(0)" method="post" id="styleform" class="form-inline">

                                    <div class="form-group">
                                        <label class="style_switch">
                                            <input name="style" id="style" type="checkbox" value="true" class="modes">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <input type="hidden" name="_token" value="ialsmxvxbFVMvehWybzdppDZtGxGJ4kODeqmi07p">
                                </form>
                            </li>
                            <li class="nav-item hidden-caret">
                                <div id="google_translate_element"></div>
                            </li>

                            <li class="nav-item dropdown hidden-caret" style="color:red;">
                                <a class="nav-link" data-toggle="dropdown" href="" aria-expanded="false">
                                    <i class="fa fa-layer-group" style="color:red"></i><strong
                                        style="font-size:8px;color:red">KYC</strong>
                                </a>
                                <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                                    <div class="quick-actions-header">
                                        <span class="mb-1 title">KYC verification</span>
                                        <span class="subtitle op-8"><a>KYC status: </a></span>
                                    </div>
                                    <div class="quick-actions-scroll scrollbar-outer">
                                        <div class="quick-actions-items">
                                            <div class="m-0 row">
                                                <a href="" class="btn btn-success">Verify
                                                    account </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown hidden-caret">
                                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                                    <i class="fa fa-user" style="font-size:8px;color:red"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">

                                                <div class="u-text">
                                                    <h4> {{Auth::user()->name}}</h4>
                                                    <p class="text-muted"> {{Auth::user()->email}}</p><a
                                                        href="{{url('/account-settings')}}"
                                                        class="btn btn-xs btn-secondary btn-sm">Account Settings</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>

                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="">

                                            </a>

                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
            <script type="text/javascript">
                //create investment
        $("#styleform").on('change',function(){
        $.ajax({
            url: "https://wwww.stockmarket-hq.com/account/dashboard/changetheme",
            type: 'POST',
            data:$("#styleform").serialize(),
            success: function (data) {
				location.reload(true);
            },
            error: function (data) {
                console.log(data);
            },

        });
    });
    
            </script> <!-- Stored in resources/views/child.blade.php -->

            <div class="sidebar sidebar-style-2 " style="background-color: white; color:black">
                <div class="sidebar-wrapper scrollbar scrollbar-inner">
                    <div class="sidebar-content">
                        <div class="user">


                            <div class="info">

                                <span>
                                    Welcome {{Auth::user()->name}}

                                </span>
                                <div class="clearfix"></div>
                                <p> user account :<i>
                                        <b></b>
                                    </i></p>
                                <p> Aaccount holder
                                    <hr>:<i> -


                                    </i>
                                </p>

                            </div>
                            <center>
                                <a href="" class="btn btn-sm btn-danger">

                                    <i class="fa fa-user" aria-hidden="true"></i> Logout
                                </a>
                                <form id="logout-form" action="" method="POST" style="display: none;">

                                </form>


                            </center>
                        </div>
                        <ul class="nav nav-danger">
                            <li class="nav-item active">
                                <a href="">
                                    <i class="fa fa-home" style="color:#FF0000"></i>
                                    <p style="color:black">Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a data-toggle="collapse" href="#mpackD">
                                    <i class="fa fa-arrow-alt-circle-up" style="color:#FF0000"></i>
                                    <p style="color:black">DEPOSIT FUND</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="mpackD">
                                    <ul class="nav nav-collapse">
                                        <li class="nav-item ">
                                            <a href="">
                                                <i class="fa fa-download "></i>
                                                <p style="color:black">Make Deposit</p>
                                            </a>
                                        </li>
                                        <li class="nav-item d-md-none ">
                                            <a href="">
                                                <i class="fa fa-briefcase " aria-hidden="true"></i>
                                                <p style="color:black">Deposit History</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item ">
                                <a data-toggle="collapse" href="#mpackw">
                                    <i class="fa fa-coins" style="color:#FF0000"></i>
                                    <p style="color:black">WITHDRAW FUND</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="mpackw">
                                    <ul class="nav nav-collapse">
                                        <li class="nav-item ">
                                            <a href="">
                                                <i class="fa fa-arrow-alt-circle-up "></i>
                                                <p style="color:black">Withdraw Funds</p>
                                            </a>
                                        </li>
                                        <li class="nav-item d-md-none ">
                                            <a href="">
                                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                                <p style="color:black">Withdraw History</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>



                            <li class="nav-item ">
                                <a data-toggle="collapse" href="#mpack">
                                    <i class="fa fa-cubes" style="color:#FF0000"></i>
                                    <p style="color:black">STOCK MARKET</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="mpack">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="">
                                                <span class="sub-item" style="color:red">Buy Stock</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="sub-item" style="color:red"> Purchase History</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a data-toggle="collapse" href="#mpacks">
                                    <i class="fa fa-exchange-alt" style="color:#FF0000"></i>
                                    <p style="color:black">TRADE</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="mpacks">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="">
                                                <span class="sub-item" style="color:red">Copy a trader</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="sub-item" style="color:red">Trade History</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>


                            <li class="nav-item">
                                <a data-toggle="collapse" href="#mpacksS">
                                    <i class="fa fa-users" style="color:#FF0000"></i>
                                    <p style="color:black">SETTINGS</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="mpacksS">
                                    <ul class="nav nav-collapse">
                                        <li class="nav-item ">
                                            <a href="">
                                                <i class="fa fa-users " aria-hidden="true"></i>
                                                <p style="color:black">Account Settings</p>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="">
                                                <i class="fa fa-briefcase " aria-hidden="true"></i>
                                                <p style="color:black">Verify Account</p>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>




                            <li class="nav-item">
                                <a data-toggle="collapse" href="#mpacksSs">
                                    <i class="fa fa-users" style="color:#FF0000"></i>
                                    <p style="color:black">OTHERS</p>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="mpacksSs">
                                    <ul class="nav nav-collapse">

                                        <li class="nav-item ">
                                            <a href="">
                                                <i class="fa fa-signal " aria-hidden="true"></i>
                                                <p style="color:black">Transactions history</p>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="">
                                                <i class="fa fa-recycle " style="color:#FF0000" aria-hidden="true"></i>
                                                <p style="color:black">Referer Downline</p>
                                            </a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="">
                                                <i class="fa fa-life-ring" style="color:#FF0000" aria-hidden="true"></i>
                                                <p style="color:black">Help/Support</p>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </li>




                            <!-- TradingView Widget BEGIN -->
                            <script type="text/javascript"
                                src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js"
                                async>
                                {
  "interval": "1m",
  "width": 250,
  "isTransparent": false,
  "height": 300,
  "symbol": "NASDAQ:TSLA",
  "showIntervalTabs": true,
  "locale": "en",
  "colorTheme": "light"
}
                            </script>

                            <!-- TradingView Widget END -->














                        </ul>

                    </div>
                </div>
            </div>

            <!-- Sidebar -->