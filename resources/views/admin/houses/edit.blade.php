@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Edit House</h1>
            </div>
            <div class="mb-5 row">
                <div class="col-lg-12">
                    <div class="p-3 card bg-light">
                        <form action="{{ route('admin.houses.update', $house->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group col-md-6">
                                <label for="slug">House Slug</label>
                                <input type="text" class="form-control text-dark bg-light" placeholder="Enter House Slug" id="slug" name="slug" value="{{ old('slug', $house->slug) }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="state">State</label>
                                <input type="text" class="form-control text-dark bg-light" placeholder="Enter State" id="state" name="state" value="{{ old('state', $house->state) }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="category_id">Category</label>
                                <select class="form-control text-dark bg-light" id="category_id" name="category_id">
                                    <!-- Populate category options here, with the current one selected -->
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $house->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control text-dark bg-light" placeholder="Enter Address" id="address" name="address" value="{{ old('address', $house->address) }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="description">Description</label>
                                <textarea class="form-control text-dark bg-light" placeholder="Enter House Description" id="description" name="description" rows="4">{{ old('description', $house->description) }}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="square">Square Footage</label>
                                <input type="number" class="form-control text-dark bg-light" placeholder="Enter Square Footage" id="square" name="square" value="{{ old('square', $house->square) }}" required step="0.01">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="bath">Bathrooms</label>
                                <input type="number" class="form-control text-dark bg-light" placeholder="Enter Number of Bathrooms" id="bath" name="bath" value="{{ old('bath', $house->bath) }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="bed">Bedrooms</label>
                                <input type="number" class="form-control text-dark bg-light" placeholder="Enter Number of Bedrooms" id="bed" name="bed" value="{{ old('bed', $house->bed) }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="original_price">Original Price</label>
                                <input type="number" class="form-control text-dark bg-light" placeholder="Enter Original Price" id="original_price" name="original_price" value="{{ old('original_price', $house->original_price) }}" step="0.01">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="selling_price">Selling Price</label>
                                <input type="number" class="form-control text-dark bg-light" placeholder="Enter Selling Price" id="selling_price" name="selling_price" value="{{ old('selling_price', $house->selling_price) }}" step="0.01">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="rating">Rating</label>
                                <input type="number" class="form-control text-dark bg-light" placeholder="Enter Rating" id="rating" name="rating" value="{{ old('rating', $house->rating) }}" step="0.1">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="trending">Trending</label>
                                <select class="form-control text-dark bg-light" id="trending" name="trending">
                                    <option value="0" {{ old('trending', $house->trending) == 0 ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ old('trending', $house->trending) == 1 ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select class="form-control text-dark bg-light" id="status" name="status">
                                    <option value="active" {{ old('status', $house->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $house->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="images">House Images</label>
                                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                                <small class="form-text text-muted">Leave blank if not updating images.</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Update House</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('admin.footer')
