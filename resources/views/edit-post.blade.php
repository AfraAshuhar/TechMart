@extends('../layout.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Post</h2>

    <form action="{{ route('crud.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control">
        </div>

         <!-- <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" id="fileInput" style="display:none;">
    <button type="button" class="btn btn-secondary" onclick="document.getElementById('fileInput').click();">
        Choose New Image
    </button>
    @if($post->image)
        <div class="mt-2">
            <img src="{{ asset('uploads/posts/' . $post->image) }}" width="100">
        </div>
    @endif
</div> -->

<div class="mb-3">
    <label class="form-label">Image</label>

    <input type="file" name="image" id="fileInput" style="display:none;">

    <button type="button" class="btn btn-secondary"
        onclick="document.getElementById('fileInput').click();">
        Choose New Image
    </button>

    @if($post->image)
        <div class="mt-2">
            <img src="{{ asset($post->image) }}" width="100">
        </div>
    @endif
</div>



        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ $post->description }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('crud.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
