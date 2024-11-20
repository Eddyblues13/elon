<!-- resources/views/admin/categories/create.blade.php -->

@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
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
                <h1 class="title1 text-dark">Add New Category</h1>
            </div>
            <div class="mb-5 row">
                <div class="col-lg-12">
                    <div class="card bg-light p-4 shadow">
                        <form action="{{ route('admin.appliances.categories.store') }}" method="POST">
                            @csrf

                            <div class="form-group col-md-6">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control text-dark bg-light" id="name" name="name"
                                    placeholder="Enter Category Name" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="description">Description</label>
                                <textarea class="form-control text-dark bg-light" id="description" name="description"
                                    placeholder="Enter Description (optional)"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')