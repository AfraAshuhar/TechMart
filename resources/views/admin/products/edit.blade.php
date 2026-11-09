@extends('../layout.app')


@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Edit Product</h2>
   
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- EDIT FORM --}}
   <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" value="{{ $product->title }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" value="{{ $product->price }}" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label">Stock</label>
        <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
    </div>

    <!-- <div class="mb-3">
        <label class="form-label">Category</label>
                        <select class="form-control" name="category_id" required>
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                            @endforeach
                        </select>
    </div> -->
    <div class="mb-3">
    <label class="form-label">Category</label>
    <select class="form-control" name="category_id" required>
        <option value="">-- Select Category --</option>
        @foreach ($categories as $cat)
            <option value="{{ $cat->id }}" 
                {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                {{ $cat->title }}
            </option>
        @endforeach
    </select>
</div>


    <!-- <div class="mb-3">
        <label class="form-label">Image</label>
        <input type="file" name="image" class="form-control">
        @if($product->image)
            <img src="{{ asset('uploads/products/' . $product->image) }}" width="100" class="mt-2">
        @endif
    </div> -->
    <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" id="fileInput" style="display:none;">
    <button type="button" class="btn btn-secondary" onclick="document.getElementById('fileInput').click();">
        Choose New Image
    </button>
    @if($product->image)
        <div class="mt-2">
            <img src="{{ asset('uploads/products/' . $product->image) }}" width="100">
        </div>
    @endif
</div>


    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Product</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary ms-2">Cancel</a>
</form>


   {{-- DELETE BUTTON --}}
<form action="{{ route('admin.products.delete', $product->id) }}" method="POST"
      onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete Product</button>
</form>


</div>
@endsection
