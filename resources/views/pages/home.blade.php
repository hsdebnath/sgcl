@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif  
            <div class="jumbotron">
                <h1 class="display-4">Hello, {{ Auth::user()->name }}</h1>
                <p class="lead">This is a simple Dashboard, Choose a module from below for further information.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="/dash" role="button">Dashboard</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
