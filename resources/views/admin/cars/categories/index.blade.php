<!-- resources/views/admin/categories/index.blade.php -->

@include('admin.header')

<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Categories</h1>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('admin.cars.index') }}" class="btn btn-warning btn-lg"><i
                            class='fas fa-plus-circle'></i>Back</a>
                </div>

            </div>
            <div class="mb-5">
                <div class="text-right mb-4">
                    <a href="{{ route('admin.cars.categories.create') }}" class="btn btn-primary"><i
                            class='fas fa-plus-circle'></i>Add New Category</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered bg-light shadow">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>
                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.cars.categories.destroy', $category->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No categories available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')