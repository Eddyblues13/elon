@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('success'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Edit Car</h1>
            </div>

            <div class="mb-5 row">
                <div class="col-lg-12">
                    <div class="p-3 card bg-light">
                        <form action="{{ route('admin.cars.update', $car->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group col-md-6">
                                <label for="name">Car Name</label>
                                <input type="text" class="form-control text-dark bg-light" placeholder="Enter Car Name"
                                    id="name" name="name" value="{{ $car->name }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="category_id">Category</label>
                                <select id="category_id" name="category_id" class="form-control text-dark bg-light"
                                    required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $car->category_id == $category->id ?
                                        'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input type="number" class="form-control text-dark bg-light" placeholder="Enter Price"
                                    id="price" name="price" value="{{ $car->price }}" required step="0.01">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="year">Year</label>
                                <input type="number" class="form-control text-dark bg-light" placeholder="Enter Year"
                                    id="year" name="year" value="{{ $car->year }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="model">Model</label>
                                <input type="text" class="form-control text-dark bg-light" placeholder="Enter Model"
                                    id="model" name="model" value="{{ $car->model }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="brand">Brand</label>
                                <input type="text" class="form-control text-dark bg-light" placeholder="Enter Brand"
                                    id="brand" name="brand" value="{{ $car->brand }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="description">Description</label>
                                <textarea class="form-control text-dark bg-light" placeholder="Enter Car Description"
                                    id="description" name="description" rows="4">{{ $car->description }}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="image">Car Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                                @if($car->image)
                                <small class="form-text text-muted">Current Image:</small>
                                <img src="{{ asset($car->image) }}" alt="{{ $car->name }}" width="100">
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update Car</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')