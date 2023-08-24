@extends('Dashboard.layout')


@section('content')

    <div class="text-center mt-4">
        <h1 class="h2">Welcome back, {{auth()->user()->name}}</h1>
        <p class="lead">
            Admin Dashboard
        </p>
    </div>
    <div style="height: 100%"></div>
@endsection()
