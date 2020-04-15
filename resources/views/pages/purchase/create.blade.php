@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a> <a href="/purchase">Purchase</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Purchase Item</h1>
                    {!! Form::open(['action' => 'PurchaseController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        
                        {{-- select box code --}}
                        <div class="form-group">
                            {{Form::label('vendor', 'Vendor')}}
                            <select name="vendor" class="form-control">
                                <option value="">--Select Vendor--</option>
                                @foreach ($company as $id => $name)
                                <option value="{{ $id }}"> {{ $name }}</option>   
                                @endforeach
                            </select>
                        </div>
                        {{-- dependent on vendor --}}
                        <div class="form-group">
                            {{Form::label('item', 'Item')}}
                            <select name="item" class="form-control">
                                <option value="">--Select Item--</option>
                            </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('quantity', 'Quantity')}}
                            {{Form::text('quantity', '', ['class' => 'form-control', 'placeholder' => 'Quantity'])}}
                        </div>


                        <div class="form-group">
                            {{Form::label('rate', 'Rate')}}
                            {{Form::text('rate', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Rate'])}}
                        </div>

                        {{Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>     
@endsection