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

            <form action="{{ route('post.edit', $post) }}" method="post">
                @csrf
                @method('put')
                <div class="card gedf-card">
                  <div class="card-header">
                      Edit Post :
                  </div>
                  <div class="card-body">
                      <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                            <div class="form-group">
                              <label for="title">Title :</label>
                              <input type="text" name="title" placeholder="Post Title" class="form-control" value="{{ $post->title }}">
                              @error('title')
                                <small class="text-danger">{{ $message}}</small>
                              @enderror
                            </div>
                            <div class="form-group">
                              <label for="message">Body :</label>
                              <textarea name="body" class="form-control" id="message" rows="3" placeholder="What are you thinking?">{{ $post->body }}</textarea>
                              @error('body')
                                <small class="text-danger">{{ $message }}</small>
                              @enderror
                            </div>
                          </div>
                      </div>
                      <div class="btn-toolbar justify-content-between">
                          <div class="btn-group">
                              <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                      </div>
                  </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection