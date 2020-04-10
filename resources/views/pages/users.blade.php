@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/home" role="button">Home / </a><a href="/dash" role="button">Dashboard / </a>Users</div>

                <div class="card-body">
                    @if (count($users) > 0)
                        
                    <table class="table table-bordered">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Email</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                            <td>{{$user->id}}</td>    
                            <td>{{$user->name}}</td>
                            <td>{{$user->company}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>

                            </tr>
                        @endforeach
                    </table>
                    @else
                        <h3>No Items Found !!</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>                    
    
@endsection