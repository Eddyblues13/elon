@include('user.header')
<div class="main-panel bg-light">
			<div class="content bg-light">
				<div class="page-inner">
					<div class="mt-2 mb-4">
					<center>	<h3 class="title1 text-dark">Copy this Trader</h3> </center>
					</div>
					<div>
    </div>					<div>
    </div>					<div class="mb-5 row">
				
						<div class="col-lg-4">
							<div class="pricing-table card purple border bg-light shadow p-4">
							
								<div class="pricing-features" style="margin-top:0px">
								    	<img src="{{asset('uploads/trader/'.$trader->picture)}}" alt=""style="width:100%;height:220px"><br>
									<center>	<h2 class="text-dark">{{$trader->trader_name}}</h2>
									<h4>Active Since: <span  class="text-dark">{{ \Carbon\Carbon::parse($trader->	trader_year_of_experience)->format('D, M j, Y g:i A') }}</span></h4>
		</center>
								  <!--	 <div class="feature text-dark">Country of Origin:<span  class="text-dark">United States</span></div> -->
								  	 	<div class="feature text-dark">Coppier:<span  class="text-dark">{{$trader->total_copied_trade}}</span></div>
								 <div class="feature text-dark">Trade Performance:<span  class="text-dark">{{$trader->performance}}</span></div>
								
								<div class="feature text-dark">Coppier ROI:<span  class="text-dark">{{$trader->copier_roi}}</span></div>
							<center>ABOUT TRADER<BR><p style="color:black">{{$trader->about_trader}}</p></center>
								</div> 
								<!-- Button -->
								<div class="">
								<form method="post" action="{{route('start.trade')}}" >
											{{ csrf_field()}}
									<!--	<h5 class="text-dark">Amount to invest: ($100 default)</h5>-->
										<input type="number" min="100" max="900000" name="amount" placeholder="Enter   Amount" class="form-control text-dark bg-light" required> <br>
								
									<select class="form-control text-dark bg-light" name ="asset" required>
									   <option value=""> select Wallet </option> 
									    <option value="Bitcoin"> Bitcoin</option>
									      <option value="Ethereum">Ethereum</option>
									        <option value="USDT">USDT</option>
									          
									    
									</select>
									
									<br>
									
									
										<input type="hidden" name="trade_duration" value="{{$trader->investment_duration}}">
										<input type="hidden" name="trader_name" value="{{$trader->trader_name}}">
										<input type="hidden" name="trader_image" value="{{$trader->picture}}">
										<input type="hidden" name="roi" value="{{$trader->top_up_amount}}">
										<input type="hidden" name="top_up_type" value="{{$trader->top_up_type}}">
										<input type="hidden" name="top_up_interval" value="{{$trader->top_up_interval}}">
										<input type="hidden" name="email" value="{{Auth::user()->email}}">
										<input type="submit" class="btn btn-block pricing-action btn-primary" value="Copy Now" >
									</form>
								</div>
							</div>
						</div>
					
					</div>
				</div>	
			</div>
@include('user.footer')
				