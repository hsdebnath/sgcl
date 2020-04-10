@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/home" role="button">Home / </a><a href="/dash" role="button">Dashboard / </a>Purchase history <a href="/purchase/create" class="btn btn-success btn-sm float-right">+ Purchase</a></div>

                <div class="card-body">
                    @if (count($purchase) > 0)
                        
                    <table class="table table-bordered">
                        <tr>
                            <th>id</th>
                            <th>From</th>
                            <th>item</th>
                            <th>rate</th>
                            <th>Quantity</th>
                            <th>unit</th>
                        </tr>
                        @foreach ($purchase as $pur)
                            <tr>
                            <td>{{$pur->id}}</td>    
                            <td>{{$pur->items->user->name}}</td>
                            <td>{{$pur->items->name}}</td>
                            <td>{{$pur->rate}}</td>
                            <td>{{$pur->quantity}}</td>
                            <td>{{$pur->items->unit}}</td>
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