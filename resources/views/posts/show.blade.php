@extends('layouts.app')

@section('title','Post Detail')

@section('content')
    <p> Posted by {{ $post->user->name }} </p>
    <ul>
        <li>User: {{ $post->user->name }}</li>
        <li>User_id: {{ $post->user_id }}</li>
        <li>Post: {{ $post->post }}</li>

        Image:<img src="<?php echo asset("public/storage/$post->image")?>"></img>



    </ul>
    @if (auth::user()->id == $post->user_id )
    <form method="POST"
      action="{{ route('posts.destroy', ['id'=>$post->id ])}}">
      @csrf
      @method('DELETE')
      <button type="submit">Delete</button>
    </form>

    <form method="PATCH"
      action="{{ route('posts.edit', ['id'=>$post->id ])}}">
      <button type="edit">Edit</button>
    </form>
    @endif


    <p><a href="{{ route('posts.index' )}}">Back</a></p>


@endsection
