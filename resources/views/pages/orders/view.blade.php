@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a>Orders <a href="/orders/create" class="btn btn-success btn-sm float-right">Add New</a></div>

                {{-- <div class="card-body"> --}}
                    @if (count($orders) > 0)
                        
                    <table class="table table-striped">
                        <tr>
                            <th>From</th>
                            <th>Item</th>
                            {{-- <th>Quantity</th> --}}
                            <th>Rate</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($orders as $order)  

                            <tr data-toggle="collapse" data-target="#col{{$order->id}}">
                                <td>{{$order->company->name}}</td>
                                <td>{{$order->items->name}}</td>
                                <td>{{$order->rate}}</td>
                            @if ($order->status == 0)
                                <td class="bg-primary text-white">Open</td>
                            @else
                                <td class="bg-success text-white">Complete</td>    
                            @endif
                            </tr>
                            <tr id="col{{$order->id}}" class="collapse out">
                                <td colspan="4">
                                    <p>PO - {{$order->PO}}.<br>
                                        From -{{$order->company->name}}<br>
                                        Quantity - {{$order->quantity}}{{$order->items->unit}} @ {{$order->rate}}<br>
                                        @if ($order->status == 0)
                                        <a href="/orders/{{$order->id}}/edit" class="btn btn-info btn-sm" data-toggle="modal" data-target=".mod-{{$order->id}}">Update Status</a>   
                                        @endif
                                        
                                    </p>
                                </td>
                            </tr>
                            {{-- Edit status Modal start--}}
                            <div class="modal fade mod-{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3>Change Order Status</h3>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::open(['action' => ['OrdersController@update',$order->id] , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!} 
                                            <p>PO - {{$order->PO}}.<br>
                                                From -{{$order->company->name}}<br>
                                                Quantity - {{$order->quantity}}{{$order->items->unit}} @ {{$order->rate}}<br>
                                            </p>
                                                {{-- select box code --}}
                                                <div class="form-group">
                                                    {{Form::label('status', 'Order Status')}}
                                                    <select name="status" class="form-control">
                                                        <option value="">--Order status--</option>
                                                        <option value="0">Open</option>   
                                                        <option value="1">Completed</option>   
                                                    </select>
                                                </div>
                                                {{Form::hidden('_method', 'PUT')}}
                                                {{Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])}}
                                            {!! Form::close() !!}
                                        </div>    
                                    </div>
                                </div>
                            </div>
                            {{-- Edit status Modal End--}}
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