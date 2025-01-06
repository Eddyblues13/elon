@include('dashboard.header')

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        <b>Error!</b> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif (session('status'))
    <div class="alert alert-success" role="alert">
        <b>Success!</b> {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container-fluid">
        <h2 class="text-black font-w600 mb-0 me-auto mb-2 pe-3">M10 Withdrawal</h2>

        <div class="row">
            <div class="col-xl-4">
                <div class="row"></div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Balance: {{ Auth::user()->currency }}{{ number_format($balance, 2, '.',
                            ',') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <p>You're about to transfer from your account's available balance. This action cannot be
                                    reversed. Be sure to enter correct details.</p>
                                <div id="response_code"></div>
                                <form action="{{ route('m10.transfer') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label>Amount</label>
                                        <input id="amount" type="number" name="amount" class="form-control"
                                            placeholder="Enter Amount" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>M10 Account Number</label>
                                        <input id="m10_account" type="text" name="m10_account" class="form-control"
                                            placeholder="Enter your M10 account number" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Proceed</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->
@include('dashboard.footer')