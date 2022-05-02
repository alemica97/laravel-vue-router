@extends('layouts.app')


@section('content')

    <div class="container">
        @foreach ($posts as $post)
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->content }}</p>      
            <span>Published at: {{ $post->published_at }}</span>  
        @endforeach
    </div>

@endsection