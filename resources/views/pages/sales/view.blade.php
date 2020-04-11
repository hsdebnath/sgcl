@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/home" role="button">Home / </a><a href="/dash" role="button">Dashboard / </a>Sales <a href="/sales/create" class="btn btn-success btn-sm float-right">Add New</a></div>

                <div class="card-body">
                    @if (count($sales) > 0)
                        
                    <table class="table table-bordered">
                        <tr>
                            <th>id</th>
                            <th>Client</th>
                            <th>Item</th>
                            <th>P/O #</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Expanse</th>
                        </tr>
                        @foreach ($sales as $sale)
                            <tr>
                            <td>{{$sale->id}}</td>    
                            <td>{{$sale->orders->company->name}}</td>
                            <td>{{$sale->orders->items->name}}</td>
                            <td>{{$sale->orders->PO}}</td>
                            <td>{{$sale->quantity}} {{$sale->orders->items->unit}}</td>
                            <td>{{$sale->orders->rate}}</td>
                            <td>{{$sale->expanse}}</td>    

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