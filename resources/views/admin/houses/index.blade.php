@include('admin.header')
<div class="main-panel">
    <div class="content bg-light">
        <div class="page-inner">
            @if(session('success'))
            <div class="alert alert-success mb-2">{{ session('success') }}</div>
            @endif

            <div class="mt-2 mb-4">
                <h1 class="title1 text-dark">Houses</h1>
            </div>

            <div class="row mb-3">
                <div class="col-12">
                    <a href="{{ route('admin.houses.create') }}" class="float-right btn btn-primary">
                        <i class='fas fa-plus-circle'></i> Create A New House
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 shadow card p-4 bg-light">
                    <div class="table-responsive">
                        <table class="table table-hover text-dark">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($houses as $house)
                                <tr>
                                    <td>{{ $house->slug }}</td>
                                    <td>{{ $house->state }}</td>
                                    <td>{{ $house->selling_price }}</td>
                                    <td>
                                        @if($house->houseImages->isNotEmpty())
                                        <img src="{{ asset('storage/' . $house->houseImages->first()->image_path) }}"
                                            width="100" alt="House Image">
                                        @else
                                        No Image
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.houses.edit', $house->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.houses.destroy', $house->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $houses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')