@extends('layout.master')

@section('content')
<div class="container mt-4">
    <h2>{{ $post->title }}</h2>
    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" width="300px">
    <p>{{ $post->description }}</p>
</div>

<hr>

<div class="tm-container mt-4">
    <h4 class="mb-3">Related Products</h4>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <!-- <img src="{{ asset($product->image) }}" class="card-img-top" style="height:160px; object-fit:cover;"> -->
                     <img src="{{ asset('uploads/products/'.$product->image) }}" 
                            class="card-img-top" 
                            alt="{{ $product->title }}">
                    <div class="card-body d-flex flex-column">
                        <h6>{{ $product->title }}</h6>
                        <p class="text-muted">LKR {{ $product->price }}</p>
<!-- 
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-auto">
                            @csrf
                            <button class="btn btn-primary btn-sm w-100"> Add to Cart</button>
                        </form> -->
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-cart-success"> Add to Cart</button>
                            </form>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
