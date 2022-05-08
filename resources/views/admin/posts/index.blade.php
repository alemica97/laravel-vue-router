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
        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Tag</th>
                <th scope="col">Category</th>
                <th scope="col">Published at</th>
                <th scope="col">Created at</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>       
                  @foreach ($posts as $post)
                  <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>
                        @foreach( $post->tags as $tag )
                            <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    {{-- Se esiste una categoria nello specifico post, allora stampa il nome della categoria  --}}
                    {{-- qui category fa riferimento alla relazione nel model Post (Post.php riga 39), ovvero il metodo category(),
                    category-> si aspetta una parametro es. ('category->name'), category()-> si aspetta un metodo per la relazione es.( category()->attach()) --}}
                    <td>{{ $post->category ? $post->category->name : 'no category' }}</td>
                    <td>{{ $post->published_at }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id ) }}">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger delete-post-btn">Delete</button>
                        </form>
                    </td>

                  </tr>
                  @endforeach            
            </tbody>
          </table>
    </div>


@endsection