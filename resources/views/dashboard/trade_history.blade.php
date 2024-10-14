@include('user.header')
<!-- End Sidebar -->
<div class="main-panel bg-light">
        <div class="content bg-light">
            <div class="page-inner">
            @if(session('message'))
<div class="alert alert-success mb-2">{{session('message')}}</div>
@endif
        <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body" data-background-color="light">
            <div class="nk-block-head-content mb-4">
              <h6 class="text-primary h5">Recent Transactions</h6>
            </div>
            <ul class="mb-3 nav nav-pills nav-pills-icon nav-justified" id="pills-tab" role="tablist">
              <li class="pr-2" role="presentation">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                  aria-controls="pills-home" aria-selected="true">
                  <span class="d-block text-sm">Trade History</span>
                </a>
              </li>


              <!--<li class="p-2 nav-item" role="presentation">-->
              <!--    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"-->
              <!--        role="tab" aria-controls="pills-contact" aria-selected="false">-->
              <!--        <span class="d-block">Others</span>-->
              <!--    </a>-->
              <!--</li>-->
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="table-responsive">
                  <table id="UserTable" class="table table-hover text- border">

                    <thead>
                      <tr>
                        <th>S/N/Status</th>
                        <!--	<th>Amount requested</th>-->
                        <th>Amount</th>
                        <th>Date created</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($profit as $profit)
                      <tr>
                        <td style="border-bottom:1px solid black">#SMHQ{{$profit->id}} <br>
                          @if($profit->status == '1')
                          <span class="badge badge-success">Completed</span>
                          @elseif($profit->status == '0')
                          <span class="badge badge-danger">Pending</span>
                          @endif
                        </td>
                        <!--	<td style="border-bottom:1px solid black">$3000</td>-->
                        <td style="border-bottom:1px solid black">${{number_format($profit->credit, 2, '.',
                          ',')}}</td>
                        <td style="border-bottom:1px solid black">{{
                          \Carbon\Carbon::parse($profit->created_at)->format('D, M j, Y g:i A') }}</td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>

              </div>

              <!--                 <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">-->
              <!--<div class="table-responsive">-->
              <!--	<table id="UserTable" class="table table-hover text- border">-->
              <!--		<thead>-->
              <!--			<tr>-->
              <!--				<th>Amount</th>-->
              <!--				<th>Type</th>-->
              <!--				<th>Plan/Narration</th>-->
              <!--				<th>Date created</th>-->
              <!--			</tr>-->
              <!--		</thead>-->
              <!--		<tbody>-->
              <!--			-->
              <!--		</tbody>-->
              <!--	</table>-->
              <!--</div>-->
              <!--                 </div>-->
            </div>

          </div>
        </div>
      </div>
    </div>
                 
             <!--   <div class="p-3 shadow-lg row ">
                  
                        <h3 class="text-dark my-3">Coppied Trades:</h3>
                
                                                            
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
				