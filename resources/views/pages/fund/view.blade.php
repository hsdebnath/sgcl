@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <strong>Fundings</strong> <a href="/fund/create" class="btn btn-success btn-sm float-right">+ Fund</a></div>
                
                {{-- <div class="card-body"> --}}
                    <div class="container">
                        <br>
                        <div class="row justify-content-center">
                        <div class="col-md-12">
                            
                            <div class="form-row align-items-center">
                                
                                <div class="col-md-2 col-sm-2 my-1">
                                    <h5>Select Data Range : </h5>
                                </div>
    
                                {!! Form::open(['action' => 'FundsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    <div class="col-md-3 col-sm-3 my-1">
                                        {{Form::hidden('range', '15')}}
                                        {{Form::submit('15 days', ['class'=>'btn btn-primary'])}}
                                    </div>
                                {!! Form::close() !!} 
    
                                {!! Form::open(['action' => 'FundsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                                                {!! Form::open(['action' => 'FundsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                    
                    @if (count($funds) > 0)
                        
                    <table class="table table-striped">
                        <tr>
                            <th>Fund By</th>
                            <th>Type</th>
                            <th>Amount</th>
                        </tr>
                        @foreach ($funds as $fund)
                            <tr data-toggle="collapse" data-target="#col{{$fund->id}}">  
                            <td>{{$fund->by}}</td>
                            <td>{{$fund->type}}</td>
                            <td>{{$fund->amount}}</td>
                            </tr>
                            <tr id="col{{$fund->id}}" class="collapse out">
                                <td colspan="3">
                                    <p>[{{$fund->created_at}}]<br>
                                        {{$fund->amount}} Tk. {{$fund->type}} <br>
                                        By {{$fund->by}} <br>
                                        [{{$fund->note}}]
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <h3>No data Found !!</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>                    
    
@endsection