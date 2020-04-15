@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a>Company <a href="/company/create" class="btn btn-success btn-sm float-right">Add New</a></div>

                <div class="card-body">
                    @if (count($company) > 0)
                        
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                        </tr>
                        @foreach ($company as $data)
                            <tr data-toggle="collapse" data-target="#col{{$data->id}}">   
                            <td>{{$data->name}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->address}}</td>
                            </tr>
                            <tr id="col{{$data->id}}" class="collapse out">
                                <td colspan="4"><p>Name - {{$data->name}} [{{$data->id}}]<br>
                                                   Phone - {{$data->phone}}<br>
                                                   Address - {{$data->address}}.<br></p>
                                </td>                   
                            </tr>
                        @endforeach
                        
                    </table>
                    <div class="pull-right">{{$company->links()}}</div>
                    @else
                        <h3>No Company Found !!</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>                    
    
@endsection