@include('user.header')
<div class="main-panel bg-light">
			<div class="content bg-light">
				<div class="page-inner">
				@if(session('error'))
     <div class="alert alert-danger mb-2">{{session('error')}}</div>
                  @endif
				    <div class="mt-2 mb-4 w3-card">
                      <div class="w3-right"> <a href="{{route('user.deposit')}}" class="btn btn-sm "style="margin-top:5px;margin-bottom:5px;margin-right:3px;background-color:#FF0000;color:white">
                         <b> Make Deposit</b></a></div>  
                      <div class="float:left"> 
                      <a href="{{route('deposit.history')}}" class="btn btn-sm "style="margin-top:5px;margin-bottom:5px;margin-left:3px;background-color:#FF0000;color:white"> <b>Deposit History</b></a>
                      </div>  
              
                    </div>
					<div>
    </div>					<div>
    </div>					<div class="row">
						<div class="col-md-12">
							<div class="card bg-light w3-card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-8">
											
										<form method="post" action="{{url('get-deposit')}}" >
											{{ csrf_field()}}
                                         <div class="form-group">
                                            <h5 class="text-dark">Choose Deposit Method</h5>
                                            <select name="payment_id" class="form-control text-dark bg-light" required >
                                       <option value=""> Select Currency</option> 
									   @foreach($payment as $payment)
                                <option value="{{$payment->id}}" >{{$payment->name}}</option>
														 @endforeach
													    </select>
                                        </div>
											<!--	 <div class="w3-row">
                                         <div class="w3-col s6 w3-left"style="color:black">Avaliable Balance.</div>   
                                            
                                          <div class="w3-col s6 w3-right">
                                            <table> <tr><td> <img src="https://bullish-trade.com/icon/profits.png" style="width:30px;height:30px">
                                             </td><td style="color:black"> $  </td></tr></table>
                                              </div>   
                                       
                                        </div>-->
                                        
                                        
                                        <span style="color:black;float:left">Avaliable Balance.</span>
                                        <span style="float:right;color:black"> <img src="{{asset('user/icon/profits.png')}}" style="width:30px;height:30px"> ${{number_format($available, 2, '.', ',')}}</span>
                                        <hr>	<div class="row">
                                        <div class="w3-container">
                                             <p style="color:red;font-size:9pt">
												    <b>Important</b> <br>
												    * Send only the above selected currency to this address. Sending any other currency to this address may result to the loss of your deposit.
												        
												    </p>
											
												   
												   
													<div class="mb-4 col-md-12">
														<h5 class="card-title text-dark">Enter Amount</h5>
														<input class="form-control text-dark bg-light" placeholder="Enter Amount" min="500" type="number" name="amount" required>
													</div>
											
																											<div class="mt-2 mb-1 col-md-12">
														<center>	<input type="submit" class="px-5 btn btn-sm btn-primary btn-lg" value="Proceed"></center>
														</div><br>
																										<br><br>
												</div></div>
												
											</form>
											 <div class="w3-container">
												    <p style="color:red;font-size:9pt">
												    <b>Tips</b> <br>
												    * Notice: Coin will be deposited immidiately after network confirmations.<br>
												    * You can track your deposit progress on the <a href="{{route('deposit.history')}}" style="color:blue"> Deposit History</a> page
												        
												    </p></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
			<script>
				let paymethod = document.querySelector('#paymethod');
				
				function checkpamethd(id){
					let url = "https://stockmarket-hq.com/account/dashboard/get-method" + '/' + id;
					fetch(url)
					.then(function(res){
						return res.json();
					})
					.then(function (response){
						paymethod.value = response;
						$.notify({
							// options
							icon: 'flaticon-alarm-1',
							title: 'Payment Method',
							message: 'you have chosen to pay with ' + ' ' + response,
						},{
							// settings
							type: 'success',
							allow_dismiss: true,
							newest_on_top: false,
							placement: {
								from: "top",
								align: "right"
							},
							offset: 20,
							spacing: 10,
							z_index: 1031,
							delay: 5000,
							timer: 1000,
							animate: {
								enter: 'animated fadeInDown',
								exit: 'animated fadeOutUp'
							},
		
						});
					})
					.catch(function(err){
						console.log(err);
					});
				}
				$('#submitpaymentform').on('submit', function() {
					//alert('love');
					if (paymethod.value == "") {
						$.notify({
							// options
							icon: 'flaticon-alarm-1',
							title: 'Select Payment Method',
							message: 'Please choose a payment method by clicking on it',
						},{
							// settings
							type: 'danger',
							allow_dismiss: true,
							newest_on_top: false,
							placement: {
								from: "top",
								align: "right"
							},
							offset: 20,
							spacing: 10,
							z_index: 1031,
							delay: 5000,
							timer: 1000,
							animate: {
								enter: 'animated fadeInDown',
								exit: 'animated fadeOutUp'
							},
		
						});
					}else {
						let makepayurl = "https://stockmarket-hq.com/account/dashboard/newdeposit"
						//console.log(makepayurl);
						document.getElementById("submitpaymentform").action = makepayurl;
						
					}
					
				});
			</script>

@include('user.footer')
				