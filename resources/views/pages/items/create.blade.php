@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home" role="button">Home / </a><a href="/dash" role="button">Dashboard / </a><a href="/items" role="button">Items</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Create New Item</h1>
                    {!! Form::open(['action' => 'ItemsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Item Name')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Item Name'])}}
                        </div>

                        {{-- select box code --}}
                        <div class="form-group">
                            <select name="vendor" class="form-control">
                                <option value="">--Select Vendor--</option>
                                @foreach ($users as $id => $name)
                                <option value="{{ $id }}"> {{ $name }}</option>   
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('unit', 'Unit')}}
                            {{Form::text('unit', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Unit Text'])}}
                        </div>

                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>     
@endsection