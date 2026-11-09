@extends('layout.master')

@section('title', $post->title)

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>{{ $post->title }}</h2>
        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" width="300px">
        <p>{{ $post->description }}</p>
    </div>
</div>
@endsection
