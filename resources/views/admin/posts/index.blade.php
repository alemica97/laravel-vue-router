@extends('layouts.app')


@section('content')

    <div class="container py-3">
        <form>
            <a href="{{ route('admin.posts.create') }}">
                <input type="button" class="btn btn-primary" value="Create a new post">
            </a>
        </form>
    </div>
    <div class="container">
        @foreach ($posts as $post)
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>      
            <span>Published at: {{ $post->published_at }}</span>  
        @endforeach
    </div>

@endsection