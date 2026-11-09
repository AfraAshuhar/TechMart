@extends('layout.master')

@section('title','Categories')

@section('content')
<h2 class="mb-4">Product Categories</h2>

<div class="row">
    @forelse($categories as $category)
        <div class="col-md-3 mb-3">
            <div class="card h-100 text-center shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->title }}</h5>
                    <p>{{ Str::limit($category->description, 50) }}</p>
                    <a href="{{ route('category.products', $category->id) }}" class="btn btn-outline-primary btn-sm">View Products</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <h3>No categories found</h3>
        </div>
    @endforelse
</div>
@endsection
