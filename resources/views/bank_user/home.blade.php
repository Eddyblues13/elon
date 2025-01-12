@include('bank_user.header')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Account Overview Section -->
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-head mb-4">
                        <h2 class="text-black font-w600 mb-0">Dashboard</h2>
                    </div>
                    <a href="{{route('bank_user.kyc.page')}}" class="btn btn-primary">Open KYC Verification</a>
                </div>

                <div class="d-flex justify-content-between">
                    <div>
                        <h3>Welcome <span class="text-danger">{{ Auth::guard('bank_user')->user()->first_name }}
                                {{
                                Auth::guard('bank_user')->user()->last_name }},</span></h3>
                        <h6>Total Balance</h6>
                        <h3 class="fw-bold text-black">
                            {{Auth::guard('bank_user')->user()->currency}}{{number_format($balance, 2)}}</h3>
                    </div>
                    <div style="padding: 10px 30px;" class="align-items-center justify-content-center
									 d-flex bg-warning rounded">
                        <a href="{{route('bank_user.check.page')}}"><span class="fw-bold text-white">&plus;</span></a>
                    </div>
                </div>

 

                <div class="mt-3">
                    <p class="mb-0 text-primary"><strong>{{ Auth::guard('bank_user')->user()->a_number
                            }}</strong> -
                        <a href="{{ route('bank_user.activation.copy') }}" class="mb-0 text-primary">{{
                            Auth::guard('bank_user')->user()->a_number
                            }}</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Ledger Balance Section -->
        <div class="card mb-4">
            <div class="card-body">
                <h6>Ledger balance: {{Auth::guard('bank_user')->user()->currency}}{{number_format($balance, 2)}}
                </h6>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-12col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <hr class="hr">
                        <div class="grid-container-two">
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-danger">
                                    <a href="{{route('bank_user.inter.bank.transfer')}}">&darr;</a>
                                </div>
                                <a href="{{route('bank_user.inter.bank.transfer')}}"><span>International Bank
                                        Transfer</span></a>
                            </div>
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-warning">
                                    <a href="{{route('bank_user.crypto')}}"><img style="color:white; width:30px;"
                                            src="{{asset('bank/user/images/crypto.png')}}"></a>
                                </div>
                                <a href="{{route('bank_user.crypto')}}"><span>Crypto Withdrawal</span></a>
                            </div>
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-info">
                                    <a href="{{route('bank_user.paypal')}}"><img style="color:white; width:30px;"
                                            src="{{asset('bank/user/images/paypal.png')}}"></a>
                                </div>
                                <span><a href="{{route('bank_user.paypal')}}">Paypal Withdrawal</a></span>
                            </div>
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-success">
                                    <a href="{{route('bank_user.skrill')}}"><img class="svg-icon"
                                            src="{{asset('bank/user/images/skrill.png')}}"></a>
                                </div>
                                <span><a href="{{route('bank_user.skrill')}}">Skrill Withdrawal</a></span>
                            </div>

                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-success">
                                    <a href="{{route('bank_user.check.page')}}"><img class="svg-icon"
                                            src="{{asset('bank/user/images/check.png')}}"></a>
                                </div>
                                <span><a href="{{route('bank_user.check.page')}}">Check Deposit</a></span>
                            </div> 
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-danger">
                                    <a href="{{route('bank_user.local.bank.transfer')}}">&darr;</a>
                                </div>
                                <a href="{{route('bank_user.local.bank.transfer')}}"><span>Local Bank
                                        Transfer</span></a>
                            </div>
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-warning">
                                    <a href="{{route('bank_user.revolut.bank.transfer')}}"><img
                                            style="color:white; width:30px;"
                                            src="{{asset('bank/user/images/revolut.png')}}"></a>
                                </div>
                                <a href="{{route('bank_user.revolut.bank.transfer')}}"><span>Revolut Transfer</span></a>
                            </div>
                            <div class="d-block text-center">
                                <div class="withdraw-icon bg-info">
                                    <a href="{{route('bank_user.wise.bank.transfer')}}"><img
                                            style="color:white; width:30px;"
                                            src="{{asset('bank/user/images/wise.png')}}"></a>
                                </div>
                                <span><a href="{{route('bank_user.wise.bank.transfer')}}">Wise Withdrawal</a></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="grid-container">
                <div class="card">
                    <div class="card-body">
                        <h6>Available Balance</h6>
                        <h3 class="fw-bold text-black">
                            {{Auth::guard('bank_user')->user()->currency}}{{number_format($balance, 2)}}</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6>Refundable Balance</h6>
                        <h3 class="fw-bold text-black">
                            {{Auth::guard('bank_user')->user()->currency}}{{number_format($balance, 2)}}</h3>
                    </div>
                </div>
            </div>


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="card-title">Recent Transaction Activities</div>
                        <a href="{{ route('bank_user.transactions') }}" class="btn btn-outline-primary">View All
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
                                <h5 style="color:red">-{{ Auth::guard('bank_user')->user()->currency }}{{
                                    $detail->transaction_amount }}
                                </h5>
                                @elseif($detail->transaction_type == 'Credit')
                                <h5 style="color:green">+{{ Auth::guard('bank_user')->user()->currency }}{{
                                    $detail->transaction_amount }}
                                </h5>
                                @endif
                                <p style="{{ $detail->transaction_status == '1' ? 'color:green' : 'color:red' }}">{{
                                    $detail->transaction_status == '1' ? 'Completed' : 'Pending' }}</p>
                            </div>
                            <div>
                                <h5>{{ $detail->transaction_type }}</h5>

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

@include('bank_user.footer')