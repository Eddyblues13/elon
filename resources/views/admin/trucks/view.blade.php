@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif

            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Trucks</h1>
            </div>

            <div class="mb-5 row">
                @foreach($trucks as $truck)
                <div class="col-lg-4">
                    <div class="pricing-table purple border p-4 truckd bg-light shadow">
                        <div class="price-tag">
                            <center><i>truck Name: {{ $truck->name }}</i></center>
                        </div>

                        <!-- truck Image -->
                        <div class="text-center mb-3">
                            @if($truck->image)
                            <img src="{{ asset($truck->image) }}" alt="{{ $truck->name }}" class="img-fluid"
                                style="max-width: 50%; height: auto;">
                            @else
                            <img src="{{ asset('images/default-truck.jpg') }}" alt="Default Image" class="img-fluid"
                                style="max-width: 50%; height: auto;">
                            @endif
                        </div>

                        <!-- truck Details -->
                        <div class="pricing-features">
                            <div class="feature text-dark">Category: <span class="text-dark">{{ $truck->category->name
                                    }}</span></div>
                            <div class="feature text-dark">Price: <span class="text-dark">${{
                                    number_format($truck->price,
                                    2) }}</span></div>
                            <div class="feature text-dark">Year: <span class="text-dark">{{ $truck->year }}</span></div>
                            <div class="feature text-dark">Model: <span class="text-dark">{{ $truck->model }}</span>
                            </div>
                            <div class="feature text-dark">Brand: <span class="text-dark">{{ $truck->brand }}</span>
                            </div>
                            <div class="feature text-dark">Description: <span class="text-dark">{{ $truck->description
                                    }}</span></div>
                            <br>
                            <div class="feature text-dark">Status:
                                <span class="text-dark">
                                    @if($truck->stock > 0)
                                    <span class="badge badge-success">In Stock</span>
                                    @else
                                    <span class="badge badge-danger">Out of Stock</span>
                                    @endif
                                </span>
                            </div>
                            <br>
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-center">
                            <a href="{{ route('admin.trucks.edit', $truck->id) }}" class="btn btn-primary"><i
                                    class="text-white fa fa-pencil"></i> Edit</a> &nbsp;
                            <form action="{{ route('admin.trucks.destroy', $truck->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="text-white fa fa-trash"></i>
                                    Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('admin.footer')