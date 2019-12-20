@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Dashboard</b></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <b>You are logged in!</b><br><br>

                    @if (!(is_null (Auth::user()->profile)))


                      <button type="button" class="btn btn-primary" ><a href="{{ route('posts.index' )}}"><font color="white">Look at posts</font> </a></button>
                      <br><br>

                    @endif


                    <button type="button" class="btn btn-primary" ><a href="{{ route('users.create' )}}"><font color="white">Create a Profile</font> </a></button>
                    <br><br>


                    <div id="api">
                        <button type="button" class="btn btn-primary" onclick="loadXML_api()">Show weather API info about Swansea</button>
                        <br>
                        <label id="apiResponse"></label>
                    </div>

                    <script>
                    function loadXML_api()
                    {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == XMLHttpRequest.DONE) {
                            var jsonResponse = JSON.parse(xhr.responseText);
                            console.log(xhr.responseText);
                            console.log(jsonResponse["coord"]["lon"]);

                            document.getElementById("apiResponse").innerHTML='<br>weather: '+ jsonResponse["weather"][0]["main"] + '<br>description:'+ jsonResponse["weather"][0]["description"] + '<br>humidity: ' +
                             jsonResponse["main"]["humidity"]  ;

                        }
                    }
                    xhr.open('GET', 'http://api.openweathermap.org/data/2.5/weather?q=swansea,uk&APPID=bb2a12dc3f45edaab7184c082228435b', true);
                    xhr.send(null);
                    }
                    </script>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
