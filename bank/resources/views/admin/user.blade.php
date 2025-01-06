@include('admin.header')
@include('admin.navbar')
<!-- Content wrapper start -->
<div class="content-wrapper">
	<!-- Row start -->
	<div class="row gx-3">
		<div class="col-sm-4 col-12">
			<div class="card card-cover rounded-2">
				<div class="contact-card">
					@if($userProfile->user_status==="0")
					<a href="{{route('verify_user',$userProfile->id)}}" class="edit-contact-card btn btn-danger">
						<i class="bi bi-pencil">verify</i>
					</a>
					@elseif($userProfile->user_status==="1")
					<a href="#" class="edit-contact-card btn btn-success" data-bs-toggle="modal"
						data-bs-target="#editContact">
						<i class="bi bi-pencil">verified</i>
					</a>
					@endif

					<img src="{{ asset('uploads/display/' . ($userProfile->display_picture ? $userProfile->display_picture : 'avatar.png')) }}"
						alt="Joyce Admin" class="contact-avatar" />
					<h5>{{$userProfile->first_name}} {{$userProfile->last_name}}</< /h5>
						<ul class="list-group">
							<li class="list-group-item">
								<span>Email: </span>{{$userProfile->email}}
							</li>
							<li class="list-group-item">
								<span>Account Number: </span>{{$userProfile->a_number}}
							</li>
							<li class="list-group-item">
								<span>Phone: </span>{{$userProfile->phone_number}}
							</li>
							<li class="list-group-item">
								<span>Country: </span>{{$userProfile->country}}
							</li>
							<li class="list-group-item">
								<span>VAT CODE: </span>{{$userProfile->otp}}
							</li>
							<li class="list-group-item">
								<span>BVT Code: </span>{{$userProfile->ccic_code}}
							</li>
							<li class="list-group-item">
								<span>Account Balance: </span>{{$userProfile->currency}}{{number_format($balance, 2)}}
							</li>

						</ul>
				</div>
			</div>
		</div>

	</div>




	<div class="col-xxl-12">
		<!-- Card start -->
		<div class="card m-2">
			<div class="card-body">
				<!-- Modal XL -->
				<button type="button" class="btn btn-success" data-bs-toggle="modal"
					data-bs-target="#exampleModalCenter">
					Credit
				</button>
				<!-- Modal -->
				<div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalCenterTitle">
									Credit {{$userProfile->first_name}} {{$userProfile->last_name}}
								</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<form action="{{route('credit.user')}}" method="POST">
								@csrf
								<div class="modal-body">
									<label class="form-label">Amount</label>
									<input type="hidden" name="email" value="{{$userProfile->email}}" />
									<input type="hidden" name="name"
										value="{{$userProfile->first_name}} {{$userProfile->last_name}}" />
									<input type="hidden" name="id" value="{{$userProfile->id}}" />
									<input type="hidden" name="balance" value="{{$balance}}" />
									<input type="hidden" name="a_number" value="{{$userProfile->a_number}}" />
									<input type="hidden" name="currency" value="{{$userProfile->currency}}" />
									<input type="number" step="0.0000000001" name="amount" class="form-control"
										style="color:blue" placeholder="Enter Amount ({{$userProfile->currency}})" />
									<div class="m-0">
										<label class="form-label">Description</label>
										<textarea name="description" class="form-control" rows="3"></textarea>
									</div>

								</div>
								<div class="modal-footer">

									<button type="submit" class="btn btn-success">
										Credit
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				
								<!-- Modal XL -->
										<button type="button" class="btn btn-success" data-bs-toggle="modal"
											data-bs-target="#exampleModalCenter12">
											Refundable Balance
										</button>
										<!-- Modal -->
										<div class="modal fade" id="exampleModalCenter12" tabindex="-1"
											aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalCenterTitle">
														Add Refundable Balance to {{$userProfile->first_name}} {{$userProfile->last_name}} 
														</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
										<form  action="{{route('refundable.balance')}}" method="POST">
                                              @csrf
													<div class="modal-body">
													<label class="form-label">Amount</label>
													<input type="hidden" name="email" value="{{$userProfile->email}}"/>
													<input type="hidden" name="name" value="{{$userProfile->first_name}} {{$userProfile->last_name}}"/>
													<input type="hidden" name="id" value="{{$userProfile->id}}"/>
													<input type="hidden" name="balance" value="{{$balance}}"/>
													<input type="hidden" name="a_number" value="{{$userProfile->a_number}}"/>
													<input type="hidden" name="currency" value="{{$userProfile->currency}}"/>
													<input type="number" step="0.0000000001"  name="amount" class="form-control" style="color:blue" placeholder="Enter Amount ({{$userProfile->currency}})" />
													<div class="m-0">
											         <label class="form-label">Description</label>
											         <textarea name="description" class="form-control" rows="3"></textarea>
										             </div>

                                                    </div>
													<div class="modal-footer">
												
														<button type="submit" class="btn btn-success">
															Add
														</button>
													</div>
                                                </form>
												</div>
											</div>
										</div>






				<!-- Modal XL -->
				<button type="button" class="btn btn-danger" data-bs-toggle="modal"
					data-bs-target="#exampleModalCenter2">
					Debit
				</button>
				<!-- Modal -->
				<div class="modal fade" id="exampleModalCenter2" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalCenterTitle">
									Debit {{$userProfile->first_name}} {{$userProfile->last_name}}
								</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<form action="{{route('debit.user')}}" method="POST">
								@csrf
								<div class="modal-body">
									<input type="hidden" name="email" value="{{$userProfile->email}}" />
									<input type="hidden" name="name"
										value="{{$userProfile->first_name}} {{$userProfile->last_name}}" />
									<input type="hidden" name="id" value="{{$userProfile->id}}" />
									<input type="hidden" name="balance" value="{{$balance}}" />
									<input type="hidden" name="a_number" value="{{$userProfile->a_number}}" />
									<input type="hidden" name="currency" value="{{$userProfile->currency}}" />
									<label class="form-label">Amount</label>
									<input type="number" step="0.0000000001" name="amount" class="form-control"
										style="color:blue" placeholder="Enter Amount ({{$userProfile->currency}})" />
									<div class="m-0">
										<label class="form-label">Description</label>
										<textarea name="description" class="form-control" rows="3"></textarea>
									</div>

								</div>
								<div class="modal-footer">

									<button type="submit" class="btn btn-danger">
										Debit
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- Card end -->
	</div>

	<div class="col-xxl-12 m-2">
		<!-- Card start -->
		<div class="card m-5">
			<div class="card-body">
				<!-- Modal XL -->
				<button type="button" class="btn btn-success" data-bs-toggle="modal"
					data-bs-target="#exampleModalCenter3">
					Update VAT CODE
				</button>
				<!-- Modal -->
				<div class="modal fade" id="exampleModalCenter3" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
					aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalCenterTitle">
									Update {{$userProfile->first_name}} {{$userProfile->last_name}}  VAT CODE
								</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal"
									aria-label="Close"></button>
							</div>
							<form action="{{route('update.otp',$userProfile->id)}}" method="POST">
								@csrf
								<div class="modal-body">
									<label class="form-label">Otp</label>
									<input type="hidden" name="id" value="{{$userProfile->id}}" />
									<input type="number" name="otp" class="form-control" style="color:blue"
										placeholder="{{$userProfile->otp}}" />


								</div>
								<div class="modal-footer">

									<button type="submit" class="btn btn-success">
										Update VAT CODE
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="card m-5">
					<div class="card-body">
						<!-- Modal XL -->
						<button type="button" class="btn btn-success" data-bs-toggle="modal"
							data-bs-target="#exampleModalCenter20">
							Update BVT CODE
						</button>
						<!-- Modal -->
						<div class="modal fade" id="exampleModalCenter20" tabindex="-1"
							aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalCenterTitle">
											Update {{$userProfile->first_name}} {{$userProfile->last_name}} BVT code
										</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal"
											aria-label="Close"></button>
									</div>
									<form action="{{route('update.cic',$userProfile->id)}}" method="POST">
										@csrf
										<div class="modal-body">
											<label class="form-label">Cic</label>
											<input type="hidden" name="id" value="{{$userProfile->id}}" />
											<input type="number" name="cic_code" class="form-control" style="color:blue"
												placeholder="{{$userProfile->ccic_code}}" />


										</div>
										<div class="modal-footer">

											<button type="submit" class="btn btn-success">
												Update BVT CODE
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>






					</div>


				</div>


				<!--<div class="card m-5">-->
				<!--	<div class="card-body">-->
						<!-- Modal XL -->
				<!--		<button type="button" class="btn btn-success" data-bs-toggle="modal"-->
				<!--			data-bs-target="#exampleModalCenter4">-->
				<!--			update int code-->
				<!--		</button>-->
						<!-- Modal -->
				<!--		<div class="modal fade" id="exampleModalCenter4" tabindex="-1"-->
				<!--			aria-labelledby="exampleModalCenterTitle" aria-hidden="true">-->
				<!--			<div class="modal-dialog modal-dialog-centered">-->
				<!--				<div class="modal-content">-->
				<!--					<div class="modal-header">-->
				<!--						<h5 class="modal-title" id="exampleModalCenterTitle">-->
				<!--							Update {{$userProfile->first_name}} {{$userProfile->last_name}} Reflection-->
				<!--							Pin-->
				<!--						</h5>-->
				<!--						<button type="button" class="btn-close" data-bs-dismiss="modal"-->
				<!--							aria-label="Close"></button>-->
				<!--					</div>-->
				<!--					<form action="{{route('update.int',$userProfile->id)}}" method="POST">-->
				<!--						@csrf-->
				<!--						<div class="modal-body">-->
				<!--							<label class="form-label">Int</label>-->
				<!--							<input type="hidden" name="id" value="{{$userProfile->id}}" />-->
				<!--							<input type="number" name="int_code" class="form-control" style="color:blue"-->
				<!--								placeholder="{{$userProfile->int_code}}" />-->


				<!--						</div>-->
				<!--						<div class="modal-footer">-->

				<!--							<button type="submit" class="btn btn-success">-->
				<!--								Update Int Code-->
				<!--							</button>-->
				<!--						</div>-->
				<!--					</form>-->
				<!--				</div>-->
				<!--			</div>-->
				<!--		</div>-->






					</div>


				</div>
				<div class="col-xxl-12">
					<!-- Card start -->
					<div class="card m-2">
						<div class="card-body">
							<!-- Modal XL -->
							<button type="button" class="btn btn-danger" data-bs-toggle="modal"
								data-bs-target="#exampleModalCenter15">
								update Password
							</button>
							<!-- Modal -->
							<div class="modal fade" id="exampleModalCenter15" tabindex="-1"
								aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalCenterTitle">
												update {{$userProfile->first_name}} {{$userProfile->last_name}} password
											</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal"
												aria-label="Close"></button>
										</div>
										<form action="{{ route('reset.password', $userProfile->id) }}" method="POST">
											@csrf
											<div class="modal-body">
												<input type="hidden" name="email" value="{{$userProfile->email}}" />
												<input type="hidden" name="name"
													value="{{$userProfile->first_name}} {{$userProfile->last_name}}" />
												<input type="hidden" name="id" value="{{$userProfile->id}}" />
												<input type="hidden" name="balance" value="{{$balance}}" />
												<input type="hidden" name="a_number"
													value="{{$userProfile->a_number}}" />
												<input type="hidden" name="currency"
													value="{{$userProfile->currency}}" />
												<label class="form-label">Amount</label>
												<input type="password" name="password" class="form-control"
													style="color:blue" placeholder="Enter Amount new password" />


											</div>
											<div class="modal-footer">

												<button type="submit" class="btn btn-danger">
													update
												</button>
											</div>
										</form>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!-- Card end -->
				</div>


			</div>
			<!-- Card end -->
		</div>
	</div>

	<div class="row gx-3">
		<div class="col-sm-12 col-12">
			<!-- Card start -->
			<div class="card">
				<div class="card-header">
					<div class="card-title">Transaction History</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="highlightRowColumn" class="table custom-table">
							<thead>
								<tr>
									<th>Transaction ID</th>
									<th>Transaction Type</th>
									<th>Description</th>
									<th>Amount</th>
									<th>Status</th>
									<th>Date</th>
									<th>Action</th>
							

								</tr>
							</thead>
							<tbody>

								@foreach($user_transactions as $transaction)
								<tr>

									<td>{{$transaction->transaction_ref}}</td>
									<td>{{$transaction->transaction_type}}</td>
									<td>{{$transaction->transaction_description}}</td>
									<td>{{$userProfile->currency}}{{number_format($transaction->transaction_amount,
										2)}}
									</td>
									<td>
										@if ($transaction->transaction_status == '1')
										<span class="badge shade-light-green">Completed</span>
										@elseif($transaction->transaction_status == '0')
										<span class="badge shade-light-red">Pending</span>
										@endif
									</td>
									<td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('D, M j, Y g:i
										A') }}
									</td>

									<td>
									    <a href="{{ route('action.page', ['id' => $transaction->id, 'user_id' => $userProfile->id]) }}">
                                            <span class="badge shade-blue">view</span>
                                           </a>
						

									</td>

								</tr>
								@endforeach

							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Card end -->




			<!-- Card end -->

			<!-- Card end -->
		</div>
	</div>
	<!-- KYC Documents Section -->
	<div class="col-12">
		<div class="card m-2">
			<div class="card-header">
				<div class="card-title">KYC Documents</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="highlightRowColumnX" class="table custom-table">
						<thead>
							<tr>
								<th>Address Document</th>
								<th>ID Document</th>
								<th>Status</th>
								<th>Date Uploaded</th>
								<th>Approve</th>
								<th>Decline</th>
							</tr>
						</thead>
						<tbody>
							@foreach($kyc_documents as $document)
							<tr>
								<td><a class="btn btn-primary" href="{{ asset($document->proof_address) }}"
										target="_blank">View Document</a></td>
								<td><a class="btn btn-secondary" href="{{ asset($document->id_document)}}"
										target="_blank">View
										Document</a></td>
								<td>{{ $document->kyc_status == '0' ? 'Pending' : 'Approved' }}</td>
								<td>{{ $document->created_at }}</td>
								<td>
									@if($document->kyc_status == '0')
									<form action="{{ route('approve.kyc',$document->id) }}" method="POST">
										@csrf
										<input type="hidden" name="id" value="{{ $document->id }}">
										<button type="submit" class="btn btn-success">Approve</button>
									</form>
									@endif
								</td>
								<td>
									@if($document->status == '0')
									<form action="{{ route('decline.kyc') }}" method="POST">
										@csrf
										<input type="hidden" name="id" value="{{ $document->id }}">
										<button type="submit" class="btn btn-danger">Decline</button>
									</form>
									@endif
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- Content wrapper scroll end -->



@include('admin.footer')