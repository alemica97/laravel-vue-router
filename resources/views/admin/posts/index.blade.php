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
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Published at</th>
                <th scope="col">Created at</th>
                <th scope="col">Edit</th>
              </tr>
            </thead>
            <tbody>       
                  @foreach ($posts as $post)
                  <tr>
                    <th>{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->published_at }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id ) }}">Edit post</a>
                    </td>

                  </tr>
                  @endforeach            
            </tbody>
          </table>
    </div>


@endsection