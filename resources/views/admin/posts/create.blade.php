@extends('layouts.app')

@section('content')
    
    <div class="container py-4">
        <h1>Create a new post</h1>
    </div>

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
            {{-- select category --}}
            <div class="form-group">
                {{-- ricevo i dati della tabella categories tramite il controller create  --}}
                <label for="category_id">Select categoty</label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                  <option value="">-- nessuna selezione --</option>
                  @foreach ($categories as $category)
                        {{-- nel value metto l'id di categories che fa riferimento a category_id in post  --}}
                        <option {{ old('category_id') && old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- tags --}}
            <span class="mb-3">Tags:</span>
            <div class="tags-container">
                @foreach($tags as $i => $tag)
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input @error('tags.{{$i}}') is-invalid @enderror" value="{{$tag->id}}" name="tags[{{$i}}]" id="tags-{{$tag->id}}">
                        <label class="form-check-label" for="tags-{{$tag->id}}">{{$tag->name}}</label>
                    </div>
                    @error('tags.{{$i}}')
                        <span class="alert alert-danger">{{ $message }}</span>
                    @enderror
                @endforeach
            </div>
            {{-- content --}}
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3" placeholder="Insert post's content">
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

            <div class="container px-0 py-3">
                <button type="submit" class="btn btn-primary px-4">Create post</button>
            </div>

        </form>
    </div>

@endsection