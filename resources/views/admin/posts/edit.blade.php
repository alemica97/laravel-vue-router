@extends('layouts.app')

@section('content')
    
    <div class="container py-4">
        <h1>Edit this post</h1>
    </div>

    <div class="container">
        <form action="{{ route('admin.posts.update', $post->id ) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- title --}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title',$post->title) }}" placeholder="Insert title">
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
                        <option {{ old('category_id', optional($post->category)->id == $category->id ? 'selected' : '') }} value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- tags --}}
            <span class="mb-3">Tags:</span>
            <div class="d-flex">
                @foreach($tags as $i => $tag)
                    <div class="form-group form-check">
                        {{-- Se la collection ($post->tags) contiene $tag allora metti 'checked' --}}
                        <input type="checkbox" {{ $post->tags->contains( $tag ) ? 'checked' : ''}} 
                            class="form-check-input @error('tags.{{$i}}') is-invalid @enderror" value="{{$tag->id}}" name="tags[{{$i}}]" id="tags-{{$tag->id}}">
                        <label class="form-check-label" for="tags-{{$tag->id}}">{{$tag->name}}</label>
                        @error('tags.{{$i}}')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>        
                @endforeach        
            </div>
            {{-- content --}}
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3" placeholder="Insert post's content">
                    {{ old('content',$post->content) }}
                </textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- cover --}}
            <div class="form-group">
                <label for="cover">Image</label>
                <input type="text" class="form-control @error('cover') is-invalid @enderror" id="cover" name="cover" value="{{ old('cover',$post->cover) }}" placeholder="Insert cover url (not necessary)">
                @error('cover')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- published_at --}}
            <div class="form-group">
                <label for="published_at">Published at</label>
                <input type="date" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at') ?: Str::substr($post->published_at, 0, 10) }}">
                @error('published_at')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="container px-0 py-3">
                <button type="submit" class="btn btn-primary px-4">Edit post</button>
{{-- 
                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger m-3">Delete</button>
                </form> --}}
            </div>

        </form>
    </div>

@endsection