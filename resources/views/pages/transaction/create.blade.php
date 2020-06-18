@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/bank/create" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> BANK</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Transaction</h1>
                    {!! Form::open(['action' => 'AccountsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        
                        <div class="form-group">
                            {{Form::label('date', 'Date')}}
                            {{-- {{Form::date('datetime-local', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Date'])}} --}}
                            <input type="datetime-local" name="date" id="article-ckeditor" class = 'form-control' placeholder = 'Date' />
                        </div>

                        {{-- select box code --}}
                        <div class="form-group">
                            {{Form::label('type', 'Transaction Type')}}
                            <select name="type" class="form-control">
                                <option value="">--Transaction Type--</option>
                                <option value="1">Paid To</option>
                                <option value="2">Recieved From</option>   
                            </select>
                        </div>
                        
                        <div class="form-group">
                            {{Form::label('bank', 'Bank')}}
                            <select name="bank" class="form-control">
                                <option value="">--Select Bank--</option>
                                @foreach ($banks as $id => $name)
                                <option value="{{ $id }}"> {{ $name }}</option>   
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('company', 'Company')}}
                            <select name="company" class="form-control">
                                <option value="">--Select Company--</option>
                                @foreach ($companies as $id => $name)
                                <option value="{{ $id }}"> {{ $name }}</option>   
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('amount', 'Amount')}}
                            {{Form::text('amount', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Amount'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('note', 'Note')}}
                            {{Form::text('note', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Note'])}}
                        </div>

                        {{Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>     
@endsection