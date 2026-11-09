@extends('layout.master')

@section('title','Cart')

@section('content')
<h2 class="mb-4">Your Shopping Cart</h2>

@if($cart && count($cart) > 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach($cart as $id => $item)
            @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
            <tr>
                <td>{{ $item['title'] }}</td>
                <td>${{ $item['price'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>${{ $subtotal }}</td>
                <td>
                    <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger btn-sm">Remove</a>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td colspan="2"><strong>${{ $total }}</strong></td>
        </tr>
    </tbody>
</table>

<a href="{{ route('checkout') }}" class="btn btn-primary" >Proceed to Checkout</a>

@else
<p class="text-center">Your cart is empty.</p>
@endif
@endsection
