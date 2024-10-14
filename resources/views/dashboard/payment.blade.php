@include('user.header')
<div class="main-panel bg-light">
	<div class="content bg-light">
		<div class="page-inner">

			<div class="mt-2 mb-4 w3-card">
				<div class="w3-right"> <a href="{{route('user.deposit')}}" class="btn btn-sm "
						style="margin-top:5px;margin-bottom:5px;margin-right:3px;background-color:#FF0000;color:white">
						Make Deposit</a></div>
				<div class="float:left">
					<a href="{{route('deposit.history')}}" class="btn btn-sm "
						style="margin-top:5px;margin-bottom:5px;margin-left:3px;background-color:#FF0000;color:white">
						Deposit History</a>
				</div>

			</div>



			<div>
			</div>
			<div>
			</div>
			<div>
			</div>
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="card bg-light shadow-lg p-2 p-md-4">
						<div class="card-body">
							<div class="mt-5">
								<h4 class="text-dark"><span style="color:red">*</span> You are about to make Deposit of
									<strong>${{$amount}}</strong>
									<br> <span style="color:red">*</span> Crypto Assets {{$payment->name}} coin

									<img src="{{asset('uploads/icon/'.$payment->icon)}}" alt=""
										style="width:40px;height:40px">


									<br> Copy wallet Address bellow.
								</h4>
								<div class="form-group">

									<div class="mb-3 input-group">

										<input type="text" class="form-control myInput readonly text-dark bg-light"
											value="{{$payment->wallet_address}}" id="myInput" readonly>



										<div class="input-group-append">
											<button class="btn btn-outline-secondary" onclick="myFunction()"
												type="button" id="button-addon2"><i class="fas fa-copy"></i>
												copy</button>
										</div>
									</div>

									<center>

										<img src="{{asset('uploads/barcode/'.$payment->bar_code)}}" alt=""
											style="width:220px;height:220px">



									</center>
									<br>
									<small class="text-dark"><strong><span style="color:red">*</span> You Can Scan QR
											code When making deposit through ATM Machine</small>
								</div>

							</div>
							<div>
								<form action="{{ route('make.deposit')}}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="form-group">
										<h5 class="text-dark"><span style="color:red">*</span> Upload Deposit Proof .
										</h5>
										<input type="file" name="image" class="form-control col-lg-4 bg-light text-dark"
											required>
									</div>
									<input type="hidden" name="amount" value="{{$amount}}">
									<input type="hidden" name="asset" value="{{$payment->name}}">

									<div class="form-group">
										<input type="submit" class="btn btn-dark" value="Submit Deposit">
									</div>
								</form>
							</div>


						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<script>
		function myFunction() {
					/* Get the text field */
					var copyText = document.getElementById("myInput");
					/* Select the text field */
					copyText.select();
					copyText.setSelectionRange(0, 99999); /* For mobile devices */
					/* Copy the text inside the text field */
					document.execCommand("copy");
					/* Alert the copied text */
					//alert("Copied the text: " + copyText.value);
					swal("Copied", copyText.value, "success");
					}
	</script>
	<script type="text/javascript">
		var stripe = Stripe("pk_test_51JP8qpSBWKZBQRLPUIfQVYfUGly65fb1LiPUwAUajKy1nVM9Rvly3v3hQLvXnRqrWCrnUNz1qPQHNSxE689tSAoL00B1iOTNfd");
				var elements = stripe.elements();
				var style = {
					base: {
						color: "#32325d",
					}
				};
				const paybtn = document.querySelector('#stripesubmit');
				console.log(paybtn);
				paybtn.disabled = true;
		
				var card = elements.create("card", { style: style });
				card.mount("#card-element");

				function checkcardforerrors() {
						card.on('change', function(event) {
						if (event.error) {
							swal("Error", event.error.message, "error");
							paybtn.disabled = true;
						} else {
							paybtn.disabled = false;
						}
					});
				}
				checkcardforerrors();
				
				var form = document.getElementById('payment-form');

				form.addEventListener('submit', function(ev) {
					paybtn.disabled = true;
					ev.preventDefault();
					checkcardforerrors();
					document.getElementById('spinner').classList.remove('d-none');
					document.getElementById('buttontext').classList.add('d-none');
					
					// If the client secret was rendered server-side as a data-secret attribute
					// on the <form> element, you can retrieve it here by calling `form.dataset.secret`
					var clientSecret = "";
					stripe.confirmCardPayment(clientSecret, {
						payment_method: {
							card: card,
							billing_details: {
								name: "blues wayne"
							}
						}
					}).then(function(result) {
						if (result.error) {
							swal("Error", 'There was an error processing your payment, Please try deposit again from deposit page', "error");
							console.log(result.error.message);
						} else {
							// The payment has been processed!
							if (result.paymentIntent.status === 'succeeded') {
								$.ajax({
									url: "https://stockmarket-hq.com/account/dashboard/submit-stripe-payment",
									type: 'POST',
									data:$('#selectform').serialize(),
									success: function (data) {
										swal("Success", data.success, "success");
										setTimeout(function(){window.location.replace("https://stockmarket-hq.com/account/dashboard/accounthistory"); }, 3000);
									},
									error: function (error) {
										alert('Error Submiting Payment Data');
										console.log(error);
									},
								});
							}
						}
					});
					
				});
	</script>

	@include('user.footer')