@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Banks</strong> <a href="/bank/create" class="btn btn-success btn-sm float-right">Add New</a></div>

                {{-- <div class="card-body"> --}}
                    @if (count($banks) > 0)
                        
                    <table class="table table-striped">
                        <tr>
                            <th>name</th>
                            <th>branch</th>
                            <th>Balance</th>
                        </tr>
                        @foreach ($banks as $bank)
                            <tr data-toggle="collapse" data-target="#bank-{{$bank->id}}">    
                            <td>{{$bank->name}}</td>
                            <td>{{$bank->branch}}</td>
                            <td>{{$bank->balance}} ~</td>
                            </tr>
                            <tr id="bank-{{$bank->id}}" class="collapse out">
                                <td colspan="4">
                                    <p>{{$bank->name}}<br>
                                        {{$bank->branch}} branch<br>
                                        A/C {{$bank->ac_number}}<br>
                                        Balance : {{$bank->balance}} ~<br>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                    <br><div class="row justify-content-center"><h3>No Banks Found !!</h3></div><br>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>                    
    
@endsection