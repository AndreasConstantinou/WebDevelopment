@extends('layouts.app')

@section('title','Post Detail')

@section('content')
<div class="container-fluid">

<div class="row">
  <div class="col-sm-2" > </div>
  <div class="col-sm-8" >
    <p> {{ Auth::user()->name }}'s Information  </p>
    <ul>
        <li>User: {{ Auth::user()->name }}</li>
        <li>User-ID: {{ Auth::user()->id }}</li>
        <li>Job Title: {{ $profile->jobTitle ?? 'Unknown'}}</li>
        <li>PhoneNumber: {{ $profile->phoneNumber ?? 'Unknown'}}</li>
        <li>Date of birth: {{ $profile->date_of_birth ?? 'Unknown'}}</li>


    </ul>



    <p><a href="{{ route('posts.index') }}">News Feed</a></p>
  </div>
  <div class="col-sm-2"> </div>
  </div>
  </div>

@endsection
