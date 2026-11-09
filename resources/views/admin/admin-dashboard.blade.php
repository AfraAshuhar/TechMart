@extends('admin.layout')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow p-3">
                <h4>Posts</h4>
                <p class="fs-3">{{ $postCount }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-3">
                <h4>Products</h4>
                <p class="fs-3">{{ $productCount }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow p-3">
                <h4>Categories</h4>
                <p class="fs-3">{{ $categoryCount }}</p>
            </div>
        </div>

    </div>

</div>
@endsection
