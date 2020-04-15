@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a> <a href="/account">Transaction</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Transaction Form</h1>
                    {!! Form::open(['action' => 'AccountsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        
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