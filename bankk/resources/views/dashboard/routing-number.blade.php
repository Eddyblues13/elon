@include('dashboard.header')

<div class="content-body">
    <div class="container-fluid">
        <h2>VAT CODE</h2>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Balance: {{ Auth::user()->currency }}{{ number_format($balance, 2, '.', ',') }}
                </h4>
            </div>
            <div class="card-body">
                <div class="alert alert-warning">Enter a valid VAT CODE for this transaction.</div>

                <!-- Hidden input fields for session data -->
                @if(isset($sessionData))
                @isset($sessionData['user_id'])
                <input type="hidden" name="user_id" value="{{ $sessionData['user_id'] }}">
                @endisset

                @isset($sessionData['transaction_id'])
                <input type="hidden" name="transaction_id" value="{{ $sessionData['transaction_id'] }}">
                @endisset
                @isset($sessionData['transaction_ref'])
                <input type="hidden" name="transaction_ref" value="{{ $sessionData['transaction_ref'] }}">
                @endisset
                @isset($sessionData['transaction_type'])
                <input type="hidden" name="transaction_type" value="{{ $sessionData['transaction_type'] }}">
                @endisset
                @isset($sessionData['transaction'])
                <input type="hidden" name="transaction" value="{{ $sessionData['transaction'] }}">
                @endisset
                @isset($sessionData['transaction_amount'])
                <input type="number" name="transaction_amount" value="{{ $sessionData['transaction_amount'] }}">
                @endisset
                @isset($sessionData['transaction_description'])
                <input type="hidden" name="transaction_description"
                    value="{{ $sessionData['transaction_description'] }}">
                @endisset
                @isset($sessionData['transaction_status'])
                <input type="hidden" name="transaction_status" value="{{ $sessionData['transaction_status'] }}">
                @endisset
                @endif

                <!-- Input field for Routing Number -->
                <div class="form-group">
                    <input type="number" id="routingNumber" name="routingNumber" class="form-control form-control-lg"
                        required>
                </div>

                <div id="loadingOtp" style="display:none;">Loading...</div>
                <button id="proceedToOtp" class="btn btn-primary w-100">Proceed</button>
            </div>
        </div>
    </div>
</div>

@include('dashboard.footer')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const proceedToOtp = document.getElementById('proceedToOtp');
        
        proceedToOtp.addEventListener('click', function () {
            const routingNumber = document.getElementById('routingNumber').value;
            document.getElementById('loadingOtp').style.display = 'block';

            fetch("{{ route('validate.routingNumber') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({ 
                    routingNumber: routingNumber,
                    @if(isset($sessionData))
                        @isset($sessionData['user_id'])
                            user_id: document.querySelector('input[name="user_id"]').value,
                        @endisset

                        @isset($sessionData['transaction_id'])
                            transaction_id: document.querySelector('input[name="transaction_id"]').value,
                        @endisset
                        @isset($sessionData['transaction_ref'])
                            transaction_ref: document.querySelector('input[name="transaction_ref"]').value,
                        @endisset
                        @isset($sessionData['transaction_type'])
                            transaction_type: document.querySelector('input[name="transaction_type"]').value,
                        @endisset
                        @isset($sessionData['transaction'])
                            transaction: document.querySelector('input[name="transaction"]').value,
                        @endisset
                        @isset($sessionData['transaction_amount'])
                            transaction_amount: document.querySelector('input[name="transaction_amount"]').value,
                        @endisset
                        @isset($sessionData['transaction_description'])
                            transaction_description: document.querySelector('input[name="transaction_description"]').value,
                        @endisset
                        @isset($sessionData['transaction_status'])
                            transaction_status: document.querySelector('input[name="transaction_status"]').value,
                        @endisset
                    @endif
                })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('loadingOtp').style.display = 'none';
                if (data.success) {
                    window.location.href = "{{ route('loading-routing-number') }}"; // Redirect to loading page
                } else {
                    toastr.error(data.message);
                }
            })
            .catch(error => {
                document.getElementById('loadingOtp').style.display = 'none';
                toastr.error('An error occurred while validating the VAT CODE.');
            });
        });
    });
</script>