@extends('layouts.app')

@section('title','Post Detail')

@section('content')
    <p> Posted by {{ $post->user->name }} </p>
    <ul>
        <li>User: {{ $post->user->name }}</li>
        <li>Post: {{ $post->user_id }}</li>
        <li>Post: {{ $post->post }}</li>
    </ul>
    <form method="POST"
      action="{{ route('posts.destroy', ['id'=>$post->id ])}}">
      @csrf
      @method('DELETE')
      <button type="submit">Delete</button>
    </form>

    <p><a href="{{ route('posts.index' )}}">Back</a></p>


@endsection
