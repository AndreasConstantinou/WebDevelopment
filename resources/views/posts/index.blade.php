@extends('layouts.app')

@section('title','Posts')

@section('content')

<div class="container-fluid">

  <div class="row">
    <div class="col-sm-2" > </div>
    <div class="col-sm-8" >
      <p> <b>All the Posts</b> </p>
      <ul>
        <div class="list-group">
          @foreach ($posts as $post)
              <a class="list-group-item" href="{{ route('posts.show',['id'=>$post->id]) }}">{{ $post->post}}<a>
          @endforeach

        </div>
      </ul>




      <form>
      <p><a href="{{ route('posts.create' )}}">Create Post</a></p>

      </form>
      <form>
      <p><a href="{{ route('users.edit', ['id'=>Auth::user()->profile->id] )}}">Edit your Profile</a></p>
      </form>
{!! $posts->render() !!}
    </div>
    <div class="col-sm-2"> </div>
  </div>
</div>




@endsection
