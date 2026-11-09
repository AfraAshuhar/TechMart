@extends('layout.master')

@section('title', $category->title)

@section('content')
<h2>Products in {{ $category->title }}</h2>

@if($products->count() > 0)
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset('uploads/products/'.$product->image) }}" 
                            class="card-img-top" 
                            alt="{{ $product->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">${{ $product->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>No products found in this category.</p>
@endif
@endsection
