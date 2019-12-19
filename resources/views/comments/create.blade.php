@extends('layouts.app')

@section('title','Create Post')

@section('content')
    <form method="POST" action="{{ route('posts.store')}}" enctype="multipart/form-data">
      @csrf
      <p>Post: <input type="text" name="post"
        value="{{ old('post') }}"></p>

        <div class="form-group row">
          <label for="image" class="col-md-4 col-form-label text-md-right"> Image</label>
            <div class="col-md-6">
              <input type="file" class="form-control" name="image">
            </div>
        </div>

      <input type="submit" value="Submit">
      <a href="{{ route('posts.index' )}}">Cancel</a>
    </form>


@endsection
