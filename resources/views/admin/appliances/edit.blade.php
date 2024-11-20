@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Edit Appliance</h1>
            </div>
            <div class="mb-5 row">
                <div class="col-lg-12">
                    <div class="p-3 applianced bg-light">
                        <form action="{{ route('admin.appliances.update', $appliance->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group col-md-6">
                                <label for="name">Appliance Name</label>
                                <input type="text" class="form-control text-dark bg-light"
                                    placeholder="Enter Appliance Name" id="name" name="name"
                                    value="{{ old('name', $appliance->name) }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="category_id">Category</label>
                                <select id="category_id" name="category_id" class="form-control text-dark bg-light"
                                    required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $appliance->category_id)
                                        == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="price">Price</label>
                                <input type="number" class="form-control text-dark bg-light" placeholder="Enter Price"
                                    id="price" name="price" value="{{ old('price', $appliance->price) }}" required
                                    step="0.01">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="sku">SKU</label>
                                <input type="text" class="form-control text-dark bg-light" placeholder="Enter SKU"
                                    id="sku" name="sku" value="{{ old('sku', $appliance->sku) }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control text-dark bg-light"
                                    placeholder="Enter Stock Quantity" id="stock" name="stock"
                                    value="{{ old('stock', $appliance->stock) }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="description">Description</label>
                                <textarea class="form-control text-dark bg-light"
                                    placeholder="Enter Appliance Description" id="description" name="description"
                                    rows="4">{{ old('description', $appliance->description) }}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="image">Appliance Image</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                                @if($appliance->image)
                                <div class="mt-2">
                                    <img src="{{ asset($appliance->image) }}" alt="Current Image"
                                        style="max-width: 100px;">
                                </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update Appliance</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')