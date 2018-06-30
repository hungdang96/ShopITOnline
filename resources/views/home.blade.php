@extends('layouts.app')

@section('content')
    <div class="jumbotron container-fluid text-center">
        <h1 class="mb-3">Welcome to my website!</h1>
        <a class="btn btn-md btn-success" href="{{ route('login') }}">Đăng nhập</a>
        <a class="btn btn-md btn-primary" href="{{ route('register') }}">Đăng ký</a>
    </div>
@endsection
