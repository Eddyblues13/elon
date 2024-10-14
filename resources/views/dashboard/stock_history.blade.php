@include('user.header')
<!-- End Sidebar -->
<div class="main-panel bg-light">
        <div class="content bg-light">
            <div class="page-inner">
            @if(session('message'))
<div class="alert alert-success mb-2">{{session('message')}}</div>
@endif
                <div class="row">
                    <div class="col">
                   <h3> <a href="{{route('buy.stock')}}" class="btn btn-sm btn-primary ">Top Stock</a></h3></div>
                   <div class="col">
                    <h3 style="color:blue;color:white">Stock History</h3>
                    
                </div></div><hr>
                    
                    <div class="w3-container">
                <div class="mb-3 row">
                @foreach($stock_history as $stock)
                    <div class="col-md-6 card bg-light shadow-lg text-dark p-3" >
                        <h4 style="color:green">Recent Coppied</h4><hr>
         
                <table class="table table-responsive" >
                      
    <tr >
      <th><p style="color:black;font-size:12pt"><img src="{{asset('uploads/stock/'.$stock->stock_image)}}" alt=""style="width:35px;height:35px;border-radius:100%"> 
      <br>
      <p style="color:black;font-size:10pt">{{$stock->stock_name}}</p>
      </th>
      
      <th style="text-align:right">
                      
                        <p style="color:green;" class="btn btn-sm  w3-border">
                         <img src ="{{asset('icon/active.png')}}"style="width:25px;height:25px;"> Active! </p>
                                                
                         <br><b>ROI</b>%{{$stock->roi}}
                        </th>
    </tr>
    <tr>
      <td  style="width:160px;border-bottom:1px solid black">Crypto Assets</td>
   
      <td style="text-align:right"><b>{{$stock->asset}}</b>/USD</td>
    </tr>
    <tr>
      <td>Amount</td>
   
      <td style="text-align:right">${{$stock->amount}}</td>
    </tr>
    <tr>
      <td>stock Duration</td>
   
      <td style="text-align:right">{{$stock->stock_duration }}</td>
    </tr>
      <tr>
      <td>Open Date</td>
   
      <td style="text-align:right">{{ \Carbon\Carbon::parse($stock->stock_duration)->format('D, M j, Y g:i A') }}</td>
    </tr>
    
        <!--  <td>Commission</td>
   
      <td>1 Years</td>
    </tr>-->
    
   
    </table>
    
                </div>
                @endforeach   

                           
                                                                                                                       <!--end of stock History -->
                         <br><br>
                         
                </div>
                </div>
                 
             <!--   <div class="p-3 shadow-lg row ">
                  
                        <h3 class="text-dark my-3">Coppied stocks:</h3>
                
                                                            
                    <div class="col-lg-4">
                        <div class="border shadow card">
                            <div class="card-body bg-light">
                                
                                    <h1 class="text-dark">Nathaniel Forman</h1>
                                    <p style="color:#999;">ACTIVATED ON: Wed, Sep 13, 2023 8:44 PM</p>

                                                                        <h5 class="text-dark"> <b>ROI: </b>5%</h5>
                                                                        <h5 class="text-dark"> <b>INTERVAL: </b>Every 30 Minutes</h5>
                                    <h5 class="text-dark"> <b>AMOUNT:</b> $500</h5> 
                                    <h5 class="text-dark"> <b>DURATION: </b>1 Years</h5>
                                    <h5 class="text-dark"> <b>MIN RETURN: </b>$1</h5>
                                    <h5 class="text-dark"> <b>MAX RETURN: </b>$1579900000</h5>
                                                                        <p style="color:green;">Active! <i class="glyphicon glyphicon-ok"></i></p>
                                                                </div>
                        </div>
                    </div>
                    ``
                                            </div>--><br><br>
            </div>
        </div>
@include('user.footer')
        
