@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                
                {{-- <div class="card-body"> --}}
                    <div class="container">
                        <div class="row justify-content-center">
                        <div class="col-md-12">
                            
                            <div class="form-row align-items-center">
                                
                                <div class="col-md-2 col-sm-2 my-1">
                                    <h5>Select Data Range : </h5>
                                </div>

                                {!! Form::open(['action' => 'reportsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    <div class="col-md-3 col-sm-3 my-1">
                                        {{Form::hidden('range', '15')}}
                                        {{Form::submit('15 days', ['class'=>'btn btn-primary'])}}
                                    </div>
                                {!! Form::close() !!} 

                                {!! Form::open(['action' => 'reportsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                                                {!! Form::open(['action' => 'reportsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                    <br><br>

                    {{-- variables  --}}
                    @php $total_expanse = $total_sale = $profit = 0; @endphp
                    
                    {{-- Profits View  --}}
                   <legend class="alert-success">&emsp;&emsp; Sales </legend>
                    @if (count($sales) > 0)
                      
                    <table class="table table-striped">
                        <tr>
                            <th>Client</th>
                            <th>Item</th>
                            <th>Rate</th>
                            <th>profit</th>
                        </tr>   
                        
                        @foreach ($sales as $sale)
                            <tr data-toggle="collapse" data-target="#profit{{$sale->id}}">
                                <td>{{$sale->orders->company->name}}</td>
                                <td>{{$sale->orders->items->name}}</td>
                                <td>@money($sale->orders->rate)</td> 
                                @php $profit = (($sale->orders->rate * $sale->quantity) - $sale->expanse) - ($sale->purchase_rate * ($sale->quantity + $sale->loss)); @endphp
                                <td>@money($profit)</td> 
                                @php $total_sale += $profit; @endphp
                            </tr>
                            <tr id="profit{{$sale->id}}" class="collapse out">
                                <td colspan="4">
                                    <p> {{$sale->orders->company->name}} [{{$sale->orders->PO}}]<br>
                                        {{$sale->orders->items->name}}<br>
                                        {{$sale->quantity}} {{$sale->orders->items->unit}} @ {{$sale->orders->rate}}Tk<br>
                                        Expanse - @money($sale->expanse) || loss - {{$sale->loss}} {{$sale->orders->items->unit}}<br>
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <th></th>
                            <th colspan="3">Total Profit → @money($total_sale)</th>
                        </tr>
                    </table>
                    @else
                        <h3>&emsp;&emsp; No Data Found !!</h3>
                    @endif

                    {{-- Expanses view --}}
                    <div><legend class="alert-danger">&emsp;&emsp; Expanses </legend></div>
                    @if (count($expanse) > 0)
                        
                        <table class="table table-striped">
                            <tr>
                                <th>Date</th>
                                <th>Purpose</th>
                                <th>Amount</th>
                            </tr>
                            
                            @foreach ($expanse as $expanse)
                                <tr data-toggle="collapse" data-target="#expanse-{{$expanse->id}}">  
                                    <td>{{$expanse->created_at->format('j M, y')}}</td>
                                    <td>{{$expanse->type}} <br> @if ($expanse->user_id)[ {{$expanse->user->name}} ]@endif </td>
                                    <td>@money($expanse->amount)</td>
                                     @php $total_expanse += $expanse->amount; @endphp
                                </tr>
                                <tr id="expanse-{{$expanse->id}}" class="collapse out">
                                    <td colspan="3">{{$expanse->note}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th></th>
                                <th colspan="2">Total Expanse → @money($total_expanse)</th>
                            </tr>
                        </table>
                    @else
                            <h3>&emsp;&emsp; No Data Found !!</h3>
                    @endif
                </div>
            <div><h5 class="alert alert-danger"> &emsp;&emsp; {{$msg}} @money( $total_sale - $total_expanse )</h5></div>
            </div>
            <br><br>
        </div>
    </div>
</div>                    
    
@endsection