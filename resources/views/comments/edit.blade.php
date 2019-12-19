@extends('layouts.app')

@section('title','Edit Comment')

@section('content')
    <form method="POST" action="{{ route('comments.update', ['id'=>$comment->id ])}}">
      @csrf
      @method('PUT')
      <p>Comment: <input type="text" name="comment"
        value="{{ old('comment',$comment->comment) }}"></p>

      <input type="submit" value="Submit">
      <a href="{{ route('posts.show',['id'=>$comment->post_id ] )}}">Cancel</a>
    </form>

@endsection
