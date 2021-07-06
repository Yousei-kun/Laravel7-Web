@extends('OLD_UNUSED_VIEWS.template')

@section('title')
    Web - Login
@endsection

@section('content')
    <div class="container" style="height: 85vh; display: flex; justify-content: center; align-items: center">
        <div class="card" style="width: 50%;">
            <h2 style="margin: 10px auto">
                Register Page
            </h2>
            <form method="post" action="{{ route('register-input') }}" style="margin: 0 3em 2em 3em">
                @csrf
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Enter username">
                </div>
                <div class="form-group mt-4">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Enter password">
                </div>

                <center>
                    <button type="submit" name="register" class="btn btn-primary mt-4">Register</button>
                </center>

                Go to <a href="{{ route('login') }}">Login Page</a>
            </form>
        </div>
    </div>
@endsection
