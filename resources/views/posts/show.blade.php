@extends('layouts.app')

@section('title','Post Detail')

@section('content')
<div class="container-fluid">

<div class="row">
  <div class="col-sm-2" > </div>
  <div class="col-sm-8" >
    <p> Posted by {{ $post->user->name }} </p>
    <ul>
        <b>User {{ $post->user->name }}</b>
        <b>Posted:<br> {{ $post->post }}</b>

    </ul>
    @if (! (is_null ($post->image)))
    <img class="img-responsive" src="<?php echo asset("public/storage/$post->image")?>" >
    @endif
    <br>
    <ul class="list-group">

      @foreach ( $post->comments as $comment )
          <li class="list-group-item">Comment: {{ $comment->comment }}</li>
          <li class="list-group-item">By {{ $comment->user->name }}</li>
          @if (auth::user()->id == $comment->user_id )
          <form method="POST"
            action="{{ route('comments.destroy', ['id'=>$comment->id ])}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-warning">Delete</button>
          </form>

          <form method="PATCH"
            action="{{ route('comments.edit', ['id'=>$comment->id ])}}">
            <button type="edit" class="btn btn-primary">Edit </button>
          </form>
          @endif
          <p></p>
      @endforeach

    </ul>

<br>
    @if (auth::user()->id == $post->user_id )
    <form method="POST"
      action="{{ route('posts.destroy', ['id'=>$post->id ])}}">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-warning">Delete Post</button>
    </form>
<br>
    <form method="PATCH"
      action="{{ route('posts.edit', ['id'=>$post->id ])}}">
      <button type="edit" class="btn btn-primary">Edit Post</button>
    </form>
    @endif
<br>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <!-- provide the csrf token -->
   <meta name="csrf-token" content="{{ csrf_token() }}" />

   <script>
       $(document).ready(function(){
           var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
           $(".postbutton").click(function(){
               $.ajax({
                   /* the route pointing to the post function */
                   url: '/postajax',
                   type: 'POST',
                   /* send the csrf-token and the input to the controller */
                   data: {_token: CSRF_TOKEN, message:$(".getinfo").val(), id:{{ $post->id }} },
                   dataType: 'JSON',
                   /* remind that 'data' is the response of the AjaxController */
                   success: function (data) {
                       $(".writeinfo").append(data);
                   }
               });
           });
      });
   </script>


   <input class="getinfo"></input>
   <button class="postbutton btn btn-success" >Create a Comment</button>
   <br><label><b> New Comment: </b> </label>
    <b><div style="border-style: double" class="writeinfo"></div> </b>



<br>
    <button type="button" class="btn btn-primary" ><a href="{{ route('posts.index' )}}"><font color="white">Back</font> </a></button>

  </div>
  <div class="col-sm-2"> </div>
  </div>
  </div>
@endsection
