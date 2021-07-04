@extends('template')

@section('title')
    Web - Dashboard
@endsection

@section('content')
    <a href="{{ route('dashboard-logout') }}">
        <button type="button" class="btn btn-danger"> Logout </button>
    </a>

    <div class="container" style="height: 85vh; display: flex; justify-content: center; align-items: center">
        <div class="card" style="width: 50%;">
            Welcome, {{$data->username}}
        </div>
    </div>
@endsection
