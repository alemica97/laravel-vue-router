@extends('layouts.app')

@section('content')
    
    <div class="container">
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            {{-- title --}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Insert title">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- content --}}
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" placeholder="Insert post's content">
                    {{ old('content') }}
                </textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- cover --}}
            <div class="form-group">
                <label for="cover">Image</label>
                <input type="text" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover" value="{{ old('cover') }}" placeholder="Insert cover url (not necessary)">
                @error('cover')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- published_at --}}
            <div class="form-group">
                <label for="published_at">Published at</label>
                <input type="date" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at') }}">
                @error('published_at')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


              <button type="submit" class="btn btn-primary">Create post</button>

        </form>
    </div>

@endsection