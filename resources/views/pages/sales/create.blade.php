@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home" role="button">Home / </a><a href="/dash" role="button">Dashboard / </a> <a href="/sales">Sales</a></div>

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
                            {{Form::label('quantity', 'Quantity')}}
                            {{Form::text('quantity', '', ['class' => 'form-control', 'placeholder' => 'Quantity'])}}
                        </div>


                        <div class="form-group">
                            {{Form::label('expanse', 'Expanse')}}
                            {{Form::text('expanse', '', ['class' => 'form-control', 'placeholder' => 'Expanse'])}}
                        </div>

                        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>     
@endsection