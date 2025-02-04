<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Transaction Receipt</title>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<style>
		.text-danger strong {
			color: #9f181c;
		}

		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}

		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}

		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}

		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}

		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}

		.receipt-main thead th {
			color: #fff;
		}

		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}

		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}

		.receipt-right p i {
			text-align: center;
			width: 18px;
		}

		.receipt-main td {
			padding: 9px 20px !important;
		}

		.receipt-main th {
			padding: 13px 20px !important;
		}

		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}

		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}

		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}

		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}

		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}

		#container {
			background-color: #dcdcdc;
		}
	</style>
</head>

<body>

	<div class="container">
		<div class="row">

			<div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
				<div class="row">
					<div class="receipt-header">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="receipt-left">
								<img class="img-responsive" alt="Company Logo" src="{{ asset('asset/img/logo.png') }}"
									style="width: 71px; border-radius: 43px;">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 text-right">
							<div class="receipt-right">
								<h5>IET Market</h5>
							</div>

							<div class="receipt-left">
								<h4 class="text-success">Transaction Successful</h4>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="receipt-header receipt-header-mid">
						<div class="col-xs-8 col-sm-8 col-md-8 text-left">
							<div class="receipt-right">
								<h5>BENEFICIARY DETAILS</h5>
								@if($transaction_data['transaction_type'] == 'bank')
								<p><b>Account Number :</b> {{ $transaction_data['account_number'] }}</p>
								<p><b>Account Name :</b> {{ $transaction_data['account_name'] }}</p>
								<p><b>Bank Name :</b> {{ $transaction_data['bank_name'] }}</p>
								<p><b>Routing/IBAN :</b> {{ $transaction_data['routing_number'] }}</p>
								<p><b>Address :</b> Australia</p>
								@elseif($transaction_data['transaction_type'] == 'paypal')
								<p><b>Amount :</b> {{ Auth::user()->currency }}{{
									number_format($transaction_data['amount'], 2) }}</p>
								<p><b>Email :</b> {{ $transaction_data['email'] }}</p>
								@elseif($transaction_data['transaction_type'] == 'skrill')
								<p><b>Amount :</b> {{ Auth::user()->currency }}{{
									number_format($transaction_data['amount'], 2) }}</p>
								<p><b>Email :</b> {{ $transaction_data['email'] }}</p>
								@elseif($transaction_data['transaction_type'] == 'crypto')
								<p><b>Wallet Type :</b> {{ $transaction_data['wallet_type'] }}</p>
								<p><b>Wallet Address :</b> {{ $transaction_data['wallet_address'] }}</p>
								@endif
							</div>
						</div>

					</div>
				</div>

				<div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>YOUR TRANSFER WAS SUCCESSFUL</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="col-md-9">Transaction Reference:</td>
								<td class="col-md-3">{{ $transaction_data['transaction_id'] }}</td>
							</tr>
							<tr>
								<td class="col-md-9">Date:</td>
								<td class="col-md-3"><span id="currentDate"></span></td>
							</tr>
							<tr>
								<td class="col-md-9">Amount Debited:</td>
								<td class="col-md-3">{{ Auth::user()->currency }}{{
									number_format($transaction_data['transaction_amount'], 2) }}</td>
							</tr>
							<tr>
								<td class="col-md-9">Handling & Charges:</td>
								<td class="col-md-3">{{ Auth::user()->currency }}0</td>
							</tr>

							<tr>

								<td class="text-right">
									<h2><strong>AVAILABLE BALANCE: </strong></h2>
								</td>
								<td class="text-left text-success">
									<h2><strong>{{ Auth::user()->currency }}{{ number_format($balance, 2) }}</strong>
									</h2>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="row">
					<div class="receipt-header receipt-header-mid receipt-footer">
						<div class="col-xs-8 col-sm-8 col-md-8 text-left">
							<div class="receipt-right">
								<button class="btn btn-primary" onclick="saveReceipt()">Save Receipt</button>
							</div>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4">
							<div class="receipt-left">
								<a class="btn btn-success" href="{{ route('dashboard') }}">Home</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<script>
		function saveReceipt() {
            window.print();
        }

        function goHome() {
            alert('Going to home page!');
            // Logic to go to the home page can be added here
        }
	</script>

	<script>
		// JavaScript function to get today's date and display it in the HTML
        function displayTodayDate() {
            const today = new Date();
            const day = String(today.getDate()).padStart(2, '0');
            const month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
            const year = today.getFullYear();

            const formattedDate = `${month}/${day}/${year}`;
            document.getElementById('currentDate').textContent = formattedDate;
        }

        // Ensure the function runs when the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', displayTodayDate);
	</script>

</body>

</html>