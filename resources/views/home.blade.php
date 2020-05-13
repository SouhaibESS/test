@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('post.create') }}" method="post">
                @csrf
                <div class="card gedf-card">
                  <div class="card-header">
                      Create a new post
                  </div>
                  <div class="card-body">
                      <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                            <div class="form-group">
                              <label for="title">Title :</label>
                              <input type="text" name="title" placeholder="Post Title" class="form-control" value="{{ old('title') }}">
                              @error('title')
                                <small class="text-danger">{{ $message}}</small>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="message">Body :</label>
                              <textarea name="body" class="form-control" id="message" rows="3" placeholder="What are you thinking?">{{ old('body') }}</textarea>
                              @error('body')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                            </div>
                          </div>
                      </div>
                      <div class="btn-toolbar justify-content-between">
                          <div class="btn-group">
                              <button type="submit" class="btn btn-primary">share</button>
                          </div>
                      </div>
                  </div>
                </div>
            </form>

            <h1 class="my-4">Posts</h1>

            @forelse ($posts as $post)
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="card-text">{{ $post->body }}</p>
                        @if (auth()->user()->id == $post->user_id)
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('post.edit', $post) }}" class="btn btn-primary">Update</a>
                                <form method="POST" action="{{ route('post.delete', $post) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger float-right">delete</button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $post->created_at }} by {{ $post->user->email }}
                    </div>
                </div>
            @empty
                <div class="alert alert-danger">No Posts for now.</div>
            @endempty
        </div>
    </div>
</div>
@endsection
