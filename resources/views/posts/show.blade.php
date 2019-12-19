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
   <button class="postbutton">Post via ajax!</button>
   <div class="writeinfo"></div>




    <p><a href="{{ route('posts.index' )}}">Back</a></p>


@endsection
