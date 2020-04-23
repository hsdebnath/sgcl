@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong> Inventory </strong><a href="/purchase/create" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Purchase</a></div>

                {{-- <div class="card-body"> --}}
                    @if (count($inventory) > 0)
                        
                    <table class="table table-striped">
                        <tr>
                            <th>name</th>
                            <th>Quanity</th>
                            <th>rate</th>
                        </tr>
                        @foreach ($inventory as $inv)
                            <tr data-toggle="collapse" data-target="#col{{$inv->id}}">   
                            <td>{{$inv->items->name}}</td>
                            @if ($inv->quantity < 1000)
                                <td>{{$inv->quantity}} {{$inv->items->unit}}</td>
                            @else
                                <td>{{$inv->quantity / 1000}} MT</td>
                            @endif
                            <td>{{$inv->rate}}</td>
                            </tr>
                            <tr id="col{{$inv->id}}" class="collapse out">
                                <td colspan="4">
                                    <p>{{$inv->items->name}} [ {{$inv->items->company->name}}]<br>
                                        Stock : {{$inv->quantity}} {{$inv->items->unit}}<br>
                                        Purchase Rate : {{$inv->rate}}<br>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <br><h3 class="alert alert-danger">&emsp;&emsp;&emsp;No Data Found !!</h3><br>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>                    
    
@endsection