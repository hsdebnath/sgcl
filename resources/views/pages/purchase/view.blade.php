@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a>Purchase<a href="/purchase/create" class="btn btn-success btn-sm float-right">+ Purchase</a></div>

                {{-- <div class="card-body"> --}}
                    @if (count($purchase) > 0)
                        
                    <table class="table table-striped">
                        <tr>
                            <th>item</th>
                            <th>rate</th>
                            <th>Quantity</th>
                        </tr>
                        @foreach ($purchase as $pur)
                            <tr data-toggle="collapse" data-target="#col{{$pur->id}}"> 
                            <td>{{$pur->items->name}}</td>
                            <td>{{$pur->rate}}</td>
                            <td>{{$pur->quantity}} {{$pur->items->unit}}</td>
                            </tr>
                            <tr id="col{{$pur->id}}" class="collapse out">
                                <td colspan="4">
                                    <p>{{$pur->items->name}} <br>
                                        From: {{$pur->items->company->name}} <br>
                                        {{$pur->quantity}} {{$pur->items->unit}} @ {{$pur->rate}} Tk.<br>
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