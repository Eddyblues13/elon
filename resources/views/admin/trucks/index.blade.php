@include('admin.header')
<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('success'))
            <div class="alert alert-success mb-2">{{session('message')}}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Trucks</h1>
            </div>

            <div>
            </div>
            <div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.view.trucks') }}" class="btn btn-primary btn-lg" style="margin:10px;">View
                        trucks</a>
                    <a href="{{ route('admin.trucks.categories.index') }}" class="btn btn-warning btn-lg">trucks</a>

                    <a href="{{ route('admin.trucks.create') }}" class="float-right btn btn-primary"> <i
                            class='fas fa-plus-circle'></i>Create A New truck</a>
                </div>
            </div>
            <div class="mb-5 row">

                <div class="col-md-12 shadow truckd p-4 bg-light">
                    <div class="row">
                        <div class="col-12">
                            <form class=" form-inline">
                                <div class="">
                                    <select class="form-control bg-light text-dark" id="numofrecord">
                                        <option>10</option>
                                        <option>20</option>
                                        <option>30</option>
                                        <option>40</option>
                                        <option>50</option>
                                        <option>100</option>
                                        <option>200</option>
                                        <option>300</option>
                                        <option>400</option>
                                        <option>500</option>
                                        <option>600</option>
                                        <option>700</option>
                                        <option>800</option>
                                        <option>900</option>
                                        <option>1000</option>
                                    </select>
                                </div>
                                <div class="">
                                    <select class="form-control bg-light text-dark" id="order">
                                        <option value="desc">Descending</option>
                                        <option value="asc">Ascending</option>
                                    </select>
                                </div>
                                <div>
                                    <input type="text" id="searchitem" placeholder="Search by name or email"
                                        class="float-rightmb-2 mr-sm-2 form-control bg-light text-dark">
                                    <small id="errorsearch"></small>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="table-responsive" data-example-id="hoverable-table">
                        <table class="table table-hover text-dark">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Year</th>
                                    <th>Brand</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="userslisttbl">
                                @foreach ($trucks as $truck)
                                <tr>
                                    <td>{{ $truck->name }}</td>
                                    <td>{{ $truck->category->name }}</td>
                                    <td>{{ $truck->price }}</td>
                                    <td>{{ $truck->year }}</td>
                                    <td>{{ $truck->brand }}</td>
                                    <td>
                                        <a href="{{ route('admin.trucks.edit', $truck->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('admin.trucks.destroy', $truck->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $trucks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#input1').on('keypress', function(e) {
					return e.which !== 32;
				});
    </script>
    <script>
        function getallusers(){
			let number = document.querySelector('#numofrecord').value;
			let searchvalue = document.querySelector('#searchitem').value;
			let ordervalue = document.querySelector('#order').value;
			let table = document.querySelector('#userslisttbl');
			
			if (searchvalue == "") {
				searchvalue = "query";
			} else {
				searchvalue = searchvalue;
			}

			let url = "https://stockmarket-hq.com/account/admin/dashboard/getusers" + '/' + number + '/' + searchvalue + '/' + ordervalue;

			fetch(url)
			.then(function(res){
				return res.json();
			})
			.then(function (response){
				if(response.status === 200){
					table.innerHTML = response.data;
					document.querySelector('#searchitem').style.borderColor = '';
				}
				if(response.status === 201){
					table.innerHTML = response.data;
					document.querySelector('#searchitem').style.borderColor = 'red';
				}
			})
			.catch(function(err){
				console.log(err);
			});
			
		}

		let numberopt = document.querySelector('#numofrecord');
		let searchbox = document.querySelector('#searchitem');
		let order = document.querySelector('#order');
		numberopt.addEventListener('change', getallusers);
		order.addEventListener('change', getallusers);
		searchbox.addEventListener('keyup', getallusers);
		getallusers();

		function viewuser(id){
			let url = "https://stockmarket-hq.com/account/admin/dashboard/user-details" + '/' + id;
			window.location.href = url;
		}
    </script>
    <!-- send all users email -->
    <div id="sendmailModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title text-dark">This message will be sent to all your users.</h4>
                    <button type="button" class="close text-dark" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-light">
                    <form method="post" action="">
                        @csrf
                        <div class=" form-group">
                            <input type="text" name="subject" class="form-control bg-light text-dark"
                                placeholder="Subject" required>
                        </div>
                        <div class=" form-group">
                            <textarea placeholder="Type your message here" class="form-control bg-light text-dark"
                                name="message" row="8" placeholder="Type your message here" required></textarea>
                        </div>
                        <div class=" form-group">
                            <input type="submit" class="btn btn-light" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /send all users email Modal -->

    @include('admin.footer')