@extends('layout.master')

@section('content')
<div class="container mt-4">

    <a href="{{ url('/products') }}" class="btn btn-secondary btn-sm mb-3">← Back</a>

    <div class="card p-4 shadow-sm">

        <h2 class="mb-3">{{ $product->title }}</h2>

        <!-- <img src="{{ $product->image ?? 'https://via.placeholder.com/500' }}"
             class="img-fluid mb-3" alt="Product"> -->

             <img src="{{ asset('uploads/products/'.$product->image) }}" 
                class="card-img-top" 
                alt="{{ $product->title }}" style="max-height: 400px; object-fit: contain;">

        <p class="fs-5">{{ $product->description }}</p>

        <h4 class="mt-3">Price: Rs {{ number_format($product->price, 2) }}</h4>

       <form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-cart-success mt-3">
        Add to Cart
    </button>
</form>


    </div>

</div>
@endsection
