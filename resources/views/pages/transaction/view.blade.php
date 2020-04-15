@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a>Transaction <a href="/account/create" class="btn btn-success btn-sm float-right">+ Transaction</a></div>

                {{-- <div class="card-body"> --}}
                    @if (count($accounts) > 0)
                        
                    <table class="table table-striped">
                        <tr>
                            <th>Date</th>
                            <th>Debit</th>
                            <th>Credit</th>
                        </tr>
                        @foreach ($accounts as $account)
                            <tr data-toggle="collapse" data-target="#col{{$account->id}}">   
                            <td>{{$account->created_at}}</td>
                            <td>{{$account->debit}}</td>
                            <td>{{$account->credit}}</td>
                            </tr>
                            <tr id="col{{$account->id}}" class="collapse out">
                                <td colspan="4">
                                    <p>{{$account->company->name}} [{{$account->created_at}}]<br>
                                        Balance : {{$account->balance}}<br>
                                        [{{$account->note}}]
                                    </p>
                                </td>
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