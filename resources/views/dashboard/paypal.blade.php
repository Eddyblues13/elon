@include('dashboard.header')
<!-- End Sidebar -->
<div class="main-panel bg-light">
            <div class="content bg-light">
    <div class="card text-center bg-light">
    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                      <div class="alert alert-success">
                   <p>{{$message}}</p>
                      </div>
                   @endif
  <div class="card-header">
    <h2>.......</h2>
  </div>
                      <div class="mt-2 mb-4">
                        <h1 class="title1 text-dark">Cash App Payment</h1>
                    </div>
                      <div class="mt-2 mb-4">
                        <p class="title1 text-primary">Make ${{$amount}} Payment to the account details shown below</p>
                    </div>


  <div class="card-body bg-light"  >
    <img src="{{asset('user/images/paypal.png')}}" width="40px;" height="40px;">
    <br>
    <br>
  <table class="table table-hover">
    <tbody>
      <tr>
      @foreach($payment  as $payments)
                
        <th>Name</th>
        <td>{{$payments->paypal_name}}</td>
      </tr>
      <tr>
         <th>Username</th>
        <td>{{$payments->paypal_username}}</td>
      </tr>
      <tr>
         <th>Email</th>        
          <td>{{$payments->paypal_email}}</td>
      </tr>
      <tr>

      </tr>

      @endforeach
    </tbody>
  </table>
</div>
</div>
  <div class="card-footer text-muted">
    <h2 style="color:skyblue;">Ensure to copy the details properly to avoid payment error</h2>
  </div>

                        <div class="col card bg-light shadow-lg">
                                <div>
                              <center>
                                  
                              <form action ="{{ url('/make-deposit')}}" method ="POST" enctype="multipart/form-data">
                             @csrf													
                            <div class="form-group">
										<h5 class="text-dark">Upload Payment proof after payment.</h5>
												<input type="file" name="image" class="form-control col-lg-4 bg-light text-dark" required>
													</div>
													<input type="hidden" name="amount" value="{{$amount}}">
													<input type="hidden" name="paymethd_method" value="{{$item}}">

													<div class="form-group">
												<input type="submit" class="btn btn-dark" value="Submit Payment">
									</div> 
							</form>
                              </center>

                        </div>
                    </div>

                </div>
            </div>
@include('dashboard.footer')

