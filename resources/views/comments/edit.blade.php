@extends('layouts.app')

@section('title','Edit Comment')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2" > </div>
    <div class="col-sm-8" >
    <form method="POST" action="{{ route('comments.update', ['id'=>$comment->id ])}}">
      @csrf
      @method('PUT')
      <p>Comment: <input type="text" name="comment"
        value="{{ old('comment',$comment->comment) }}"></p>


      <input type="submit" class="btn btn-primary" value="Submit ">
      <button type="button" class="btn btn-primary" ><a href="{{ route('posts.show',['id'=>$comment->post_id ] )}}"><font color="white">Cancel</font> </a></button>

    </form>
  </div>
  <div class="col-sm-2"> </div>
</div>
</div>

@endsection
