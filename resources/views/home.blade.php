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


                    You are logged in!

                    @if (!(is_null (Auth::user()->profile)))

                      <p><a href="{{ route('posts.index' )}}">Look at posts </a></p>
                    @endif

                    <p><a href="{{ route('users.create' )}}">Create a Profile</a></p>

                    <div id="api">
                        <button type="button" onclick="loadXML_api()">Show weather API info about Swansea</button>
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
