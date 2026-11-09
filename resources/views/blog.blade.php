@extends('layout.master')

@section('content')
<div class="hero">
<div class="container mt-4">

    <h2 class="text-center mb-4">TechMart Blog</h2>

    <div class="row">

        @if($posts && $posts->count() > 0)
            @foreach($posts as $post)
                <div class="col-md-3 mb-4">
                    <div class="card shadow-sm h-100">
                        <!-- <img src="https://via.placeholder.com/300x200?text=TechMart+Blog" 
                             class="card-img-top"  -->
                             <!-- <img src="{{ asset('storage/' . $post->image) }}" alt="Post image"> -->
                                         <!-- <img src="{{ asset('uploads/posts/'.$post->image) }}" class="img-fluid mb-2" alt="{{ $post->title }}"> -->

            <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" width="200px">

                             
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->description, 80) }}</p>
                            <a href="{{ route('post.detail', $post->id) }}" 
                               class="btn btn-primary btn-sm">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12 text-center">
                <h3>No posts found.</h3>
            </div>
        @endif

    </div>
</div>

</div>
@endsection
