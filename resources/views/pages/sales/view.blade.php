@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Sales</strong> <a href="/sales/create" class="btn btn-success btn-sm float-right">Add New</a></div>

                {{-- <div class="card-body"> --}}
                    <div class="container">
                        <br>
                        <div class="row justify-content-center">
                        <div class="col-md-12">
                            
                            <div class="form-row align-items-center">
                                
                                <div class="col-md-2 col-sm-2 my-1">
                                    <h5>Select Data Range : </h5>
                                </div>

                                {!! Form::open(['action' => 'SalesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    <div class="col-md-3 col-sm-3 my-1">
                                        {{Form::hidden('range', '15')}}
                                        {{Form::submit('15 days', ['class'=>'btn btn-primary'])}}
                                    </div>
                                {!! Form::close() !!} 

                                {!! Form::open(['action' => 'SalesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                                                {!! Form::open(['action' => 'SalesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                    
                    @if (count($sales) > 0)
                      
                    <table class="table table-striped">
                        <tr>
                            <th>Client</th>
                            <th>Item</th>
                            <th>Rate</th>
                            <th>profit</th>
                        </tr>   
                        @php $total = $profit = 0; @endphp
                        @foreach ($sales as $sale)
                            <tr data-toggle="collapse" data-target="#col{{$sale->id}}">
                                <td>{{$sale->orders->company->name}}</td>
                                <td>{{$sale->orders->items->name}}</td>
                                <td>{{$sale->orders->rate}}</td> 
                                @php $profit = (($sale->orders->rate * $sale->quantity) - $sale->expanse) - ($sale->purchase_rate * ($sale->quantity + $sale->loss)); @endphp
                                <td>@php echo $profit; @endphp</td> 
                                @php $total += $profit; @endphp
                            </tr>
                            <tr id="col{{$sale->id}}" class="collapse out">
                                <td colspan="4">
                                    <p> {{$sale->orders->company->name}} [{{$sale->orders->PO}}]<br>
                                        {{$sale->orders->items->name}}<br>
                                        {{$sale->quantity}} {{$sale->orders->items->unit}} @ {{$sale->orders->rate}}Tk<br>
                                        Expanse -{{$sale->expanse}} || loss Expanse -{{$sale->loss}} {{$sale->orders->items->unit}}<br>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total Profit</th>
                            <th>@php echo $total; @endphp</th>
                        </tr>
                    </table>
                    <div>{{$sales->links()}}</div>
                    @else
                        <h3>No Items Found !!</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>                    
    
@endsection