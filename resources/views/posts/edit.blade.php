@extends('layouts.app')

@section('title','Create Post')

@section('content')
<div class="container-fluid">

  <div class="row">
    <div class="col-sm-2" > </div>
    <div class="col-sm-8" >
    <form method="POST" action="{{ route('posts.update', ['id'=>$post->id ])}}">
      @csrf
      @method('PUT')
      <p>Post: <input type="text" name="post"
        value="{{ old('post',$post->post) }}"></p>

      <input type="submit" class="btn btn-primary" value="Submit ">
      <button type="button" class="btn btn-primary" ><a href="{{ route('posts.index' )}}"><font color="white">Cancel</font> </a></button>

    </form>
  </div>
  <div class="col-sm-2"> </div>
</div>
</div>

@endsection
