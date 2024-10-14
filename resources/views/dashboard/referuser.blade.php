@include('user.header')
<div class="main-panel bg-light">
            <div class="content bg-light">
                <div class="page-inner">
                    
                    
                    <div class="mt-2 mb-4 w3-card">
                      <div class="w3-right"> <a href="#" class="btn btn-sm btn-success"> Referals </a></div>  
                      <div class="float:left"> <a href="#" class="btn btn-sm btn-success">Transfer Funds</a></div>  
              
                    </div>
                    
                    
                    
                    
                    <div>
    </div>					<div>
    </div>                    
                    <div class="container">
                    <div class="row ">
                        <div class="col-md-12 text-center card bg-light shadow-lg p-3 text-dark">
                          
                    <strong style="font-size:10pt">You can refer users and gain commision using your referral link:</strong><br>
                                 
                                        <input type="text" class="form-control myInput readonly text-dark bg-light" value="https://stockmarket-hq.com/account/ref/{{Auth::user()->username}}" id="myInput" readonly style="border:1px solid green">
                                        <div style="float:right">
                                            <button class="btn btn-outline-secondary w3-right" onclick="myFunction()" type="button" id="button-addon2" style="width:100px;height:40px;border:1px solid green"><i class="fas fa-copy"></i> Copy</button>
                                      </div>
                    </div>
                    </div></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center card bg-light shadow-lg p-3 text-dark">
                            <div class="p-4 row">
                               <!-- <div class="col-md-8 offset-md-2 w3-card">
                                    <strong>You can refer users and gain commision using your referral link:</strong><br>
                                    <div class="mb-3 input-group">
                                        <input type="text" class="form-control myInput readonly text-dark bg-light" value="https://lockestocks.com/account/ref/eddyblues13" id="myInput" readonly>
                                        <div class="input-group">
                                            <button class="btn btn-outline-secondary" onclick="myFunction()" type="button" id="button-addon2"><i class="fas fa-copy"></i> Copy</button>
                                        </div>
                                    </div>
    
                                   <!-- <strong>or your Referral ID</strong><br>
                                    <h4 style="color:green;"> eddyblues13</h4> <br>
                                    <h3 class="title1">
                                        <small>You were referred by</small><br>
                                        <i class="fa fa-user fa-2x"></i><br>
                                        <small>blues wayne </small>
                                    </h3>--
                                </div>
                                -->
                                
                                <div class="mt-4 col-md-12">
                                    <h2 class="title1 text-dark text-left">Referal History.</h2>
                                    <div class="table-responsive table-bordered"> 
                                        <table class="table UserTable table-hover text-dark"> 
                                            <thead> 
                                                <tr>
                                                         <th>S/N</th> 
                                                    <th>Client name</th>
                                                    <th>Ref. level</th>
                                                      <th>Client status</th>
                                                    <th>Date registered</th>
                                                </tr>
                                            </thead> 
                                            <tbody> 
                                                
                                            </tbody> 
                                        </table>
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
    			
@include('user.footer')

