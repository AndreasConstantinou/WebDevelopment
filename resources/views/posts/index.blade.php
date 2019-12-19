@extends('layouts.app')

@section('title','Posts')

@section('content')
    <p> Ta post tou GIAKOUMI </p>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route('posts.show',['id'=>$post->id]) }}">{{ $post->post}}<a></li>
        @endforeach
        {!! $posts->render() !!}

    </ul>
    <form>
    <p><a href="{{ route('posts.create' )}}">Create Post</a></p>

    </form>
    <form>
    <p><a href="{{ route('users.edit', ['id'=>Auth::user()->profile->id] )}}">Edit your Profile</a></p>
    </form>


@endsection
