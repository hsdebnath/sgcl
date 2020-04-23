@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/items" role="button">View Items</a> </div>

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
                            {{Form::label('vendor', 'Vendor Name')}}
                            <select name="vendor" class="form-control" required>
                                <option value="">--Select Vendor--</option>
                                @foreach ($users as $id => $name)
                                <option value="{{ $id }}"> {{ $name }}</option>   
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{Form::label('unit', 'Unit')}}
                            <select name="unit" class="form-control" required>
                                <option value="Kgs">Kgs</option> 
                            </select>
                        </div>

                        {{Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>     
@endsection