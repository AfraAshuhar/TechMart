@extends('../layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Manage Posts</h2>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Create Post Form --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Create New Post</h5>
            <!-- <form action="{{ route('crud.store') }}" method="POST"> -->
            <form action="{{ route('crud.store') }}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                        <label class="form-label">Product Image</label>
                        <input type="file" class="form-control" name="image" required>
                </div>

                <div class="mb-3">
                    <label for="detail" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
    </div>

    {{-- List of Posts --}}
    <h4>Existing Posts</h4>
    @if($posts->count() > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td> @if($post->image)
                        <img src="{{ asset($post->image) }}" width="80">
                        @else
                            No image
                        @endif
                    </td>
                    <td>{{ $post->description }}</td>
                    <td>
                        <a href="{{ route('crud.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('crud.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this post?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No posts found.</p>
    @endif
</div>
@endsection
