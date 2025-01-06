@include('dashboard.header')

<div class="content-body">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header bg-success text-white text-center">
                        <h4 class="card-title">Transaction Successful</h4>
                    </div>
                    <div class="card-body text-center">
                        <h5>Thank you, {{ Auth::user()->name }}!</h5>
                        <p>Your transaction has been processed successfully.</p>
                        {{-- <div class="my-4">
                            <h6>Transaction Details:</h6>
                            <p><strong>Amount:</strong> {{ Auth::user()->currency }}{{
                                number_format($transaction->transaction_amount, 2, '.', ',') }}</p>
                            <p><strong>Transaction ID:</strong> {{ $transaction->transaction_id }}</p>
                            <p><strong>Reference:</strong> {{ $transaction->transaction_ref }}</p>
                            <p><strong>Description:</strong> {{ $transaction->transaction_description }}</p>
                        </div>
                        <div class="alert alert-info">
                            A confirmation email has been sent to your registered email address.
                        </div> --}}
                        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('dashboard.footer')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        toastr.success('Transaction completed successfully!');
    });
</script>