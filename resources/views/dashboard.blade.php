@extends('template')

@section('title')
    Web - Dashboard
@endsection

@section('content')
    <div class="container" style="height: 85vh; display: flex; justify-content: center; align-items: center">
        <div class="card" style="width: 50%;">
            Welcome, {{$data['username']}} !
        </div>
    </div>
@endsection
