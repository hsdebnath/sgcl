@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/dash" role="button">Dashboard / </a><a href="/bank" role="button">Banks</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Add Bank A/C</h1>
                    {!! Form::open(['action' => 'BanksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        
                        <div class="form-group">
                            {{Form::label('name', 'Bank Name')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Bank Name'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('branch', 'Branch')}}
                            {{Form::text('branch', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Branch'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('number', 'A/C number')}}
                            {{Form::text('number', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'A/C number'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('balance', 'Opening balance')}}
                            {{Form::text('balance', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Opening balance'])}}
                        </div>

                        {{Form::submit('Submit', ['class'=>'btn btn-primary btn-block'])}}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>     
@endsection