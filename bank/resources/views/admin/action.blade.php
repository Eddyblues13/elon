
@include('admin.header')
@include('admin.navbar')
<!-- Content wrapper start -->
					<div class="content-wrapper">
	<!-- Row start -->




                                                   			
									<div class="card m-2">
									<div class="card-body">
                                                   
                                            <a href="" data-bs-toggle="modal"
											data-bs-target="#action"><span class="badge shade-blue">view</span></a>
											
								
										<div class="modal fade" id="action" tabindex="-1"
											aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalCenterTitle">
														Actions
														</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
										<form  action="{{url('action/'.$transaction->id)}}" method="POST">
                                              @csrf
													<div class="modal-body">
													<label class="form-label">Amount</label>
													<input type="hidden" name="email" value="{{$userProfile->email}}"/>
													<input type="hidden" name="name" value="{{$userProfile->first_name}} {{$userProfile->last_name}}"/>
													<input type="hidden" name="id" value="{{$userProfile->id}}"/>
													<input type="hidden" name="balance" value="{{$balance}}"/>
													<input type="hidden" name="a_number" value="{{$userProfile->a_number}}"/>
													<input type="hidden" name="amount" value="{{$userProfile->currency}}{{$transaction->transaction_amount}}"/>
													<input type="number" step="0.0000000001"   class="form-control" style="color:blue" placeholder="{{$userProfile->currency}}{{number_format($transaction->transaction_amount, 2)}}" readonly/>
													<div class="m-0">
											          <div class="form-group">
                                                              <label for="exampleFormControlSelect1">Select Action</label>
                                                              <select name="action" class="form-control" id="exampleFormControlSelect1">
                                                                      <option value="paid">Paid</option>
                                                                      <option value="reject">Reject</option>
                                                                      <option value="on-hold">On-hold</option>
                                                                      <option value="delete">Delete</option>
                                                                      
                                                                </select>
                                                               </div>
										             </div>

                                                    </div>
													<div class="modal-footer">
												
														<button type="submit" class="btn btn-success">
															proceed
														</button>
													</div>
                                                </form>
												</div>
											</div>
										</div>
						
						
						
								<!-- Card end -->

								<!-- Card end -->
							</div>
						</div>
											
											
											
											
								</div>
				

				

@include('admin.footer')