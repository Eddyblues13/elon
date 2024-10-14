@include('user.header')
<div class="main-panel bg-light">
			<div class="content bg-light">
                
				<div class="page-inner">
				
					<div class="mt-2 mb-4">
					<h1 class="title1 text-dark">Deposit History</h1>
					</div>
					<div>
    </div>					<div>
        <div class="row">
        <div class="col-lg-12">
		@if(session('status'))
               <div class="alert alert-success mb-2">{{session('status')}}</div>
              @endif
            
        </div>
    </div>
    </div>					<div class="mb-5 row">
					<div class="col text-center card p-4 bg-light">
					 		<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
        						
        						<table id="UserTable" class="w3-table table-bordered text-dark w3-card"> 
        									<thead> 
        										<tr> 
        									<!--	<th>S/N</th>-->
        											<th>Amount</th>
        											<th>Asset</th>
        											<th>Status</th> 
        											<th>Date created</th>
        										</tr> 
        									</thead> 
        									<tbody>      
                                                @foreach($deposit as $deposithistory)
                                            <tr>
                                                    
                                                  
                                                    <td>${{number_format($deposithistory->amount, 2, '.', ',')}}</td>
                                                    <td>{{$deposithistory->asset}}</td>
													<td>
                                                     @if($deposithistory->status == '1')
											        <span class="badge badge-success">Processed</span>
                                                    @elseif($deposithistory->status == '0')
                                                    <span class="badge badge-danger">Pending</span>
                                                      @endif
											        </td>
													<td> 
                                                        {{ \Carbon\Carbon::parse($deposithistory->created_at)->format('D, M j, Y g:i A') }}
                                                   </td>
                                                    

                                                </tr>
                                              @endforeach
                                                
        									</tbody> 
        								</table>
        						
        						
        							</div>

					</div>
				</div>
			</div>
			<!-- Submit MT4 MODAL modal -->
			<div id="submitmt4modal" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    <!-- Modal content-->
			    <div class="modal-content">
					<div class="modal-header bg-light">
						<h4 class="modal-title text-dark">Subscribe to subscription Trading</h4>
						<button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
			      </div>
			     	<div class="modal-body bg-light">
              			<form role="form" method="post" action="https://stockmarket-hq.com/account/dashboard/savemt4details">
							<input type="hidden" name="_token" value="GFc55CWX875aL0V3yerRiGHLbOwjBjtkkap8W9O9">							<div class="form-row">
								<div class="form-group col-md-6">
									<h5 class="text-dark">Subscription Duration</h5>
									<select class="form-control bg-light text-dark" onchange="calcAmount(this)" name="duration" class="duration" id="duratn">
										<option value="default">Select duration</option>
										<option>Monthly</option>
										<option>Quaterly</option>
										<option>Yearly</option>
									</select>
								</div>
								<div class="form-group col-md-6">
									<h5 class="text-dark">Amount to Pay</h5>
									<input class="form-control subamount bg-light text-dark" type="text" id="amount" disabled><br/>
									
								</div>
								<div class="form-group col-md-6">
									<h5 class="text-dark ">MT4 ID*:</h5>
									<input class="form-control bg-light text-dark"  type="text" name="userid" required>
								</div>
								<div class="form-group col-md-6">
									<h5 class="text-dark ">MT4 Password*:</h5>
									<input class="form-control bg-light text-dark"  type="text" name="pswrd" required>
								</div>
								<div class="form-group col-md-6">
									<h5 class="text-dark ">Account Type:</h5>
									<input  class="form-control bg-light text-dark" Placeholder="E.g. Standard" type="text" name="acntype" required>
								</div>
								<div class="form-group col-md-6">
									<h5 class="text-dark ">Currency*:</h5>
									<input  class="form-control bg-light text-dark" Placeholder="E.g. USD" type="text" name="currency" required>
								</div>
								<div class="form-group col-md-6">
									<h5 class="text-dark ">Leverage*:</h5>
									<input  class="form-control bg-light text-dark" Placeholder="E.g. 1:500"  type="text" name="leverage" required>
								</div>
								<div class="form-group col-md-6">
									<h5 class="text-dark ">Server*:</h5>
									<input  class="form-control bg-light text-dark" Placeholder="E.g. HantecGlobal-live"  type="text" name="server" required>
								</div>
								<div class="form-group col-12">
									<small class="text-dark">Amount will be deducted from your Account balance</small>
								</div>
								<div class="form-group col-md-6">
									<input id="amountpay" type="hidden" name="amount">
					   				<input type="submit" class="btn btn-primary" value="Subscribe Now">
								</div>
							</div>
					   </form>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- /plans Modal -->
			<script type="text/javascript">
				function calcAmount(sub) {
					if(sub.value=="Quaterly"){
						var amount = document.getElementById('amount');
						var amountpay = document.getElementById('amountpay');
						amount.value = '$40';
						amountpay.value = '40';
					}if(sub.value=="Yearly"){
						var amount = document.getElementById('amount');
						var amountpay = document.getElementById('amountpay');
						amount.value = '$80';
						amountpay.value = '80';
					}if(sub.value=="Monthly"){
						var amount = document.getElementById('amount');
						var amountpay = document.getElementById('amountpay');
						amount.value = '$30';
						amountpay.value = '30';
					}
				}
				</script>	

@include('user.footer')
				