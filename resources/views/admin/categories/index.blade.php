@extends('layout.master')

@section('title','Categories')

@section('content')
<h2>Categories</h2>
<ul class="list-group">
    @foreach($categories as $category)
        <li class="list-group-item">
            <a href="{{ route('categories.show', $category->id) }}">
                {{ $category->title }}
            </a>
        </li>
    @endforeach
</ul>
@endsection
