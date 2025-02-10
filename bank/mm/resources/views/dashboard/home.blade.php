@include('dashboard.header')
<div class="content-body">
<style>
    .notice-section {
        background-color: #17a2b8; /* Bootstrap info color */
        color: white;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        font-size: 16px;
        position: relative;
        overflow: hidden;
    }

    .notice-section strong {
        font-weight: bold;
    }

    .notice-marquee {
        white-space: nowrap;
        overflow: hidden;
        display: block;
    }

    .notice-marquee span {
        display: inline-block;
        animation: marquee 50s linear infinite;
    }

    @keyframes marquee {
        from {
            transform: translateX(100%);
        }
        to {
            transform: translateX(-100%);
        }
    }
</style>

 

    <!-- row -->
    <div class="container-fluid">
        <div class="form-head mb-4">
            <h2 class="text-black font-w600 mb-0">Dashboard</h2>
        </div>
        <div class="d-flex justify-content-end mb-3">
   <div class="notice-section">
        <div class="notice-marquee">
            <span>
                🔵 <strong>Remember:</strong> You can only make transfers or deposits from your trade account to another 
                trade account. Your bank account holder name and email ID must match your trade account holder name and 
                email ID. Any other account you want to transfer to must also have the same holder name or email ID as 
                your trade account to enable you to make a successful transaction.
            </span>
        </div>
    </div>
        </div>
        <div class="d-flex justify-content-end mb-3">
            <a href="{{route('kyc.page')}}" class="btn btn-primary">Open KYC Verification</a>
        </div>

        <div class="row">

            <div class="col-sm-12col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3>Welcome <span class="text-danger">{{Auth::user()->first_name}}
                                        {{Auth::user()->last_name}},</span></h3>
                                <h6>Total Balance</h6>
                                <h3 class="fw-bold text-black">{{Auth::user()->currency}}{{number_format($balance, 2)}}
                                </h3>
                                <p class="mb-0 text-primary"><strong>{{ Auth::user()->a_number
                                        }}</strong> -
                                    <a href="{{ route('activation.copy') }}"
                                        class="mb-0 text-primary">{{Auth::user()->activation_status}}</a>
                                </p>
                            </div>

                            <div style="padding: 10px 30px;" class="align-items-center justify-content-center
									 d-flex bg-warning rounded">
                                <a href="{{route('check.page')}}"><span class="fw-bold text-white">&plus;</span></a>
                            </div>
                        </div>
                        <hr class="hr">
                        <div class="grid-container-two">
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-danger">
                                    <a href="{{route('inter.bank.transfer')}}"><img style="color:white; width:30px;"
                                            src="{{asset('user/images/bank.png')}}"></a>
                                </div>
                                <a href="{{route('inter.bank.transfer')}}"><span>International Bank Transfer</span></a>
                            </div>
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-success">
                                    <a href="{{route('check.page')}}"><img class="svg-icon"
                                            src="{{asset('bank/user/images/check.png')}}"></a>
                                </div>
                                <span><a href="{{route('check.page')}}">Check Deposit</a></span>
                            </div>
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-info">
                                    <a href="{{route('paypal')}}"><img style="color:white; width:30px;"
                                            src="{{asset('user/images/paypal.png')}}"></a>
                                </div>
                                <span><a href="{{route('paypal')}}">Paypal Withdrawal</a></span>
                            </div>
                            <!-- Western Union Withdrawal -->
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-danger">
                                    <a href="{{ route('western_union.transfer') }}"><img
                                            style="color:white; width:30px;"
                                            src="{{asset('user/images/western-union.png')}}"></a>
                                </div>
                                <a href=""><span>Western Union</span></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-sm-12col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="grid-container-two">
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-danger">
                                    <a href="{{route('local.bank.transfer')}}">&darr;</a>
                                </div>
                                <a href="{{route('local.bank.transfer')}}"><span>Local Bank Transfer</span></a>
                            </div>
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-warning">
                                    <a href="{{route('revolut.bank.transfer')}}"><img style="color:white; width:30px;"
                                            src="{{asset('user/images/revolut.png')}}"></a>
                                </div>
                                <a href="{{route('revolut.bank.transfer')}}"><span>Revolut Transfer</span></a>
                            </div>
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-info">
                                    <a href="{{route('wise.bank.transfer')}}"><img style="color:white; width:30px;"
                                            src="{{asset('user/images/wise.png')}}"></a>
                                </div>
                                <span><a href="{{route('wise.bank.transfer')}}">Wise Withdrawal</a></span>
                            </div>
                            <!-- Skrill Withdrawal -->
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-info">
                                    <a href="{{route('skrill')}}"><img style="color:white; width:30px;"
                                            src="{{asset('user/images/skrill.png')}}"></a>
                                </div>
                                <a href="{{route('skrill')}}"><span>Skrill Withdrawal</span></a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

            <div class="grid-container">
                <div class="card">
                    <div class="card-body">
                        <h6>Available Balance</h6>
                        <h3 class="fw-bold text-black">{{Auth::user()->currency}}{{number_format($balance, 2)}}</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6>Refundable Balance</h6>
                        <h3 class="fw-bold text-black">{{Auth::user()->currency}}{{number_format($refundable_balance,
                            2)}}</h3>
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-12">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
								<div class="card-bx stacked">
									<img src="images/card/card.png" alt="" class="mw-100">
									<div class="card-info text-white">
										<p class="mb-1">Main Balance</p>
										<h2 class="fs-36 text-white mb-sm-4 mb-3">{{Auth::user()->currency}}{{number_format($balance, 2, '.', ',')}}</h2>
										<div class="d-flex align-items-center justify-content-between mb-sm-5 mb-3">
											<img src="images/dual-dot.png" alt="" class="dot-img">
											<h4 class="fs-20 text-white mb-0">8717916732</h4>
										</div>
										<div class="d-flex">
											<div class="me-5">
												<p class="fs-14 mb-1 op6">ACCOUNT TYPE</p>
												<span>Savings Account</span>
											</div>
											<div>
												<p class="fs-14 mb-1 op6">CARD HOLDER</p>
												<span>Blues Wayne</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> 

                    <!-- <div class="grid-container-two">
						<div class="col-xl-12 col-sm-12">
							<div class="card bg-danger">
								<div class="card-body">
									<div class="media align-items-center invoice-card">
										<div class="media-body text-center">
											<a href="./withdrawal" class="withdraw-icon text-center">
												&darr;
											</a>
										</div>
										<a href="./withdrawal" class="p-1 ms-3">
											<i class="flaticon-381-exit-1 fs-36 text-danger"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-12 col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="media align-items-center invoice-card">
										<div class="media-body">
											<a href="{{route('deposit')}}" class="withdraw-icon">Dep</a>
										</div>
										<a href="{{route('deposit')}}" class="p-1 ms-3">
											<i class="flaticon-381-send fs-36 text-success"></i>
										</a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-12 col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="media align-items-center invoice-card">
										<div class="media-body">
											<a href="{{route('deposit')}}" class="withdraw-icon">Dep</a>
										</div>
										<a href="{{route('deposit')}}" class="p-1 ms-3">
											<i class="flaticon-381-send fs-36 text-success"></i>
										</a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-12 col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="media align-items-center invoice-card">
										<div class="media-body">
											<a href="{{route('deposit')}}" class="withdraw-icon">De</a>
										</div>
										<a href="{{route('deposit')}}" class="p-1 ms-3">
											<i class="flaticon-381-send fs-36 text-success"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div> -->


            <!-- Transaction History Section -->
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Recent Transaction Activities</div>
                        <a href="{{ route('transactions') }}" class="btn btn-outline-primary">View All
                            Transactions</a>
                    </div>
                    <div class="card-body">
                        @forelse($details as $detail)
                        <div
                            class="activity-block d-flex justify-content-between align-items-center p-3 mb-2 border rounded">
                            <div>
                                <h5>{{ $detail->transaction_ref }}</h5>
                                <p class="m-0">{{ \Carbon\Carbon::parse($detail->transaction_created_at)->format('D, M
                                    j, Y g:i A') }}</p>
                                <p style="color:blue">{{ $detail->transaction_description }}</p>
                            </div>
                            <div>
                                <b>Amount</b>
                                @if($detail->transaction_type == 'Debit')
                                <h5 style="color:red">-{{ Auth::user()->currency }}{{ $detail->transaction_amount }}
                                </h5>
                                @elseif($detail->transaction_type == 'Credit')
                                <h5 style="color:green">+{{ Auth::user()->currency }}{{ $detail->transaction_amount }}
                                </h5>
                                @endif
                                <p style="{{ $detail->transaction_status == '1' ? 'color:green' : 'color:red' }}">{{
                                    $detail->transaction_status == '1' ? 'Completed' : 'Pending' }}</p>
                            </div>
                            <div>
                                <h5>{{ $detail->transaction_type }}</h5>
                                {{-- <a href="{{ route('view.invoice', $detail->transaction_id) }}"
                                    class="badge bg-blue text-white">View Details</a> --}}
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-4">
                            <h5>No Transaction</h5>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text">
    .marquee-container {
    position: relative;
    background-color: #f0f8ff;
    border-radius: 8px;
    overflow: hidden;
    padding: 10px;
    border: 1px solid #d1e7ff;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

.marquee-content {
    display: inline-block;
    white-space: nowrap;
    animation: marquee 10s linear infinite;
    font-size: 16px;
    color: #0d6efd;
    font-weight: bold;
}

@keyframes marquee {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
}

</style>

@include('dashboard.footer')