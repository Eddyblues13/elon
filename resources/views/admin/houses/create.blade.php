@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Create A New House</h1>
            </div>
            <div class="mb-5 row">
                <div class="col-lg-12">
                    <div class="p-3 card bg-light">
                        <form action="{{ route('admin.houses.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group col-md-6">
                                <label for="slug">House Slug</label>
                                <input type="text" class="form-control text-dark bg-light"
                                    placeholder="Enter House Slug" id="slug" name="slug" value="{{ old('slug') }}"
                                    required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="state">State</label>
                                <input type="text" class="form-control text-dark bg-light" placeholder="Enter State"
                                    id="state" name="state" value="{{ old('state') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="category_id">Category</label>
                                <select class="form-control text-dark bg-light" id="category_id" name="category_id">
                                    <!-- Add category options here -->
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input type="text" class="form-control text-dark bg-light" placeholder="Enter Address"
                                    id="address" name="address" value="{{ old('address') }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="description">Description</label>
                                <textarea class="form-control text-dark bg-light" placeholder="Enter House Description"
                                    id="description" name="description" rows="4">{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="square">Square Footage</label>
                                <input type="number" class="form-control text-dark bg-light"
                                    placeholder="Enter Square Footage" id="square" name="square"
                                    value="{{ old('square') }}" required step="0.01">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="bath">Bathrooms</label>
                                <input type="number" class="form-control text-dark bg-light"
                                    placeholder="Enter Number of Bathrooms" id="bath" name="bath"
                                    value="{{ old('bath') }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="bed">Bedrooms</label>
                                <input type="number" class="form-control text-dark bg-light"
                                    placeholder="Enter Number of Bedrooms" id="bed" name="bed" value="{{ old('bed') }}"
                                    required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="original_price">Original Price</label>
                                <input type="number" class="form-control text-dark bg-light"
                                    placeholder="Enter Original Price" id="original_price" name="original_price"
                                    value="{{ old('original_price') }}" step="0.01">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="selling_price">Selling Price</label>
                                <input type="number" class="form-control text-dark bg-light"
                                    placeholder="Enter Selling Price" id="selling_price" name="selling_price"
                                    value="{{ old('selling_price') }}" step="0.01">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="rating">Rating</label>
                                <input type="number" class="form-control text-dark bg-light" placeholder="Enter Rating"
                                    id="rating" name="rating" value="{{ old('rating') }}" step="0.1">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="trending">Trending</label>
                                <select class="form-control text-dark bg-light" id="trending" name="trending">
                                    <option value="0" {{ old('trending')==0 ? 'selected' : '' }}>No</option>
                                    <option value="1" {{ old('trending')==1 ? 'selected' : '' }}>Yes</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status">Status</label>
                                <select class="form-control text-dark bg-light" id="status" name="status">
                                    <option value="active" {{ old('status')=='active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive" {{ old('status')=='inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="images">House Images</label>
                                <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                            </div>

                            <button type="submit" class="btn btn-primary">Add House</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')