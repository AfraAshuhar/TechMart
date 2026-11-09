@extends('layout.master')

@section('title','Checkout')

@section('content')
<h2 class="mb-4">Checkout</h2>

@if($cart && count($cart) > 0)
<form action="{{ route('checkout.placeOrder') }}" method="POST">
    @csrf
    <table class="table table-bordered mb-3">
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($cart as $id => $item)
                @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                <tr>
                    <td>{{ $item['title'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ $subtotal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h4>Total: ${{ $total }}</h4>

    <button type="submit" class="btn btn-success">Place Order</button>
</form>
@else
<p class="text-center">Your cart is empty.</p>
@endif
@endsection
