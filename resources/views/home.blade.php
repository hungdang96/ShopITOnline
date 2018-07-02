@extends('layouts.app')

@section('content')
    <div class="container">
        @guest
            <div class="jumbotron text-center">
                <h3>Please login or register an account to use our services!</h3>
                <a class="btn btn-success" href="{{route('login')}}">Login</a>
                <span>OR</span>
                <a class="btn btn-primary" href="{{route('register')}}">Register</a>
            </div>
        @else
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard - Now is: <span id="txt"></span></div>

                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <p>User ID: {{Auth::user()->UserID}}<br>
                            Name: {{Auth::user()->name}}<br>
                            Email: {{Auth::user()->email}}<br>
                            Password: {{Auth::user()->password}}<br>
                            Role: {{Auth::user()->roleid}}<br>
                            Created: {{Auth::user()->created_at}}<br>
                            Updated: {{Auth::user()->updated_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endguest
    </div>
    <script type="application/javascript">
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
            return i;
        }
    </script>
@endsection
