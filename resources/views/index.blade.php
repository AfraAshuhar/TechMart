@extends('layout.master')

@section('content')

<div class="container mt-4">


    <h2 class="text-center mb-4">Latest Posts</h2>

    <div class="row">

        @if($posts && $posts->count() > 0)
    @foreach($posts as $post)
        <div class="card mb-3">
            
            <h5>{{ $post->title }}</h5>
            <!-- <img src="{{ $post->image ?? 'https://via.placeholder.com/500' }}"> -->
             <!-- <img src="{{ asset('storage/' . $post->image) }}" alt="Post image"> -->
            <!-- <img src="{{ asset('uploads/posts/'.$post->image) }}" class="img-fluid mb-2" alt="{{ $post->title }}"> -->
            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" width="200px">

            <p>{{ $post->description }}</p>
        </div>
    @endforeach
@else
    <p>No posts found.</p>
@endif

    </div>
    <div class="bg-red-500 text-white p-4">
    Tailwind test
</div>

</div>
@endsection