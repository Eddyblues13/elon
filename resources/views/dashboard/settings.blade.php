@include('user.header')
	
<div class="main-panel bg-light">
			<div class="content bg-light">
				<div class="page-inner">
                @if(session('status'))
<div class="alert alert-success mb-2">{{session('status')}}</div>
@endif
					<div>
    </div>                    <div>
    </div>					<div>
    </div>			<div class="row profile">
                        <div class="p-2 col-md-12">
                            <div class="card p-md-5 p-1 shadow-lg bg-light">
								<ul class="nav nav-pills">
									<li class="nav-item">
										<a href="#per" class="nav-link active" data-toggle="tab">Personal Settings</a>
									</li>
									<li class="nav-item">
										<a href="#set" class="nav-link" data-toggle="tab">Withdrawal Settings</a>
									</li>
									<li class="nav-item">
										<a href="#pas" class="nav-link" data-toggle="tab">Password/Security</a>
									</li>
									<li class="nav-item">
										<a href="#sec" class="nav-link" data-toggle="tab">Other Settings</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="per">
                                    <form method="post" action="{{url('personal-details')}}" >
												{{ csrf_field()}}    
    <h4><b> Account type:<span style="color:green"> Joint Trading Account </span> </b></h4>
    <div class="form-row">
                        <div class="col-md-12 col-sm-12">
                <div class="form-group">
                <div>
<label ><span style="color:red"> Change Account type</span></label>
    <select id="selector" name="account_type"  class="w3-input w3-border" required>
        <option value="select">Select account type</option>
        <option value="aadhar">Personal Account</option>
        <option value="pan">Joint Account</option>
        
    </select>
   
</div>

</div></div>
        <div class="form-group col-md-6">
            <h5 class="text-dark">Fullname</h5>
            <input type="text" class="form-control bg-light text-dark" value="{{Auth::user()->name}}" name="name">
        </div>
        <div class="form-group col-md-6">
            <h5 class="text-dark">Email Address</h5>
            <input type="email" class="form-control bg-light text-dark" value=" {{Auth::user()->email}}" name="email" readonly>
        </div>
        <div class="form-group col-md-6">
            <h5 class="text-dark">Phone Number</h5>
            <input type="text" class="form-control bg-light text-dark" value=" {{Auth::user()->phone}}" name="phone">
        </div>
        <div class="form-group col-md-6">
            <h5 class="text-dark">Date of Birth</h5>
            <input type="date" value="{{Auth::user()->date_of_birth}}" class="form-control bg-light text-dark"  name="date_of_birth">
        </div>
        <div class="form-group col-md-6">
            <h5 class="text-dark">Nationality</h5>
            <textarea class="form-control bg-light text-dark" value="{{Auth::user()->address}}" placeholder="Full Address" name="address" row="3"></textarea>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        </div>
           <center><span style="color:red">  Joint Account Information (optional)</span></center>
        
         <div class="form-row">
     
        
         <div class="form-group col-md-6">
            <h5 class="text-dark">Third party Fullname</h5>
            <input type="text" class="form-control bg-light text-dark" value="" name="third_name">
        </div>
        <div class="form-group col-md-6">
            <h5 class="text-dark">Third Party Country</h5>
            <input type="country2" class="form-control bg-light text-dark" value="" name="third_country" >
        </div>
         <div class="form-group col-md-6">
            <h5 class="text-dark">Third Party Country</h5>
            <input type="address2" class="form-control bg-light text-dark" value="" name="third_country" >
        </div>
        <div class="form-group col-md-6">
            <h5 class="text-dark">Third party phone number</h5>
            <input type="text" class="form-control bg-light text-dark" value="" name="third_phone">
        </div>
        
    </div>
    <button type="submit" class="btn btn-primary">Update Profile</button>
</form>

<script>
    
