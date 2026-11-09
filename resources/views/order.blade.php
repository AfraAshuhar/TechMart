@extends('layout.master')

@section('title','Order Success')

@section('content')
<div class="text-center mt-5">
    <h2>Thank You!</h2>
    <p>Your order has been placed successfully.</p>
    <a href="{{ route('products') }}" class="btn btn-primary">Continue Shopping</a>
</div>
@endsection
