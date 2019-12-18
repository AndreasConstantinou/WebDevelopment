@extends('layouts.app')

@section('title','Create Post')

@section('content')
    <form method="POST" action="{{ route('posts.update', ['id'=>$post->id ])}}">
      @csrf
      @method('PUT')
      <p>Post: <input type="text" name="post"
        value="{{ old('post',$post->post) }}"></p>

      <input type="submit" value="Submit">
      <a href="{{ route('posts.index' )}}">Cancel</a>
    </form>

@endsection
