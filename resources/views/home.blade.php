@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p><a href="{{ route('posts.index' )}}">Look at posts</a></p>

                    You are logged in!

                    <p><a href="{{ route('users.create' )}}">Create a Profile</a></p>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
