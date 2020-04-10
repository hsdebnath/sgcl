@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/home" role="button">Home / </a><a href="/dash" role="button">Dashboard / </a>Orders <a href="/orders/create" class="btn btn-success btn-sm float-right">Add New</a></div>

                <div class="card-body">
                    @if (count($orders) > 0)
                        
                    <table class="table table-bordered">
                        <tr>
                            <th>id</th>
                            <th>P/O</th>
                            <th>From</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($orders as $order)
                            <tr>
                            <td>{{$order->id}}</td>    
                            <td>{{$order->PO}}</td>
                            <td>{{$order->items->user->company->name}}</td>
                            <td>{{$order->items->name}}</td>
                            <td>{{$order->quantity}} {{$order->items->unit}}</td>
                            <td>{{$order->rate}}</td>
                            @if ($order->status == 0)
                                <td class="bg-primary text-white">Open</td>
                            @else
                                <td class="bg-success text-white">Complete</td>    
                            @endif
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