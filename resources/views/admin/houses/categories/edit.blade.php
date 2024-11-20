<!-- resources/views/admin/categories/edit.blade.php -->

@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
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
                <h1 class="title1 text-dark">Edit Category</h1>
            </div>
            <div class="mb-5 row">
                <div class="col-lg-12">
                    <div class="p-3 housed bg-light">
                        <form action="{{ route('admin.houses.categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group col-md-6">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control text-dark bg-light"
                                    placeholder="Enter Category Name" id="name" name="name"
                                    value="{{ $category->name }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="description">Description</label>
                                <textarea class="form-control text-dark bg-light"
                                    placeholder="Enter Category Description" id="description" name="description"
                                    rows="3">{{ $category->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')