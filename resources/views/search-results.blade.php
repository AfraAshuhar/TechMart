@extends('layout.master')

@section('title', "Search Results")

@section('content')
<h3>Search Results for: "{{ $query }}"</h3>

@if($products->isEmpty())
    <p>No products found.</p>
@else
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <!-- <img src="{{ asset('storage/products/'.$product->image) }}" 
                         class="card-img-top" 
                         alt="{{ $product->title }}"> -->
                    <img src="{{ asset('uploads/products/'.$product->image) }}" 
                            class="card-img-top" 
                            alt="{{ $product->title }}">


                    <div class="card-body">
                        <h5>{{ $product->title }}</h5>
                        <p>{{ Str::limit($product->description, 80) }}</p>

                        <a href="{{ url('/product-detail/'.$product->id) }}" 
                           class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
