@extends('layout.master')

@section('title','Manage Products')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Manage Products</h2>

    <!-- Add New Product Button -->
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Add New Product</a>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($products->count() > 0)
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price (LKR)</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <!-- <td>{{ $product->categories->title ?? 'N/A' }}</td> -->
                <td>{{ $product->category ? $product->category->title : 'No Category' }}</td>

                <td>
                    @if($product->image)
                        <img src="{{ asset('uploads/products/'.$product->image) }}" width="80" alt="{{ $product->title }}">
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    <!-- Edit Button -->
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>

                    <!-- Delete Button -->
                    <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this product?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>No products found.</p>
    @endif

</div>
@endsection
