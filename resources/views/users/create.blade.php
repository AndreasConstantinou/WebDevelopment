@extends('layouts.app')

@section('title','Create Profile')

@section('content')
<div class="container-fluid">

<div class="row">
  <div class="col-sm-2" > </div>
  <div class="col-sm-8" >
    <form method="POST" action="{{ route('users.store')}}">
      @csrf
      <p>Job Title:</p>
      <input type="text" name="jobTitle" value="{{ old('jobTitle',$jobTitle->jobTitle ?? '') }}">
      <br><br>
      <p>Date of birth:</p>
      <input type="text" name="date_of_birth" value="{{ old('date_of_birth',$date_of_birth->date_of_birth ?? '') }}">
       <br><br>
      <p>Phone Number: </p>
      <input type="text" name="phoneNumber"        value="{{ old('phoneNumber',$phoneNumber->phoneNumber ?? '') }}">
      <br><br>
      <input type="submit" value="Submit" class="btn btn-success">
      <a href="{{ route('posts.index' )}}">Cancel</a>
    </form>

  </div>
  <div class="col-sm-2"> </div>
  </div>
  </div>
@endsection
