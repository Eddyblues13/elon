@include('dashboard.header')

<div class="content-body">
    <div class="container-fluid">
        <h2>CCIC Code</h2>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Balance: {{ Auth::user()->currency }}{{ number_format($balance, 2, '.', ',') }}
                </h4>
            </div>
            <div class="card-body">
                <div class="alert alert-warning">Enter a valid CCIC Code for this transaction.</div>

                <!-- Check if method exists and include it as a hidden input -->
                @isset($method)
                <div class="form-group">
                    <input type="hidden" id="transactionMethod" name="transactionMethod" value="{{ $method }}">
                </div>
                @endisset

                <div class="form-group">
                    <input type="number" id="ccidCode" name="ccidCode" class="form-control form-control-lg" required>
                </div>
                <div id="loadingOtp" style="display:none;">Loading...</div>
                <button id="proceedToccidCode" class="btn btn-primary w-100">Proceed</button>
            </div>
        </div>
    </div>
</div>

@include('dashboard.footer')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const proceedToccidCode = document.getElementById('proceedToccidCode');
        
        proceedToccidCode.addEventListener('click', function () {
            const ccidCode = document.getElementById('ccidCode').value;
            const transactionMethod = document.getElementById('transactionMethod') ? document.getElementById('transactionMethod').value : null; // Check for method

            document.getElementById('loadingOtp').style.display = 'block';

            fetch("{{ route('validate.ccidCode') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                body: JSON.stringify({ 
                    ccidCode: ccidCode,
                    method: transactionMethod  // Include method only if it exists
                })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('loadingOtp').style.display = 'none';
                if (data.success) {
                    window.location.href = "{{ route('loading-ccid-code') }}"; // Redirect to loading page for CCID code
                } else {
                    toastr.error(data.message);
                }
            })
            .catch(error => {
                document.getElementById('loadingOtp').style.display = 'none';
                console.error('Error:', error);
                toastr.error('An error occurred while validating the CCID code.');
            });
        });
    });
</script>