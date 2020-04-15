@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a>Users</div>

                {{-- <div class="card-body"> --}}
                    @if (count($users) > 0)
                        
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Phone</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr data-toggle="collapse" data-target="#col{{$user->id}}">  
                            <td>{{$user->name}}</td>
                            <td>{{$user->company->name}}</td>
                            <td>{{$user->phone}}</td>
                            </tr>
                            <tr id="col{{$user->id}}" class="collapse out">
                                <td colspan="4"><p>{{$user->name}}<br>
                                                    {{$user->company->name}}<br>
                                                    {{$user->phone}}<br>
                                                    {{$user->email}}</p></td>
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