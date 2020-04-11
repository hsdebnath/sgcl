@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home" role="button">Home / </a><a href="/dash" role="button">Dashboard / </a><a href="/orders" role="button">Orders</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Create New Order</h1>
                    {!! Form::open(['action' => 'OrdersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        
                        {{-- select box code --}}
                        <div class="form-group">
                            {{Form::label('client', 'Client Name')}}
                            <select name="client" class="form-control">
                                <option value="">--Order from--</option>
                                @foreach ($company as $id => $name)
                                <option value="{{ $id }}"> {{ $name }}</option>   
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('item', 'Item Name')}}
                            <select name="item" class="form-control">
                                <option value="">--Select Item--</option>
                                @foreach ($items as $id => $name)
                                <option value="{{ $id }}"> {{ $name }}</option>   
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('po', 'P/O number')}}
                            {{Form::text('po', '', ['class' => 'form-control', 'placeholder' => 'P/O number'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('rate', 'Rate')}}
                            {{Form::text('rate', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Sales Rrte'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('quantity', 'Quantity')}}
                            {{Form::text('quantity', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Quantity'])}}
                        </div>

                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>     
@endsection