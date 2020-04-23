@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <strong> Orders</strong> <a href="/orders/create" class="btn btn-success btn-sm float-right">Add New</a></div>

                {{-- <div class="card-body"> --}}
                    <div class="container">
                        <br>
                        <div class="row justify-content-center">
                        <div class="col-md-12">
                            
                            <div class="form-row align-items-center">
                                
                                <div class="col-md-2 col-sm-2 my-1">
                                    <h5>Select Data Range : </h5>
                                </div>

                                {!! Form::open(['action' => 'OrdersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    <div class="col-md-3 col-sm-3 my-1">
                                        {{Form::hidden('range', '15')}}
                                        {{Form::submit('15 days', ['class'=>'btn btn-primary'])}}
                                    </div>
                                {!! Form::close() !!} 

                                {!! Form::open(['action' => 'OrdersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    <div class="col-md-3 col-sm-3 my-1">
                                        {{Form::hidden('range', '30')}}
                                        {{Form::submit('30 days', ['class'=>'btn btn-primary'])}}
                                    </div>
                                {!! Form::close() !!} 
                                
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target=".mod-range">selecr date range</a>   
                                {{-- Edit status Modal start--}}
                                <div class="modal fade mod-range" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>selecr date range</h3>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::open(['action' => 'OrdersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                <div class="form align-items-center">
                                                    <div class="col-sm-auto my-1">
                                                        <label for="exampleInputEmail1">Start Date</label>
                                                        {{Form::date('start', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'required'])}}
                                                    </div>
                                                    <div class="col-sm-auto my-1">
                                                        <label for="exampleInputEmail1">End Date</label>
                                                        {{Form::date('end', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'required'])}}
                                                    </div>
                                                    <div class="col-auto my-1">
                                                        {{Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])}}
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                                {{-- Edit status Modal End--}}
                            </div>
                        </div>
                        </div>
                    </div>
                    <br>

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
                                    <strong><p>PO - {{$order->PO}}.&emsp;&emsp;
                                        @if ($order->quantity < 1000) {{$order->quantity}}{{$order->items->unit}}
                                        @else {{$order->quantity / 1000}} MT @endif
                                        @ {{$order->rate}} Tk. &emsp;&emsp;
                                        @if ($order->status == 0)
                                        <a href="/orders/{{$order->id}}/edit" class="btn btn-info btn-sm  float-right" data-toggle="modal" data-target=".mod-{{$order->id}}">Update Status</a>   
                                        @endif
                                        
                                    </p></strong><hr>
                                    @foreach ($sales as $sale)  
                                        @if ($sale->orders_id == $order->id)
                                            <p>{{$sale->created_at->format('j M, y')}} - &emsp;
                                               Shipped : {{$sale->quantity}} {{$sale->orders->items->unit}} - &emsp;
                                               Expanse : {{$sale->expanse}} Tk.<hr>
                                            </p>
                                        @endif
                                    @endforeach
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
                        <h3>No Orders Found !!</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>                    
    
@endsection