@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <strong> Purchase </strong> <a href="/purchase/create" class="btn btn-success btn-sm float-right">+ Purchase</a></div>

                {{-- <div class="card-body"> --}}
                    <div class="container">
                        <br>
                        <div class="row justify-content-center">
                        <div class="col-md-12">
                            
                            <div class="form-row align-items-center">
                                
                                <div class="col-md-2 col-sm-2 my-1">
                                    <h5>Select Data Range : </h5>
                                </div>

                                {!! Form::open(['action' => 'PurchaseController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    <div class="col-md-3 col-sm-3 my-1">
                                        {{Form::hidden('range', '15')}}
                                        {{Form::submit('15 days', ['class'=>'btn btn-primary'])}}
                                    </div>
                                {!! Form::close() !!} 

                                {!! Form::open(['action' => 'PurchaseController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                                                {!! Form::open(['action' => 'PurchaseController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                    <div>{{$purchase->links()}}</div>
                    @else
                        <h3>No Items Found !!</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>                    
    
@endsection