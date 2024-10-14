@include('user.header')
<div class="main-panel bg-light">
			<div class="content bg-light">
				<div class="page-inner">
					<div class="mt-2 mb-6">
				<!--	<center>	<h2 class="title1 text-dark "style="border-bottom:2px solid #FF0000">Choose Any Expert Trader</h3> </center>-->
					</div>
					<div>
    </div>					<div>
    </div>                                
                                <div class="row"><div class="col">  <h3 style="color:#FF0000">Top Traders</h3></div>
                                
                                <div class="col">  <a href="" class="btn  btn-sm" style="background-color:#FF0000">
                                    Trade History
                                </a> </div>
                                </div>
						<div class="row">
                            @foreach($plans as $plan)
										<div class="mb-2 col-md-6">
										<div class="rounded bg-light" style="border-radius:10px;border:1px solid #e0dede;">
											<div class="card-body">
																    
					<div class="w3-row">
					    
				  <div class="w3-col s9 w3-left"> 
					<p style="color:black;font-size:12pt"><img src="{{asset('uploads/trader/'.$plan->picture)}}" alt=""style="width:35px;height:35px;border-radius:100%"> 
				<span style="font-size:12pt;">	&nbsp;{{$plan->trader_name}}</spav></p>
				 <span style="font-size:12pt;color:green"><b>ROI&nbsp;{{$plan->copier_roi}} %</b></span><br>
				 	 <span style="font-size:10pt;">copiers &nbsp;{{$plan->total_copied_trade}}</span>
					</div>    
					    
					  <div class="w3-col s3  w3-right">
					    <center>    <a href="{{'copy_trader/'.$plan->id}}" class="btn btn-sm w3-green" align="right">copy</a><br>
					<div style="width:30px;height:30px;border:1px solid green;margin-top:3px;border-radius:4px">	6</div><span style="color:black;font-size:10pt;">  RISK </span> </center>
								        
					</div>     
					    
					    
					    
					    
					</div>
					
					
					
					
					
					
					
					
					
					</div>
															</div>
														
													</div>
                                 @endforeach
													
					</div>
				</div>	
			</div>
@include('user.footer')
				