@extends('layouts.app')

@section('content')
    
    <div class="container">
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Email address</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Insert title">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


              <button type="submit" class="btn btn-primary">Create post</button>

        </form>
    </div>

@endsection