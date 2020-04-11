@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/home" role="button">Home / </a><a href="/dash" role="button">Dashboard / </a>Company <a href="/company/create" class="btn btn-success btn-sm float-right">Add New</a></div>

                <div class="card-body">
                    @if (count($company) > 0)
                        
                    <table class="table table-bordered">
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>
                        @foreach ($company as $data)
                            <tr>
                            <td>{{$data->id}}</td>    
                            <td>{{$data->name}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->address}}</td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <h3>No Company Found !!</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>                    
    
@endsection