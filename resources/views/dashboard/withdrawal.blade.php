@include('user.header')
<div class="main-panel bg-light">
			<div class="content bg-light">
				<div class="page-inner">
				            @if(session('message'))
        <div class="alert alert-success mb-2">{{session('message')}}</div>
               @endif
				<!--	<div class="mt-2 mb-4">
					    
                        <div class="d-inline">
                            <div class="float-right btn-group">
                                                               
                            </div>
                        </div>--
                        					</div>-->
					<div>
    </div>					<div>
    </div>                    
					<div class="mb-5 row">
                        <div class="col-lg-8 offset-md-2">
                            <div class="p-md-4 p-2 rounded card bg-light">
                                <div class="card-body">
                                <div class="mb-3 alert alert-primary">
                                    <h4 class="text-dark">Request for Withdrawal</h4>
                                </div>
                                
                            <form action="{{ url('/make-withdrawal')}}" method="post">
                                    @csrf
                                       
                                    <div class="form-group">
                                            <h5 class="text-dark">Enter Amount to withdraw($)</h5>
                                            <input class="form-control text-dark bg-light" placeholder="Enter Amount" type="number" name="amount" required>
                                        </div>
                                        
                                          <div class="form-group">
                                            <h5 class="text-dark">Withdraw Fund From</h5>
                                            <select name="wallet" class="form-control text-dark bg-light" required>
                                       <option value=""> Select wallet</option>
                                       <option value="profit"> Profit ${{number_format($total_profits, 2, '.', ',')}} </option>
                                        <option value="balance"> Account balance ${{number_format($account_balance, 2, '.', ',')}}</option>
                                        <option value="ref_bonus"> Referer Bonus  ${{number_format($total_referrals, 2, '.', ',')}}</option>
                                      
                                           
                                       
                                       </select>
                                        </div>
                                         <div class="form-group">
                                            <h5 class="text-dark">Chose Withdrawal Method</h5>
                                            <select name="method" class="form-control text-dark bg-light" required>
                                       <option value=""> Choset Method</option>
                                       
                                        <option value="Bitcoin"> Bitcoin wallet</option>
                                         <option value="Ethereum"> Ethereum wallet</option>
                                          <option value="USDT coin"> USDT Trc20</option>
                                           <option value="Bank Transfer"> Bank Transfer</option>
                                          <!-- <option value="Doge"> Doge wallet</option>
                                           <option value="USDT"> USDT wallet</option>
                                           <option value="BNB"> BNB wallet</option>
                                           <option value="Dash"> Dash wallet</option>
                                           <option value="Tron"> Tron wallet</option>
                                           <option value="XRP"> XRP wallet</option>
                                           <option value="EOS"> EOS wallet</option>-->
                                           
                                       
                                       </select>
                                        </div>
                                        
                                       <!-- <input value=""  type="hidden" name="method">-->

                                      <!--  -->
                                                                                                                                   <div class="form-group">
                                                    <h5 class="text-dark">Enter Details / Wallet  Address </h5>
                                                    <textarea class="form-control text-dark bg-light" row="4" name="details" placeholder="BankName: Name, Account Number: Number, Account name: Name, Swift Code: Code" required>
                                                    
                                                    </textarea>
                                                   <!-- <small class="text-dark"> is not a default withdrawal option in your account, please enter the correct bank details seperated by comma to recieve your funds.</small> <br/>
                                                    <span class="text-danger">BankName: Name, Account Number: Number, Account name: Name, Swift Code: Code</span>
                                                </div> --> 
                                                                                        
                                                                                <div class="form-group">
                                            <button class="btn btn-primary" type='submit'>Complete Request</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>

            
@include('user.footer')
				