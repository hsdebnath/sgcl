@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/orders/create" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Order</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Sales Item</h1>
                    {!! Form::open(['action' => 'SalesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        
                        {{-- select box code --}}
                        <div class="form-group">
                            {{Form::label('order', 'P/O')}}
                            <select name="order" class="form-control">
                                <option value="">--Select Order--</option>
                                @foreach ($orders as $id => $po)
                                <option value="{{ $id }}"> {{ $po }}</option>   
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('quantity', 'Accepted Quantity')}}
                            {{Form::number('quantity', '', ['class' => 'form-control', 'placeholder' => 'Accepted Quantity'])}}
                        </div>
                        
                        <div class="form-group">
                            {{Form::label('loss', 'Loss Quantity (unit)')}}
                            {{Form::number('loss', '', ['class' => 'form-control', 'placeholder' => 'Loss Quantity'])}}
                            <small class="text-primary">**(Scale weight difference)</small>
                        </div>

                        <div class="form-group">
                            {{Form::label('expanse', 'Expanse (tk.)')}}
                            {{Form::number('expanse', '', ['class' => 'form-control', 'placeholder' => 'Expanse'])}}
                            <small class="text-primary">**(Transport Cost, Labour charge etc.)</small>
                        </div>

                        {{Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>     
@endsection