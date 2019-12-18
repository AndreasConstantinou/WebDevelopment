@extends('layouts.app')

@section('title','Create Post')

@section('content')
    <form method="POST" action="{{ route('users.update',['id'=>Auth::user()->profile->id] )}}">
      @csrf
      @method('PUT')
      <p>job Title: <input type="text" name="jobTitle"
        value="{{ old('jobTitle',$profile->jobTitle ?? '') }}"></p>
      <p>Date of birth: <input type="text" name="date_of_birth"
        value="{{ old('date_of_birth',$profile->date_of_birth ?? '') }}"></p>
      <p>phoneNumber: <input type="text" name="phoneNumber"
        value="{{ old('phoneNumber',$profile->phoneNumber ?? '') }}"></p>
      <input type="submit" value="Submit">
      <a href="{{ route('users.show',['id'=>Auth::user()->id] )}}">Cancel</a>
    </form>

@endsection
