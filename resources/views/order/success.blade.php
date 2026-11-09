@extends('layout.master')

@section('content')
<div class="container mt-4 text-center">
    <h2>Thank You!</h2>
    <p>Your order has been successfully placed.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Back to Home</a>
</div>
@endsection