$('#updateprofileform').on('submit', function() {
    //alert('love');
    $.ajax({
        url: "https://stockmarket-hq.com/account/dashboard/profileinfo",
        type: 'POST',
        data: $('#updateprofileform').serialize(),
        success: function(response) {
            if (response.status === 200) {
                $.notify({
                    // options
                    icon: 'flaticon-alarm-1',
	                title: 'Success',
                    message: response.success,
                },{
                    // settings
                    type: 'success',
                    allow_dismiss: true,
	                newest_on_top: false,
	                showProgressbar: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    delay: 5000,
                    timer: 1000,
                    url_target: '_blank',
                    mouse_over: null,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },

                });
            } else {
               
            }
        },
        error: function(data) {
            console.log(data);
        },

    });
});
</script>									</div>
									<div class="tab-pane fade" id="set">
                <form method="post" action="{{url('withdrawal-details')}}" >
												{{ csrf_field()}}   
    <fieldset>
        <legend>Bank Account</legend>
        <div class="form-row">
            <div class="form-group col-md-6">
                <h5 class="text-dark">Bank Name</h5>
                <input type="text" name="bank_name" value="{{Auth::user()->bank_name}}"  class="form-control text-dark bg-light" placeholder="Enter bank name">
            </div>
            <div class="form-group col-md-6">
                <h5 class="text-dark">Account Name</h5>
                <input type="text" name="account_name" value="{{Auth::user()->account_name}}"  class="form-control  text-dark bg-light" placeholder="Enter Account name">
            </div>
            <div class="form-group col-md-6">
                <h5 class="text-dark">Account Number</h5>
                <input type="text" name="account_number" value="{{Auth::user()->account_number}}"  class="form-control text-dark bg-light" placeholder="Enter Account Number">
            </div>
            <div class="form-group col-md-6">
                <h5 class="text-dark">Swift Code</h5>
                <input type="text" name="swift_code" value="{{Auth::user()->swift_code}}"  class="form-control text-dark bg-light" placeholder="Enter Swift Code">
            </div>
        </div>
    </fieldset>
    <fieldset class="mt-2">
        <legend>Cryptocurrency</legend>
        <div class="form-row">
            <div class="form-group col-md-6">
                <h5 class="text-dark">Bitcoin</h5>
                <input type="text" name="btc_address" value="{{Auth::user()->btc_address}}"  class="form-control text-dark bg-light" placeholder="Enter Bitcoin Address">
                <small class="text-dark">Enter your Bitcoin Address that will be used to withdraw your funds</small>
            </div>
            <div class="form-group col-md-6">
                <h5 class="text-dark">Ethereum</h5>
                <input type="text" name="eth_address" value="{{Auth::user()->eth_address}}"  class="form-control text-dark bg-light" placeholder="Enter Etherium Address">
                <small class="text-dark">Enter your Ethereum Address that will be used to withdraw your funds</small>
            </div>
            <div class="form-group col-md-6">
                <h5 class="text-dark bg-light">Litecoin</h5>
                <input type="text" name="ltc_address" value="{{Auth::user()->ltc_address}}"  class="form-control text-dark bg-light" placeholder="Enter Litcoin Address">
                <small class="text-dark">Enter your Litecoin Address that will be used to withdraw your funds</small>
            </div>
        </div>
    </fieldset>
    <button type="submit" class="px-5 btn btn-primary">Save</button>
</form>


<script>
    
    $('#updatewithdrawalinfo').on('submit', function() {
       // alert('love');
        $.ajax({
            url: "https://stockmarket-hq.com/account/dashboard/updateacct",
            type: 'POST',
            data: $('#updatewithdrawalinfo').serialize(),
            success: function(response) {
                if (response.status === 200) {
                    $.notify({
                        // options
                        icon: 'flaticon-alarm-1',
                        title: 'Success',
                        message: response.success,
                    },{
                        // settings
                        type: 'success',
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        url_target: '_blank',
                        mouse_over: null,
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                        },
    
                    });
                } else {
                   
                }
            },
            error: function(data) {
                console.log(data);
            },
    
        });
    });
