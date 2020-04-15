@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a>Sales <a href="/sales/create" class="btn btn-success btn-sm float-right">Add New</a></div>

                {{-- <div class="card-body"> --}}
                    @if (count($sales) > 0)
                        
                    <table class="table table-striped">
                        <tr>
                            <th>Client</th>
                            <th>Item</th>
                            <th>Rate</th>
                        </tr>
                        @foreach ($sales as $sale)
                            <tr data-toggle="collapse" data-target="#col{{$sale->id}}">
                            <td>{{$sale->orders->company->name}}</td>
                            <td>{{$sale->orders->items->name}}</td>
                            <td>{{$sale->orders->rate}}</td> 
                            </tr>
                            <tr id="col{{$sale->id}}" class="collapse out">
                                <td colspan="4">
                                    <p> {{$sale->orders->company->name}} [{{$sale->orders->PO}}]<br>
                                        {{$sale->orders->items->name}}<br>
                                        {{$sale->quantity}} {{$sale->orders->items->unit}} @ {{$sale->orders->rate}}Tk<br>
                                        Expanse -{{$sale->expanse}}<br>
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