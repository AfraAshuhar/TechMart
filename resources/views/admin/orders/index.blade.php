@extends('layout.master')

@section('title','Orders')

@section('content')
<h2>Orders</h2>

@if($orders->count() > 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>${{ $order->total }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No orders found.</p>
@endif
@endsection
