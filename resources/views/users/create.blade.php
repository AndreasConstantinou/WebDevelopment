@extends('layouts.app')

@section('title','Create Profile')

@section('content')
    <form method="POST" action="{{ route('users.store')}}">
      @csrf
      <p>jobTitle: <input type="text" name="jobTitle"
        value="{{ old('jobTitle',$jobTitle->jobTitle ?? '') }}"></p>
      <p>date_of_birth: <input type="text" name="date_of_birth"
        value="{{ old('date_of_birth',$date_of_birth->date_of_birth ?? '') }}"></p>
      <p>phoneNumber: <input type="text" name="phoneNumber"
        value="{{ old('phoneNumber',$phoneNumber->phoneNumber ?? '') }}"></p>
      <input type="submit" value="Submit">
      <a href="{{ route('posts.index' )}}">Cancel</a>
    </form>


@endsection