</script>									</div>
									<div class="tab-pane fade" id="pas">
                        <form method="post" action="{{ route('update-password') }}">
                                                @csrf
    <input type="hidden" name="_token" value="J9qZc9AHIuYXoLOiY2trwIFFJRsXLkgSCNy2IHU3">    
    <input type="hidden" name="_method" value="PUT">    <div class="form-row">
        <div class="form-group col-md-6">
            <h5 class="text-dark">Old Password</h5>
            <input type="password" name="old_password" class="form-control text-dark bg-light" required>
        </div>
        <div class="form-group col-md-6">
            <h5 class="text-dark">New Password</h5>
            <input type="password" name="new_password" class="form-control text-dark bg-light" required>
        </div>
        <div class="form-group col-md-6">
            <h5 class="text-dark">Confirm New Password</h5>
            <input type="password" name="password_confirmation" class="text-dark bg-light form-control" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update Password</button>
</form>
<div class="mt-4">
    <a href="https://stockmarket-hq.com/account/dashboard/manage-account-security" class="text-decoration-none">Advance Account Settings <i class="fas fa-arrow-right"></i> </a>
</div>									</div>
									<div class="tab-pane fade" id="sec">
										<form method="POST" action="javascript:void(0)" id="updateemailpref">
    <input type="hidden" name="_token" value="J9qZc9AHIuYXoLOiY2trwIFFJRsXLkgSCNy2IHU3">    <input type="hidden" name="_method" value="PUT">    <div class="row">
        <div class="mb-3 col-md-6">
            <h5 class="text-dark">Send confirmation OTP to my email when withdrawing my funds.</h5>
            <div class="selectgroup">
                <label class="selectgroup-item">
                    <input type="radio" name="otpsend" id="otpsendYes" value="Yes" class="selectgroup-input" checked="">
                    <span class="selectgroup-button">Yes</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="otpsend" id="otpsendNo" value="No" class="selectgroup-input">
                    <span class="selectgroup-button">No</span>
                </label>
            </div>
        </div>
        
        <div class="mb-3 col-md-6">
            <h5 class="text-dark">Send me email when i get profit.</h5>
            <div class="selectgroup">
                <label class="selectgroup-item">
                    <input type="radio" name="roiemail" id="roiemailYes" value="Yes" class="selectgroup-input" checked="">
                    <span class="selectgroup-button">Yes</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="roiemail" id="roiemailNo" value="No" class="selectgroup-input">
                    <span class="selectgroup-button">No</span>
                </label>
            </div>
        </div>
        <div class="mb-3 col-md-6">
            <h5 class="text-dark">Send me email when my investment plan expires.</h5>
            <div class="selectgroup">
                <label class="selectgroup-item">
                    <input type="radio" name="invplanemail" id="invplanemailYes" value="Yes" class="selectgroup-input" checked="">
                    <span class="selectgroup-button">Yes</span>
                </label>
                <label class="selectgroup-item">
                    <input type="radio" name="invplanemail" id="invplanemailNo" value="No" class="selectgroup-input">
                    <span class="selectgroup-button">No</span>
                </label>
            </div>
        </div>
        <div class="mt-2 col-12">
            <button type="submit" class="px-5 btn btn-primary">Save</button>
        </div>
    </div>
    
</form>



<script>
    document.getElementById('otpsendNo').checked = true;
</script> 





    <script>
        document.getElementById('roiemailYes').checked = true;
    </script>    


    <script>
        document.getElementById('invplanemailYes').checked = true;
    </script>    



<script>
    
    $('#updateemailpref').on('submit', function() {
       // alert('love');
        $.ajax({
            url: "https://stockmarket-hq.com/account/dashboard/update-email-preference",
            type: 'POST',
            data: $('#updateemailpref').serialize(),
            success: function(response) {
                if (response.status === 200) {
                    $.notify({
                        // options
                        icon: 'flaticon-alarm-1',
                        title: 'Success',
                        message: response.success,
                    },{
                        // settings
                        type: 'success',
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                        delay: 5000,
                        timer: 1000,
                        url_target: '_blank',
                        mouse_over: null,
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                        },
    
                    });
                } else {
                   
                }
            },
            error: function(data) {
                console.log(data);
            },
    
        });
    });
</script>									</div>
								</div>
                            </div>
                        </div>
					</div>
				</div>	
			</div>
@include('user.footer')
				