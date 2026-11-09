@extends('layout.master')

@section('content')
<div class="hero">
<div class="container mt-4">

    <h2 class="text-center mb-4">Our Products</h2>

    <div class="row">

        @if($products && count($products) > 0)
            @foreach($products as $product)

                <div class="col-md-3 mb-4">

                    <div class="card shadow-sm h-100">

                        <!-- <img src="{{ asset('uploads/' . $product->image) }}" 
                             class="card-img-top" 
                             alt="Product Image"> -->
                        <img src="{{ asset('uploads/products/'.$product->image) }}" 
                            class="card-img-top" 
                            alt="{{ $product->title }}">


                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>

                            <!-- <p class="text-muted mb-1">
                                 Category: {{Str::limit ($product->category,15) }} 
                                Category: {{Str::limit ($product->category->name ?? 'Unknown') }} 

                            </p> -->

                            <p class="fw-bold">
                                LKR {{ number_format($product->price, 2) }}
                            </p>

                            <a href="{{ route('product-detail', $product->id) }}" class="btn btn-primary mb-2">
                                View Details
                            </a>

                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-cart-success">
                                     Add to Cart
                                </button>
                            </form>
                        </div>


                    </div>

                </div>

            @endforeach
        @else

            <div class="col-12 text-center">
                <h3>No products available</h3>
            </div>

        @endif

    </div>

</div>
</div>
@endsection
