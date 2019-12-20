@extends('layouts.app')

@section('title','Create Post')

@section('content')
<div class="container-fluid">

<div class="row">
  <div class="col-sm-2" > </div>
  <div class="col-sm-8" >
    <form method="POST" action="{{ route('posts.store')}}" enctype="multipart/form-data">
      @csrf
      <p>Post: <input type="text" name="post"
        value="{{ old('post') }}"></p>

        <div>
          <label> Image</label>
            <div class="col-md-6">
              <input type="file" class="form-control" name="image">
            </div>
        </div>
        <br>
      <input type="submit" value="Submit" class="btn btn-success">
      <a href="{{ route('posts.index' )}}">Cancel</a>
    </form>
  </div>
  <div class="col-sm-2"> </div>
  </div>
  </div>

@endsection
